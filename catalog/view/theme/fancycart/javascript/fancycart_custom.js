
// Push the top links away from Cart
function positionHeaderLinks(){
	var cart_header_w = $('#cart-total').width();
	if(cart_header_w>=124){
		$('#header_links').css('right',(cart_header_w+78)+'px');
	}
}

// Bind the possible Add to Cart btns with event to position top links
$(document).ready(function(){
	
	// Menu Animation
    $('#menu ul li').hover(
        function() {
            $(this).addClass("active");
            $(this).find('div').stop(false, true).slideDown();
        },
        function() {
            $(this).removeClass("active");        
            $(this).find('div').stop(false, true).slideUp('fast');
        }
    );

    positionHeaderLinks();	
	
	$('.cart a').bind('click',function(){
		positionHeaderLinks();
	});
	$('.cart .sm_button').bind('click',function(){
		positionHeaderLinks();
	});
	$('.cart .button').bind('click',function(){
		positionHeaderLinks();
	});
});
