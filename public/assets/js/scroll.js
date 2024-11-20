$(document).ready(function () {
  $(window).on("scroll", function () {
    var scrollPos = $(document).scrollTop() + 80; // اضافه کردن 100 پیکسل حاشیه

    $(".row section").each(function () {
      var sectionTop = $(this).offset().top; // موقعیت ابتدای بخش
      var sectionHeight = $(this).outerHeight(); // ارتفاع بخش
      var sectionId = $(this).find("h3").text().trim(); // نام بخش را می‌گیریم و فضای اضافی را حذف می‌کنیم
      // بررسی اینکه آیا بخش در دید است
      if (
        scrollPos >= sectionTop && // اسکرول به ابتدای بخش رسید
        scrollPos < sectionTop + sectionHeight // اسکرول پایین‌تر از انتهای بخش نرفته باشد
      ) {
        $(".product-nav li").removeClass("active"); // حذف کلاس active از همه آیتم‌ها

        // تطابق دقیق متن بخش با آیتم‌های ناوبری
        $(".product-nav li").each(function () {
          var navItemText = $(this).text().trim(); // متن آیتم ناوبری

          if (navItemText === sectionId) {
            $(this).addClass("active"); // اضافه کردن کلاس active به آیتم مربوطه
          }
        });
      }
    });
  });
});
