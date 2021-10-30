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

<<<<<<< HEAD

// Code Commented By Mohamed Mosatafa
=======
>>>>>>> 8b6b34481c6435de542d48714b2d5642949327f6
// // Forms Validations
// (function () {
//     'use strict'
//     // Fetch all the forms we want to apply custom Bootstrap validation styles to
//     var forms = document.querySelectorAll('.needs-validation')
<<<<<<< HEAD
  
=======
//
>>>>>>> 8b6b34481c6435de542d48714b2d5642949327f6
//     // Loop over them and prevent submission
//     Array.prototype.slice.call(forms)
//     .forEach(function (form) {
//         form.addEventListener('submit', function (event) {
//             if (!form.checkValidity()) {
//                 event.preventDefault()
//                 console.log("المدخلات خاطئة");
//                 event.stopPropagation()
//             }
//             if (form.checkValidity()) {
//                 event.preventDefault()
//                 console.log("المدخلات  صحيحة ");
//                 event.stopPropagation()
//             }
<<<<<<< HEAD
    
=======
//
>>>>>>> 8b6b34481c6435de542d48714b2d5642949327f6
//             event.preventDefault();
//             form.classList.add('was-validated')
//         }, false)
//     })
// })()
// // Forms Validations End


