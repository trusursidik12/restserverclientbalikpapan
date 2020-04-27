<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "OPTIONS") {
		die();
		}
	}

	public function get_ajax() {
        $list = $this->ajax_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $aqms) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $aqms->id_stasiun;
            $row[] = $aqms->waktu;
            $row[] = $aqms->pm25;
            $row[] = $aqms->so2;
            $row[] = $aqms->no2;
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->ajax_m->count_all(),
                    "recordsFiltered" => $this->ajax_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
}