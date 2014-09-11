</div>
<div class="shadow-outer"></div>
</div>

</div>
<?php if($this->config->get('socialfeeds_status') == '1') { ?>
<div class="footerouter2" >

    <div id="footer">

        <?php if ($this->config->get('facebook_status') == '1') { ?> 
        <div class="grid_<?php
             echo 12 / ($this->config->get('custom_footer_column_status')+$this->config->get('facebook_status')+$this->config->get('twitter_column_status'));
             ?>">
            <h3>Facebook Fanbox</h3>

            <div class="facebook-like-box"><div class="inner"> 
                    <?php $c= urlencode($this->config->get('facebook_link')); ?>
                    <iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $c; ?>&amp;width=292&amp;height=275&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:309spx; height:300px;" allowTransparency="true"></iframe></div></div>


        </div>

        <?php } ?>

        <?php if ($this->config->get('twitter_column_status') == '1') { ?> 
        <div class="grid_<?php
             echo 12 / ($this->config->get('custom_footer_column_status')+$this->config->get('facebook_status')+$this->config->get('twitter_column_status')); ?>">
            <h3><?php echo "Twitter Feeds"; ?></h3>
            <div class="block twitter" style="width:292px; height:260px"><a class="twitter-timeline"  width="292" height="260" data-theme="dark" data-chrome="transparent noborders noheader nofooter noscrollbar" data-dnt="true" href="" data-widget-id="<?php echo $this->config->get('twitter_username'); ?>"></a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore (js,fjs);}}(document,"script","twitter-wjs");</script>
	  		</div>     
        </div>
        <?php } ?>

        <?php if ($this->config->get('custom_footer_column_status') == '1') {
        ?>  
        <div class="grid_<?php
             echo 12 / ($this->config->get('custom_footer_column_status')+$this->config->get('facebook_status')+$this->config->get('twitter_column_status'));
             ?>">  
            <h3><?php echo $this->config->get('custom_header_text'); ?></h3>
            <p class="abou"><?php echo html_entity_decode($this->config->get('custom_columndescription')); ?></p>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>

<div id="footerouter">
    <div id="footer">
        <?php if ($informations) { ?>
        <div class="column">
            <h3><?php echo $text_information; ?></h3>
            <ul>
                <?php foreach ($informations as $information) { ?>
                <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>
        <div class="column">
            <h3><?php echo $text_service; ?></h3>
            <ul>
                <li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
                <li><a href="http://www.beautycenter-billstedt.de/store/<?php echo htmlentities("Bezahlmöglichkeiten"); ?>"><?php echo htmlentities("Bezahlmöglichkeiten"); ?></a></li>
                <li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
            </ul>
        </div>
        <div class="column">
            <h3><?php echo $text_extra; ?></h3>
            <ul>
                <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
               <li><a href="http://www.beautycenter-billstedt.de/store/Kooperationspartner">Kooperationspartner</a></li>
                <li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
               <li><a href="http://www.beautycenter-billstedt.de/store/Job_Angebote">Job Angebote</a></li>
            </ul>
        </div>
        <div class="column">
            <h3><?php echo $text_account; ?></h3>
            <ul>
                <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
                <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
                <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
                <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
            </ul>
        </div>
       <div class="column-store">
<?php if($this->config->get('contact_status') == "1") { ?>
            <h3>Our Store</h3>
            <ul>
                <li><span class="store-icon"><?php echo $this->config->get('store_name');?></span></li>
                <li><span class="location-icon"><?php echo $this->config->get('store_address');?></span></li>
                <li><span class="phone-icon"><?php echo $this->config->get('store_phone');?></span></li>
                <li><span class="mail-icon"><a href="mailto:<?php echo $this->config->get('store_email');?>"><?php echo $this->config->get('store_email');?></a></span></li>
            </ul>
<?php } ?>
        </div>
        <div class="column-social">
            <ul class="social-icons">
                <li>
                    <?php if ($this->config->get('socialnetworkicons_footer_facebook_show') == "1") { ?>
                    <a href="<?php echo $this->config->get('socialnetworkicons_footer_facebook');?>" target="_blank"><span class="facebook-icon">&nbsp;</span></a>
                    <?php } ?>
                </li>
                <li>
                    <?php if ($this->config->get('socialnetworkicons_footer_twitter_show') == "1") { ?>
                    <a href="<?php echo $this->config->get('socialnetworkicons_footer_twitter');?>" target="_blank"> <span class="twitter-icon">&nbsp;</span> </a>
                    <?php } ?>
                </li>
                <li>
                    <?php if ($this->config->get('socialnetworkicons_footer_pinterest_show') == "1") { ?>
                    <a href="<?php echo $this->config->get('socialnetworkicons_footer_pinterest');?>" target="_blank"> <span class="pinterst-icon">&nbsp;</span> </a>
                    <?php } ?>
                </li>
                <li>
                    <?php if ($this->config->get('socialnetworkicons_footer_gplus_show') == "1") { ?>
                    <a href="<?php echo $this->config->get('socialnetworkicons_footer_gplus');?>" target="_blank"> <span class="gplus-icon">&nbsp;</span> </a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
<div id="poweredouter">
    <div id="powered"><?php echo $powered; ?>
        <div class="powered-alignright">
            <?php if ($this->config->get('payment_status') == '1' ) { ?>
            <?php if ($this->config->get('checkout_show') == "1") { ?>
            <a href="<?php echo $this->config->get('checkout');?>"><span class="paymentfooter checkouts"></span></a>
            <?php } ?>
            <?php if ($this->config->get('amex_show') == "1") { ?>
            <a href="<?php echo $this->config->get('amex');?>"><span class="paymentfooter amex"></span></a>
            <?php } ?>
            <?php if ($this->config->get('cirrus_show') == "1") { ?>
            <a href="<?php echo $this->config->get('cirrus');?>"><span class="paymentfooter cirrus"></span></a>
            <?php } ?>
            <?php if ($this->config->get('delta_show') == "1") { ?>
            <a href="<?php echo $this->config->get('delta');?>"><span class="paymentfooter delta"></span></a>
            <?php } ?>
            <?php if ($this->config->get('directdebit_show') == "1") { ?>
            <a href="<?php echo $this->config->get('directdebit');?>"><span class="paymentfooter direct-debit"></span></a>
            <?php } ?>
            <?php if ($this->config->get('discover_show') == "1") { ?>
            <a href="<?php echo $this->config->get('discover');?>"><span class="paymentfooter discover"></span></a>
            <?php } ?>
            <?php if ($this->config->get('ebay_show') == "1") { ?>
            <a href="<?php echo $this->config->get('ebay');?>"><span class="paymentfooter ebay"></span></a>
            <?php } ?>
            <?php if ($this->config->get('google_show') == "1") { ?>
            <a href="<?php echo $this->config->get('google');?>"><span class="paymentfooter google"></span></a>
            <?php } ?>
            <?php if ($this->config->get('maestro_show') == "1") { ?>
            <a href="<?php echo $this->config->get('maestro');?>"><span class="paymentfooter maestro"></span></a>
            <?php } ?>
            <?php if ($this->config->get('mastercard_show') == "1") { ?>
            <a href="<?php echo $this->config->get('mastercard');?>"><span class="paymentfooter mastercard"></span></a>
            <?php } ?>
            <?php if ($this->config->get('moneybookers_show') == "1") { ?>
            <a href="<?php echo $this->config->get('moneybookers');?>"><span class="paymentfooter moneybookers"></span></a>
            <?php } ?>
            <?php if ($this->config->get('paypal_show') == "1") { ?>
            <a href="<?php echo $this->config->get('paypal');?>"><span class="paymentfooter paypal"></span></a>
            <?php } ?>
            <?php if ($this->config->get('sagepay_show') == "1") { ?>
            <a href="<?php echo $this->config->get('sagepay');?>"><span class="paymentfooter sagepay"></span></a>
            <?php } ?>
            <?php if ($this->config->get('solo_show') == "1") { ?>
            <a href="<?php echo $this->config->get('solo');?>"><span class="paymentfooter solo"></span></a>
            <?php } ?>
            <?php if ($this->config->get('switch_show') == "1") { ?>
            <a href="<?php echo $this->config->get('switch');?>"><span class="paymentfooter switch"></span></a>
            <?php } ?>
            <?php if ($this->config->get('visaelectron_show') == "1") { ?>
            <a href="<?php echo $this->config->get('visaelectron');?>"><span class="paymentfooter visa-electron"></span></a>
            <?php } ?>
            <?php if ($this->config->get('visa_show') == "1") { ?>
            <a href="<?php echo $this->config->get('visa');?>"><span class="paymentfooter visa"></span></a>
            <?php } ?>
            <?php if ($this->config->get('westernunion_show') == "1") { ?>
            <a href="<?php echo $this->config->get('westernunion');?>"><span class="paymentfooter western-union"></span></a>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
<script type="text/javascript">
//Following function should be called at the end of the page:
imagerollover()
</script>
</body></html>

<script type="text/javascript">$(document).ready(function() { if(typeof display == 'function') { display('grid'); } });</script>