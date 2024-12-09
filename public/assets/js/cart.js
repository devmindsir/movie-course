function deleteRow(element){
const productId=element.getAttribute('data-id');
const productType=element.getAttribute('data-type');
const productColorId=element.getAttribute('data-color-id');
fetchData(productId,productType,productColorId,element);
}

function fetchData(productId,productType,productColorId,element){
	fetch('/cart/delete',{
		method:"post",
		headers:{
			'Content-Type':'application/json'
		},
		body:JSON.stringify({
			id:productId,
			type:productType,
			color_id:productColorId
		})
	}).then(response=>response.json())
	  .then(data=>{
		  console.log(data);
		  if (data.success){
		  element.closest('tr').remove();
			document.querySelector('.total_price').textContent=data.total_price;
			return;
		  }
		  alert("مشکلی وجود دارد");
	  }).catch(error=>{
		  console.log("ERROR:",error)
	})
}