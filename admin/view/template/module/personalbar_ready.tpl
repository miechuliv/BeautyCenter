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
    <h1><img src="view/image/module.png" /><?php echo $heading_title; ?></h1>
  </div>
  <div class="content" style="min-height: auto;">
    <?php if ($first_time) { ?>
      <div>
        <h2>Congratulations! Your new Personal Bar account is now ready.</h2>
      </div>
      <div>To configure the Personal Bar Experiences, Style and more,please click "<a style="text-decoration: underline;font-weight: bold;" target="_blank" href="<?php echo $config_url; ?>">Go to my Config Panel</a>" below.</div>
      <div>Your Personal Bar will remain hidden from your store visitors until you Publish it.</div>
    <?php } else {  ?>
      <div style="margin-bottom:5px;">
        The Personal Bar is fully customizable to fit your store's look & feel and to help you increase engagement and revenue.
      </div>
      <?php if ($hidden) { ?>
        <div>
          <span style="font-weight:bold;">NOTE: </span>Your bar will only appear on your Store Front once you click the "Go Live!" button in the Config Panel.
        </div>
      <?php } ?>
    <?php } ?>
    <div style="padding-top: 5px;">
      <a style="font-size: 1.3em;text-decoration: underline;color: #FF802B;font-weight: bold;" target="_blank" href="<?php echo $config_url; ?>">Go to my Config Panel>></a>
     </div>
  </div>
</div>
