var campaignAccordionService = function () {

    
    const elementIds = {
        company_details_hq: 'company_details_hq',
        company_details_hq_switch_board_options: 'company_details_hq_switch_board_options',
        company_details_to_dial_extension: 'company_details_to_dial_extension',
        company_details_to_dial_directory: 'company_details_to_dial_directory',
        company_details_to_dial_operator: 'company_details_to_dial_operator',
        company_details_company_url: 'company_details_company_url',
        company_details_linkedin_profile: 'company_details_linkedin_profile',
        company_details_zoominfo_profile: 'company_details_zoominfo_profile',

        contacts_table_div: 'contacts_table_div',
        contacts_table: 'contacts_table',
        contacts_table_body: 'contacts_table_body', 

        no_contacts_div: 'no_contacts_div',

        contact_details_prospect_name: 'contact_details_prospect_name',
        contact_details_title: 'contact_details_title',
        contact_details_email: 'contact_details_email',
        contact_details_aa_email: 'contact_details_aa_email',
        contact_details_linkedin_profile: 'contact_details_linkedin_profile',
        contact_details_linkedin_profile_url: 'contact_details_linkedin_profile_url',
        contact_details_zoominfo_profile: 'contact_details_zoominfo_profile',
        contact_details_zoominfo_profile_url: 'contact_details_zoominfo_profile_url',
        contact_details_direct_dial: 'contact_details_direct_dial',
        contact_details_ext: 'contact_details_ext',
        contact_details_mobile: 'contact_details_mobile',

        notes: 'notes',

        update_contact_btn: 'update_contact_btn'

    }

    const initials = {
        company_checkbox_: 'company_checkbox_',
        contact_checkbox_: 'contact_checkbox_'
    }

    const classes = {
        company_table_row: 'company_table_row',
        company_checkbox: 'company_checkbox',
        contacts_table_rows: 'contacts_table_rows',
        contact_checkbox: 'contact_checkbox'
    }

    addEventListeners = function () {
        emptyCompanyInfo();
        emptyContactTableBody();
        hideUpdateContactButton();

        // Companies Table Click
        $("." + classes.company_table_row).click(function() {
            var rowId = $(this).attr('id');
            uncheckCompanyCheckboxes();
            $('#' + initials.company_checkbox_+rowId).prop('checked', true);
            var url = urls.getCompany;
            url = url.replace(':id', rowId);
            ajaxService.makeAjaxRequest("GET", url).done(function(data) {
                // console.log(data['company']);
                emptyCompanyInfo();
                emptyContactInfo();
                hideUpdateContactButton();
                populateCompanyInfo(data['company']);
                emptyContactTableBody();
                populateContactTableBody(data['company']['contacts']);
            }).fail(function(err) {
                emptyCompanyInfo();
                emptyContactInfo();
                hideUpdateContactButton();
                toastr["error"](`Invalid company selected!`);
            });
        });

        // Update Contact Event Listener
        $("#" + elementIds.update_contact_btn).on("click", function() {
            var contactId = $("#" + elementIds.update_contact_btn).attr("data-contact-id");
            var contactData = {
                "name": $("#" + elementIds.contact_details_prospect_name).val(),
                "contact_details_title": $("#" + elementIds.contact_details_title).val(),
                "contact_details_email": $("#" + elementIds.contact_details_email).val(),
                "contact_details_aa_email": $("#" + elementIds.contact_details_aa_email).val(),
                "contact_details_linkedin_profile": $("#" + elementIds.contact_details_linkedin_profile).val(),
                "contact_details_zoominfo_profile": $("#" + elementIds.contact_details_zoominfo_profile).val(),
                "contact_details_direct_dial": $("#" + elementIds.contact_details_direct_dial).val(),
                "contact_details_ext": $("#" + elementIds.contact_details_ext).val(),
                "contact_details_mobile": $("#" + elementIds.contact_details_mobile).val(),
                "notes": $("#" + elementIds.notes).val()
            }
            // console.log(contactData);
            // validate
            if(contactData.name.length <= 0) {
                $("#" + elementIds.contact_details_prospect_name).addClass("is-invalid");
                return;
            } else {
                $("#" + elementIds.contact_details_prospect_name).removeClass("is-invalid");
            }
            if(contactData.contact_details_title.length <= 0) {
                $("#" + elementIds.contact_details_title).addClass("is-invalid");
                return;
            }else {
                $("#" + elementIds.contact_details_title).removeClass("is-invalid");
            }
            if(contactData.contact_details_linkedin_profile.length <= 0) {
                $("#" + elementIds.contact_details_linkedin_profile).addClass("is-invalid");
                return;
            }else {
                $("#" + elementIds.contact_details_linkedin_profile).removeClass("is-invalid");
            }
            if(contactData.contact_details_zoominfo_profile.length <= 0) {
                $("#" + elementIds.contact_details_zoominfo_profile).addClass("is-invalid");
                return;
            }else {
                $("#" + elementIds.contact_details_zoominfo_profile).removeClass("is-invalid");
            }
            if(contactData.contact_details_direct_dial.length <= 0) {
                $("#" + elementIds.contact_details_direct_dial).addClass("is-invalid");
                return;
            }else {
                $("#" + elementIds.contact_details_direct_dial).removeClass("is-invalid");
            }
            // ajax
            var url = urls.miniUpdateContact;
            url = url.replace(':id', contactId);
            // console.log(url);
            ajaxService.makeAjaxRequest("POST", url, contactData).done(function(data) {
            }).done(function(data) {
                // console.log(data);
                toastr["success"](`Contact Updated Successfully!`);
            }).fail(function(err){
                // console.log(err);
                toastr["error"](`Something unexpected happened please refresh and try again!`);
            });
            // message
        });

    }

    function contactTableRowClickEventListener() {
        // Contacts Table Click
        $("." + classes.contacts_table_rows).click(function() {
            var rowId = $(this).attr('id');
            uncheckContactCheckboxes();
            $('#' + initials.contact_checkbox_+rowId).prop('checked', true);
            var url = urls.getContact;
            url = url.replace(':id', rowId);
            ajaxService.makeAjaxRequest("GET", url).done(function(data) {
                // console.log(data);
                emptyContactInfo();
                populateContactInfo(data['contact']);
                showUpdateContactButton();
            }).fail(function(err) {
                emptyContactInfo();
                hideUpdateContactButton();
                toastr["error"](`Invalid contact selected!`);
            });
        })
    }

    function uncheckCompanyCheckboxes () {
        $("." + classes.company_checkbox + ":checkbox").prop("checked", false);
    }
    function uncheckContactCheckboxes () {
        $("." + classes.contact_checkbox + ":checkbox").prop("checked", false);
    }

    function emptyCompanyInfo() {
        $("#"+elementIds.company_details_hq).text("");
        $("#"+elementIds.company_details_hq_switch_board_options).text("");
        $("#"+elementIds.company_details_to_dial_extension).text("");
        $("#"+elementIds.company_details_to_dial_directory).text("");
        $("#"+elementIds.company_details_to_dial_operator).text("");
        $("#"+elementIds.company_details_company_url).text("");
        $("#"+elementIds.company_details_linkedin_profile).text("");
        $("#"+elementIds.company_details_zoominfo_profile).text("");
    }
    function emptyContactInfo() {
        $("#"+elementIds.contact_details_prospect_name).val("");
        $("#"+elementIds.contact_details_title).val("");
        $("#"+elementIds.contact_details_email).val("");
        $("#"+elementIds.contact_details_aa_email).val("");
        $("#"+elementIds.contact_details_linkedin_profile).val("");
        $("#"+elementIds.contact_details_linkedin_profile_url).html('<i class="ri-links-line" id=""></i>');
        $("#"+elementIds.contact_details_zoominfo_profile).val("");
        $("#"+elementIds.contact_details_zoominfo_profile_url).html('<i class="ri-links-line" id=""></i>');
        $("#"+elementIds.contact_details_direct_dial).val("");
        $("#"+elementIds.contact_details_ext).val("");
        $("#"+elementIds.contact_details_mobile).val("");
        $("#"+elementIds.notes).val("");
    }

    function populateCompanyInfo(data) {
        $("#"+elementIds.company_details_hq).text(data.hq_phone);
        $("#"+elementIds.company_details_hq_switch_board_options).text(data.hq_phone);
        $("#"+elementIds.company_details_to_dial_extension).text(data.to_dial_extension);
        $("#"+elementIds.company_details_to_dial_directory).text(data.to_dial_directory);
        $("#"+elementIds.company_details_to_dial_operator).text(data.to_dial_operator);
        $("#"+elementIds.company_details_company_url).html(`<a href='//${data.website}' target='_blank'>${data.website}</a>`);
        $("#"+elementIds.company_details_linkedin_profile).html(`<a href='${data.linkedin_company_profile_url}' target='_blank'>${data.linkedin_company_profile_url}</a>`);
        $("#"+elementIds.company_details_zoominfo_profile).html(`<a href='${data.zoominfo_company_profile_url}' target='_blank'>${data.zoominfo_company_profile_url}</a>`);
    }
    function populateContactInfo(data) {
        $("#"+elementIds.contact_details_prospect_name).val((data.salutation)?data.salutation + " ":"" + data.first_name + " " + data.last_name);
        $("#"+elementIds.contact_details_title).val(data.job_title);
        $("#"+elementIds.contact_details_email).val(data.email_address);
        $("#"+elementIds.contact_details_aa_email).val(data.supplemental_email);
        $("#"+elementIds.contact_details_linkedin_profile).val(data.linkedin_contact_profile_url);
        $("#"+elementIds.contact_details_linkedin_profile_url).html(`<a href='${data.linkedin_contact_profile_url}' target='_blank'><i class="ri-links-line" id=""></i></a>`);
        $("#"+elementIds.contact_details_zoominfo_profile).val(data.zoominfo_contact_profile_url);
        $("#"+elementIds.contact_details_zoominfo_profile_url).html(`<a href='${data.zoominfo_contact_profile_url}' target='_blank'><i class="ri-links-line" id=""></i></a>`);
        // $("#"+elementIds.contact_details_zoominfo_profile).html(`<a href='${data.zoominfo_contact_profile_url}' target='_blank'>${data.zoominfo_contact_profile_url}</a>`);
        $("#"+elementIds.contact_details_direct_dial).val(data.direct_phone_number);
        $("#"+elementIds.contact_details_ext).val(data.dial_extension);
        $("#"+elementIds.contact_details_mobile).val(data.mobile_phone);
        $("#"+elementIds.notes).val(data.notes);

        $("#" + elementIds.update_contact_btn).attr("data-contact-id", data.id);
    }

    function emptyContactTableBody() {
        $("#" + elementIds.contacts_table_body).html('');
        $("#" + elementIds.contacts_table_div).hide('slow');
        $("#" + elementIds.no_contacts_div).show('slow');
    }

    function populateContactTableBody(data) {
        if(data.length > 0) {
            $("#" + elementIds.contacts_table_div).show('slow');
            $("#" + elementIds.no_contacts_div).hide('slow');
            var contactTableRow = '<tr class="contacts_table_rows" id=":contact_id" style="cursor: pointer;">'+
            '                         <td>'+
            '                             <div class="form-check">'+
            '                                 <input type="checkbox" class="form-check-input contact_checkbox" id="contact_checkbox_:id">'+
            '                                 <label class="form-check-label mb-0" for="contact_checkbox_:id"> </label>'+
            '                             </div>'+
            '                         </td>'+
            '                         <td>:prospect_name</td>'+
            '                         <td>:title</td>'+
            '                         <td>:management_level</td>'+
            '                         <td>:direct_dial</td>'+
            '                         <td>:ext</td>'+
            '                         <td>:mobile</td>'+
            '                     </tr>';
            data.forEach(element => {
                var rowHTML = contactTableRow.replace(":id", element.id);
                rowHTML = rowHTML.replace(":contact_id", element.id);
                rowHTML = rowHTML.replace(":id", element.id);
                rowHTML = rowHTML.replace(":prospect_name", element.first_name + " " + element.last_name);
                rowHTML = rowHTML.replace(":title", element.job_title);
                rowHTML = rowHTML.replace(":management_level", element.management_level);
                rowHTML = rowHTML.replace(":direct_dial", (element.direct_phone_number)?element.direct_phone_number:"");
                rowHTML = rowHTML.replace(":ext", (element.dial_extension)?element.dial_extension:"");
                rowHTML = rowHTML.replace(":mobile", (element.mobile_phone)?element.mobile_phone:"");
                $("#" + elementIds.contacts_table_body).append(rowHTML);
            });
            contactTableRowClickEventListener();
        }
    }

    function showUpdateContactButton() {
        $("#" + elementIds.update_contact_btn).show('slow');
    }
    function hideUpdateContactButton() {
        $("#" + elementIds.update_contact_btn).hide('slow');
    }
    return {
        addEventListeners: addEventListeners
    }

}();

$(document).ready(function() {

    campaignAccordionService.addEventListeners();

})
