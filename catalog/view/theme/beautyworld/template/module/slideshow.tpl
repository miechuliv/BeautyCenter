
                <div class="camera_wrap journal-slider" id="camera_slideshow_0" 
	style="max-width: <?php echo $this->data['width']; ?>px; max-height: <?php echo $this->data['height']; ?>px;">
          <?php foreach ($banners as $banner) { ?>
           <?php if ($banner['link']) { ?>
             <div data-src="<?php echo $banner['image']; ?>" data-link="<?php echo $banner['link']; ?>"></div>
    <?php } else { ?>
   <div data-src="<?php echo $banner['image']; ?>" ></div>
    <?php } ?>
    <?php } ?>
    </div>
          
          
          
   

<style type="text/css">
.navigation-inner { margin:0px 0 16px 0px;}
#camera_slideshow_0 .camera_prev {
	left: -70px;
}
#camera_slideshow_0 .camera_next {
	right: -70px;
}
@media only screen and (max-width: 1030px){
	#camera_slideshow_0 .camera_prev {
	left: 0;
	}
	#camera_slideshow_0 .camera_next {
		right: 0;
	}
}

</style>

<style type="text/css">
#camera_slideshow_0 .camera_pag, 
#camera_slideshow_0 .camera_prev, 
#camera_slideshow_0 .camera_next {
	transition: all 0.2s;
	opacity: 0;
}

#camera_slideshow_0:hover .camera_pag,
#camera_slideshow_0:hover .camera_prev,
#camera_slideshow_0:hover .camera_next
{
	opacity: 1;
}
</style>


<script type="text/javascript">
	/* ie8 hover fix */
	$('.ie8 #camera_slideshow_0').hover(function(){
		$(this).find('.camera_pag,.camera_prev,.camera_next').css('filter', 'alpha(opacity=100)');
	}, function(){
		$(this).find('.camera_pag,.camera_prev,.camera_next').css('filter', 'alpha(opacity=0)');
	});

	/* camera slideshow script */
	(function($){

		$(function(){
			var x = "<?php echo $this->data['width']; ?>";
			var y = "<?php echo $this->data['height']; ?>";
			var num = y / x * 100;

			var options = $.parseJSON('{"fx":"random","time":3500,"transPeriod":900,"autoAdvance":true,"navigation":true,"pagination":true,"hover":true,"loader":"bar"}');

			options.height = num + '%';
			options.slideOn = 'next';
			options.minHeight = '';

			$('#camera_slideshow_0').camera(options);
		});

	})(jQuery);
</script>
                
      
      
      <div style="margin-bottom:-40px;"></div>