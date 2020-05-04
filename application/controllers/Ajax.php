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

	// public function get_ajax2() {
 //        $list = $this->ajax_m->get_datatables();
 //        $data = array();
 //        $no = @$_POST['start'];
 //        foreach ($list as $aqms) {
 //            $no++;
 //            $row = array();
 //            $row[] = $no.".";
 //            $row[] = $aqms->id_stasiun;
 //            $row[] = $aqms->waktu;
 //            $row[] = $aqms->pm25;
 //            $row[] = $aqms->so2;
 //            $row[] = $aqms->no2;
 //            $data[] = $row;
 //        }
 //        $output = array(
 //                    "draw" => @$_POST['draw'],
 //                    "recordsTotal" => $this->ajax_m->count_all(),
 //                    "recordsFiltered" => $this->ajax_m->count_filtered(),
 //                    "data" => $data,
 //                );
 //        // output to json format
 //        echo json_encode($output);
 //    }

    public function get_ajax_data() {
        
        $from = $this->input->post('from');
        $to = $this->input->post('to');

        if($from!='' && $to!='')
        {
            $from = date('Y-m-d',strtotime($from));
            $to = date('Y-m-d',strtotime($to));
        }

        $list = $this->ajax_m->get_datatables_aqmdata($from,$to);
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $aqmdata) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $aqmdata->id_stasiun;
            $row[] = $aqmdata->waktu;
            $row[] = $aqmdata->pm25;
            $row[] = $aqmdata->so2;
            $row[] = $aqmdata->no2;
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->ajax_m->count_all_aqmdata(),
                    "recordsFiltered" => $this->ajax_m->count_filtered_aqmdata($from,$to),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    public function get_ajax_ispu() {
        
        $from = $this->input->post('from');
        $to = $this->input->post('to');

        if($from!='' && $to!='')
        {
            $from = date('Y-m-d',strtotime($from));
            $to = date('Y-m-d',strtotime($to));
        }

        $list = $this->ajax_m->get_datatables_aqmispu($from,$to);
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $aqmdata) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $aqmdata->id_stasiun;
            $row[] = $aqmdata->waktu;
            $row[] = $aqmdata->pm25;
            $row[] = $aqmdata->so2;
            $row[] = $aqmdata->no2;
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->ajax_m->count_all_aqmispu(),
                    "recordsFiltered" => $this->ajax_m->count_filtered_aqmispu($from,$to),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
}