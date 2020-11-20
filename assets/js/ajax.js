'use strict';

$(function () {
    $("#contact-form").submit( function (e) {
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize();

        $.post(
            "index.php?class=contact&action=addContact",
            postdata,
        ).done( function (response) {
            let json = JSON.parse(response)
            if (json.isSuccess) {
                $('#contact-form').append("<p class='thank-you'>Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>");
                $('#contact-form')[0].reset();
            } else {
                $('#firstname + .comments').html(json.firstnameError);
                $('#firstname').css("border", "1px solid red");
                $('#name + .comments').html(json.nameError);
                $('#name').css("border", "1px solid red");
                $('#email + .comments').html(json.emailError);
                $('#email').css("border", "1px solid red");
                $('#content + .comments').html(json.contentError);
                $('#content').css("border", "1px solid red");
            }
        });
    });
});
