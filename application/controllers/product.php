<?php
class Product extends CI_Controller {

	
	public function index()
	{
		$this->load->view('product_lookup');
	}
	public function find()
	{
		// var_dump($_POST);
		// exit();
		$this->load->model('Product_model');

		//$myModel = new Produt_model();
		//$paProductType = $_POST['product_type'];
		$paProductType = $this->input->post('product_type');
//var_dump($this->Product_model->lookup($paProductType));
//exit();
		//$paProductType = $_POST['product_type'];
		$viewData = array();
		//$viewData['x'] = $paProductType;
		$viewData['x'] = $this->Product_model->lookup($paProductType);
		$this->load->view('product_display',$viewData);
	}
}
?>