<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Class Category extends Controller {

    function category()
    {
        parent::Controller();
	$this->load->model('main_model');
        $this->load->library('functions');
        $this->data['categories'] = $this->main_model->get_categories();
	$this->load->library('pagination');
    }
    function options()
    {
        $this->load->view('cat_options', $this->data);
    }
    function add()
    {
       $this->load->helper('form');
       $this->load->view('add_category', $this->data);
    }
    function add_new()
    {
       if($_POST['cat_submit'] == 'Add Category!') {
           $cat_name = $_POST['cat_name'];
           $cat_adress = $this->functions->catToadress($cat_name);
           $whether = $this->main_model->addCategory($cat_name, $cat_adress);
           if ($whether == TRUE)
               redirect('/category/options', 'refresh');
            else "Error: Problem with database";
       } else {
           echo "Error: Problem with site";
       }
    }
    function delete()
    {
       if ($this->main_model->deleteCat($this->uri->segment(3)))
           redirect('/category/options', 'refresh');
    }
    function view($name)
    {
        $config['full_tag_open'] = '<div id="pages">';
        $config['full_tag_close'] = '</div>';
        $config['base_url'] = base_url().'index.php/category/view/';
        $config['total_rows'] = $this->main_model->item_rows();
        $config['per_page'] = '12';
        $this->pagination->initialize($config);

        $this->data['items'] = $this->main_model->getCategory($name, $config['per_page'], $this->uri->segment(5));
        $this->load->view('main_view', $this->data);
    }
}
?>
