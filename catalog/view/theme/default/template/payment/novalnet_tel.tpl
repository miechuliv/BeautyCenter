<b style="margin-bottom: 3px; display: block;"><?php echo $text_tel; ?><?php echo $text_heading; ?></b>
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
				<td><?php echo $this->config->get('novalnet_tel_InformationtotheCustomer'); ?></td>
				</tr>
  <table>
   <form method="post" id="frm_novalnet_tel_submit" name="novalnet_tel_payment_input" action="index.php?route=payment/novalnet_tel/confirm">
 	<div class="warning" id="warning_msg" style="display:none;">Fields should not be Empty</div>
    <table border="0" width="100%" cellspacing="0" cellpadding="2">
       
			<td colspan="2">
			  <table border="0" cellspacing="0" cellpadding="2" width="100%">
			
									<tr>
			<td align="left"><a onclick="location = '<?php echo str_replace('&', '&amp;', $back); ?>'" class="button"><span><?php echo $button_back; ?></span></a></td>
				  <td align="right"><a id="button-confirm" class="button"><span><?php echo $button_confirm; ?></span></a></td>
		 </tr>
			
		   </table>
		 </td>
        </tr>
  </table>
  	 </form>
  </table>
</div>
<script type="text/javascript">
$('#button-confirm').bind('click', function() {
		
		$.ajax({
			type: 'POST',
			url: 'index.php?route=payment/novalnet_tel/confirm',
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
</script>
