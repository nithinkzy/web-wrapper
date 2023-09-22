// let video = document.querySelector("video");
// window.addEventListener("scroll", function () {
//   let value = 1 + this.window.scrollY / -600;
//   video.style.opacity = value;
// });

$(document).ready(function () {


  // $('#basic button').click(function (e) {
  //   e.preventDefault();
  //   let imageType = $(this).data('img');
  //   jQuery.ajax({
  //     url: ajaxurl,
  //     type: "POST",
  //     data: {
  //       action: "basic_upload",
  //       data: {
          
  //       },
  //     },
  //     beforeSend: function () {
  //       $(".loading").show();
  //     },
  //     success: function (response) {
  //       $(".loading").hide();
  //       $(".sent-message").show();
  //     },
  //     error: function (a, b, c) {
  //       $(".error-message").show();
  //       $(".loading").hide();
  //       $(this).prop("disabled", false);

  //       console.log({ a } + { b } + c);
  //       return false;
  //     },
  //   });
  // })

  $("#send-message").click(function (e) {
    e.preventDefault();
    $(this).prop("disabled", true);

    let form = {
      name: $("#id").val(),
      from: $("#email").val(),
      subject: $("#subject").val(),
      message: $("#message").val(),
    };
    jQuery.ajax({
      url: frontend_ajax_object.ajaxurl,
      type: "POST",
      data: {
        action: "send_email",
        data: form,
      },
      beforeSend: function () {
        $(".loading").show();
      },
      success: function (response) {
        $(".loading").hide();
        $(".sent-message").show();
      },
      error: function (a, b, c) {
        $(".error-message").show();
        $(".loading").hide();
        $(this).prop("disabled", false);

        console.log({ a } + { b } + c);
        return false;
      },
    });
  });
});