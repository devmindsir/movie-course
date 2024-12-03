	document.addEventListener("DOMContentLoaded", function () {
	const submitButton = document.querySelector(".submit-checkout");
	const termsCheckbox = document.querySelector('input[type="checkbox"]');
	const ruleMessage = document.querySelector(".checkout-rule");

	submitButton.addEventListener("click", function (event) {
	if (!termsCheckbox.checked) {
	event.preventDefault();

	ruleMessage.textContent = "برای ادامه، لطفاً شرایط و مقررات را بپذیرید.";
	ruleMessage.style.color = "red";
} else {

	ruleMessage.textContent = "درخواست شما در حال ارسال است...";
	ruleMessage.style.color = "green";


}
});
});
