function selectShipping(div) {
	// همه div ها را پیدا کنید
	const allDivs = document.querySelectorAll('.width-3');

	// همه div ها را از حالت انتخابی خارج کنید
	allDivs.forEach(item => {
		item.style.backgroundColor = ''; // رنگ پس‌زمینه پیش‌فرض
		item.classList.remove('selected'); // حذف کلاس انتخاب
		item.querySelector('input[type="radio"]').checked = false; // غیر فعال کردن input
	});

	// والد div مربوط به input انتخاب شده را رنگی کنید
	div.style.backgroundColor = 'lightgreen'; // رنگ سبز
	div.classList.add('selected'); // افزودن کلاس انتخاب
	div.querySelector('input[type="radio"]').checked = true; // فعال کردن input
}

function toggleCheck(selectedCircle) {
	// Remove checked state from all circles and tables
	const allCircles = document.querySelectorAll('.address-circle');
	const allTables = document.querySelectorAll('.address');

	allCircles.forEach(circle => {
		circle.classList.remove('checked');
	});
	allTables.forEach(table => {
		table.classList.remove('checked-table');
	});

	// Select the corresponding radio button
	const radioButton = selectedCircle.nextElementSibling;
	radioButton.checked = true;

	// Add checked state to the selected circle and its table
	selectedCircle.classList.add('checked');
	selectedCircle.closest('table').classList.add('checked-table');
}