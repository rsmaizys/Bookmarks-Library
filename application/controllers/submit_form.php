<?php

class Submit extends Controller {

	function Submit()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$data['vardas'] = $_POST['tekstas'];
		$this->load->view('submit', $data);

	}
}