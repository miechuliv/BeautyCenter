<div id="banner<?php echo $module; ?>" class="banner">
  <?php $banner_count = 0;?>
  <?php foreach ($banners as $banner) { ?>
  <?php $banner_count++;?>
  <?php if ($banner['link']) { ?>
  <div<?php echo (($banner_count%3)==0) ? ' class="last_in_row"' : '';?>><a href="<?php echo $banner['link']; ?>"><img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" title="<?php echo $banner['title']; ?>" /></a></div>
  <?php } else { ?>
  <div<?php echo (($banner_count%3)==0) ? ' class="last_in_row"' : '';?>><img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" title="<?php echo $banner['title']; ?>" /></div>
  <?php } ?>
  <?php } ?>
  <br class="clear"/>
  <div class='in_column_bottom_padding'></div>  
</div>