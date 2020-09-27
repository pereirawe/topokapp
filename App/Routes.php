<?php
header("Access-Control-Allow-Origin: *");
error_reporting(1);
ini_set('display_errors', 1);

class Route{

    public function __construct(){

        $this->request = substr($_SERVER['REQUEST_URI'],1);

        require_once 'Views/index.php';

        if ($this->request == 'login') {
            echo 'ME VOY PAL CARAJO!'; die;
        }

        // if ($this->request == '') {
        // }
        // print_r($this); die;

        // TODO:

        // $arUrlParams = array (
        //     'country',
        //     'service',
        //     'method',
        //     'id',
        //     'params'
        // );

        // $arRequest = explode("/", $this->request);

        // if (isset($arRequest[1])) {
        //     $this->country = $arRequest[1];
        // }
        // if (isset($arRequest[2])) {
        //     $this->service = $arRequest[2];
        // }
        // if (isset($arRequest[3]) ) {
        //     if ($arRequest[3] != null) {
        //         $this->method = $arRequest[3];
        //     }
        // }
        // if (isset($arRequest[4]) ) {
        //     if ($arRequest[4] != null) {
        //         $this->id = $arRequest[4];
        //     }
        // }
        // if (isset($arRequest[5]) ) {
        //     if ($arRequest[5] != null) {
        //         $this->params = $arRequest[5];
        //     }
        // }

        // $token = 'GoodBless';
        // $iv = "topokapp@2020-*2020";
        // $pass = '249eca82';
        // $method = 'aes-128-cbc';

        // SECURITY
        // $this->token = bin2hex(openssl_encrypt($token, $method, $pass, true, $iv ));
        // $this->tokenDe = openssl_decrypt( hex2bin($this->tokenEn), $this->method, $this->pass, true, $this->iv );
    }

    public function listen(){
        switch ($this->request) {
            case '':
                http_response_code(200);
                echo 'Hola';
                require './Views/index.php';
                break;


            case 'API/'.$this->country.'/PDF/'.$this->method.'/':
                $category = $this->method;
                require './Services/PDF/index.php';
                break;

            case 'API/'.$this->country.'/EXCEL/'.$this->method.'/':
                echo "jol";
                require './Services/EXCEL/index.php';
                break;

            case 'API/'.$this->country.'/'. $this->service.'/':
                $service = $this->service;
                $controller = $service.'Controller.php';
                $class = $service.'Controller';
                $method = 'index';
                require './Services/'. $service.'/'. $controller;
                $response = new $class;
                http_response_code(200);
                return $response->$method();
                break;

            case 'API/'.$this->country.'/'. $this->service.'/'. $this->method.'/':
                $service = $this->service;
                $controller = $service.'Controller.php';
                $class = $service.'Controller';
                $method = $this->method;
                require './Services/'. $service.'/'. $controller;
                $response = new $class;
                http_response_code(200);
                return $response->$method();
                break;

            case 'API/'.$this->country.'/'. $this->service.'/'. $this->method.'/'. $this->id.'/':
                $service = $this->service;
                $controller = $service.'Controller.php';
                $class = $service.'Controller';
                $method = $this->method;
                $id = $this->id;
                require './Services/'. $service.'/'. $controller;
                $response = new $class;
                http_response_code(200);
                return $response->$method($id);
                break;

            default:
                http_response_code(404);
                // echo 'Error: API/ven/'.$this->service ;
                require './Views/404.php';
                break;
        }
    }

}