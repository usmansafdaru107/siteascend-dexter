import Filters from './filters.js';

class TagView extends Filters {

    tagElementIds = {
    }

    tagElementClasses = {
      checkbox_tags: 'checkbox-tags',
      tag_close: 'tag_close',
    }

    constructor() {
      super();
    }

    uncheckCheckbox(tagType, tagId) {
      $(`#${tagType}_tag_${tagId}`).prop('checked', false);
    }
    
}

export default new TagView();