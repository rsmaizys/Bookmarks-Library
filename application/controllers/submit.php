<?php

class Submit extends Controller {

	function Submit()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$data['vardas'] = $_POST['tekstas'];
		$data['pavadinimas'] = $_POST['vardenis'];
		$this->load->view('submit', $data);
	}
}