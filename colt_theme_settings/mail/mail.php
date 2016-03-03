<?php
/**
 * User: Максим Руденко
 * Date: 04.03.2016
 */
function feedback_form()
{
    return'
    <div class="col-md-6 col-md-offset-3" style="clear:both;">
    <form class="request request-franchise" action = "" method = "post" >
        <h3 > Залишити заявку </h3 >
        <div class="row" >
            <div class="col-md-6" >
                <input type = "text" placeholder = "Ім’я*" required = "" >
                <input type = "text" placeholder = "Телефон*" required = "" >
                <input type = "text" placeholder = "E-mail*" required = "" >
            </div >
            <div class="col-md-6" >
                <input type = "text" placeholder = "Компанія" >
                <input type = "text" placeholder = "Місто*" required = "" >
            </div >
        </div >
        <div class="wrapp-check-online" >
            <input class="check-online btn-submit" type = "submit" value = "Надіслати" >
        </div >

    </form >
</div >';
}
add_shortcode( 'feedback_form', 'feedback_form' );