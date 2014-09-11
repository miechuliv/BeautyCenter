<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/payment.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <div class="novalnet_info">
        <?php echo $novalnet_contact_info; ?>
      </div>
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      <table class="form">
	  <tr>
          <td><class="required"><?php echo $entry_total; ?></td>
          <td><input type="text" name="novalnet_ccpci_total" value="<?php echo $novalnet_ccpci_total; ?>" /></td>
        </tr>
	    <tr>
          <td><?php echo $entry_test; ?></td>
          <td><?php if ($novalnet_cc_pci_test) { ?>
              <input type="radio" name="novalnet_cc_pci_test" value="1" checked="checked" />
              <?php echo $text_yes; ?>
              <input type="radio" name="novalnet_cc_pci_test" value="0" />
              <?php echo $text_no; ?>
              <?php } else { ?>
              <input type="radio" name="novalnet_cc_pci_test" value="1" />
              <?php echo $text_yes; ?>
              <input type="radio" name="novalnet_cc_pci_test" value="0" checked="checked" />
              <?php echo $text_no; ?>
              <?php } ?></td>
        </tr>
	    <tr>
          <td><class="required"><?php echo $entry_merchant; ?></td>
          <td><input type="text" name="novalnet_cc_pci_merchant" value="<?php echo $novalnet_cc_pci_merchant; ?>" />
              <?php if ($error_merchant) { ?>
              <span class="error"><?php echo $error_merchant; ?></span>
              <?php } ?></td>
        </tr> 
		<tr>
          <td><class="required"> <?php echo $entry_authorisation; ?></td>
          <td><input type="text" name="novalnet_cc_pci_authorisation" value="<?php echo $novalnet_cc_pci_authorisation; ?>" />
              <?php if ($error_authorisation) { ?>
              <span class="error"><?php echo $error_authorisation; ?></span>
              <?php } ?></td>
        </tr>
		<tr>
          <td><class="required"> <?php echo $entry_productid; ?></td>
          <td><input type="text" name="novalnet_cc_pci_productid" value="<?php echo $novalnet_cc_pci_productid; ?>" />
              <?php if ($error_productid) { ?>
              <span class="error"><?php echo $error_productid; ?></span>
              <?php } ?></td>
        </tr>
		<tr>
          <td><class="required"><?php echo $entry_tariffid; ?></td>
          <td><input type="text" name="novalnet_cc_pci_tariffid" value="<?php echo $novalnet_cc_pci_tariffid; ?>" />
              <?php if ($error_tariffid) { ?>
              <span class="error"><?php echo $error_tariffid; ?></span>
              <?php } ?></td>
        </tr>
		<tr>
          <td><class="required"><?php echo $entry_bookingamount; ?></td>
          <td><input type="text" name="novalnet_cc_pci_bookingamount" value="<?php echo $novalnet_cc_pci_bookingamount; ?>" />
		      <?php if ($error_bookingamount) { ?>
              <span class="error"><?php echo $error_bookingamount; ?></span>
              <?php } ?>
          </td>
        </tr>
		<tr>
          <td><class="required"><?php echo $entry_productid2; ?></td>
          <td><input type="text" name="novalnet_cc_pci_productid2" value="<?php echo $novalnet_cc_pci_productid2; ?>" />
          </td>
        </tr>
		<tr>
          <td><class="required"> <?php echo $entry_tariffid2; ?></td>
          <td><input type="text" name="novalnet_cc_pci_tariffid2" value="<?php echo $novalnet_cc_pci_tariffid2; ?>" />
          </td>
        </tr>
		<tr>
          <td><class="required"> <?php echo $entry_enduser; ?></td>
          <td><input type="text" name="novalnet_cc_pci_enduser" value="<?php echo $novalnet_cc_pci_enduser; ?>" />
          </td>
        </tr>
		<tr>
          <td><?php echo $entry_sort_order; ?></td>
          <td><input type="text" name="novalnet_cc_pci_sort_order" value="<?php echo $novalnet_cc_pci_sort_order; ?>" size="1" /></td>
        </tr>
		<tr>
          <td><?php echo $entry_order_status; ?></td>
          <td><select name="novalnet_cc_pci_order_status_id">
              <?php foreach ($order_statuses as $order_status) { ?>
              <?php if ($order_status['order_status_id'] == $novalnet_cc_pci_order_status_id) { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
        </tr>
		<tr>
          <td><?php echo $entry_geo_zone; ?></td>
          <td><select name="novalnet_cc_pci_geo_zone_id">
              <option value="0"><?php echo $text_all_zones; ?></option>
              <?php foreach ($geo_zones as $geo_zone) { ?>
              <?php if ($geo_zone['geo_zone_id'] == $novalnet_cc_pci_geo_zone_id) { ?>
              <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
        </tr>
		<tr>
          <td><class="required"> <?php echo $entry_proxy; ?></td>
          <td><input type="text" name="novalnet_cc_pci_proxy" value="<?php echo $novalnet_cc_pci_proxy; ?>" />
          </td>
        </tr>
		<tr>
          <td><?php echo $entry_status; ?></td>
          <td><select name="novalnet_cc_pci_status">
              <?php if ($novalnet_cc_pci_status) { ?>
              <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
              <option value="0"><?php echo $text_disabled; ?></option>
              <?php } else { ?>
              <option value="1"><?php echo $text_enabled; ?></option>
              <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
              <?php } ?>
            </select></td>
        </tr>
		<tr>
          <td><class="required"> <?php echo $entry_password; ?></td>
          <td><input type="text" name="novalnet_cc_pci_password" value="<?php echo $novalnet_cc_pci_password; ?>" />
			  <?php if ($error_password) { ?>
              <span class="error"><?php echo $error_password; ?></span>
              <?php } ?>
		  </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php echo $footer; ?>
