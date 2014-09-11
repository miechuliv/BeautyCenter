<b style="margin-bottom: 3px; display: block;"><?php echo $text_austria; ?><?php echo $text_heading; ?></b>
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
				<td><?php echo $this->config->get('novalnet_elv_at_info'); ?></td>
				</tr>
  <table>
   <form method="post" id="frm_novalnet_elv_at_submit" name="novalnet_elv_at_payment_input" action="index.php?route=payment/novalnet_elv_at/confirm">
 	<div class="warning" id="warning_msg" style="display:none; width:230px;">Fields should not be Empty</div>
    <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr class="moduleRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="selectRowEffect(this, 1)">
			<td colspan="2">
			  <table border="0" cellspacing="0" cellpadding="2" width="100%">
			 <tr>
				<td width="30%"><?php echo $text_bank_account_owner; ?>:*</td>
				<td><input type="text" name="bank_account_owner" value="<?php echo $first_name; ?> " id="novalnet_elv_at_bank_account_owner" /></td>
			  </tr>
			 <tr>
				<td><?php echo $text_bank_account_number; ?>:*</td>
				<td><input type="text" name="bank_account_number" id="novalnet_elv_at_bank_account_number" /></td>
			  </tr>
			   <tr>
				<td><?php echo $text_bank_code; ?>:*</td>
				<td><input type="text" name="bank_code" id="novalnet_elv_at_bank_code" /></td>
			  </tr>
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

  var name=$('#novalnet_elv_at_bank_account_owner').val();
  var number=$('#novalnet_elv_at_bank_account_number').val();
  var bank_code=$('#novalnet_elv_at_bank_code').val();  

  number=number.replace(/ +/g, '');
  bank_code=bank_code.replace(/ +/g, '');
  var error;
  var regex = /[#%\^<>@$=*!]/; 
 var matches = name.match(regex); 
  
   if(matches){      
	 var error ='<?php echo $text_elv_at_holder; ?>';   
	 $('#warning_msg').html(error);
	 $('#warning_msg').show();
	 return false;
	}
   if(name=="" || number=="" || bank_code==""){
		var error ='<?php echo $text_empty; ?>'; 
		$('#warning_msg').html(error);
		$('#warning_msg').show();
		return false;
	
   }else if(!isNaN(name) || name.length < 3){
		 var error ='<?php echo $text_elv_at_holder; ?>';   
		$('#warning_msg').html(error);
		$('#warning_msg').show();
		return false;
   }else if(isNaN(number) || number.length<5){
		 var error ='<?php echo $text_elv_at_number; ?>'; 
		 $('#warning_msg').html(error);
		 $('#warning_msg').show();
		 return false;
    }else if(isNaN(bank_code) || bank_code.length<3){
		 var error ='<?php echo $text_elv_at_bank_no; ?>';
		 $('#warning_msg').html(error);
		 $('#warning_msg').show();
		 return false;
   }else {
		$('#warning_msg').hide();  
		$.ajax({
			type: 'POST',
			url: 'index.php?route=payment/novalnet_elv_at/confirm',
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
   }
});
</script>
