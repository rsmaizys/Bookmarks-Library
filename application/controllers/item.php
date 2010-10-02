<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

Class Item extends Controller {
    function Item()
    {
        parent::Controller();
	$this->load->model('main_model');
        $this->data['title'] = "Nuorodų ir žymių katalogas";
        $this->data['footer'] = "Copyright by Ričardas Šmaižys";
        $this->data['categories'] = $this->main_model->get_categories();
    }

   function delete()
   {
       $this->main_model->delete_item($this->uri->segment(3));
       redirect('/main/', 'refresh');
   }
   function add()
   {
       $this->load->helper('form');
       $this->load->view('add_item', $this->data);
   }
   function add_new()
   {
       if($_POST['item_submit'] == 'Add item!') {
           $item_name = $_POST['item_name'];
           $item_link = $_POST['item_link'];
           $item_category = $_POST['item_category'];
           $item_description = $_POST['item_description'];
           $whether = $this->main_model->addItem($item_name, $item_link, $item_category, $item_description);
           if ($whether == TRUE) {
               redirect('/main/', 'refresh');
           } else "Error: Problem with database";
       } else {
           echo "Error: No data has been inputed";
       }
   }
   function view($id)
   {
       $this->data['item'] = $this->main_model->get_item($id);
       $this->load->view('item_view', $this->data);
   }
   function edit($id)
   {
       $this->data['item']= $this->main_model->get_item($id);
       $this->load->view('item_edit', $this->data);
   }
   function update()
   {
       if($_POST['item_submit'] == 'Update!') {
           $item_id = $_POST['id'];
           $item_name = $_POST['item_name'];
           $item_link = $_POST['item_link'];
           $item_category = $_POST['item_category'];
           $item_description = $_POST['item_description'];
           $whether = $this->main_model->updateItem($item_id, $item_name, $item_link, $item_category, $item_description);
           if ($whether == TRUE) {
               redirect('/item/view/'.$item_id, 'refresh');
           } else "Error: Problem with database";
       } else {
           echo "Error: No data has been inputed";
       }
   }
}
?>
