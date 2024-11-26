// تابعی برای تغییر تعداد محصول
function changeQuantity(change) {
	var quantityElement = document.getElementById("product-quantity");
	var currentQuantity = parseInt(quantityElement.innerText);

	// اضافه یا کم کردن مقدار
	currentQuantity += change;

	// اطمینان از اینکه تعداد منفی نمی‌شود
	if (currentQuantity < 1) {
		currentQuantity = 1;
	}

	// بروزرسانی نمایش تعداد
	quantityElement.innerText = currentQuantity;
}
// تابعی برای حذف سطر
function deleteRow(element) {
	// والد عنصر فعلی (آیکون) را پیدا کرده و کل سطر را حذف می‌کنیم
	var row = element.closest("tr");
	row.remove();
}
