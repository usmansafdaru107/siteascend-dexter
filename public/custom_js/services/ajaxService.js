var ajaxService = function () {
    makeAjaxRequest = function (httpMethod, url, data={}) {
        var ajaxObject = $.ajax({
            type: httpMethod.toUpperCase(),
            url: url,
            data: data,
            datatype: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            // ,
            // beforeSend: function (request) {
            //     request.setRequestHeader("content-type", "application/json")
            // }
        });
        return ajaxObject;
    }
    //public API
    return {
        makeAjaxRequest: makeAjaxRequest
    };
}();