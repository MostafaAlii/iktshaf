// Loader 
$(window).bind('load', function() {
    $('.loader').addClass('dec-opcity');
    setTimeout(function(){
        $('.loader').addClass('d-none');
    },1000)
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
// Forms Validations
(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
    .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
    })
})()
// Forms Validations End
