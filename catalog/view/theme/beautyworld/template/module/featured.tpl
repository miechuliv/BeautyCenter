<style type="text/css">
#column-left + #column-right + #content .box-product{ padding:11px;}
#column-left + #column-right + #content .box-product > div{ margin-right:4px;}
#column-left + #content .box-product{ padding:0 6px 6px 6px;}
#column-left + #content .product-grid > div, #content .box-product > div{margin:6px 5px;}
.box-product{ padding:10px 22px 10px 22px}
</style>

<div class="box">
 <div class="box-heading"><?php echo $heading_title; ?></div>
    
    <div class="box-product">
 
      <?php foreach ($products as $product) { ?>
      <div>
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
         <div class="wishlist"><a onclick="addToWishList('<?php echo $product['product_id']; ?>');"><?php echo $this->language->get('button_wishlist'); ?></a></div>
      <div class="compare"><a onclick="addToCompare('<?php echo $product['product_id']; ?>');"><?php echo $this->language->get('button_compare') ?></a></div>
      </div>
      <?php } ?>
    </div>
    <div class="shadow"></div>
  </div>




    
    
    
    
  