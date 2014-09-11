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
          <td><input type="text" name="novalnet_paypal_total" value="<?php echo $novalnet_paypal_total; ?>" /></td>
        </tr>
        <tr>
          <td><?php echo $entry_novalnet_paypal_testmode; ?></td>
          <td><?php if ($novalnet_paypal_testmode) { ?>
              <input type="radio" name="novalnet_paypal_testmode" value="1" checked="checked" />
              <?php echo $text_yes; ?>
              <input type="radio" name="novalnet_paypal_testmode" value="0" />
              <?php echo $text_no; ?>
              <?php } else { ?>
              <input type="radio" name="novalnet_paypal_testmode" value="1" />
              <?php echo $text_yes; ?>
              <input type="radio" name="novalnet_paypal_testmode" value="0" checked="checked" />
              <?php echo $text_no; ?>
              <?php } ?></td>
        </tr>
		<tr>
          <td><?php echo $entry_novalnet_paypal_merchantid; ?></td>
          <td><input type="text" name="novalnet_paypal_merchantid" value="<?php echo $novalnet_paypal_merchantid; ?>" />
              <?php if ($error_merchant) { ?>
              <span class="error"><?php echo $error_merchant; ?></span>
              <?php } ?> </td>
        </tr>
		<tr>
          <td><?php echo $entry_novalnet_paypal_auth_code; ?></td>
          <td><input type="text" name="novalnet_paypal_auth_code" value="<?php echo $novalnet_paypal_auth_code; ?>" />
              <?php if ($error_authorisation) { ?>
              <span class="error"><?php echo $error_authorisation; ?></span>
              <?php } ?>  </td>
        </tr>
		<tr>
          <td><?php echo $entry_novalnet_paypal_productid; ?></td>
          <td><input type="text" name="novalnet_paypal_productid" value="<?php echo $novalnet_paypal_productid; ?>" />
              <?php if ($error_productid) { ?>
              <span class="error"><?php echo $error_productid; ?></span>
              <?php } ?> </td>
        </tr>
		<tr>
          <td><?php echo $entry_novalnet_paypal_tariffid; ?></td>
          <td><input type="text" name="novalnet_paypal_tariffid" value="<?php echo $novalnet_paypal_tariffid; ?>" />
              <?php if ($error_tariffid) { ?>
              <span class="error"><?php echo $error_tariffid; ?></span>
              <?php } ?>  </td>
        </tr>
		<tr>
          <td><?php echo $entry_novalnet_paypal_info; ?></td>
          <td><input type="text" name="novalnet_paypal_info" value="<?php echo $novalnet_paypal_info; ?>" />
          </td>
        </tr>
		 <tr>
          <td><?php echo $entry_novalnet_paypal_sort_order; ?></td>
          <td><input type="text" name="novalnet_paypal_sort_order" value="<?php echo $novalnet_paypal_sort_order; ?>" size="1" /></td>
        </tr>
		<tr>
          <td><?php echo $entry_novalnet_paypal_order_status; ?></td>
          <td><select name="novalnet_paypal_order_status_id">
              <?php foreach ($order_statuses as $order_status) { ?>
              <?php if ($order_status['order_status_id'] == $novalnet_paypal_order_status_id) { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
        </tr>
		<tr>
          <td><?php echo $entry_novalnet_paypal_payment_zone; ?></td>
          <td><select name="novalnet_paypal_payment_zone_id">
              <option value="0"><?php echo $text_all_zones; ?></option>
              <?php foreach ($geo_zones as $geo_zone) { ?>
              <?php if ($geo_zone['geo_zone_id'] == $novalnet_paypal_payment_zone_id) { ?>
              <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
        </tr>
		<tr>
          <td><?php echo $entry_novalnet_paypal_proxy; ?></td>
          <td><input type="text" name="novalnet_paypal_proxy" value="<?php echo $novalnet_paypal_proxy; ?>" />
            </td>
        </tr>
		<tr>
          <td><?php echo $entry_novalnet_paypal_password; ?></td>
          <td><input type="text" name="novalnet_paypal_password" value="<?php echo $novalnet_paypal_password; ?>" />
              <?php if ($error_password) { ?>
              <span class="error"><?php echo $error_password; ?></span>
              <?php } ?>  </td>
        </tr>
		<tr>
          <td><?php echo $entry_novalnet_paypal_api_username; ?></td>
          <td><input type="text" name="novalnet_paypal_api_username" value="<?php echo $novalnet_paypal_api_username; ?>" />
              <?php if ($error_api_username) { ?>
              <span class="error"><?php echo $error_api_username; ?></span>
              <?php } ?>  </td>
        </tr>
		<tr>
          <td><?php echo $entry_novalnet_paypal_api_password; ?></td>
          <td><input type="text" name="novalnet_paypal_api_password" value="<?php echo $novalnet_paypal_api_password; ?>" />
              <?php if ($error_api_password) { ?>
              <span class="error"><?php echo $error_api_password; ?></span>
              <?php } ?>  </td>
        </tr>
		<tr>
          <td><?php echo $entry_novalnet_paypal_api_signature; ?></td>
          <td><input type="text" name="novalnet_paypal_api_signature" value="<?php echo $novalnet_paypal_api_signature; ?>" />
              <?php if ($error_api_signature) { ?>
              <span class="error"><?php echo $error_api_signature; ?></span>
              <?php } ?>  </td>
        </tr>
		 <tr>
          <td><?php echo $entry_novalnet_paypal_status; ?></td>
          <td><select name="novalnet_paypal_status">
              <?php if ($novalnet_paypal_status) { ?>
              <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
              <option value="0"><?php echo $text_disabled; ?></option>
              <?php } else { ?>
              <option value="1"><?php echo $text_enabled; ?></option>
              <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
              <?php } ?>
            </select></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php echo $footer; ?>
