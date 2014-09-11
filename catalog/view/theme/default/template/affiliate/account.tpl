<?php echo $header; ?>
<?php if ($success) { ?>
<div class="success"><?php echo $success; ?></div>
<?php } ?>
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $heading_title; ?></h1>
  <h2><?php echo $text_my_account; ?></h2>
  <div class="content">
    <ul>
      <div style="float: left; width: 290px; margin-bottom: 10px; padding: 5px;"><img src="/store/catalog/view/theme/default/image/edit1.png" style="float: left; margin-right: 8px;"><a href="<?php echo $edit; ?>"><?php echo $text_edit; ?></a></div>
      <div style="float: left; width: 260px; margin-bottom: 10px; padding: 5px;"><img src="/store/catalog/view/theme/default/image/password.png" style="float: left; margin-right: 8px;"><a href="<?php echo $password; ?>"><?php echo $text_password; ?></a></div>
      <div style="float: left; width: 290px; margin-bottom: 10px; padding: 5px;"><img src="/store/catalog/view/theme/default/image/pay.png" style="float: left; margin-right: 8px;"><a href="<?php echo $payment; ?>"><?php echo $text_payment; ?></a></div>
    </ul>
  </div>
  <h2><?php echo $text_my_tracking; ?></h2>
  <div class="content">
    <ul>
      <div style="float: left; width: 260px; margin-bottom: 10px; padding: 5px;"><img src="/store/catalog/view/theme/default/image/code.png" style="float: left; margin-right: 8px;"><a href="<?php echo $tracking; ?>"><?php echo $text_tracking; ?></a></div>
    </ul>
  </div>
  <h2><?php echo $text_my_transactions; ?></h2>
  <div class="content">
    <ul>
      <div style="float: left; width: 260px; margin-bottom: 10px; padding: 5px;"><img src="/store/catalog/view/theme/default/image/trans.png" style="float: left; margin-right: 8px;"><a href="<?php echo $transaction; ?>"><?php echo $text_transaction; ?></a></div>
    </ul>
  </div>
  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>