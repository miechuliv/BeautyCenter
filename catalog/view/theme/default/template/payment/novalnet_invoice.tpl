<b style="margin-bottom: 3px; display: block;"><?php echo $text_Invoice; ?><?php echo $text_heading; ?></b><div class="buttons">
<div class="buttons">
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
    <form method="post" id="frm_novalnet_invoice_submit" name="novalnet_invoice_payment_input" action="index.php?route=payment/novalnet_invoice/confirm">
    <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr class="moduleRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="selectRowEffect(this, 1)">
		
         <tr>
            <td colspan="2"><table border="0" cellspacing="0" cellpadding="2">
         </tr>
		<tr>
		<td><?php 
		  echo $text_novalnet_redirection;
		  ?>	
                </td>
		</tr>
	  <tr>
	  <td><?php 
	  echo $this->config->get('novalnet_invoice_InformationtotheCustomer');
	  ?>		 
</td>
</tr>
	  
      <tr>
         <td align="left"><a onclick="location = '<?php echo str_replace('&', '&amp;', $back); ?>'" class="button"><span><?php echo        $button_back;      ?></span></a></td>
             <td align="right"><a id="checkout1" class="button" onclick="novalnet_invoice_click();"><span><?php echo $button_confirm; ?></span></a></td>
			 </tr>
  </table>
 </form>
</div>
<script type="text/javascript">
   function novalnet_invoice_click()
  { 
   document.getElementById('checkout1').style.display='none';
   document.forms["frm_novalnet_invoice_submit"].submit();
  }
</script>
