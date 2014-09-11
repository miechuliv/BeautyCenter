<?php

class ControllerModuleMyModule extends Controller {

    protected function index($setting) {

        $this->load->language('module/my_module');
        $this->data['status'] = $setting['status'];
        $this->data['fp_body_color'] = $setting['fp_body_color'];

        $this->data['fp_header_color'] = $setting['fp_header_color'];
        $this->data['fp_menu_color'] = $setting['fp_menu_color'];
        $this->data['fp_menu_dropdown'] = $setting['fp_menu_dropdown'];
        $this->data['fp_top_header_color'] = $setting['fp_top_header_color'];
        

        $this->data['fp_footer_color'] = $setting['fp_footer_color'];
        $this->data['fp_wishlist_button_color'] = $setting['fp_wishlist_button_color'];
        $this->data['fp_wishlist_button_hover_color'] = $setting['fp_wishlist_button_hover_color'];
        $this->data['fp_compare_button_hover_color'] = $setting['fp_compare_button_hover_color'];
        $this->data['fp_compare_button_color'] = $setting['fp_compare_button_color'];
        $this->data['fp_cart_button_color'] = $setting['fp_cart_button_color'];
        $this->data['fp_cart_button_hover_color'] = $setting['fp_cart_button_hover_color'];
        $this->data['fp_price_bg_colors'] = $setting['fp_price_bg_colors'];
        $this->data['fp_body_bg_pattern'] = $setting['fp_body_bg_pattern'];
        
        $this->data['fp_body_font'] = $setting['fp_body_font'];
        $this->data['fp_body_font_size'] = $setting['fp_body_font_size'];
        $this->data['fp_heading_font'] = $setting['fp_heading_font'];
        $this->data['fp_heading_font_size'] = $setting['fp_heading_font_size'];
        $this->data['fp_heading_font_color'] = $setting['fp_heading_font_color'];
        $this->data['fp_producttitle_font'] = $setting['fp_producttitle_font'];
        $this->data['fp_producttitle_font_size'] = $setting['fp_producttitle_font_size'];
        $this->data['fp_producttitle_font_color'] = $setting['fp_producttitle_font_color'];
        $this->data['fp_oldprice_font'] = $setting['fp_oldprice_font'];
        $this->data['fp_oldprice_font_size'] = $setting['fp_oldprice_font_size'];
        $this->data['fp_oldprice_font_color'] = $setting['fp_oldprice_font_color'];
        $this->data['fp_price_font'] = $setting['fp_price_font'];
        $this->data['fp_price_font_size'] = $setting['fp_price_font_size'];
        $this->data['fp_price_font_color'] = $setting['fp_price_font_color'];
       
        $this->data['fp_footer_font'] = $setting['fp_footer_font'];
        $this->data['fp_footer_font_size'] = $setting['fp_footer_font_size'];
        $this->data['fp_footer_font_color'] = $setting['fp_footer_font_color'];

        $this->data['social_status'] = $setting['social_status'];
        $this->data['socialnetworkicons_footer_facebook'] = $setting['socialnetworkicons_footer_facebook'];
        $this->data['socialnetworkicons_footer_facebook_show'] = $setting['socialnetworkicons_footer_facebook_show'];
        $this->data['socialnetworkicons_footer_twitter'] = $setting['socialnetworkicons_footer_twitter'];
        $this->data['socialnetworkicons_footer_twitter_show'] = $setting['socialnetworkicons_footer_twitter_show'];
        $this->data['socialnetworkicons_footer_pinterest'] = $setting['socialnetworkicons_footer_pinterest'];
        $this->data['socialnetworkicons_footer_pinterest_show'] = $setting['socialnetworkicons_footer_pinterest_show'];
        $this->data['socialnetworkicons_footer_gplus'] = $setting['socialnetworkicons_footer_gplus'];
        $this->data['socialnetworkicons_footer_gplus_show'] = $setting['socialnetworkicons_footer_gplus_show'];
       

       


        $this->render();
    }

}

?>