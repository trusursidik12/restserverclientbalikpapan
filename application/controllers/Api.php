<?php
use chriskacerguis\RestServer\RestController;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Api extends RestController {

    public function __construct()
    {
    	parent::__construct();
    }

	public function aqmsBalikpapanBBData_get()
	{

		$id = $this->get('id');

		if ($id === null) {
			$data = $this->aqms_m->get_balikpapan_bb_data();
		} else {
			$data = $this->aqms_m->get_balikpapan_bb_data($id);
		}

		if ($data) {
			$this->response([
                    'status' 	=> true,
                    'data' 		=> $data
                ], 200);
		} else {
			$this->response([
                    'status' 	=> false,
                    'message' 	=> 'Data Tidak Ditemukan'
                ], 404);
		}
	}

	public function aqmsBalikpapanBBIspu_get()
	{

		$id = $this->get('id');

		if ($id === null) {
			$data = $this->aqms_m->get_balikpapan_bb_ispu();
		} else {
			$data = $this->aqms_m->get_balikpapan_bb_ispu($id);
		}

		if ($data) {
			$this->response([
                    'status' 	=> true,
                    'data' 		=> $data
                ], 200);
		} else {
			$this->response([
                    'status' 	=> false,
                    'message' 	=> 'Data Tidak Ditemukan'
                ], 404);
		}
	}

	public function aqmsBalikpapanPBData_get()
	{

		$id = $this->get('id');

		if ($id === null) {
			$data = $this->aqms_m->get_balikpapan_pb_data();
		} else {
			$data = $this->aqms_m->get_balikpapan_pb_data($id);
		}

		if ($data) {
			$this->response([
                    'status' 	=> true,
                    'data' 		=> $data
                ], 200);
		} else {
			$this->response([
                    'status' 	=> false,
                    'message' 	=> 'Data Tidak Ditemukan'
                ], 404);
		}
	}

	public function aqmsBalikpapanPBIspu_get()
	{

		$id = $this->get('id');

		if ($id === null) {
			$data = $this->aqms_m->get_balikpapan_pb_ispu();
		} else {
			$data = $this->aqms_m->get_balikpapan_pb_ispu($id);
		}

		if ($data) {
			$this->response([
                    'status' 	=> true,
                    'data' 		=> $data
                ], 200);
		} else {
			$this->response([
                    'status' 	=> false,
                    'message' 	=> 'Data Tidak Ditemukan'
                ], 404);
		}
	}
}
