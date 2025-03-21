<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php';
use GuzzleHttp\Client;

class ShipmentAPI {
    private $api_url = 'https://api.ship24.com/public/v1/tracking/search';
    private $api_key = 'apik_u8V3IRbZZL29gRaAsKAF4tPcNOS94j';

    public function trackShipment($trackingNumber) {
        $client = new Client();
        
        try {
            $response = $client->request('POST', $this->api_url, [
                'body' => json_encode(['trackingNumber' => $trackingNumber]),
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => $this->api_key,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
