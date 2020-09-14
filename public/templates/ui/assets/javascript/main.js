$(document).ready(function () {
  $(window).scroll(function () {
    var showAfter = 200;
    if ($(this).scrollTop() > showAfter) {
      $(".back-to-top").fadeIn();
    } else {
      $(".back-to-top").fadeOut();
    }
  });

  $(".back-to-top").click(function () {
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
    activeColor: "#c7a17a",
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
      alert('Sorry, the minimum value was reached');
      $(this).val($(this).data('oldValue'));
    }
    if (valueCurrent <= maxValue) {
      $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
      alert('Sorry, the maximum value was reached');
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
});

var cart = {
  'add': function (product_id, shape , type = null) {
    var qty = $("input[name='qty[" + product_id + "]']").val();
    var shape = $("input[name='shape']:checked"). val();

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

        if(type == 'detail') {
          window.location.href = "/cart.html";
        }
      },
      fail: function (json) {
        alert("Xảy ra lỗi trong quá trình thêm !");
        setTimeout(function(){location.reload();}, 2000);
      },
      success: function (json) {
        $('#cart').load('cart-info ul li');
        document.getElementById("cart-amount").innerHTML = json.amount;
        document.getElementById("cart-total").innerHTML = json.total;
        $('#product-' + product_id).html('<i class="fas fa-check"><span> THÊM THÀNH CÔNG </span></i>');
      },
      error: function () {
        alert("Xảy ra lỗi trong quá trình thêm !");
        setTimeout(function(){location.reload();}, 2000);
      }
    });
  },

  'delete': function (rowId , type = null) {
    $.ajax({
      url: '/cart/delete',
      type: 'get',
      data: `rowId=${rowId}`,
      dataType: 'json',
      beforeSend: function () {
        if(confirm('Bạn có chắc chắn thực hiện thao tác này không? '))
          return true;
        else
          return false;
      },
      complete: function () {
        if(type == 'detail') {
          Swal.fire(
            'Thành công!',
            'Bạn đã xóa thành công',
            'success'
          )
          setTimeout(function(){location.reload();}, 2000);
        }
      },
      fail: function (json) {
        alert("Xảy ra lỗi trong quá trình xóa !");
      },
      success: function (json) {
        $('#cart').load('cart-info ul li');
        document.getElementById("cart-amount").innerHTML = json.amount;
        document.getElementById("cart-total").innerHTML = json.total;
      },
      error: function () {
        alert("Xảy ra lỗi trong quá trình xóa !");
      }
    });
    
  },

 'update': function (rowId) {
    var qty = $("input[name='qty[" + rowId + "]']").val();

		$.ajax({
			url: '/cart/update',
			type: 'get',
			data: 'rowId=' + rowId + '&' + 'qty=' + qty,
			dataType: 'json',
			beforeSend: function () {
				if(confirm('Bạn có chắc chắn thực hiện thao tác này không? '))
          return true;
        else
          return false;
			},
			complete: function (json) {
        if(json.responseJSON.status) {
          Swal.fire(
            'Chúc mừng!',
            'Bạn đã cập nhật thành công',
            'success'
          )
          setTimeout(function(){location.reload();}, 2000);
        }
			},
			success: function (json) {
			  $('#cart').load('cart-info ul li');
        document.getElementById("cart-amount").innerHTML = json.amount;
        document.getElementById("cart-total").innerHTML = json.total;
			},
			error: function () {
        alert("Xảy ra lỗi trong quá trình cập nhật !");
			}
		});
	},
}
