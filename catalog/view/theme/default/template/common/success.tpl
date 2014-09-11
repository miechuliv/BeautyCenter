<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $heading_title; ?></h1>
  <?php echo $text_message; ?>
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
  <?php echo $content_bottom; ?></div>
<?php
if(isset($pap4_totals) && isset($pap4_orderid)) {
  $subtotal = 0;
  foreach ($pap4_totals as $item) {
    if ($item['code'] == "sub_total") {$subtotal += $item['value'];}
    if ($item['code'] == "coupon") {$subtotal += $item['value'];}
    if ($item['code'] == "voucher") {$subtotal += $item['value'];}
  }
  if ($subtotal < 0) {$subtotal = 0;}
  ?>
<script id="pap_x2s6df8d" src="http://www.yoursite.com/affiliate/scripts/salejs.php" type="text/javascript"> </script>
<script type="text/javascript">
  var sale = PostAffTracker.createSale();
  sale.setTotalCost('<?php echo $subtotal; ?>');
  sale.setOrderID('<?php echo $pap4_orderid; ?>');
  PostAffTracker.register();
</script>
<?php } ?>
<?php echo $footer; ?>