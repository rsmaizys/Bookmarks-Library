<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
		//$this->load->view('welcome_message');
		$data['heading'] = "Testuojame Heading1";
		$data['message'] = "Mylima visų žinutė";
		$this->load->view('welcome_message', $data);
	}
	function submit()
	{
		$data['vardas'] = $_POST['tekstas'];
		$this->load->view('submit', $data);
			
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */