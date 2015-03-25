jQuery(document).ready(function() {
    jQuery('.tp-banner').revolution(
	{
		delay:9000,
		startwidth:1170,
		startheight:300,
		hideThumbs:10
	});


	var url = URL + 'introbusiness/xhrGet_page_aboutus';
	$.get(url, function(data) {
        if(!jQuery.isEmptyObject(data)) {

			$.each(data, function(index, value) {
				if(index == 'page_contact_hinhanh') {
					$("#"+index).attr("src", value);
					return;
				} 
				else if(index == 'page_aboutus_b1link' || index == 'page_aboutus_b2link' || index == 'page_aboutus_b3link' || index == 'page_aboutus_linkdk' || index == 'page_aboutus_linkpremium') {
					$("#"+index).attr("href", value);
					// continue;
					return;
				}
				else if(index == 'page_aboutus_slider') {
					$("#"+index).html('<div id="rev_slider_'+value+'" class="revslider tp-banner-container"></div>');
					return;
				}

                $("#"+index).html(value);
            });
        }
    }, 'json')
    .done(function(){
        load_revslider();
    });
});