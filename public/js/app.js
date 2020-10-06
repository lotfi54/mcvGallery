function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#imgPlaceholder').attr('src', e.target.result);
      }

      // base64 string conversion
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#chooseFile").change(function () {
    readURL(this);
  });


  ScrollReveal().reveal('.cards', {
    delay: 20,
    duration: 2000,
    interval: 10,
    reset: true
},100);