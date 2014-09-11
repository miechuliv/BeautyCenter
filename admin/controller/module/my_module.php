<?php

class ControllerModuleMyModule extends Controller {

    private $error = array();

    public function index() {
        //Load the language file for this module
        $this->load->language('module/my_module');

        //Set the title from the language file $_['heading_title'] string
        $this->document->setTitle($this->language->get('heading_title'));
        $this->document->addStyle('view/stylesheet/stylecustom.css');
        //Load the settings model. You can also add any other models you want to load here.
        $this->load->model('setting/setting');

        $this->load->model('tool/image');

        if (isset($this->request->post['about_us_image'])) {
            $this->data['about_us_image'] = $this->request->post['about_us_image'];
            $about_us_image = $this->request->post['about_us_image'];
        } else {
            $this->data['about_us_image'] = 'fdd';
        }

        //Save the settings if the user has submitted the admin form (ie if someone has pressed save).
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('my_module', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
        }


        //This is how the language gets pulled through from the language file.
        //
		// If you want to use any extra language items - ie extra text on your admin page for any reason,
        // then just add an extra line to the $text_strings array with the name you want to call the extra text,
        // then add the same named item to the $_[] array in the language file.
        //
		// 'my_module_example' is added here as an example of how to add - see admin/language/english/module/my_module.php for the
        // other required part.
        $this->data['heading_title'] = $this->language->get('heading_title');
        $this->data['button_save'] = $this->language->get('button_save');
        $this->data['button_cancel'] = $this->language->get('button_cancel');
        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');
        $this->data['text_status'] = $this->language->get('fp_status');
        $this->data['entry_status'] = $this->language->get('entry_status');
        $this->data['social_status'] = $this->language->get('social_status');
        $this->data['socialnetworkicons_footer_facebook'] = $this->language->get('socialnetworkicons_footer_facebook');
        $this->data['socialnetworkicons_footer_facebook_show'] = $this->language->get('socialnetworkicons_footer_facebook_show');
        $this->data['socialnetworkicons_footer_twitter'] = $this->language->get('socialnetworkicons_footer_twitter');
        $this->data['socialnetworkicons_footer_twitter_show'] = $this->language->get('socialnetworkicons_footer_twitter_show');
        $this->data['socialnetworkicons_footer_pinterest'] = $this->language->get('socialnetworkicons_footer_pinterest');
        $this->data['socialnetworkicons_footer_pinterest_show'] = $this->language->get('socialnetworkicons_footer_pinterest_show');
        $this->data['socialnetworkicons_footer_gplus'] = $this->language->get('socialnetworkicons_footer_gplus');
        $this->data['socialnetworkicons_footer_gplus_show'] = $this->language->get('socialnetworkicons_footer_gplus_show');

        $this->data['text_contact_status'] = $this->language->get('contact_status');
        $this->data['text_contact_us'] = $this->language->get('contact_us');
        $this->data['text_store_name'] = $this->language->get('store_name');
        $this->data['text_store_address'] = $this->language->get('store_address');
        $this->data['text_store_phone'] = $this->language->get('store_phone');
        $this->data['text_store_email'] = $this->language->get('store_email');

        $this->data['payment_status'] = $this->language->get('payment_status');
        $this->data['text_checkout'] = $this->language->get('checkout');
        $this->data['text_checkout_show'] = $this->language->get('checkout_show');
        $this->data['text_amex'] = $this->language->get('amex');
        $this->data['text_amex_show'] = $this->language->get('amex_show');
        $this->data['text_cirrus'] = $this->language->get('cirrus');
        $this->data['text_cirrus_show'] = $this->language->get('cirrus_show');
        $this->data['text_delta'] = $this->language->get('delta');
        $this->data['text_delta_show'] = $this->language->get('delta_show');
        $this->data['text_directdebit'] = $this->language->get('directdebit');
        $this->data['text_directdebit_show'] = $this->language->get('directdebit_show');
        $this->data['text_discover'] = $this->language->get('discover');
        $this->data['text_discover_show'] = $this->language->get('discover_show');
        $this->data['text_ebay'] = $this->language->get('ebay');
        $this->data['text_ebay_show'] = $this->language->get('ebay_show');
        $this->data['text_google'] = $this->language->get('google');
        $this->data['text_google_show'] = $this->language->get('google_show');
        $this->data['text_maestro'] = $this->language->get('maestro');
        $this->data['text_maestro_show'] = $this->language->get('maestro_show');
        $this->data['text_mastercard'] = $this->language->get('mastercard');
        $this->data['text_mastercard_show'] = $this->language->get('mastercard_show');
        $this->data['text_moneybookers'] = $this->language->get('moneybookers');
        $this->data['text_moneybookers_show'] = $this->language->get('moneybookers_show');
        $this->data['text_paypal'] = $this->language->get('paypal');
        $this->data['text_paypal_show'] = $this->language->get('paypal_show');
        $this->data['text_sagepay'] = $this->language->get('sagepay');
        $this->data['text_sagepay_show'] = $this->language->get('sagepay_show');
        $this->data['text_solo'] = $this->language->get('solo');
        $this->data['text_solo_show'] = $this->language->get('solo_show');
        $this->data['text_switch'] = $this->language->get('switch');
        $this->data['text_switch_show'] = $this->language->get('switch_show');
        $this->data['text_visaelectron'] = $this->language->get('visaelectron');
        $this->data['text_visaelectron_show'] = $this->language->get('visaelectron_show');
        $this->data['text_visa'] = $this->language->get('visa');
        $this->data['text_visa_show'] = $this->language->get('visa_show');
        $this->data['text_westernunion'] = $this->language->get('westernunion');
        $this->data['text_westernunion_show'] = $this->language->get('westernunion_show');


        $this->data['text_twitter_column_status'] = $this->language->get('twitter_column_status');
        $this->data['text_twitter_column_header'] = $this->language->get('twitter_column_header');
        $this->data['text_twitter_number_of_tweets'] = $this->language->get('twitter_number_of_tweets');
        $this->data['text_twitter_username'] = $this->language->get('twitter_username');
        $this->data['text_facebook_link'] = $this->language->get('facebook_link');
        $this->data['text_custom_columnheader'] = $this->language->get('custom_columnheader');
        $this->data['text_custom_columndescription'] = $this->language->get('custom_columndescription');


        $this->data['text_socialfeeds_status'] = $this->language->get('socialfeeds_status');

        $this->data['text_googlemap_status'] = $this->language->get('googlemap_status');
        $this->data['text_googlemap_code'] = $this->language->get('googlemap_code');

        //END LANGUAGE
        //The following code pulls in the required data from either config files or user
        //submitted data (when the user presses save in admin). Add any extra config data
        // you want to store.
        //
		// NOTE: These must have the same names as the form data in your my_module.tpl file
        //
		
	
		//This creates an error message. The error['warning'] variable is set by the call to function validate() in this controller (below)
        if (isset($this->error['warning'])) {
            $this->data['error_warning'] = $this->error['warning'];
        } else {
            $this->data['error_warning'] = '';
        }

        //SET UP BREADCRUMB TRAIL. YOU WILL NOT NEED TO MODIFY THIS UNLESS YOU CHANGE YOUR MODULE NAME.
        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_module'),
            'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('module/my_module', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $this->data['action'] = $this->url->link('module/my_module', 'token=' . $this->session->data['token'], 'SSL');

        $this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

        //This code handles the situation where you have multiple instances of this module, for different layouts.
        $this->data['modules'] = array();

        if (isset($this->request->post['my_module_module'])) {
            $this->data['modules'] = $this->request->post['my_module_module'];
        } elseif ($this->config->get('my_module_module')) {
            $this->data['modules'] = $this->config->get('my_module_module');
        }


        $config_data = array(
            'status',
            'social_status',
            'socialnetworkicons_footer_facebook',
            'socialnetworkicons_footer_facebook_show',
            'socialnetworkicons_footer_twitter',
            'socialnetworkicons_footer_twitter_show',
            'socialnetworkicons_footer_pinterest',
            'socialnetworkicons_footer_pinterest_show',
            'socialnetworkicons_footer_gplus',
            'socialnetworkicons_footer_gplus_show',
            'contact_status',
            'contact_us',
            'store_name',
            'store_address',
            'store_phone',
            'store_email',
            'payment_status',
            'checkout',
            'checkout_show',
            'amex',
            'amex_show',
            'cirrus',
            'cirrus_show',
            'delta',
            'delta_show',
            'directdebit',
            'directdebit_show',
            'discover',
            'discover_show',
            'ebay',
            'ebay_show',
            'google',
            'google_show',
            'maestro',
            'maestro_show',
            'mastercard',
            'mastercard_show',
            'moneybookers',
            'moneybookers_show',
            'paypal',
            'paypal_show',
            'sagepay',
            'sagepay_show',
            'solo',
            'solo_show',
            'switch',
            'switch_show',
            'visaelectron',
            'visaelectron_show',
            'visa',
            'visa_show',
            'westernunion',
            'westernunion_show',
            'twitter_column_status',
            'twitter_column_header',
            'twitter_number_of_tweets',
            'twitter_username',
            'facebook_link',
            'custom_header_text',
            'custom_columndescription',
            'googlemap_status',
            'googlemap_code',
            'about_us_image',
            'about_us_image_status',
            'about_us_image_preview',
            'bg_image_position',
            'bg_image_repeat',
            'bg_image_attachment',
            'fp_body_color',
            'socialfeeds_status',
            'facebook_status',
            'custom_footer_column_status'
        );

        foreach ($config_data as $conf) {
            if (isset($this->request->post[$conf])) {
                $this->data[$conf] = $this->request->post[$conf];
            } else {
                $this->data[$conf] = $this->config->get($conf);
            }
        }

        if (isset($this->data['about_us_image']) && file_exists(DIR_IMAGE . $this->data['about_us_image'])) {
            $this->data['about_us_image_preview'] = $this->model_tool_image->resize($this->data['about_us_image'], 70, 70);
        } else {
            $this->data['about_us_image_preview'] = $this->model_tool_image->resize('no_image.jpg', 50, 70);
        }
        $this->load->model('design/layout');

        $this->data['layouts'] = $this->model_design_layout->getLayouts();

        //Choose which template file will be used to display this request.
        $this->template = 'module/my_module.tpl';
        $this->children = array(
            'common/header',
            'common/footer',
        );

        //Send the output.
        $this->response->setOutput($this->render());
    }

    /*
     * 
     * This function is called to ensure that the settings chosen by the admin user are allowed/valid.
     * You can add checks in here of your own.
     * 
     */

    private function validate() {
        if (!$this->user->hasPermission('modify', 'module/my_module')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->error) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>