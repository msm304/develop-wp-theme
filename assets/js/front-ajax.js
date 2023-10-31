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
  // archive content filter ajax
  $("#archive-filter").on("submit", function (e) {
    e.preventDefault();
    let user_id = [];
    let post_term_id = [];
    let tech_term_id = [];
    let post_type = $(".post-type:checked").val();
    $.each($(".user-id:checked"), function () {
      user_id.push($(this).val());
    });
    $.each($(".post-term-id:checked"), function () {
      post_term_id.push($(this).val());
    });
    $.each($(".tech-term-id:checked"), function () {
      tech_term_id.push($(this).val());
    });
    // console.log(user_id);
    // console.log(post_term_id);
    // console.log(tech_term_id);
    $.ajax({
      url: ajax.ajaxurl,
      type: "POST",
      datatype: "json",
      data: {
        action: "dwt_filter_content",
        user_id: user_id,
        post_term_id: post_term_id,
        tech_term_id: tech_term_id,
        post_type: post_type,
        // filter_post_query: filter_post_query,
        nonce: ajax._nonce,
      },
      beforeSend: function () {
        $("#filter-content-result").css("opacity", "0.3");
        // $(".tech-loading").css("display", "block");
        $(".find-post-num-title").text("تعداد مطالب مرتبط به فیلتر شما:");
      },
      success: function (response) {
        if (response.success) {
          console.log(response.content);
          if (response.content != null) {
            $("#filter-content-result").html(response.content);
            $(".find-post-num").text(response.total_post);
            if (current_page >= response.max_page) {
              $("#load-more").hide();
            } else {
              $("#load-more").show();
            }
            $("#filter-content").hide();
            $(".filter-post-query").val(response.filter_post_query);
            current_page = "1";
          } else {
            $("#filter-content-result").html(
              '<div class="alert alert-info">مطلبی پیدا نشد!</div>'
            );
            $(".find-post-num").text("0");
          }
        }
      },
      error: function (error) {
        if (error) {
          alert("خطایی در ارسال اطلاعات رخ داده است");
        }
      },
      complete: function () {
        $("#filter-content-result").css("opacity", "1");
        $(".tech-loading").css("display", "none");
      },
    });
  });
  // load more post with ajax
  let current_page = 1;
  $("#load-more").on("click", function (e) {
    current_page++;
    // console.log(current_page);
    $.ajax({
      url: ajax.ajaxurl,
      type: "POST",
      datatype: "json",
      data: {
        action: "dwt_filter_content",
        paged: current_page,
        nonce: ajax._nonce,
      },
      beforeSend: function () {
        $("#filter-content-result").css("opacity", "0.3");
        $(".load-more-loading").show();
      },
      success: function (response) {
        if (response.success) {
          // console.log(response.content);
          if (response.content != null) {
            if (current_page >= response.max_page) {
              $("#load-more").hide();
            }
            $("#filter-content-result").append(response.content);
          } else {
            $("#filter-content-result").html(
              '<div class="alert alert-info">مطلبی پیدا نشد!</div>'
            );
          }
        }
      },
      error: function (error) {
        if (error) {
          alert("خطایی در ارسال اطلاعات رخ داده است");
        }
      },
      complete: function () {
        $("#filter-content-result").css("opacity", "1");
        $(".load-more-loading").hide();
      },
    });
  });
});
