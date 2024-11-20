var time = {};

// برای منوی اصلی
$(".nav ul li").hover(
  function () {
    var tag = $(this);
    var tagattr = tag.attr("data-time");
    clearTimeout(time[tagattr]);

    // بررسی وجود زیرمنو
    if ($(">.Submenu2", tag).length) {
      time[tagattr] = setTimeout(function () {
        $(">.Submenu2", tag).css("display", "flex").hide().fadeIn(0); // استفاده از display: flex
        $(">a", tag).addClass("nav-active");
      }, 0);
    }
  },
  function () {
    var tag = $(this);
    var tagattr = tag.attr("data-time");
    clearTimeout(time[tagattr]);

    if ($(">.Submenu2", tag).length) {
      time[tagattr] = setTimeout(function () {
        $(">.Submenu2", tag).fadeOut(0, function () {
          $(this).css("display", "none"); // پنهان کردن بعد از fadeOut
        });
        $(">a", tag).removeClass("nav-active");
      }, 0);
    }
  }
);

// برای nav-submenu-item
$(".nav-submenu-item").hover(
  function () {
    var tag = $(this);
    var submenu3 = tag.find(".Submenu3"); // پیدا کردن زیرمنوی سوم
    if (submenu3.length) {
      submenu3.css("display", "flex").hide().fadeIn(0); // نمایش زیرمنوی سوم
      $(this).addClass("active"); // اضافه کردن کلاس active
    }
  },
  function () {
    var tag = $(this);
    var submenu3 = tag.find(".Submenu3"); // پیدا کردن زیرمنوی سوم
    if (submenu3.length) {
      submenu3.fadeOut(0, function () {
        $(this).css("display", "none"); // پنهان کردن بعد از fadeOut
      });
      $(this).removeClass("active"); // حذف کلاس active
    }
  }
);
