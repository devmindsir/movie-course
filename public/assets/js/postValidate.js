document.getElementById('continue-order').addEventListener('click',function (e){
	e.preventDefault();
	const selectedAddress=document.querySelector('input[name="address"]:checked');
	if (!selectedAddress){
		alert('لطفا یک آدرس انتخاب بکنید');
		return;
	}

	const selectedShipping=document.querySelector('input[name="shipping"]:checked');
	if (!selectedShipping){
		alert('لطفا یک نوع پستی انتخاب بکنید');
		return;
	}
	sendToController(selectedAddress.value,selectedShipping.value);
});