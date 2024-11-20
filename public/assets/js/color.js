function ColorTag(index) {
	var tag = $(index);
	var Color_Attr = tag.attr("data-colortitle");
	var Color_Title = $("#color-title");
	Color_Title.text(Color_Attr);
	tag.parent().find(".product-item-color").removeClass("active");
	tag.addClass("active");
}