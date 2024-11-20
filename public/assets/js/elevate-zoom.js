$("#Zoom_01").elevateZoom({
	easing: true,
	easingType: "zoomdefault",
	easingDuration: 2000,
	lensSize: 200,
	zoomWindowWidth: 1100,
	zoomWindowHeight: 600,
	zoomWindowOffetx: -1600,
	zoomWindowOffety: 20,
	zoomWindowPosition: 1,
	lensFadeIn: false,
	lensFadeOut: false,
	debug: false,
	zoomWindowFadeIn: false,
	zoomWindowFadeOut: false,
	zoomWindowAlwaysShow: false,
	zoomTintFadeIn: false,
	zoomTintFadeOut: false,
	borderSize: 4,
	showLens: true,
	borderColour: "#fff",
	lensBorder: 1,
	lensShape: "square", //can be "round"
	zoomType: "window", //window is default,  also "lens" available -
	containLensZoom: false,
	lensColour: "rgba(239, 57, 78, 0.1)", //colour of the lens background
	lensOpacity: 0.4, //opacity of the lens
	lenszoom: false,
	tint: false, //enable the tinting
	tintColour: "#c4a610", //default tint color, can be anything, red, #ccc, rgb(0,0,0)
	tintOpacity: 0.4, //opacity of the tint
	gallery: false,
	cursor: "crosshair", // user should set to what they want the cursor as, if they have set a click function
});
