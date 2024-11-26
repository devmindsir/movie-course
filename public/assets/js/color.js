function ColorTag(index) {
	var tag = $(index);
	var colorTitle = tag.attr("data-colortitle");
	var colorId = tag.attr("data-colorid");

	$("#color-title").text(colorTitle);

	$("#selected-color-id").val(colorId);

	tag.parent().find(".product-item-color").removeClass("active");
	tag.addClass("active");
}
