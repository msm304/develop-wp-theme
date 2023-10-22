jQuery(document).ready(function ($) {
  // tech post change ajax
  $("#change-post-type").on("change", function () {
    let el = $(this);
    let option_fine = el.find("option:selected");
    let option_value = option_fine.val();
    // console.log(option_value);
    $.ajax({
      url: ajax.ajaxurl,
      type: "POST",
      datatype: "json",
      data: {
        action: option_value,
        nonce: ajax._nonce,
      },
      beforeSend: function () {
          $("#ajax-load-content").css("opacity", "0.3");
          $(".tech-loading").css("display", "block");
      },
      success: function (response) {
        if (response.success) {
          // console.log(response.content);
          if (response.content != null) {
            $("#ajax-load-content").html(response.content);
          } else {
            $("#ajax-load-content").html(
              '<div class="alert alert-info">مطلبی پیدا نشد!</div>'
            );
          }
        }
      },
      error: function (error) {},
      complete: function () {
          $("#ajax-load-content").css("opacity", "1");
          $(".tech-loading").css("display", "none");
      },
    });
  });
});
