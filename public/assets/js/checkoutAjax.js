document.querySelector('.order-code-btn').addEventListener('click', handleDiscountCodeSubmit);


function handleDiscountCodeSubmit() {
	const discountCode = getDiscountCode();
	if (!discountCode) {
		alert('لطفا کد تخفیف را وارد بکنید');
		return
	}
	checkDiscountCode(discountCode);
}

function getDiscountCode() {
	return document.querySelector('.order-code-input').value.trim()
}

function checkDiscountCode(discountcode) {
	fetch('/checkout', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json',
		},
		body: JSON.stringify({code: discountcode})
	})
		.then(handleResponse)
		.then(handleData)
		.catch(handleError)
}

function handleResponse(response) {
	if (!response.ok) {
		redirectToErrorPage();
	}
	return response.json();
}

function handleData(data) {
	if (data.success) {
		handleSuccessData(data);
		updateDataPrice(data);
	} else {
		handleErrorData(data);
	}
}

function redirectToErrorPage() {
	window.location.href = '/404';
}

function handleSuccessData(data) {
	document.querySelector('.order-code-input').classList.remove('gift-error');
	document.querySelector('.order-code-input').classList.add('gift-success');
	document.querySelector('.gift-message').textContent = data.message;
}

function updateDataPrice(data){
	document.querySelector('.amount').textContent = data.amount.toLocaleString();
	document.querySelector('.post-price').textContent = data.post_price.toLocaleString();
	document.querySelector('.discount-percent').textContent = data.code_discount;
	document.querySelector('.discount-amount').textContent = data.discountAmount.toLocaleString();
	document.querySelector('.total-price').textContent = data.total_price.toLocaleString();
}

function handleErrorData(data) {
	document.querySelector('.order-code-input').classList.remove('gift-success');
	document.querySelector('.order-code-input').classList.add('gift-error');
	document.querySelector('.gift-message').textContent = data.message;
}

function handleError(error){
	console.error('Error:',error);
}