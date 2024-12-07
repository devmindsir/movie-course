document.getElementById('remember-me-container').addEventListener('click', function () {
	const checkbox = document.getElementById('remember-me-checkbox');
	const checkboxSpan = document.querySelector('.login-item-checkbox');

	// تغییر وضعیت چک‌باکس
	checkbox.checked = !checkbox.checked;

	// اضافه یا حذف کلاس active
	if (checkbox.checked) {
		checkboxSpan.classList.add('active');
	} else {
		checkboxSpan.classList.remove('active');
	}
});