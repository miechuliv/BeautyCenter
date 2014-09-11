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
            <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
            <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
        </div>
        <div class="content">

            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">




                <div id="settings-tabs" class="htabs">
                    
                    <a href="#tab-pattern"><?php echo "Background"; ?></a>
                    <a href="#tab-social"><?php echo "SocialNetwork Icons"; ?></a>
                    <a href="#tab-payment"><?php echo "Payment Image"; ?></a><a href="#tab-contact"><?php echo "Contact Info"; ?></a><a href="#tab-socialfeeds"><?php echo "Social Feeds"; ?></a><a href="#tab-googlemap"><?php echo "Google Map"; ?></a></div>
                
                <div id="tab-pattern">
                    <table class="form">
                        <tr>
                            <td colspan="9"><?php echo $text_status; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <select name="status">
                                    <?php if ($status){ ?>
                                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                    <option value="0"><?php echo $text_disabled; ?></option>
                                    <?php } else { ?>
                                    <option value="1"><?php echo $text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                    <?php } ?>
                                </select></td><br/>
                        You can enable or disable background pattern from this status option. <br/>
                        You can enable or disable payment,social icons and contact info from their respective tabs.
                        </tr><br/>
                        <tr>
                            <td>Background Color:</td>
                            <td colspan="8"><input class="color" name="fp_body_color" type="text" value="<?php if($this->config->get('fp_body_color') == '') { ?>960864<?php } else { echo $this->config->get('fp_body_color');} ?>" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; default value: 960864 </td>
                        </tr>
                       


                        <tr>
                            <td>Background Image: </br>
                                <?php 
                                if(isset($about_us_image_status) && $about_us_image_status == '1'){
                                ?>
                                <input type="radio"  name="about_us_image_status" value="1" CHECKED/>
                                Yes<br />
                                <input type="radio" name="about_us_image_status" value="0">
                                No
                                <?php 
                                }     else {   ?>
                                <input type="radio"  name="about_us_image_status" value="1" />
                                Yes<br />
                                <input type="radio" name="about_us_image_status" value="0" CHECKED>
                                No
                                <?php   } ?></td>
                            <td><input type="hidden" name="about_us_image" value="<?php echo $about_us_image; ?>" id="about_us_image" />
                                <img src="<?php echo $about_us_image_preview; ?>" alt="" id="about_us_image_preview" class="image" onclick="image_upload('about_us_image', 'about_us_image_preview');" /></td>
                            You can add your own background pattern. 

                            <td>Position:</td>
                            <td>
                                <select name="bg_image_position">
                                    <option value="<?php if (isset($bg_image_position)) {

                                            echo $bg_image_position;
                                            }

                                            ?>">
                                        <?php if (isset($bg_image_position)) {

                                        echo $bg_image_position;
                                        }


                                        ?>
                                    </option>
                                    <option value="top center">Top Center</option>
                                    <option value="top left">Top Left</option>
                                    <option value="top right">Top Right</option>
                                    <option value="center">Center</option>
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                    <option value="bottom center">Bottom Center</option>
                                    <option value="bottom left">Bottom Left</option>
                                    <option value="bottom right">Bottom Right</option>
                                </select>
                            </td>
                            <td>Repeat:</td>
                            <td>
                                <select name="bg_image_repeat">
                                    <option value="<?php if (isset($bg_image_repeat)) {

                                            echo $bg_image_repeat;
                                            }

                                            ?>">
                                        <?php if (isset($bg_image_repeat)) {

                                        echo $bg_image_repeat;
                                        }


                                        ?>
                                    </option>
                                    <option value="repeat">Repeat</option>
                                    <option value="repeat-x">Repeat-x</option>
                                    <option value="repeat-y">Repeat-y</option>
                                    <option value="no-repeat">No repeat</option>
                                </select>
                            </td>
                            <td>Attachment:</td>
                            <td>
                                <select name="bg_image_attachment">
                                    <option value="<?php if (isset($bg_image_attachment)) {

                                            echo $bg_image_attachment;
                                            }

                                            ?>">
                                        <?php if (isset($bg_image_attachment)) {

                                        echo $bg_image_attachment;
                                        }


                                        ?>
                                    </option>
                                    <option value="scroll">Scroll</option>
                                    <option value="fixed">Fixed</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="tab-payment">
                    <table class="form">
                        <tr>
                            <td>Payment Images</td>
                            <td><select name="payment_status">
                                    <?php if ($payment_status){ ?>
                                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                    <option value="0"><?php echo $text_disabled; ?></option>
                                    <?php } else { ?>
                                    <option value="1"><?php echo $text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                    <?php } ?>
                                </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;For the link use complete url: http://www.latestthemes.net</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter checkout"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="checkout" value="<?php echo $this->config->get('checkout'); ?>" size="60" />
                                <input type="checkbox" value="1" name="checkout_show"<?php if($checkout_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter amex"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="amex" value="<?php echo $this->config->get('amex'); ?>" size="60" />
                                <input type="checkbox" value="1" name="amex_show"<?php if($amex_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter cirrus"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cirrus" value="<?php echo $this->config->get('cirrus'); ?>" size="60" />
                                <input type="checkbox" value="1" name="cirrus_show"<?php if($cirrus_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter delta"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="delta" value="<?php echo $this->config->get('delta'); ?>" size="60" />
                                <input type="checkbox" value="1" name="delta_show"<?php if($delta_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter direct-debit"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="directdebit" value="<?php echo $this->config->get('directdebit'); ?>" size="60" />
                                <input type="checkbox" value="1" name="directdebit_show"<?php if($directdebit_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter discover"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="discover" value="<?php echo $this->config->get('discover'); ?>" size="60" />
                                <input type="checkbox" value="1" name="discover_show"<?php if($discover_show == '1') echo ' checked="checked"';?> />
                                       Show</td>

                        </tr>
                        <tr>
                            <td><span class="paymentfooter ebay"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="ebay" value="<?php echo $this->config->get('ebay'); ?>" size="60" />
                                <input type="checkbox" value="1" name="ebay_show"<?php if($ebay_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter google"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="google" value="<?php echo $this->config->get('google'); ?>" size="60" />
                                <input type="checkbox" value="1" name="google_show"<?php if($google_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter maestro"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="maestro" value="<?php echo $this->config->get('maestro'); ?>" size="60" />
                                <input type="checkbox" value="1" name="maestro_show"<?php if($maestro_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter mastercard"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="mastercard" value="<?php echo $this->config->get('mastercard'); ?>" size="60" />
                                <input type="checkbox" value="1" name="mastercard_show"<?php if($mastercard_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter moneybookers"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="moneybookers" value="<?php echo $this->config->get('moneybookers'); ?>" size="60" />
                                <input type="checkbox" value="1" name="moneybookers_show"<?php if($moneybookers_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter paypal"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="paypal" value="<?php echo $this->config->get('paypal'); ?>" size="60" />
                                <input type="checkbox" value="1" name="paypal_show"<?php if($paypal_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter sagepay"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="sagepay" value="<?php echo $this->config->get('sagepay'); ?>" size="60" />
                                <input type="checkbox" value="1" name="sagepay_show"<?php if($sagepay_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter solo"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="solo" value="<?php echo $this->config->get('solo'); ?>" size="60" />
                                <input type="checkbox" value="1" name="solo_show"<?php if($solo_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter switch"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="switch" value="<?php echo $this->config->get('switch'); ?>" size="60" />
                                <input type="checkbox" value="1" name="switch_show"<?php if($switch_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter visa-electron"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="visaelectron" value="<?php echo $this->config->get('visaelectron'); ?>" size="60" />
                                <input type="checkbox" value="1" name="visaelectron_show"<?php if($visaelectron_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter visa"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="visa" value="<?php echo $this->config->get('visa'); ?>" size="60" />
                                <input type="checkbox" value="1" name="visa_show"<?php if($visa_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><span class="paymentfooter western-union"></span></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="westernunion" value="<?php echo $this->config->get('westernunion'); ?>" size="60" />
                                <input type="checkbox" value="1" name="westernunion_show"<?php if($westernunion_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                    </table>
                </div>
                <div id="tab-contact">
                    <table class="form">
                        <tr>
                            <td>Contact Information</td>
                            <td><select name="contact_status">
                                    <?php if ($contact_status){ ?>
                                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                    <option value="0"><?php echo $text_disabled; ?></option>
                                    <?php } else { ?>
                                    <option value="1"><?php echo $text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                    <?php } ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td><?php echo $text_store_name; ?></td>
                            <td><input type="text" name="store_name" value="<?php echo $this->config->get('store_name'); ?>" size="60" /> </td>
                        </tr>
                        <tr>
                            <td><?php echo $text_store_address; ?></td>
                            <td><input type="text" name="store_address" value="<?php echo $this->config->get('store_address'); ?>" size="60" /> </td>
                        </tr>
                        <tr>
                            <td><?php echo $text_store_phone; ?></td>
                            <td><input type="text" name="store_phone" value="<?php echo $this->config->get('store_phone'); ?>" size="60" /> </td>
                        </tr>
                        <tr>
                            <td><?php echo $text_store_email; ?></td>
                            <td><input type="text" name="store_email" value="<?php echo $this->config->get('store_email'); ?>" size="60" /> </td>
                        </tr>
                    </table>
                </div>
                <div id="tab-social">
                    <table class="form">
                        <tr>
                            <td>Social Status</td>
                            <td><select name="social_status">
                                    <?php if ($social_status){ ?>
                                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                    <option value="0"><?php echo $text_disabled; ?></option>
                                    <?php } else { ?>
                                    <option value="1"><?php echo $text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                    <?php } ?>
                                </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;For the link use complete url: http://www.latestthemes.net</td>

                        </tr>
                        <tr>
                            <td><img src="view/image/facebook-footer.png" alt="" /></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="socialnetworkicons_footer_facebook" value="<?php echo $this->config->get('socialnetworkicons_footer_facebook'); ?>" size="60" />
                                <input type="checkbox" value="1" name="socialnetworkicons_footer_facebook_show"<?php if($socialnetworkicons_footer_facebook_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><img src="view/image/twitter-footer.png" alt="" /></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="socialnetworkicons_footer_twitter" value="<?php echo $this->config->get('socialnetworkicons_footer_twitter'); ?>" size="60" />
                                <input type="checkbox" value="1" name="socialnetworkicons_footer_twitter_show"<?php if($socialnetworkicons_footer_twitter_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><img src="view/image/pinterest-footer.png" alt="" /></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="socialnetworkicons_footer_pinterest" value="<?php echo $this->config->get('socialnetworkicons_footer_pinterest'); ?>" size="60" />
                                <input type="checkbox" value="1" name="socialnetworkicons_footer_pinterest_show"<?php if($socialnetworkicons_footer_pinterest_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>
                        <tr>
                            <td><img src="view/image/gplus-footer.png" alt="" /></td>
                            <td>Link:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="socialnetworkicons_footer_gplus" value="<?php echo $this->config->get('socialnetworkicons_footer_gplus'); ?>" size="60" />
                                <input type="checkbox" value="1" name="socialnetworkicons_footer_gplus_show"<?php if($socialnetworkicons_footer_gplus_show == '1') echo ' checked="checked"';?> />
                                       Show</td>
                        </tr>

                    </table>
                </div>

                <div id="tab-googlemap">
                    <table class="form">
                        <tr>
                            <td>Google Map Status</td>
                            <td><select name="googlemap_status">
                                    <?php if ($googlemap_status){ ?>
                                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                    <option value="0"><?php echo $text_disabled; ?></option>
                                    <?php } else { ?>
                                    <option value="1"><?php echo $text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                    <?php } ?>
                                </select></td>

                        </tr>
                        <tr>
                            <td>
                                Google Map Code: (Paste the iframe code of the google map of your place)
                            </td>
                            <td>
                                <textarea name="googlemap_code" rows="10" cols="80"><?php echo $googlemap_code; ?></textarea>
                            </td>
                        </tr>

                    </table>
                </div>



                <div id="tab-socialfeeds">

                    <table class="form">
                        <tr>
                            <td><?php echo $text_socialfeeds_status; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <select name="socialfeeds_status">
                                    <?php if ($socialfeeds_status){ ?>
                                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                    <option value="0"><?php echo $text_disabled; ?></option>
                                    <?php } else { ?>
                                    <option value="1"><?php echo $text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                    <?php } ?>
                                </select></td><br/>
                        You can enable or disable social feed status i.e., facebook fanbox,twitter feeds and custom content. <br/>

                        </tr>
                    </table>
                    <div id="tabs" class="vtabs"><a href="#tab-facebook"><?php echo "Facebook Fanbox"; ?></a>
                        <a href="#tab-twitter"><?php echo "Twitter feeds"; ?></a>
                        <a href="#tab-custom"><?php echo "Custom Content"; ?></a></div>
                    <div id="tab-facebook" class="vtabs-content">
                        <table class="form">

                            <tr>
                                <td>Facebook Column Status</td>
                                <td><select name="facebook_status">
                                        <?php
                                        if ($facebook_status) {
                                        ?>
                                        <option value="1" selected="selected"><?php
                                            echo $text_enabled;
                                            ?></option>
                                        <option value="0"><?php
                                            echo $text_disabled;
                                            ?></option>
                                        <?php
                                        } else {
                                        ?>
                                        <option value="1"><?php
                                            echo $text_enabled;
                                            ?></option>
                                        <option value="0" selected="selected"><?php
                                            echo $text_disabled;
                                            ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select></td>
                            </tr>

                            <tr>
                                <td>
                                    <label style="width: 110px">Facebook Link: </label></td>
                                <td>
                                    <textarea name="facebook_link" rows="1" cols="80"><?php echo $facebook_link; ?></textarea>
                                </td>
                            </tr>


                        </table>
                    </div>
                    <div id="tab-custom" class="vtabs-content">
                        <table class="form">
                            <tr>
                                <td>Custom Footer Column Status</td>
                                <td><select name="custom_footer_column_status">
                                        <?php
                                        if ($custom_footer_column_status) {
                                        ?>
                                        <option value="1" selected="selected"><?php
                                            echo $text_enabled;
                                            ?></option>
                                        <option value="0"><?php
                                            echo $text_disabled;
                                            ?></option>
                                        <?php
                                        } else {
                                        ?>
                                        <option value="1"><?php
                                            echo $text_enabled;
                                            ?></option>
                                        <option value="0" selected="selected"><?php
                                            echo $text_disabled;
                                            ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select></td>
                            </tr>

                            <tr>
                                <td><?php echo "Custom column Header"; ?></td>
                                <td><input type="text" name="custom_header_text" value="<?php echo $this->config->get('custom_header_text'); ?>" size="60" /> </td>
                            </tr>
                            <tr><td>
                                    <label style="width: 110px">Custom Column: </label></td>

                                <td><textarea name="custom_columndescription" rows="10" cols="40"><?php echo $custom_columndescription; ?></textarea></td>
                            </tr>	
                        </table>
                    </div>
                    <div id="tab-twitter" class="vtabs-content">
                        <table class="form">
                            <tr>
                                <td>Twitter Column Status</td>
                                <td><select name="twitter_column_status">
                                        <?php
                                        if ($twitter_column_status) {
                                        ?>
                                        <option value="1" selected="selected"><?php
                                            echo $text_enabled;
                                            ?></option>
                                        <option value="0"><?php
                                            echo $text_disabled;
                                            ?></option>
                                        <?php
                                        } else {
                                        ?>
                                        <option value="1"><?php
                                            echo $text_enabled;
                                            ?></option>
                                        <option value="0" selected="selected"><?php
                                            echo $text_disabled;
                                            ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select></td>
                            </tr>

                            <  <tr><td>
                                    <label style="width: 110px">Twitter Widget Id: </label></td>
                                <td><input type="text" name="twitter_username" value="<?php echo $twitter_username; ?>" /></td>
                            </tr>




                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript"><!--
        $('#settings-tabs a').tabs();
        $('#tabs a').tabs();
        //--></script>
    <script type="text/javascript"><!--
            <?php foreach ($languages as $language) { ?>
            CKEDITOR.replace('description<?php echo $language['language_id']; ?>', {
        filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
        filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
        filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
        filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
        filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
        filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
    });
        <?php } ?>
    //--></script> 
    <script type="text/javascript"><!--
function image_upload(field, preview) {
$('#dialog').remove();
	
$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $this->session->data['token']; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
$('#dialog').dialog({
title: 'Image manager',
close: function (event, ui) {
if ($('#' + field).attr('value')) {
$.ajax({
url: 'index.php?route=common/filemanager/image&token=<?php echo $this->session->data['token']; ?>',
type: 'GET',
data: 'image=' + encodeURIComponent($('#' + field).attr('value')),
dataType: 'text',
success: function(data) {
						
$('#' + preview).replaceWith('<img src="' + data + '" alt="" id="' + preview + '" class="image" onclick="image_upload(\'' + field + '\', \'' + preview + '\');" />');
}
});
}
},	
bgiframe: false,
width: 700,
height: 400,
resizable: false,
modal: false
});
};
//--></script>
    <script type="text/javascript" src="../admin/view/javascript/jscolor.js"></script> 

    <style type="text/css">

    </style>
    <?php echo $footer; ?>