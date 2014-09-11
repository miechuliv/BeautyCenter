<b style="margin-bottom: 3px; display: block;"><?php echo $text_austriapci; ?><?php echo $text_heading; ?></b>
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
  
   <form method="post" id="frm_novalnet_elv_at_pci_submit" name="novalnet_elv_at_pci_payment_input" action="index.php?route=payment/novalnet_elv_at_pci/confirm">
     <table border="0" width="100%" cellspacing="0" cellpadding="2">

        <tr>
        <td colspan="2"><table border="0" cellspacing="0" cellpadding="2">
          </tr>
		  <tr>
			<td><?php echo $text_novalnet_redirection; ?></td>
			</tr>
			<tr>
			<td><?php echo $this->config->get('novalnet_elv_at_pci_info'); ?></td>
			</tr>

			
			<tr>
	  
	<tr>
	<td align="left"><a onclick="location = '<?php echo str_replace('&', '&amp;', $back); ?>'" class="button"><span><?php echo $button_back; ?></span></a></td>
      <td align="right"><a id="checkout1" class="button" onclick="elv_at_pci_click();"><span><?php echo $button_confirm; ?></span></a></td>
    </tr>
  </table>
  	 </form>
  
</div>
<script type="text/javascript">
function elv_at_pci_click(){
	document.getElementById('checkout1').style.display='none';
	document.forms["frm_novalnet_elv_at_pci_submit"].submit();
}
</script>




  
  
   
