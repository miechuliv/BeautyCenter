<b style="margin-bottom: 3px; display: block;"><?php echo $text_German; ?><?php echo $text_heading; ?></b>

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
	  <td><?php 
	  echo $this->config->get('novalnet_elv_de_InformationtotheCustomer');
	  ?>		 
</td>
</tr>
  <table>
    <form method="post" id="frm_novalnet_elv_de_submit" name="novalnet_elv_de_payment_input" action="index.php?route=payment/novalnet_elv_de/confirm">
	<div class="warning" id="warning_msg" style="display:none; width:230px;">Fields should not be Empty</div>
    <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr class="moduleRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="selectRowEffect(this, 1)">
			<td colspan="2">
			  <table border="0" cellspacing="0" cellpadding="2" width="100%">

         <tr>
            <td width="30%"><?php echo $text_bank_account_owner; ?>:*</td>
			<td><input type="text" name="novalnet_elv_de_holder" value="<?php echo $first_name; ?>" id="novalnet_elv_de-account_holder" /></td>
         </tr>
         <tr>
            <td><?php echo $text_bank_account_number; ?>:*</td>
            <td><input type="text" name="novalnet_elv_de_number" id="novalnet_elv_de-account_number" /></td>
         </tr>
         <tr>		 
		     <td><?php echo $text_bank_code; ?>:*</td>
              <td><input type="text" name="bank_no" id="novalnet_elv_de-bankcode_no" /></td>
         </tr>
		 <tr>
		 
		     <td></td>
              <td>
			  <?php
			  $acdc = html_entity_decode($this->config->get('novalnet_elv_de_ACDCcontrol'));
			   
		if($acdc == 1)
		{
	      echo "<input type=checkbox name=acdc value=1 id=novalnet_elv_de-acdc /><B><A HREF='javascript:show_acdc_info()' ONMOUSEOVER='show_acdc_info()'>".$text_acdc_frontend."</A></B>";
		}		  ?></td> 
		
<script type="text/javascript"> 
   var showbaby;
   function show_acdc_info(){
   var urlpopup=parent.location.href;
   urlpopup='http://www.novalnet.de/img/acdc_info.png'
   w='550';h='300';
   x=250;y=100; 
  //x=screen.availWidth/2-w/2;y=screen.availHeight/2-h/2;
showbaby=window.open(urlpopup,'showbaby','toolbar=0,location=0,directories=0,status=0,menubar=0,resizable=1,width='+w+',height='+h+',left='+x+',top='+y+',screenX='+x+',screenY='+y);
 showbaby.focus(); 
    }
  function hide_acdc_info(){showbaby.close();}
</script>
      </tr>
	  
      <tr>
         <td align="left">
		     <a onclick="location = '<?php echo str_replace('&', '&amp;', $back); ?>'" class="button"><span><?php echo        $button_back;      ?></span></a>
		 </td>
         <td align="right">
		   <a id="button-confirm" class="button"><span><?php echo $button_confirm; ?></span></a>
		 </td>
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

  var name=$('#novalnet_elv_de-account_holder').val();
  var number=$('#novalnet_elv_de-account_number').val();
  var bank_code=$('#novalnet_elv_de-bankcode_no').val();  

  number=number.replace(/ +/g, '');
  bank_code=bank_code.replace(/ +/g, '');
  var error;
  var regex = /[#%\^<>@$=*!]/; 
 var matches = name.match(regex); 
  
   if(matches){      
	 var error ='<?php echo $text_elv_de_holder; ?>';   
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
		 var error ='<?php echo $text_elv_de_holder; ?>';   
		$('#warning_msg').html(error);
		$('#warning_msg').show();
		return false;
   }else if(isNaN(number) || number.length<5){
		 var error ='<?php echo $text_elv_de_number; ?>'; 
		 $('#warning_msg').html(error);
		 $('#warning_msg').show();
		 return false;
    }else if(isNaN(bank_code) || bank_code.length<3){
		 var error ='<?php echo $text_elv_de_bank_no; ?>';
		 $('#warning_msg').html(error);
		 $('#warning_msg').show();
		 return false;
   }else if("<?php echo $acdc;?>" ==1 &&  $('#novalnet_elv_de-acdc').is(':checked') == false){
		 var error ='<?php echo $text_elv_de_acdc; ?>';
		 $('#warning_msg').html(error);
		 $('#warning_msg').show();
		 return false;
   }else {
		$('#warning_msg').hide();  
		$.ajax({
			type: 'POST',
			url: 'index.php?route=payment/novalnet_elv_de/confirm',
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
