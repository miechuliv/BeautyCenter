
<b style="margin-bottom: 3px; display: block;"><?php echo $text_paypal; ?><?php echo $text_heading; ?></b><div class="buttons">
<tr>
<td>
<?php
if($testmode_desc==1){
echo $text_novalnet_testmode_desc;
}
?>
</td>
</tr>
  <table>
  
   <form method="post" id="frm_novalnet_paypal_submit" name="novalnet_paypal_payment_input" action="index.php?route=payment/novalnet_paypal/confirm">
     <table border="0" width="100%" cellspacing="0" cellpadding="2">

        <tr>
        <td colspan="2"><table border="0" cellspacing="0" cellpadding="2">
         </tr>
		 <tr>
			<td><?php echo $text_novalnet_redirection; ?></td>
			</tr>
		   <tr>
	  <td><?php 
	  echo $this->config->get('novalnet_paypal_info');
	  ?>		 
      </td>
      </tr>
	
          
        </table></td>
      </tr>
   
	<tr>
	<td align="left"><a onclick="location = '<?php echo str_replace('&', '&amp;', $back); ?>'" class="button"><span><?php echo $button_back; ?></span></a></td>
      <td align="right"><a id="checkout1" class="button" onclick="paypal_click();"><span><?php echo $button_confirm; ?></span></a></td>
    </tr>
  </table>
  	 </form>
  
</div>
<script type="text/javascript">
function paypal_click(){
	document.getElementById('checkout1').style.display='none';
	document.forms["frm_novalnet_paypal_submit"].submit();
}
</script>
