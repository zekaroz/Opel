
/*Ajax Login*/
$(document).ready(function(){
  var login_form = $('#login');

  login_form.submit(function (e) {
    e.preventDefault();

    $.ajax({
      url: login_form.attr('action'),
      type: "POST",
      data: login_form.serialize(),
      dataType: "json"
    })
    .done(function (response) {
      if (response.success) {
        swal({
          title: "Welcome back!",
          text: response.success,
          timer: 6000,
          showConfirmButton: false,
          type: "success"
        });

        window.location.replace(response.url);

      } else {
        swal("Oops!", response.errors, 'error');
      }
    })
    .fail(function () {
      swal("Fail!", "Cannot login now!", 'error');
    });
  });
});
