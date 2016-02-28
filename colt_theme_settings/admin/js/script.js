$ = jQuery;
$(document).ready(function() {
    /**
     * Функция отвечает за динамическое добавление телефона
     */
    var add_phone_field = function(){

        var find_phone_field = $("table#add-field-area").find("tr.phone:last");
        var phone_number = $('#phone_number').val();


        if(phone_number != '') {
            var phone_block_number = 0;
            if(find_phone_field.length != 0){
                    phone_block_number = parseInt(find_phone_field.attr("id").slice(2)) + 1;
            }
            $("table#add-field-area").append(
                '<tr id="ph'+phone_block_number+'" class="phone">' +
                '<td colspan="2"><input type="text" name="theme_settings[contacts_phone][]" value="'+phone_number+'" style="width: 300px;" placeholder="Номер телефона">' +
                '<input type="button" id="delete-number" phone-id="'+phone_block_number+'" value="Удалить телефон"></td>' +
                '</tr>'
            );
            $('input#delete-number').unbind();
            $('input#delete-number').bind('click',function () {
                id = $(this).attr('phone-id');
                if(confirm('Удалить номер телефона ?')){
                    delete_phone_number(id);
                }
            });
            $('#phone_number').val('');
        }

    }

    /**
     * Функция отвечает за динамическое удаления телефона
     */
    var delete_phone_number = function (id) {
        $("tr#ph"+id).remove();
    }

    /**
     * Событие нажатия на кнопку добавления телефона
     */
    $('input#add_phone_button').click(add_phone_field);

    /**
     * Событие нажатия на кнопку удаления телефона
     */
    $('input#delete-number').bind('click',function () {
        id = $(this).attr('phone-id');
        if(confirm('Удалить номер телефона')){
            delete_phone_number(id);
        }
    });

    $('.upload_image_button').click(function(){
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = $(this);
        wp.media.editor.send.attachment = function(props, attachment) {
            $(button).parent().prev().attr('src', attachment.url);
            $(button).prev().val(attachment.id);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open(button);
        return false;
    });
    /*
     * удаляем значение произвольного поля
     * если быть точным, то мы просто удаляем value у input type="hidden"
     */
    $('.remove_image_button').click(function(){
        var r = confirm("Уверены?");
        if (r == true) {
            var src = $(this).parent().prev().attr('data-src');
            $(this).parent().prev().attr('src', src);
            $(this).prev().prev().val('');
        }
        return false;
    });

    /**
     * Функция отвечает за динамическое добавление услуги
     */
    var add_service_field = function(){

        var find_service_field = $("table#add-service-field-area").find("tr.service:last");
        var service_name = $('#service_name').val();
        var service_price = $('#service_price').val();


        if(service_name != '') {
            var service_block_number = 0;
            if(find_service_field.length != 0){
                service_block_number = parseInt(find_service_field.attr("id").slice(1)) + 1;
            }
            $("table#add-service-field-area").append(
                '<tr id="s'+service_block_number+'" class="service">' +
                '<td>'+(service_block_number+1)+'</td>' +
                '<td><input type="text" name="services[service]['+service_block_number+'][]" value="'+service_name+'" style="width: 300px;" placeholder="Название услуги"></td>' +
                '<td><input type="text" name="services[service]['+service_block_number+'][]" value="'+service_price+'" style="width: 300px;" placeholder="Цена услуги"></td>' +
                '<td><input type="button" id="delete-service" s-id="'+service_block_number+'" value="Удалить услугу"></td>' +
                '</tr>'
            );
            $('input#delete-service').unbind();
            $('input#delete-service').bind('click',function () {
                id = $(this).attr('s-id');
                if(confirm('Удалить услугу ?')){
                    delete_service(id);
                }
            });
            $('#service_name').val('');
            $('#service_price').val('');
        }

    }

    /**
     * Функция отвечает за динамическое удаления услуги
     */
    var delete_service = function (id) {
        $("tr#s"+id).remove();
    }

    /**
     * Событие нажатия на кнопку добавления услуги
     */
    $('input#add_service_button').click(add_service_field);

    /**
     * Событие нажатия на кнопку удаления услуги
     */
    $('input#delete-service').bind('click',function () {
        id = $(this).attr('s-id');
        if(confirm('Удалить услугу')){
            delete_service(id);
        }
    });

});
