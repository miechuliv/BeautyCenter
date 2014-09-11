  <div class="box"> <div class="box-content-sty"></div>
  <div id="tabs-<?php echo $module; ?>" class="htabs1">
<!--	<?php if($latest_products){ ?>
	<a href="#tab-latest-<?php echo $module; ?>"><?php echo $tab_latest; ?></a>
	<?php } ?>-->
	<?php if($featured_products){ ?>
	<a href="#tab-featured-<?php echo $module; ?>"><?php echo $tab_featured; ?></a>
	<?php } ?>
	<?php if($bestseller_products){ ?>
	<a href="#tab-bestseller-<?php echo $module; ?>"><?php echo $tab_bestseller; ?></a>
	<?php } ?>
	<?php if($special_products){ ?>
	<a href="#tab-special-<?php echo $module; ?>"><?php echo $tab_special; ?></a>
	<?php } ?>
 </div>
<!--<?php if($latest_products){ ?>
 <div id="tab-latest-<?php echo $module; ?>" class="tab-content1">
    <div class="box-product" style="padding-left:18px;">
      <?php foreach ($latest_products as $product) { ?>
      <div style="width:308px;"> 
        <?php if ($product['thumb']) { ?>
       <div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>"  data-over="<?php
        $images = array();
			
			$results = $this->model_catalog_product->getProductImages($product['product_id']);
			
			foreach ($results as $result) {
				$images[1] = array(
					'popup' => $this->model_tool_image->resize($result['image'], $additionalwidth, $additionalheight),
					'thumb' => $this->model_tool_image->resize($result['image'], $additionalwidth, $additionalheight)
				);
                               
			}	
        
        foreach ($images as $image) { ?><?php echo $image['thumb']; ?> <?php } ?>" data-out="<?php echo $product['thumb']; ?>"  alt="<?php echo $product['name']; ?>" /></a></div>
              
              <?php } else { ?>
              <div class="image">
                  <a href="<?php echo $product['href']; ?>"><img src="image/no_image.jpg" width="<?php echo $additionalwidth; ?>" height="<?php echo $additionalheight; ?>"/></a>
              </div>
        <?php } ?>
        <div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
        <?php if ($product['price']) { ?>
        <div class="price">
          <?php if (!$product['special']) { ?>
          <?php echo $product['price']; ?>
          <?php } else { ?>
          <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span><div class="sale-badge-grid"></div>
          <?php } ?>
        </div>
        <?php } ?>
        <?php if ($product['rating']) { ?>
        <div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
        <?php } ?>
        <div class="cart"><input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="button" /></div>
         <div class="wishlist"><a onclick="addToWishList('<?php echo $product['product_id']; ?>');">Add to Wish List</a></div>
      <div class="compare"><a onclick="addToCompare('<?php echo $product['product_id']; ?>');">Add to Compare</a></div>
 
      </div>
      <?php } ?>
    </div>
 </div>
<?php } ?>-->
<?php if($featured_products){ ?>
  <div id="tab-featured-<?php echo $module; ?>" class="tab-content1">
    <div class="box-product" style="padding-left:18px;">
      <?php foreach ($featured_products as $product) { ?>
      <div style="width:308px;">
        <?php if ($product['thumb']) { ?>
        <div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>"  data-over="<?php
        $images = array();
			
			$results = $this->model_catalog_product->getProductImages($product['product_id']);
			
			foreach ($results as $result) {
				$images[1] = array(
					'popup' => $this->model_tool_image->resize($result['image'], $additionalwidth, $additionalheight),
					'thumb' => $this->model_tool_image->resize($result['image'], $additionalwidth, $additionalheight)
				);
                               
			}	
        
        foreach ($images as $image) { ?><?php echo $image['thumb']; ?> <?php } ?>" data-out="<?php echo $product['thumb']; ?>"  alt="<?php echo $product['name']; ?>" /></a></div>
              
              <?php } else { ?>
              <div class="image">
                  <a href="<?php echo $product['href']; ?>"><img src="image/no_image.jpg" width="<?php echo $additionalwidth; ?>" height="<?php echo $additionalheight; ?>"/></a>
              </div>
        <?php } ?>
        <div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
        <?php if ($product['price']) { ?>
        <div class="price">
          <?php if (!$product['special']) { ?>
          <?php echo $product['price']; ?>
          <?php } else { ?>
          <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span><div class="sale-badge-grid"></div>
          <?php } ?>
        </div>
        <?php } ?>
        <?php if ($product['rating']) { ?>
        <div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
        <?php } ?>
        <div class="cart"><input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="button" /></div>
         <div class="wishlist"><a onclick="addToWishList('<?php echo $product['product_id']; ?>');">Add to Wish List</a></div>
      <div class="compare"><a onclick="addToCompare('<?php echo $product['product_id']; ?>');">Add to Compare</a></div>
 
      </div>
      <?php } ?>
    </div>
 </div>
<?php } ?>

<?php if($bestseller_products){ ?>
 <div id="tab-bestseller-<?php echo $module; ?>" class="tab-content1">
    <div class="box-product" style="padding-left:18px;">
      <?php foreach ($bestseller_products as $product) { ?>
      <div style="width:308px;">
        <?php if ($product['thumb']) { ?>
        <div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>"  data-over="<?php
        $images = array();
			
			$results = $this->model_catalog_product->getProductImages($product['product_id']);
			
			foreach ($results as $result) {
				$images[1] = array(
					'popup' => $this->model_tool_image->resize($result['image'], $additionalwidth, $additionalheight),
					'thumb' => $this->model_tool_image->resize($result['image'], $additionalwidth, $additionalheight)
				);
                               
			}	
        
        foreach ($images as $image) { ?><?php echo $image['thumb']; ?> <?php } ?>" data-out="<?php echo $product['thumb']; ?>"  alt="<?php echo $product['name']; ?>" /></a></div>
              
              <?php } else { ?>
              <div class="image">
                  <a href="<?php echo $product['href']; ?>"><img src="image/no_image.jpg" width="<?php echo $additionalwidth; ?>" height="<?php echo $additionalheight; ?>"/></a>
              </div>
        <?php } ?>
        <div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
        <?php if ($product['price']) { ?>
        <div class="price">
          <?php if (!$product['special']) { ?>
          <?php echo $product['price']; ?>
          <?php } else { ?>
          <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span><div class="sale-badge-grid"></div>
          <?php } ?>
        </div>
        <?php } ?>
        <?php if ($product['rating']) { ?>
        <div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
        <?php } ?>
        <div class="cart"><input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="button" /></div>
         <div class="wishlist"><a onclick="addToWishList('<?php echo $product['product_id']; ?>');">Add to Wish List</a></div>
      <div class="compare"><a onclick="addToCompare('<?php echo $product['product_id']; ?>');">Add to Compare</a></div>
 
      </div>
      <?php } ?>
    </div>
 </div>
<?php } ?>

<?php if($special_products){ ?>
 <div id="tab-special-<?php echo $module; ?>" class="tab-content1">
    <div class="box-product" style="padding-left:18px;">
      <?php foreach ($special_products as $product) { ?>
      <div style="width:308px;">
        <?php if ($product['thumb']) { ?>
        <div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>"  data-over="<?php
        $images = array();
			
			$results = $this->model_catalog_product->getProductImages($product['product_id']);
			
			foreach ($results as $result) {
				$images[1] = array(
					'popup' => $this->model_tool_image->resize($result['image'], $additionalwidth, $additionalheight),
					'thumb' => $this->model_tool_image->resize($result['image'], $additionalwidth, $additionalheight)
				);
                               
			}	
        
        foreach ($images as $image) { ?><?php echo $image['thumb']; ?> <?php } ?>" data-out="<?php echo $product['thumb']; ?>"  alt="<?php echo $product['name']; ?>" /></a></div>
              
              <?php } else { ?>
              <div class="image">
                  <a href="<?php echo $product['href']; ?>"><img src="image/no_image.jpg" width="<?php echo $additionalwidth; ?>" height="<?php echo $additionalheight; ?>"/></a>
              </div>
        <?php } ?>
        <div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
        <?php if ($product['price']) { ?>
        <div class="price">
          <?php if (!$product['special']) { ?>
          <?php echo $product['price']; ?>
          <?php } else { ?>
          <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span><div class="sale-badge-grid"></div>
          <?php } ?>
        </div>
        <?php } ?>
        <?php if ($product['rating']) { ?>
        <div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
        <?php } ?>
        <div class="cart"><input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="button" /></div>
         <div class="wishlist"><a onclick="addToWishList('<?php echo $product['product_id']; ?>');">Add to Wish List</a></div>
      <div class="compare"><a onclick="addToCompare('<?php echo $product['product_id']; ?>');">Add to Compare</a></div>
 
      </div>
      <?php } ?>
    </div>
 </div>
<?php } ?>
</div>
<script type="text/javascript">
$('#tabs-<?php echo $module; ?> a').tabs();
</script> 