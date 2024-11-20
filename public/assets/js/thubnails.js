var Thubnails_Li = $(".Thubnails_Content_Left > ul > li");
var Thubnails_Main = $(
	".Thubnails_Content .Thubnails_Content_Right img "
);

function Thubnails_Gallery(index) {
	var Thubnails_Attr = Thubnails_Li.eq(index).attr("data-image");
	Thubnails_Li.removeClass("active");
	Thubnails_Li.eq(index).addClass("active");
	Thubnails_Main.attr("src", Thubnails_Attr).fadeIn(100);
}

Thubnails_Li.click(function () {
	var Thubnails_index = $(this).index();
	Thubnails_Gallery(Thubnails_index);
});

$(".product-image-item").click(function () {
	var Thubnailes_Picture_index = $(this).index();
	$("#Thubnails").fadeIn(100);
	$("#Dark").fadeIn(100);
	Thubnails_Gallery(Thubnailes_Picture_index);
});

$(".Close_Thubnails").click(function () {
	$("#Thubnails").fadeOut(100);
	$("#Dark").fadeOut(100);
});