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

});
