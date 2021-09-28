
export default class Filters {
    elementIds = {
        filters_area: 'filters_area',
        filters_section: 'filters_section'
    }

    constructor() {
        this.hideFiltersSection();
    }

    renderFilters(state) {
        if(!this.checkIfFiltersEmpty(state)) {

            console.log("renderFilters");

            this.showFiltersSection();

            $("#" + this.elementIds.filters_area).html('');
    
            // TAGS
            state.tags.company.forEach(element => {
                $("#" + this.elementIds.filters_area).append(`<div class="badge bg-dark p-2 mb-1 mx-1 text-truncate tag-width" data-bs-toggle="tooltip" data-bs-placement="top" title="${element.text}"><i class="fa fa-times tag_close cursor-pointer" id="filters_tag_${element.id}" data-tag-id="${element.id}" data-tag-type="company"></i>&nbsp; Company Tag: ${element.text}</div>`)
            });
            state.tags.contact.forEach(element => {
                $("#" + this.elementIds.filters_area).append(`<div class="badge bg-dark p-2 mb-1 mx-1 text-truncate tag-width" data-bs-toggle="tooltip" data-bs-placement="top" title="${element.text}"><i class="fa fa-times tag_close cursor-pointer" id="filters_tag_${element.id}" data-tag-id="${element.id}" data-tag-type="contact"></i>&nbsp; Contact Tag: ${element.text}</div>`)
            });
            state.tags.campaign.forEach(element => {
                $("#" + this.elementIds.filters_area).append(`<div class="badge bg-dark p-2 mb-1 mx-1 text-truncate tag-width" data-bs-toggle="tooltip" data-bs-placement="top" title="${element.text}"><i class="fa fa-times tag_close cursor-pointer" id="filters_tag_${element.id}" data-tag-id="${element.id}" data-tag-type="campaign"></i>&nbsp; Campaign Tag: ${element.text}</div>`)
            }); // End Tag Filters
        } else {
            console.log("hide");
            this.hideFiltersSection();
        }
        
    }

    checkIfFiltersEmpty(state) {
        var empty = true;
        // Check Tags Filters
        if(!helpersService.emptyArray(state.tags.company) || !helpersService.emptyArray(state.tags.contact) || !helpersService.emptyArray(state.tags.campaign)) {
            return !empty;
        }
        return empty;
    }

    hideFiltersSection() {
        $("#" + this.elementIds.filters_section).removeClass('show');
        $("#" + this.elementIds.filters_section).addClass('hide');
    }
    showFiltersSection() {
        $("#" + this.elementIds.filters_section).removeClass('hide');
        $("#" + this.elementIds.filters_section).addClass('show');
    }
}