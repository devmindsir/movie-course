
document.querySelector('.order-code-btn').addEventListener('click',function (){
	const discountCode=document.querySelector('.order-code-input').value.trim();
	if (!discountCode){
		alert('لطفا کد تخفیف را وارد بکنید');
		return
	}
	checkDiscountCode(discountCode);
});

function checkDiscountCode(discountcode){
	fetch('/checkout',{
		method:'POST',
		headers:{
			'Content-Type':'application/json',
		},
		body:JSON.stringify({code:discountcode})
	}).then(response=>{
		if (!response.ok){
			window.location.href='/404';
		}
		return response.json();
	}).then(data=>{
		if (data.success){
			document.querySelector('.order-code-input').classList.remove('gift-error');
			document.querySelector('.order-code-input').classList.add('gift-success');
			document.querySelector('.gift-message').textContent=data.message;
			document.querySelector('.amount').textContent=data.amount.toLocaleString();
			document.querySelector('.post-price').textContent=data.post_price.toLocaleString();
			document.querySelector('.discount-percent').textContent=data.code_discount;
			document.querySelector('.discount-amount').textContent=data.discountAmount.toLocaleString();
			document.querySelector('.total-price').textContent=data.total_price.toLocaleString();
		}else {
			document.querySelector('.order-code-input').classList.remove('gift-success');
			document.querySelector('.order-code-input').classList.add('gift-error');
			document.querySelector('.gift-message').textContent=data.message;
		}

	})
}