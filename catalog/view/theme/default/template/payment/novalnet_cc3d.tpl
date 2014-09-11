<b style="margin-bottom: 3px; display: block;"><?php echo $text_creditcard3d; ?><?php echo $text_heading; ?></b>

<div id="novalnet_cc3d_payment" class="buttons">
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
			 <td><?php 
	  echo $this->config->get('novalnet_cc3d_enduser');
	  ?>		 
</td>
  <table>
	<form method="post" id="frm_novalnet_cc3d_submit" name="novalnet_cc3d_payment_input" action="index.php?route=payment/novalnet_cc3d/confirm">
    <table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr class="moduleRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="selectRowEffect(this, 1)">
      <tr>
        <td colspan="2"><table border="0" cellspacing="0" cellpadding="2">	
         <tr>
            <td width="30%"><?php echo $text_cc3d_holder; ?>:*</td>
            <td><input type="text" name="novalnet_cc3d_holder" value="<?php echo $first_name; ?>" id="novalnet_cc3d-cc_holder" /></td>
			<div class="warning" id="warning_msg" style="display:none;">Fields should not be Empty</div>
		 </tr>
          <tr>
            <td><?php echo $text_cc3d_number; ?>:*</td>
            <td><input type="text" name="novalnet_cc3d_no" id="novalnet_cc3d-cc_no" /></td>
          </tr>
          <tr>
            <td><?php echo $text_cc3d_exp_month; ?>:*</td>
            <td><select name="novalnet_cc3d_exp_month" id="novalnet_cc3d-cc_exp_month">
			<option value="" selected="selected"><?php echo $text_month; ?></option>
			<?php
			
			for ($i = 01; $i < 13; $i++) 
			{ 
				
			   echo '<option value="'.$i.'">'.$monthary[$i].'</option>';
			}
			?></select>
			<select name="novalnet_cc3d_exp_year" id="novalnet_cc3d-cc_exp_year">
			<option value="" selected="selected"><?php echo $text_year ?></option>
			<?php
			$yearText="";
			for($i=date("Y"); $i<=date("Y")+15; $i++){
			print '<option value="'.$i.'"';
			if($yearText == $i){
			print 'selected="selected"';
			}
			print '>'.$i.'</option>';
			}
			?>
			</select></td>
		</tr>
          <tr>
           <td><?php echo $text_cc3d_cvc2; ?>:*</td>
            <td><input type="text" name="novalnet_cc3d_cvc2" id="novalnet_cc3d-cc_cvc2"maxlength=4 /><br>
			</td>
          </tr>
		  <tr>
		  <td></td>
		  <td> <?php echo $text_cc3d_cvc2_info; ?> </td>
		  </tr>
		  <tr>
	 
</tr>

						<tr>
			<td align="left"><a onclick="location = '<?php echo str_replace('&', '&amp;', $back); ?>'" class="button"><span><?php echo $button_back; ?></span></a></td>
				  <td align="right"><a id="button-confirm" class="button"><span><?php echo $button_confirm; ?></span></a>
				  <div class="result" id="result"></div>
				  </td>
		 </tr>
		   </table>
		 </td>
        </tr>
  </table>
  	 </form>
  </table>
</div>
<script type="text/javascript"><!--
$('#button-confirm').bind('click', function() {

  var name=$('#novalnet_cc3d-cc_holder').val();
  var number=$('#novalnet_cc3d-cc_no').val();
  var exp_month=$('#novalnet_cc3d-cc_exp_month').val();
  var exp_year=$('#novalnet_cc3d-cc_exp_year').val();
  var cvc=$('#novalnet_cc3d-cc_cvc2').val();
  
  number=number.replace(/ +/g, '');
  var currentTime = new Date();
  var month = currentTime.getMonth()+1;
  var year = currentTime.getFullYear();

  var error;
  var regex = /[#%\^<>@$=*!]/; 
 var matches = name.match(regex); 
  
   if(matches){      
	 var error ='<?php echo $text_cc3d_holder_error; ?>';   
	 $('#warning_msg').html(error);
	 $('#warning_msg').show();
	 return false;
	 
	}
   if(name=="" || number=="" || cvc==""){
		var error ="<?php echo $text_empty; ?>"; 
		$('#warning_msg').html(error);
		$('#warning_msg').show();
		return false;
	
   }else if(!isNaN(name)){
		 var error ="<?php echo $text_cc3d_holder_error; ?>";   
		$('#warning_msg').html(error);
		$('#warning_msg').show();
		return false;
   }else if(isNaN(number) || number.length<12){
		 var error ="<?php echo $text_cc3d_no_error; ?>"; 
		 $('#warning_msg').html(error);
		 $('#warning_msg').show();
		 return false;
   }else if(exp_month=="" || exp_year=="" || exp_year < year){
		 var error ="<?php echo $text_cc3d_exp_data_error; ?>";
		 $('#warning_msg').html(error);
		 $('#warning_msg').show();
		 return false;
   }else if(exp_year == year && exp_month<month){
		  var error ="<?php echo $text_cc3d_exp_month_error; ?>";
		  $('#warning_msg').html(error);
		  $('#warning_msg').show();
		  return false;
    }else if(isNaN(cvc) || cvc.length<'3'){
		 var error="<?php echo $text_cc3d_cvc2_error; ?>";
		 $('#warning_msg').html(error);
		 $('#warning_msg').show();
		 return false;
   }else {
		$('#warning_msg').hide();
		$('#button-confirm').hide();
		$.ajax({
			type: 'POST',
			url: 'index.php?route=payment/novalnet_cc3d/confirm',
			data: $('#novalnet_cc3d_payment :input'),
			beforeSend: function() {
					$('#button-confirm').attr('disabled', true);
				
			},
			success: function(data) {
					$('.result').html(data);			
			}
		});
	}  

});
//--></script>
