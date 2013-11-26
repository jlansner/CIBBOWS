<?php
class AuthorizeNetComponent extends Object {
    var $name = "AuthorizeNet";
    var $version;
    var $login;
    var $tran_key;
    var $url;

    function initialize(&$controller, $settings = array()) {
        $this->controller =& $controller;
        
        $this->version = $settings['version'];
        $this->login = $settings['login'];
        $this->tran_key = $settings['tran_key'];
        $this->url = $settings['url'];
    }

    function charge($modelClass, $data = array()) {
        $post_values = array(
            "x_login" => $this->username,
            "x_tran_key" => $this->tran_key,
            "x_version" => $this->version,
            "x_delim_data" => "TRUE",
            "x_delim_char" => "|",
            "x_relay_response" => "FALSE",
            "x_type" => "AUTH_CAPTURE",
            "x_method" => "CC",
            "x_card_num" => $data[$modelClass]['cc_number'],
            "x_exp_date" => $data[$modelClass]['cc_month'].$data[$modelClass]['cc_year'],
            "x_amount" => $data[$modelClass]['amount'],
            "x_description" => "Subscription",
            "x_first_name" => $data[$modelClass]['first_name'],
            "x_last_name" => $data[$modelClass]['last_name'],
            "x_address" => $data[$modelClass]['address'],
            "x_state" => $data[$modelClass]['state'],
            "x_zip" => $data[$modelClass]['zipcode']
        );

        $post_string = null;
        foreach($post_values as $key => $value) {
            $post_string .= "$key=".urlencode($value)."&";
        }
        
        $post_string = substr($post_string, 0, strlen($post_string) - 1);
        
        $request = curl_init($this->url);
        curl_setopt($request, CURLOPT_HEADER, 0);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($request, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
        $post_response = curl_exec($request);
        curl_close($request);
        $response_array = explode($post_values["x_delim_char"], $post_response);
        return $response_array;
    }
}