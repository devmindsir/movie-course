const toast = document.getElementById("toast");

if (toast) { // بررسی وجود toast
	setTimeout(function() {
		toast.style.display = "none";
	}, 5000);
}
