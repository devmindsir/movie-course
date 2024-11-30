
function sendToController(address_id,shipping_id){
fetch('/post',{
	method:'POST',
	headers:{
		'Content-Type':'application/json'
	},
	body:JSON.stringify({
		addressId:address_id,
		shippingId:shipping_id
	})
}).then(response=>{
	if (!response.ok){
		window.location.href='/404';
	}
	return response.json();
}).then(data=>{
	if (!data.success){
		window.location.href='/404';
	}
	window.location.href='/checkout';
});
}