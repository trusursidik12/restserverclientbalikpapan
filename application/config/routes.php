<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// $route['ajax/get/aqmsdata2']				= 'ajax/get_ajax2';
$route['ajax/get/aqmsispu']				= 'ajax/get_ajax_ispu';
$route['ajax/get/aqmsdata']				= 'ajax/get_ajax_data';

$route['api/get/aqmsdata/bb']			= 'api/aqmsbalikpapanbbdata';
$route['api/get/aqmsispu/bb']			= 'api/aqmsbalikpapanbbispu';
$route['api/get/aqmsdata/pb']			= 'api/aqmsbalikpapanpbdata';
$route['api/get/aqmsispu/pb']			= 'api/aqmsbalikpapanpbispu';

$route['api/add/aqmsdata']				= 'aqmsdata/aqms';

$route['default_controller']			= 'api';
$route['404_override']					= '';
$route['translate_uri_dashes']			= FALSE;
