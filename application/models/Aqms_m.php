<?php

class Aqms_m extends CI_Model
{

	public function get_balikpapan_bb_data($id = FALSE)
	{
		if($id === FALSE){
			$this->db->order_by('id', 'DESC');
			$this->db->where('id_stasiun', 'BALIKPAPAN_BB');
			$this->db->limit('1');
			$query = $this->db->get('bp_data');
			return $query->result_array();
		}
		$query = $this->db->get_where('bp_data', array('id' => $id));
		return $query->row_array();
	}

	public function get_balikpapan_bb_ispu($id = FALSE)
	{
		if($id === FALSE){
			$this->db->order_by('id', 'DESC');
			$this->db->where('id_stasiun', 'BALIKPAPAN_BB');
			$this->db->limit('1');
			$query = $this->db->get('bp_ispu');
			return $query->result_array();
		}
		$query = $this->db->get_where('bp_ispu', array('id' => $id));
		return $query->row_array();
	}

	public function get_balikpapan_pb_data($id = FALSE)
	{
		if($id === FALSE){
			$this->db->order_by('id', 'DESC');
			$this->db->where('id_stasiun', 'BALIKPAPAN_PB');
			$this->db->limit('1');
			$query = $this->db->get('bp_data');
			return $query->result_array();
		}
		$query = $this->db->get_where('bp_data', array('id' => $id));
		return $query->row_array();
	}

	public function get_balikpapan_pb_ispu($id = FALSE)
	{
		if($id === FALSE){
			$this->db->order_by('id', 'DESC');
			$this->db->where('id_stasiun', 'BALIKPAPAN_PB');
			$this->db->limit('1');
			$query = $this->db->get('bp_ispu');
			return $query->result_array();
		}
		$query = $this->db->get_where('bp_ispu', array('id' => $id));
		return $query->row_array();
	}

	public function add_aqms_data()
	{
		date_default_timezone_set("Asia/Bangkok");
		$data = array(
			'id_stasiun' 		=> $this->input->post('id_stasiun'),
			'waktu' 			=> $this->input->post('waktu'),
			'pm25' 				=> $this->input->post('pm25'),
			'so2' 				=> $this->input->post('so2'),
			'no2' 				=> $this->input->post('no2')
		);
		return $this->db->insert('bp_data', $data);
	}
}