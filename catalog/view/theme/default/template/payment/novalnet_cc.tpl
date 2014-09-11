<b style="margin-bottom: 3px; display: block;"><?php echo $text_creditcard; ?><?php echo $text_heading; ?></b>
<div id="payment" class="buttons">
<tr>
<td>
<?php
if($testmode_desc==1){
echo $text_novalnet_testmode_desc;
}
?>
</td>
</tr>
<tr>
			<td><?php echo $text_novalnet_redirection."<br>";?></td>
			</tr>
			<tr>
				<td><?php echo $this->config->get('novalnet_cc_enduser'); ?></td>
				</tr>
  <table>
   
   
 	<div class="warning" id="warning_msg" style="display:none;">Fields should not be Empty</div>
	<div id="loading_iframe_div" style="display:;"><img alt="novalnet_payment" src="http://www.novalnet.de/img/novalnet-loading-icon.gif"></div>
    <table border="0" width="100%" cellspacing="0" cellpadding="2">
       
			<td colspan="2">
			  <table border="0" cellspacing="0" cellpadding="2" width="100%">
			 
				<tr>
				<td>
				<form method="post" id="frm_novalnet_cc_submit" name="novalnet_cc_payment_input" action="index.php?route=payment/novalnet_cc/confirm">
				
   
		 
				<!--<iframe  name="novalnet_cc_iframe" id="novalnet_cc_iframe" src="<?php echo HTTPS_SERVER;?>index.php?route=module/novalnet_iframe/novalnet_new_cc" scrolling="no" frameborder="0" style="width:100%; height:215px; border:none;" onLoad="doHideLoadingImageAndDisplayIframe(this);"><p>Your browser does not support iframes.</p></iframe>-->
				
				 <iframe  name="novalnet_cc_iframe" id="novalnet_cc_iframe" src="<?php if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') { echo HTTPS_SERVER;} else { echo HTTP_SERVER;}?>index.php?route=module/novalnet_iframe/novalnet_new_cc" scrolling="no" frameborder="0" style="width:100%; height:215px; border:none;" onLoad="doHideLoadingImageAndDisplayIframe(this);"><p>Your browser does not support iframes.</p></iframe>
	</td>
				</tr>
				<tr>
	 
     <input type="hidden" id="original_vendor_id" value="<?php echo $vendor_id; ?>" />
     <input type="hidden" id="original_vendor_authcode" value="<?php echo $auth_code; ?>" />
     <input type="hidden" id ="original_customstyle_css" value ="" >
     
	 
	 <input type="hidden" name="cc_type" id="cc_type" value="" />
	 <input type="hidden" name="cc_holder" id="cc_holder" value="" />
	 <input type="hidden" name="cc_exp_month" id="cc_exp_month" value="" />
	 <input type="hidden" name="cc_exp_year" id="cc_exp_year" value="" />
	 <input type="hidden" name="cc_cvv_cvc" id="cc_cvv_cvc" value="" />
	 <input type="hidden" name="cardno_id" id="cardno_id" value="" />
	 <input type="hidden" name="unique_id" id="unique_id" value="" />
	 
	 
	 
	    <td align="left"><a onclick="location = '<?php echo str_replace('&', '&amp;', $back); ?>'" class="button"><span><?php echo $button_back; ?></span></a></td>
	    
				  <td align="right"><a id="button-confirm" class="button"><span><?php echo $button_confirm; ?></span></a></td>
				  
		 </tr>
		   </table>
		 </td>
       
  </table>
  	 </form>
  </table>
</div>
<script type="text/javascript"><!--

function doHideLoadingImageAndDisplayIframe(element) {
       
       document.getElementById("loading_iframe_div").style.display="none";
       element.style.display="";
       var iframe = (element.contentWindow || element.contentDocument);  
       if (iframe.document) iframe=iframe.document;
       iframe.getElementById("novalnetCc_cc_type").onchange = function() {
        doAssignIframeElementsValuesToFormElements(iframe);  
       
       }
       iframe.getElementById("novalnetCc_cc_owner").onblur = function() {
        doAssignIframeElementsValuesToFormElements(iframe);  
       }
       iframe.getElementById("novalnetCc_expiration").onchange = function() {
        doAssignIframeElementsValuesToFormElements(iframe);  
       }
       iframe.getElementById("novalnetCc_expiration_yr").onchange = function() {
        doAssignIframeElementsValuesToFormElements(iframe);  
       }
       iframe.getElementById("novalnetCc_cc_cid").onblur = function() {
        doAssignIframeElementsValuesToFormElements(iframe);  
       }
       
       }
	  
	  $('iframe#novalnet_cc_iframe').load( function() {
			$('iframe#novalnet_cc_iframe').contents().find("head")
		  .append($("<style type='text/css'> body { border-spacing: 0 !important;  font-family: Arial,Helvetica,sans-serif !important;    font-size: 12px !important; }   </style>"));
	   
		});
      
      function doAssignIframeElementsValuesToFormElements(iframe) {
       document.getElementById("cc_type").value = iframe.getElementById("novalnetCc_cc_type").value;
       document.getElementById("cc_holder").value = iframe.getElementById("novalnetCc_cc_owner").value;
       document.getElementById("cc_exp_month").value = iframe.getElementById("novalnetCc_expiration").value;
       document.getElementById("cc_exp_year").value = iframe.getElementById("novalnetCc_expiration_yr").value;
       document.getElementById("cc_cvv_cvc").value = iframe.getElementById("novalnetCc_cc_cid").value;
       }
       
			
     					
			
       
$('#button-confirm').bind('click', function() {
       
		var iform = document.getElementById("novalnet_cc_iframe");
					var novalnet_cc_iframe = (iform.contentWindow || iform.contentDocument);
				
					if (novalnet_cc_iframe.document) novalnet_cc_iframe=novalnet_cc_iframe.document;
						
					if( novalnet_cc_iframe.getElementById("nncc_cardno_id").value != null ) {
					
						document.getElementById("cardno_id").value = novalnet_cc_iframe.getElementById("nncc_cardno_id").value;	
						document.getElementById("unique_id").value = novalnet_cc_iframe.getElementById("nncc_unique_id").value;
						
					}
		
		
	    
		$('#warning_msg').hide();  
		$.ajax({
			type: 'POST',
			url: 'index.php?route=payment/novalnet_cc/confirm',
			data: $('#payment :input'),
			dataType: 'json',		
			beforeSend: function() {
				$('#button-confirm').hide();
							
				$('#payment').before('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
			},
			success: function(json) {
				if (json['error']) {
					$('#warning_msg').html(json['error']);
					$('#warning_msg').show();
					$('#button-confirm').attr('disabled', false);
				}
				
				$('.attention').remove();
				$('#button-confirm').show();
				if (json['success']) {
					location = json['success'];
				}
			}
		});


});
//--></script>
