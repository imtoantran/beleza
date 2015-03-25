/**
* @author imtoantran
*/
var call;
$('#price-from,#price-to').keydown(function(e){
	if(e.which==13){
		loadResultSearch(1);
		return true;
	}    	    
	if(e.which < 57){
		if(!isNaN(String.fromCharCode(e.which))){
			clearTimeout(call);
			call = setTimeout(function() {
				loadResultSearch(1);
			}, 1000);
		}
	return true;
	}	
	return false;
});
$('#price-from,#price-to').keyup(function(e){
	$('#price_change').text($("#price-from").val());
	PRICE_SEARCH_LOW = $("#price-from").val();
	PRICE_SEARCH = $("#price-to").val();
});
