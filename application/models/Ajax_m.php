<?php

class Ajax_m extends CI_Model
{

    // start
    var $table_aqmdata = 'aqm_data'; // define table
    var $column_order_aqmdata = array(null, 'id_stasiun', 'waktu'); //set column field database for datatable orderable
    var $column_search_aqmdata = array('id_stasiun', 'waktu'); //set column field database for datatable searchable
    var $order_aqmdata = array('id' => 'desc'); // default order

    public function get_datatables_aqmdata($from, $to)
    {
        $this->_get_datatables_query_aqmdata($from, $to);
       
        if(@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        
        $query = $this->db->get();
        
        return $query->result();
    }

    public function count_filtered_aqmdata($from, $to)
    {
        $this->_get_datatables_query_aqmdata($from, $to);
       
        $query = $this->db->get();
       
        return $query->num_rows();
    }

    public function count_all_aqmdata()
    {
        $this->db->from($this->table_aqmdata);
        $this->db->where('id_stasiun', 'BALIKPAPAN_PB');
        $this->db->or_where('id_stasiun', 'BALIKPAPAN_BB');
        return $this->db->count_all_results();
    }

    private function _get_datatables_query_aqmdata($from,$to)
    {
        $this->db
                ->distinct('id_stasiun, waktu, pm10, pm25, so2, co, o3, no2, hc, voc, nh3, no, h2s, cs2, ws, wd, humidity, temperature, pressure, sr, rain_intensity')
                ->group_by('id_stasiun, waktu, pm10, pm25, so2, co, o3, no2, hc, voc, nh3, no, h2s, cs2, ws, wd, humidity, temperature, pressure, sr, rain_intensity')
                ->from($this->table_aqmdata)
                ->where('id_stasiun', 'BALIKPAPAN_PB')
                ->or_where('id_stasiun', 'BALIKPAPAN_BB');

        if($from!='' && $to!='' || $from!= NULL) // To process our custom input parameter
        {

            $this->db->where('waktu BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');
        }

        $i = 0;
        foreach ($this->column_search_aqmdata as $item) // loop column
        {
            if(@$_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search_aqmdata) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_aqmdata[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

        }
        elseif (isset($this->order_aqmdata)) // default order processing
        {
            $order = $this->order_aqmdata;

            $this->db->order_by(key($order), $order[key($order)]);

        }
    }
    // end

    // start
    var $table_aqmispu = 'aqm_ispu'; // define table
    var $column_order_aqmispu = array(null, 'id_stasiun', 'waktu'); //set column field database for datatable orderable
    var $column_search_aqmispu = array('id_stasiun', 'waktu'); //set column field database for datatable searchable
    var $order_aqmispu = array('id' => 'desc'); // default order

    public function get_datatables_aqmispu($from, $to)
    {
        $this->_get_datatables_query_aqmispu($from, $to);
       
        if(@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        
        $query = $this->db->get();
        
        return $query->result();
    }

    public function count_filtered_aqmispu($from, $to)
    {
        $this->_get_datatables_query_aqmispu($from, $to);
       
        $query = $this->db->get();
       
        return $query->num_rows();
    }

    public function count_all_aqmispu()
    {
        $this->db->from($this->table_aqmispu);
        $this->db->where('id_stasiun', 'BALIKPAPAN_PB');
        $this->db->or_where('id_stasiun', 'BALIKPAPAN_BB');
        return $this->db->count_all_results();
    }

    private function _get_datatables_query_aqmispu($from,$to)
    {
        $this->db
                ->distinct('id_stasiun, waktu, pm25, so2, no2')
                ->group_by('id_stasiun, waktu, pm25, so2, no2')
                ->from($this->table_aqmispu)
                ->where('id_stasiun', 'BALIKPAPAN_PB')
                ->or_where('id_stasiun', 'BALIKPAPAN_BB');

        if($from!='' && $to!='' || $from!= NULL) // To process our custom input parameter
        {

            $this->db->where('waktu BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');
        }

        $i = 0;
        foreach ($this->column_search_aqmispu as $item) // loop column
        {
            if(@$_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search_aqmispu) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_aqmispu[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

        }
        elseif (isset($this->order_aqmispu)) // default order processing
        {
            $order = $this->order_aqmispu;

            $this->db->order_by(key($order), $order[key($order)]);

        }
    }
    // end


    // // start datatables
    // var $column_order = array(null, 'id_stasiun', 'waktu', 'pm25', 'so2', 'no2'); //set column field database for datatable orderable
    // var $column_search = array('id_stasiun', 'waktu', 'pm25', 'so2', 'no2'); //set column field database for datatable searchable
    // var $order = array('id' => 'desc'); // default order
 
    // private function _get_datatables_query() {
    //     $this->db->distinct('id_stasiun, waktu, pm25, so2, no2');
    //     $this->db->group_by('id_stasiun, waktu, pm25, so2, no2'); 
    //     $this->db->from('aqm_data');
    //     $this->db->where('id_stasiun', 'BALIKPAPAN_PB');
    //     $this->db->or_where('id_stasiun', 'BALIKPAPAN_BB');
    //     $i = 0;
    //     foreach ($this->column_search as $item) { // loop column
    //         if(@$_POST['search']['value']) { // if datatable send POST for search
    //             if($i===0) { // first loop
    //                 $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
    //                 $this->db->like($item, $_POST['search']['value']);
    //             } else {
    //                 $this->db->or_like($item, $_POST['search']['value']);
    //             }
    //             if(count($this->column_search) - 1 == $i) //last loop
    //                 $this->db->group_end(); //close bracket
    //         }
    //         $i++;
    //     }
         
    //     if(isset($_POST['order'])) { // here order processing
    //         $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    //     }  else if(isset($this->order)) {
    //         $order = $this->order;
    //         $this->db->order_by(key($order), $order[key($order)]);
    //     }
    // }
    // function get_datatables() {
    //     $this->_get_datatables_query();
    //     if(@$_POST['length'] != -1)
    //     $this->db->limit(@$_POST['length'], @$_POST['start']);
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    // function count_filtered() {
    //     $this->_get_datatables_query();
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }
    // function count_all() {
    //     $this->db->from('aqm_data');
    //     return $this->db->count_all_results();
    // }
    // // end datatables


}