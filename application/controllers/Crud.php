<?php

class Crud extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->model('crud_model');
		$this->load->helper('url');
		$this->load->database();
	}

	
	function index(){

		$data["people"]=$this->crud_model->read();
		$this->load->view("crud_view",$data);

	}

	function create(){
		echo json_encode(array("id"=>$this->crud_model->create()));
	}

	function updae(){
		$id= $this->input->post("id");
		$value= $this->input->post("value");
		$modul= $this->input->post("modul");
		$this->crud_model->update($id,$value,$modul);
		echo "{}";
	}

	function delete(){
		$id= $this->input->post("id");
		$this->crud_model->delete($id);
		echo "{}";
	}

}