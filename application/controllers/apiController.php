
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class apiController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('users_model');
        $this->load->helper('api');
    }

    public function new_api()
    {
        // Get the access token from the session
        $access_token_bearer = $this->session->userdata('access_token');
        $access_token = get_access_token();

        if (isset($access_token)) {
            // Use $access_token for further API requests

            $url = 'https://apis-sandbox.fedex.com/ship/v1/shipments';
            $method = 'POST';
            $headers = array(
                'Authorization: Bearer ' . $access_token_bearer['access_token'],
                'X-locale: en_US',
                'Content-Type: application/json'
            );

            // Prepare the payload as an array
            $payload = array(
                "mergeLabelDocOption" => "LABELS_AND_DOCS",
                "requestedShipment" => array(
                    "labelResponseOptions" => "URL_ONLY",
                    "accountNumber" => array(
                        // Fill in the necessary account details
                    ),
                    "shipAction" => "CONFIRM",
                    "processingOptionType" => "SYNCHRONOUS_ONLY",
                    "oneLabelAtATime" => false
                )
            );

            // Convert the payload array to JSON
            $payload_json = json_encode($payload);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_json); // Use JSON-encoded payload
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $error = curl_error($ch);

            curl_close($ch);

            if ($error) {
                echo 'cURL error: ' . $error;
            } else {
                echo $response;
            }
        } else {
            // Access token not found in the session, handle the error accordingly
            echo "Error: Access token not found in the session.";
        }
    }

}
