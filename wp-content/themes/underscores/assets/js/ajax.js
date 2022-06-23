class Ajax {
    constructor($) {
        this.$ = $;
    }
    get_data(url, callback){ /* используйте GET запрос в PHP*/
        this.$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        this.$.ajax({
            method: 'GET',
            url: url,
            cache: false,
            success: function (data) {
                callback(data);
            },
            error: function (data, textStatus, errorThrown) {
                console.log('ERROR_A-X');
            },
        });
    }
    get_data_param(url, param, callback){ /* используйте GET запрос в PHP*/
        this.$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        this.$.ajax({
            method: 'GET',
            data: {id: param},
            url: url,
            cache: false,
            success: function (data) {
                callback(data);
                window.scope = data;
            },
            error: function (data, textStatus, errorThrown) {
                console.log('ERROR_A-X');
            },
        });
    }

    insert_data(request_type, url, data, callback = ()=>{}){     /*todo: data - обязательно объект(не массив)*/
        this.$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        this.$.ajax({
            type: request_type,
            url: url,
            data: {data},
            cache: false,
            contentType: false,
            success: function (response) {
                console.log('%c' + ' ' + response + ' ', 'background: #222; color: #bada55');
                callback();
            },
            error: function (data, textStatus, errorThrown) {
                console.log('%c' + ' ' + 'NO DATA.' + ' ', 'background: #222; color: #bada55');

            },
        });
        return false;
        /* todo: must have 'return false;' after*/
    }
}
