var campaignAccordionDataService = function () {

    class UI {


        constructor() {

            this.elementIds = {
                bitdefender: 'bitdefender'
            };

        }

    }

    class EventHandler {

        constructor() {
            this.addEventListeners();
        }

        addEventListeners() {

        }

    }

    class Controller {

        constructor() {

        }

    }

    getUsers = function () {
        //return a promise
        return ajaxService.makeAjaxRequest('GET', getUsersUrl, null)
    }

    createUser = function (userObject) {       
        return ajaxService.makeAjaxRequest('POST', createUserUrl, userObject);
    }

    //public API
    return {
        UI: new UI(),
        EventHandler: new EventHandler(),
        Controller: new Controller()
    };
}();

$(document).ready(function() {
    console.log(campaignAccordionDataService.UI.elementIds);
});