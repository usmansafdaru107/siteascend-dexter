var helpersService = function () {
    show = function (elementSelector, isClass=false) {
        (isClass)? $("." + elementSelector).show('slow'):$("#" + elementSelector).show('slow');
    }
    hide = function (elementSelector, isClass=false) {
        (isClass)? $("." + elementSelector).hide('slow') : $("#" + elementSelector).hide('slow');
    }
    return {
        show: show,
        hide: hide,
    };
}();