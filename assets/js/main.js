$(document).ready(function() {
    $(".info-form,.submit-btn ").hide();
    $('.enter-btn').on('click', function() {
        $('.info-form').toggle();
        $('.phone-info').on('focusin', function() {
            $('.submit-btn').fadeIn(1000);
        });
        $(this).fadeOut(1000);
    });
});