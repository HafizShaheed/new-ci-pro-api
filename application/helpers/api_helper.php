<?php
defined('BASEPATH') or exit('No direct script access allowed');

function get_access_token()
{
    $endpoint = 'https://apis-sandbox.fedex.com/oauth/token';
    $client_id = 'l7e8cc3aa3e4314bdb8ba4cc2b08825808';
    $client_secret = 'd91d54dde43d4865a06d73c527fd98cb';
    $grant_type = 'client_credentials';

    $data = array(
        'grant_type' => $grant_type,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $error = curl_error($ch);


    curl_close($ch);

    if ($error) {
        throw new Exception('cURL error: ' . $error);
    }

    $json_response = json_decode($response, true);
	// print_r($json_response);
	// die;
    if ($json_response === null) {
        throw new Exception('Invalid JSON response received.');
    }

    if (isset($json_response['access_token']) && isset($json_response['token_type']) && isset($json_response['expires_in'])) {
        $CI =& get_instance();
        $CI->session->set_userdata('access_token', $json_response);
        return $json_response;
    } elseif ($json_response['errors']) {
        return $json_response;
	} else {
        throw new Exception('Required fields not found in response.');
    }

    return false;
}

