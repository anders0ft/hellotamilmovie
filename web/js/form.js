"use strict";

function verifyContactForm(){

    var self = $('#contact-form');
    var error = 0;

    var $name = self.find('#htm_corebundle_contact_name');
    var $email = self.find('[type=email]');
    var $message = self.find('#htm_corebundle_contact_message');

    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if(!emailRegex.test($email.val())) {
        createErrTult('Error! Wrong email!', $email)
        error++;
    }

    if( $name.val().length>1 &&  $name.val()!= $name.attr('placeholder')  ) {
        $name.removeClass('invalid_field');
    }
    else {
        createErrTult('Error! Write your name!', $name)
        error++;
    }

    if($message.val().length>2 && $message.val()!= $message.attr('placeholder')) {
        $message.removeClass('invalid_field');
    }
    else {
        createErrTult('Error! Write message!', $message)
        error++;
    }

    if (error!=0){
        return;
    }
}

function createErrTult(text, $elem){
    $elem.focus();
    $('<p />', {
        'class':'inv-em alert alert-danger',
        'html':'<span class="icon-warning"></span>' + text + ' <a class="close" data-dismiss="alert" href="#" aria-hidden="true"></a>',
    })
        .appendTo($elem.addClass('invalid_field').parent())
        .insertAfter($elem)
        .delay(4000).animate({'opacity':0},300, function(){ $(this).slideUp(400,function(){ $(this).remove() }) });
}
