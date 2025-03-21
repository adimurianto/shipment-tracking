<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('ShipmentAPI');
    }

    public function index() {
        $this->load->view('tracking_form');
    }

    // public function track() {
    //     $trackingNumber = $this->input->post('tracking_number');

    //     if (!$trackingNumber) {
    //         $this->session->set_flashdata('error', 'Masukkan nomor tracking!');
    //         redirect('tracking');
    //     }

    //     $data['trackingNumber'] = $trackingNumber;
    //     $data['result'] = $this->shipmentapi->trackShipment($trackingNumber);

    //     $this->load->view('tracking_result', $data);
    // }
    public function track() {
        $trackingNumber = $this->input->post('tracking_number');

        if (!$trackingNumber) {
            echo json_encode(['error' => 'Tracking number is required']);
            return;
        }

        $result = $this->shipmentapi->trackShipment($trackingNumber);
        $data['trackingNumber'] = $trackingNumber;
        $data['result'] = $result;
        $res['tracking_result'] = $this->load->view('tracking_result', $data, TRUE);

        echo json_encode($res);
    }
}