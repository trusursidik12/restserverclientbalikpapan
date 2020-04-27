<?php
use chriskacerguis\RestServer\RestController;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Cemsdata extends RestController {

    public function __construct()
    {
    	parent::__construct();
    }

    public function aqms_post()
    {
        if($this->aqms_m->add_aqms_data() > 0){
            $this->response([
                    'status'    => true,
                    'data'      => 'Data Berhasil Ditambah'
                ], 200);
        }else{
            $this->response([
                    'status'    => false,
                    'message'   => 'Data Tidak Ditemukan'
                ], 404);
        }
    }


}
