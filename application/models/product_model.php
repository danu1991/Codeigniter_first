<?php
class Product_model extends CI_model{

	function lookup($productType){
		// use to get list of product that actgs the type
        $this->load->database();
        $this->db->whare('product_type',$productType);
        $result=$this->db->get('product');
        //$result=$this->db->query('SELECT producttype,productname from product where producttype=\''.$productType.'\'');

		$data = array();
		foreach ($result->result() as $raw ) {
		$data[]=$raw->producttype;
	
		}
return $data;
}


}


?>