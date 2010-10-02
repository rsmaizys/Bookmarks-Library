<?php

class Main extends Controller {
	
	var $category = '';
	var $data = array(); 

	function Main()
	{
		parent::Controller();
		$this->load->model('main_model');
		$this->data['category'] = $this->category;
		$this->data['title'] = "Bookmarks and Favorites";
		$this->data['footer'] = "Ričardas Šmaižys";
		$this->data['categories'] = $this->main_model->get_categories();				
	}

	function index()
	{
		$this->load->library('pagination');
		$this->load->library('table');
		
		$config['full_tag_open'] = '<div id="pages">';
                $config['full_tag_close'] = '</div>';
		$config['base_url'] = base_url().'index.php/main/index/';
		$config['total_rows'] = $this->main_model->item_rows();
		$config['per_page'] = '12';
		$this->pagination->initialize($config);
		
		$this->data['items'] = $this->main_model->get_items($config['per_page'], $this->uri->segment(3));
		$this->load->view('main_view', $this->data);
	}
	function category($selected_category)
	{
		$this->category = $selected_category;
		$this->index();
	}
        function search()
        {
		$query = $_POST['query'];
                $this->load->library('pagination');
		$this->load->library('table');

		$config['full_tag_open'] = '<div id="pages">';
                $config['full_tag_close'] = '</div>';
		$config['base_url'] = base_url().'index.php/main/index/';
		$config['total_rows'] = $this->main_model->item_rows();
		$config['per_page'] = '12';
		$this->pagination->initialize($config);

		$this->data['items'] = $this->main_model->search($query);
		$this->load->view('main_view', $this->data);
        }
}
