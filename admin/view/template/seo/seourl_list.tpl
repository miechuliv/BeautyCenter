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
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/setting.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="location = '<?php echo $insert; ?>'" class="button"><?php echo $button_insert; ?></a>
	  <a onclick="$('#form').submit();" class="button"><?php echo $button_delete; ?></a>
	 <a onclick="$('#formAdd').submit();" class="button"><?php echo $button_addcomons; ?></a>
	 <form action="<?php echo $commons; ?>" method="post" enctype="multipart/form-data" id="formAdd">
	 </form>
	</div>
    </div>
    <div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left"><?php if ($sort == 'query') { ?>
                <a href="<?php echo $sort_query; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_query; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_query; ?>"><?php echo $column_query; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'status') { ?>
                <a href="<?php echo $sort_keyword; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_keyword; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_keyword; ?>"><?php echo $column_keyword; ?></a>
                <?php } ?></td>
              <td class="right"><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <?php if ($urls) { ?>
            <?php foreach ($urls as $url) { ?>
            <tr>
              <td style="text-align: center;"><?php if ($url['selected']) { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $url['url_alias_id']; ?>" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $url['url_alias_id']; ?>" />
                <?php } ?></td>
              <td class="left"><?php echo $url['query']; ?></td>
              <td class="left"><?php echo $url['keyword']; ?></td>
              <td class="right"><?php foreach ($url['action'] as $action) { ?>
                [ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
                <?php } ?></td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="center" colspan="5"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    // Confirm addcomons
    $('#formAdd').submit(function(){
        if ($(this).attr('action').indexOf('addcommons',1) != -1) {
            if (!confirm('If you have commons route will be replaced with the default info, are you sure?')) {
                return false;
            }
        }
    });
});
</script>
<?php echo $footer; ?> 