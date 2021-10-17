// Loader 
$(window).bind('load', function() {
    $('.loader').addClass('dec-opcity');
    setTimeout(function() {
            $('.loader').addClass('d-none');
        }, 1000)
        // setTimeout(function() {
        //     $('.loader').addClass('d-none');
        // }, 3000)
});
// Loader End
// Aos
AOS.init({
    startEvent: 'load',
});
// Aos End
// Scroll To Top
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
// Scroll To Top End