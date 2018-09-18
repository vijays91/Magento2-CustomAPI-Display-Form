<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Vijay_Customapi
 */
namespace Vijay\Customapi\Model\Requests;

class Api extends \Magento\Framework\Model\AbstractModel
{

    const API_URL   = 'https://reqres.in/api/users/';

    protected $helper;
    protected $messageManager;

    public function __construct(
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Vijay\Customapi\Helper\Data $helper
    ) {
        $this->messageManager = $messageManager;
        $this->helper = $helper;
    }

    /*
     *
     */
    public function getUserInfo() {
        $response = "";
        $user_id = $this->helper->customapi_user_id();
        $request_url = self::API_URL.$user_id;
        /*- Via file_get_contents -*/
        // $response = file_get_contents($request_url);
        // $response = (json_decode($response, true));
        // print_r($response);
        /*- Via file_get_contents -*/
        
        /*- Via Curl -*/
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result, true);
        // print_r($response);
        /*- Via Curl -*/
        return $response;
    }
}