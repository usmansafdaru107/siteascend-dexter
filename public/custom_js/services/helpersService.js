var helpersService = function () {
    show = function (elementSelector, isClass=false) {
        (isClass)? $("." + elementSelector).show('slow'):$("#" + elementSelector).show('slow');
    }
    hide = function (elementSelector, isClass=false) {
        (isClass)? $("." + elementSelector).hide('slow') : $("#" + elementSelector).hide('slow');
    }
    emptyArray = function (array) {
        return (array.length === 0);
    }
    return {
        show: show,
        hide: hide,
        emptyArray: emptyArray,
    };
}();