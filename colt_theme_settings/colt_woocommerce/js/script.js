/**
 * Created by Эзиз on 10.03.2016.
 */
jQuery(document).ready(function($) {
    $('body').on('added_to_cart',function(e,data) {
        if ($('#hidden_cart').length == 0) { //add cart contents only once
            $(this).append('<a href="#TB_inline?width=500&height=400&inlineId=hidden_cart" id="show_hidden_cart" title="<h2>Ваша корзинка с чаем<br></h2>" class="thickbox" style="display:none"></a>');
// Some customization:
            var s = '';
            s += '<div class="widget_shopping_cart_content">';
            s += '<p>';
            s += '<h4>Товар доавблен в корзину</h4>';
            s += '</p>';
            s += '<p class="buttons">';
            s += ' <a href="" onclick="javascript:tb_remove();return false;" class="button wc-forward">Продолжить покупки</a>';
            s += ' <a href="/store/checkout/" class="button checkout wc-forward">Оплатить</a>';
            s += '</p>';
            s += '</div>';
            $(this).append('<div id="hidden_cart" style="display:none">'+s+'</div>');
        }
        $('#show_hidden_cart').click();
    });
});