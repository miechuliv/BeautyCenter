<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
    <head>
        <meta charset="UTF-8" />
        <title><?php echo $title; ?></title>
        <base href="<?php echo $base; ?>" />
        <?php if ($description) { ?>
        <meta name="description" content="<?php echo $description; ?>" />
        <?php } ?>
        <?php if ($keywords) { ?>
        <meta name="keywords" content="<?php echo $keywords; ?>" />
        <?php } ?>
        <?php if ($icon) { ?>
        <link href="<?php echo $icon; ?>" rel="icon" />
        <?php } ?>
        <?php foreach ($links as $link) { ?>
        <link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
        <?php } ?>
        
        <link rel="stylesheet" type="text/css" href="catalog/view/theme/beautyworld/stylesheet/stylesheet.css" />
                             <link rel="stylesheet" type="text/css" href="catalog/view/theme/beautyworld/stylesheet/font-awesome.min.css" />
        <?php foreach ($styles as $style) { ?>
        <link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
        <?php } ?>
        <script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
        <script type="text/javascript" src="catalog/view/javascript/common.js"></script>
        <?php foreach ($scripts as $script) { ?>
        <script type="text/javascript" src="<?php echo $script; ?>"></script>
        <?php } ?>
        <script type="text/javascript" src="catalog/view/theme/beautyworld/js/camera.min.js"></script>
        <script type="text/javascript" src="catalog/view/theme/beautyworld/js/cloud_zoom.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <!--[if IE 7]> 
        <link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/ie7.css" />
        <![endif]-->
        <!--[if lt IE 7]>
        <link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/ie6.css" />
        <script type="text/javascript" src="catalog/view/javascript/DD_belatedPNG_0.0.8a-min.js"></script>
        <script type="text/javascript">
        DD_belatedPNG.fix('#logo img');
        </script>
        <![endif]-->
        <style type="text/css">
     <?php if($this->config->get('status') == '1'){    ?>
            <?php if($this->config->get('fp_body_color') && $this->config->get('fp_body_color')!=''){?>
	body {background-color:#<?php echo $this->config->get('fp_body_color')?>;
             
        }
<?php }?>
<?php }?>

            <?php 

            if($this->config->get('about_us_image_status') == '1'){

                ?>	body {background:url("<?php echo HTTP_SERVER; ?>image/<?php echo $this->config->get('about_us_image')?>") ;
background-position: <?php echo $this->config->get('bg_image_position')?>;
	background-repeat: <?php echo $this->config->get('bg_image_repeat')?>;
	background-attachment: <?php echo $this->config->get('bg_image_attachment')?>;
	background-color:#<?php echo $this->config->get('fp_body_color')?>;
	}

                <?php 

            }

            ?>
        </style>

        <?php if ($stores) { ?>
        <script type="text/javascript"><!--
            $(document).ready(function() {
                <?php foreach ($stores as $store) { ?>
                $('body').prepend('<iframe src="<?php echo $store; ?>" style="display: none;"></iframe>');
                <?php } ?>
        });
        //--></script>
     
        <?php } ?>
           <script type="text/javascript" src="catalog/view/theme/beautyworld/js/scrolltopcontrol.js"></script>
        <?php echo $google_analytics; ?>
        
        <!-- ClickDesk Live Chat Service for websites -->
<script type='text/javascript'>
var _glc =_glc || []; _glc.push('all_ag9zfmNsaWNrZGVza2NoYXRyDgsSBXVzZXJzGJ2k1hIM');
var glcpath = (('https:' == document.location.protocol) ? 'https://my.clickdesk.com/clickdesk-ui/browser/' : 
'http://my.clickdesk.com/clickdesk-ui/browser/');
var glcp = (('https:' == document.location.protocol) ? 'https://' : 'http://');
var glcspt = document.createElement('script'); glcspt.type = 'text/javascript'; 
glcspt.async = true; glcspt.src = glcpath + 'livechat-new.js';
var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(glcspt, s);
</script>
<!-- End of ClickDesk -->
    </head>
    <body>
    
    
    <style>
    		#newsletter-overlay{
    			display:none; 
    			position:absolute; 
    			z-index:999; 
    			top: 100px; 
    			left: 150px;
    			width: 700px;
    			height: 500px;
    		}
    		#text1522949{
    			position:relative; 
    			top:-275px; 
    			left: 126px; 
    			min-width:143px; 
    			width:143px; 
    			min-height: 19px; 
    			height: 19px; 
    			z-index:9999;
    		}
    		
    		
    		
    		#submitbutton{
    			width: 155px; 
    			height: 45px; 
				top:-184px; 
				position:relative; 
				background-color: transparent; 
				left: 16px;
				z-index:9999; 
				cursor:pointer; 
				border: none;
    		}
    		
    		#overlay-close{
    			position:relative; 
    			top:-515px; 
    			right:-300px; 
    			font-weight:bolder;
    			z-index:9999; 
    			cursor:pointer;
    		}
    		
    		#modal{
    			top:0px; 
    			left:0px; 
    			position:fixed; 
    			width: 100%; 
    			height: 100%; 
    			background-image: url('http://www.beautycenter-billstedt.de/store/image/bg60.png') ;
    		}
    		
    		@-moz-document url-prefix() {
    			#text1522949{
    				top: -257px;
    			}
    			#overlay-close{
    				top:-495px;
    			}
    		}
    	</style>
    <div id="newsletter-overlay" style="">
    	
    	<script type="text/javascript" src="http://www.beautycenter-billstedt.de/js/jquery.cookie.js"></script>
    	<img style="z-index: 9999; position:relative;" src="http://www.beautycenter-billstedt.de/store/image/newsletter-overlay.png" width="700" height="500" />

    	<form class='layout_form cr_form' action="http://8637.seu.cleverreach.com/f/8637-68234/wcs/" method="post">
			<input id="text1522949" name="email" value="" type="text" style="" />
			<button id="submitbutton" type="submit" style=""></button>
			<a id="overlay-close" style="">Schließen</a>
			
		</form>
		
		<div id="modal" style=" "></div>
		<script>
			$(function(){
				$("#overlay-close").click(function(){
					$('#newsletter-overlay').fadeOut();
				});
				
				$("#submitbutton").click(function(e){
					e.preventDefault();
                    
                    $.post(
                        'http://www.beautycenter-billstedt.de/store/proxy.php', 
                        $(".layout_form").serialize(), 
                        function(html){
        	            	$.cookie("overlay-close", true);
							alert("Um die Anmeldung abzuschließen, klicken Sie bitte auf den Link in der E-Mail, die wir soeben an Sie gesendet haben");
							$('#newsletter-overlay').fadeOut();
        	            });
                    
					
				});
				
				if( window.location.href == "http://www.beautycenter-billstedt.de/store/" &&  ( !$.cookie("overlay-close") || $.cookie("overlay-close") != "true") ){
					$("#newsletter-overlay").show();
					$("#newsletter-overlay").css("left", ($(window).width()-700)/2 );
				}
				
			});
		</script>
		
    </div>
    
        <div id="header-top">
            <p>

           <div class="links"><a href="<?php echo $home; ?>" class="home-link" title="<?php echo $text_home; ?>"><i class="icon-home" style="font-size:16px; margin-right:3px;"></i><?php echo $text_home; ?></a><a href="<?php echo $wishlist; ?>" class="home-link" title="<?php echo $text_wishlist; ?>"><i class="icon-heart" style="font-size:16px; margin-right:3px;"></i><?php echo $text_wishlist; ?></a><a href="<?php echo $account; ?>" class="home-link" title="<?php echo $text_account; ?>"><i class="icon-user" style="font-size:16px; margin-right:3px;"></i><?php echo $text_account; ?></a><a href="<?php echo $shopping_cart; ?>" class="home-link" title="<?php echo $text_shopping_cart; ?>"><i class="icon-shopping-cart" style="font-size:16px; margin-right:3px;"></i><?php echo $text_shopping_cart; ?></a><a href="<?php echo $checkout; ?>" class="home-link" title="<?php echo $text_checkout; ?>"><i class="icon-briefcase" style="font-size:16px; margin-right:3px;"></i><?php echo $text_checkout; ?></a></div>


        </p>
    </div>
    <div id="container1">   
        <div id="container">
            <div id="header">
                <?php if ($logo) { ?>
                <div id="logo"><a href="<?php echo $home; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" /></a></div>
                <?php } ?>
                <?php echo $language; ?>
                <?php echo $currency; ?>
                <?php echo $cart; ?>

                <div id="welcome">
                    <?php if (!$logged) { ?>
                    <?php echo $text_welcome; ?>
                    <?php } else { ?>
                    <?php echo $text_logged; ?>
                    <?php } ?>
                </div>

            </div>


            <div id="navigation">

                <div class="search-container">
                    <div class="search-inner">	
                        <input  name="search" placeholder="<?php echo $text_search; ?>" value="<?php echo $search; ?>" class="search-field"/>
                        <div class="button-search"><input type="submit" id="s_submit" value="" class="search-btn"/></div>
                    </div>
                </div>
                <div class="navigation-inner">
                   

                    <?php if ($categories) { ?>
                    <div id="menu">
                        <ul>
                          <li>
<a href="<?php echo $home; ?>" title="Home" aria-describedby="ui-tooltip-101"><span class="icon-home" style="margin-left:0px;font-size:22px; line-height:12px;"></span></a>
</li>
<li>
<a href="<?php echo HTTP_SERVER; ?>ueber-uns" title="Über Uns">Über Uns</a>
</li>
                            <?php foreach ($categories as $category) { ?>
                            <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
                                <?php if ($category['children']) { ?>
                                <div>
                                    <?php for ($i = 0; $i < count($category['children']);) { ?>
                                    <ul>
                                        <?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
                                        <?php for (; $i < $j; $i++) { ?>
                                        <?php if (isset($category['children'][$i])) { ?>
                                        <li><a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?></a></li>
                                        <?php } ?>
                                        <?php } ?>
                                    </ul>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>

                </div>
            </div>
 <?php if ($error) { ?>
    
    <div class="warning"><?php echo $error ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
    
<?php } ?>
          <div id="notification-fixed">
  <div id="notification"></div>
</div>




            <div class="box"> <div class="box-content-sty-outer"></div>
                <div class="categ-outer">