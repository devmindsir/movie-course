$(".footer__more").click(function () {
	// پیدا کردن footer__text مربوط به این بخش
	let moreText = $(this).closest("section").find(".footer__text");
	if (moreText.css("max-height") === "max-content") {
		moreText.css("max-height", "14rem");
		$(this).text("مشاهده بیشتر");
	} else {
		moreText.css("max-height", "max-content");
		$(this).text("بستن");
	}
});