import tagView from './views/tagView.js';
import companyTableView from './views/companyTableView.js';
import contactTableView from './views/contactTableView.js';
import * as model from './model.js';

class App {

    constructor() {
        this.tagId = '';
        this.tagText = '';
        this.tagType = '';

        this.addEventListeners();
    }

    addEventListeners() {
        var that = this;
        $("." + tagView.tagElementClasses.checkbox_tags).on('click', function() {
            that.companyTagClicked(this)
        });
    }

    addEventListenerToDeleteTag() {
        var that = this;
        $("." + tagView.tagElementClasses.tag_close).on('click', function() {
            that.deleteTag(this)
        });
    }

    companyTagClicked(element) {
        var tagElem = $(element);
        this.tagId = "" + tagElem.attr('data-tag-id');
        this.tagText = tagElem.attr('data-tag-text');
        this.tagType = tagElem.attr('data-tag-type');
        this.show();
        if (tagElem.prop('checked') == true) {
            this.tagChecked()
        } else {
            this.tagUnChecked()
        }
    }

    async tagChecked() {
        // Fill State
        model.addTag(this.tagType, {id: this.tagId, text: this.tagText});
        // Update Filters view
        tagView.renderFilters(model.state.filters);
        this.addEventListenerToDeleteTag();
        // Fetch contacts and companies with that tag
        try {
            
            // $('#contacts_table').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     // ajax: ajaxURLS.filters,
            //     ajax: {
            //         url: ajaxURLS.filter,
            //         method: 'POST'
            //     },
            //     // "scrollX": true,
            //     columns: [
            //         {data: 'id', name: 'id'},
            //         {data: 'name', name: 'name'},
            //         {data: 'email', name: 'email'},
            //         {data: 'role_id', name: 'role_id'},
            //         {data: 'created_at', name: 'created_at'},
            //         {data: 'updated_at', name: 'updated_at'},
            //         {data: 'name', name: 'name'},
            //         {data: 'name', name: 'name'},
            //         {data: 'name', name: 'name'},
            //         {data: 'name', name: 'name'},
            //         {data: 'name', name: 'name'},
            //         {data: 'name', name: 'name'},

            //     ]
            // });
            // var data = await model.fetchRecords("POST", ajaxURLS.filter);
            // console.log(data);
            // companyTableView.render(data.companies);
            // contactTableView.render(data.contacts);

        } catch (error) {
            toastr["error"](`Error`);
        }
        // Render Contacts To Table (Update View)

    }

    tagUnChecked() {
        // Update State
        model.removeTag(this.tagType, this.tagId);
        // Update Filters view
        tagView.renderFilters(model.state.filters);
        this.addEventListenerToDeleteTag();
        // Fetch contacts and companies with that tag
        // Render Contacts To Table (Update View)
    }

    deleteTag(element) {
        var tagElem = $(element);
        this.tagId = "" + tagElem.attr('data-tag-id');
        this.tagType = tagElem.attr('data-tag-type');
        model.removeTag(this.tagType, this.tagId);
        tagView.renderFilters(model.state.filters);
        this.addEventListenerToDeleteTag();
        // Uncheck Checkbox
        tagView.uncheckCheckbox(this.tagType, this.tagId);
    }

    show() {
        console.log(this.tagId);
        console.log(this.tagText);
        console.log(this.tagType);
    }

}

new App();
