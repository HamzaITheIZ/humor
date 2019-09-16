$(document).ready(function () {

    autosize($('.written-rumor'));    
    //autosize($('.contact-msg'));


    //$('.written-rumor').autoResize();
    $('.written-rumor').keyup(function () {
        console.log("textearia touched");
        console.log(parseInt($('.written-rumor').val().length));

        $('.msgLength').html($('.written-rumor').val().length + '/300');
    });
    $('.contact-msg').keyup(function () {
        console.log("textearia touched");
        console.log(parseInt($('.written-rumor').val().length));

        $('.msgLength').html($('.written-rumor').val().length + '/1000');
    });



});