<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Fedex {

	private $endpoint = 'https://apis-sandbox.fedex.com';
    private $key;
    private $password;
    private $accountNumber;
    private $meterNumber;


	public function __construct()
    {
        // Load FedEx API credentials from config or any other method you prefer
        $this->key = 'l7856d4c641b1c4a30b273de10fdb02f03';
        $this->password = 'beeef20e978d44fb96b163e8049cb31f';
        $this->accountNumber = 'YOUR_FED_EX_ACCOUNT_NUMBER';
        $this->meterNumber = 'YOUR_FED_EX_METER_NUMBER';
    }



} 
