$(document).ready(function () {
  $(window).scroll(function () {
    var showAfter = 200;
    if ($(this).scrollTop() > showAfter) {
      $(".back-to-top").fadeIn();
    } else {
      $(".back-to-top").fadeOut();
    }
  });

  $("#back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1000);
    return false;
  });

  $("#openMenuRight").click(function () {
    $(".menu-right").css("right", 0);
    $(".menu-right__backdrop").css("display", "block");
    $("header").css("left", -270);
    $("main").css("left", -270);
    $("footer").css("left", -270);
  });

  $("#closeMenuRight").click(function () {
    $(".menu-right").css("right", "-40%");
    $(".menu-right__backdrop").css("display", "none");
    $("header").css("left", 0);
    $("main").css("left", 0);
    $("footer").css("left", 0);
  });

  $("#backdropMenuRight").click(function () {
    $(".menu-right").css("right", "-26%");
    $(".menu-right__backdrop").css("display", "none");
    $("header").css("left", 0);
    $("main").css("left", 0);
    $("footer").css("left", 0);
  });

  $("#openMenuBarMobile").click(function () {
    $(".menu-bar-mobile-wrapper").toggleClass("open");
  });

  $(".menu-bar-mobile a").click(function () {
    $(".menu-bar-mobile-wrapper").removeClass("open");
  });

  $(".single-item").slick({
    dots: true,
    cssEase: "ease-in-out",
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          arrows: false,
        },
      },
    ],
  });

  $(".product__rating").starRating({
    totalStars: 5,
    emptyColor: "#eae7de",
    activeColor: "#956134",
    useGradient: false,
    strokeColor: "#c7a17a",
    strokeWidth: 0,
    starSize: 14,
    readOnly: true,
    useFullStars: true,
  });

  $(".multiple-items").slick({
    rows: 2,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  $(".slider-news").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  $('.btn-number').click(function (e) {
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type = $(this).attr('data-type');
    var input = $("input[name='" + fieldName + "']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
      if (type == 'minus') {

        if (currentVal > input.attr('min')) {
          input.val(currentVal - 1).change();
        }
        if (parseInt(input.val()) == input.attr('min')) {
          $(this).attr('disabled', true);
        }

      } else if (type == 'plus') {

        if (currentVal < input.attr('max')) {
          input.val(currentVal + 1).change();
        }
        if (parseInt(input.val()) == input.attr('max')) {
          $(this).attr('disabled', true);
        }

      }
    } else {
      input.val(0);
    }
  });
  $('.input-number').focusin(function () {
    $(this).data('oldValue', $(this).val());
  });
  $('.input-number').change(function () {

    minValue = parseInt($(this).attr('min'));
    maxValue = parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());

    name = $(this).attr('name');
    if (valueCurrent >= minValue) {
      $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
      alert('Xin lỗi, tối thiểu giá trị đã đạt được');
      $(this).val($(this).data('oldValue'));
    }
    if (valueCurrent <= maxValue) {
      $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
      alert('Xin lỗi, giá trị lớn nhất đã đạt đến');
      $(this).val($(this).data('oldValue'));
    }
  });

  $(".input-number").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
      // Allow: Ctrl+A
      (e.keyCode == 65 && e.ctrlKey === true) ||
      // Allow: home, end, left, right
      (e.keyCode >= 35 && e.keyCode <= 39)) {
      // let it happen, don't do anything
      return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
    }
  });

  function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
  }

  setInterval(function () {
    someonePurchasedTracking();
  }, randomIntFromInterval(7, 12) * 1000);

  $("#notify-close").click(function () {
    $("#message-purchased").hide();
  });
});

var cart = {
  'add': function (product_id, shape, type = null) {
    var qty = $("input[name='qty[" + product_id + "]']").val();
    var shape = $("input[name='shape']:checked").val();

    if (shape != 2) {
      shape = 1;
    }

    $.ajax({
      url: '/cart/add',
      type: 'get',
      data: `productId=${product_id}&qty=${qty}&shape=${shape}`,
      dataType: 'json',
      beforeSend: function () {
      },
      complete: function () {
        $('#product-' + product_id).prop('disabled', true);

        if (type == 'detail') {
          Swal.fire({
            icon: 'success',
            title: 'Thêm thành công.',
            html:
              `<button type="button" role="button" tabindex="0" onclick="closeSwal()" class="SwalBtn1 customSwalBtn">TIẾP TỤC MUA HÀNG</button>
            <button type="button" role="button" tabindex="0" onclick="location.href ='/cart.html'" class="SwalBtn2 customSwalBtn">THANH TOÁN</button>`,
            showCancelButton: false,
            showConfirmButton: false,
            footer: '<span>Nếu bạn cần hỗ trợ gấp, vui lòng liên hệ trực tiếp đến <a href="https://www.facebook.com/quangvinh.coffee" target="_blank">FANPAGE</a> để được giải đáp thắc mắc nhanh nhất.</span>'
          })
        }
      },
      fail: function (json) {
        Swal.fire({
          icon: 'error',
          title: 'Đã xảy ra lỗi!',
          text: 'Xin lỗi vì sự bất tiện mà quý khách đang gặp phải. Vui lòng thử lại sau ít phút nữa. Trân trọng cảm ơn!',
          footer: '<span>Nếu vẫn tiếp tục xảy ra lỗi, vui lòng liên hệ trực tiếp đến <a href="https://www.facebook.com/quangvinh.coffee" target="_blank">FANPAGE</a> để được hỗ trợ nhanh chóng.</span>'
        })
      },
      success: function (json) {
        $('#cart').load('/cart-info ul li');
        document.getElementById("cart-amount").innerHTML = json.amount;
        document.getElementById("cart-total").innerHTML = json.total;
        document.getElementById("cart-total-button").innerHTML = json.total;
        $('#product-' + product_id).html('<i class="fas fa-check"><span> THÊM THÀNH CÔNG </span></i>');
      },
      error: function () {
        Swal.fire({
          icon: 'error',
          title: 'Đã xảy ra lỗi!',
          text: 'Xin lỗi vì sự bất tiện mà quý khách đang gặp phải. Vui lòng thử lại sau ít phút nữa. Trân trọng cảm ơn!',
          footer: '<span>Nếu vẫn tiếp tục xảy ra lỗi, vui lòng liên hệ trực tiếp đến <a href="https://www.facebook.com/quangvinh.coffee" target="_blank">FANPAGE</a> để được hỗ trợ nhanh chóng.</span>'
        })
      }
    });
  },

  'delete': function (rowId, type = null) {
    $.ajax({
      url: '/cart/delete',
      type: 'get',
      data: `rowId=${rowId}`,
      dataType: 'json',
      beforeSend: function () {
        if (confirm('Bạn có chắc chắn thực hiện thao tác này không? '))
          return true;
        else
          return false;
      },
      complete: function () {
        if (type == 'detail') {
          Swal.fire(
            'Thành công!',
            'Bạn đã xóa thành công',
            'success'
          )
          setTimeout(function () { location.reload(); }, 2000);
        }
      },
      fail: function (json) {
        Swal.fire({
          icon: 'error',
          title: 'Đã xảy ra lỗi!',
          text: 'Xin lỗi vì sự bất tiện mà quý khách đang gặp phải. Vui lòng thử lại sau ít phút nữa. Trân trọng cảm ơn!',
          footer: '<span>Nếu vẫn tiếp tục xảy ra lỗi, vui lòng liên hệ trực tiếp đến <a href="https://www.facebook.com/quangvinh.coffee" target="_blank">FANPAGE</a> để được hỗ trợ nhanh chóng.</span>'
        })
      },
      success: function (json) {
        $('#cart').load('/cart-info ul li');
        document.getElementById("cart-amount").innerHTML = json.amount;
        document.getElementById("cart-total").innerHTML = json.total;
      },
      error: function () {
        Swal.fire({
          icon: 'error',
          title: 'Đã xảy ra lỗi!',
          text: 'Xin lỗi vì sự bất tiện mà quý khách đang gặp phải. Vui lòng thử lại sau ít phút nữa. Trân trọng cảm ơn!',
          footer: '<span>Nếu vẫn tiếp tục xảy ra lỗi, vui lòng liên hệ trực tiếp đến <a href="https://www.facebook.com/quangvinh.coffee" target="_blank">FANPAGE</a> để được hỗ trợ nhanh chóng.</span>'
        })
      }
    });

  },
}


function setCookie(exdays) {
  $.ajax({
    url: '/data-buy.html',
    type: 'GET',
    error: function () {
    },
    dataType: 'json',
    success: function (data) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toUTCString();
      document.cookie = 'dataUser=' + JSON.stringify(data) + ";" + 'expires=' + expires;
    },
  });
}

if (!(getCookie('dataUser'))) {
  setCookie(1);
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function someonePurchasedTracking() {
  var datas = JSON.parse(getCookie('dataUser'))[Math.floor(Math.random() * JSON.parse(getCookie('dataUser')).length)];

  jQuery("#message-purchased-img").attr("src", datas.image);
  jQuery("#message-purchased-link").attr("href", datas.url);
  jQuery("#message-purchased-link").text(datas.product);
  jQuery("#message-purchased-info").html(`Cảm ơn khách hàng <strong>${datas.username}</strong> (${datas.phone}) <br/> đã đặt hàng thành công!`);
  jQuery("#message-purchased").show();
}

let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

$('body').on('submit', 'form#formAjax', function (e) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  e.preventDefault();
  actionURL = $(this).data('url');
  formData = new FormData(this);

  Swal.fire({
    title: "Bạn có chắc chắn muốn cập nhật đơn hàng không",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Xác nhận',
    cancelButtonText: 'Hủy bỏ',
    text: "Hãy cân nhắc trước khi thao tác!",
  }).then((result) => {
    if (result.value) {
      $.ajax({
        type: 'POST',
        url: actionURL,
        data: formData,
        beforeSend: function () {
          Swal.showLoading();
        },
        success: function (data) {
          Swal.fire({
            icon: 'success',
            title: 'Cập nhật thành công.',
            footer: '<span>Nếu bạn cần hỗ trợ gấp, vui lòng liên hệ trực tiếp đến <a href="https://www.facebook.com/quangvinh.coffee" target="_blank">FANPAGE</a> để được giải đáp thắc mắc nhanh nhất.</span>'
          })
          setTimeout(function () { location.reload(); }, 2000);
        },
        error: function (reject) {
          Swal.fire({
            icon: 'error',
            title: 'Đã xảy ra lỗi!',
            text: 'Xin lỗi vì sự bất tiện mà quý khách đang gặp phải. Vui lòng thử lại sau ít phút nữa. Trân trọng cảm ơn!',
            footer: '<span>Nếu vẫn tiếp tục xảy ra lỗi, vui lòng liên hệ trực tiếp đến <a href="https://www.facebook.com/quangvinh.coffee" target="_blank">FANPAGE</a> để được hỗ trợ nhanh chóng.</span>'
          })
        },
        cache: false,
        contentType: false,
        processData: false,
      });
    }
  });
});

function closeSwal() {
  swal.close()
}