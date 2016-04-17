$(document).ready(function()
{
	$("#qty").change(function () 
	{  
		var qty = $("#qty").val();
		var price = $("#price").val()
		var tot = qty * price;

    	$("#total").val(tot);
	});
});

