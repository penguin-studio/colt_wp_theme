$ = jQuery;
$(document).ready(function() {

    /**
     * Функция отвечает за динамическое добавление Фото в галерею
     */
    var add_galery_field = function(){

        var default_url = $("input#default_img").val();
        var find_img_box = $("td#master-galery-area").find("div.galery-img:first");

        var img_box_number = 0;
            if(find_img_box.length != 0){
                img_box_number = parseInt(find_img_box.attr("id").slice(4)) + 1;
            }
            $("td#master-galery-area").prepend(
                '<div id="gimg'+img_box_number+'" class="galery-img">'+
                    '<img src="'+default_url+'" class="galery-img-class" />'+
                    '<div >'+
                        '<input type="hidden" name="master_galery[]" id="" value="" />'+
                        '<button type="button" class="upload_galery_image_button button">Загрузить</button>'+
                        '<button type="button" gimg="'+img_box_number+'" class="remove_galery_image_button button">&times;</button>'+
                    '</div>'+
                '</div>'
            );

        add_event();
        $('div#gimg'+img_box_number).find('.upload_galery_image_button').click();


    }

    var delete_galery_field = function (id) {
        $("div#gimg"+id).remove();
    }


    /**
     * Событие нажатия на кнопку добавления фото в галерею
     */
    $('button#add_new_galery_item').click(add_galery_field);
    var add_event = function() {
        $('.upload_galery_image_button').unbind();
        $('.remove_galery_image_button').unbind();

        $('.upload_galery_image_button').bind('click', function () {
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = $(this);
            wp.media.editor.send.attachment = function (props, attachment) {
                $(button).parent().prev().attr('src', attachment.url);
                $(button).prev().val(attachment.id);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }
            wp.media.editor.open(button);
            return false;
        });
        $('.remove_galery_image_button').bind('click', function () {
            id = $(this).attr('gimg');
            if(confirm('Удалить картинку ?')){
                delete_galery_field(id);
            }
        });

    };
    add_event();

});
