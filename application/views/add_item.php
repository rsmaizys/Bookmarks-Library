<?php $this->load->view('header'); ?>
	<div id="content">
            <div id="new_item">
		<?php
		$attributes = array('class' => 'form');
		echo form_open('item/add_new/', $attributes);
		$data = array('name' => 'item_name', 'size' => '50', 'maxlength' => '100', 'class' => 'input');
		echo "Your item name: ".form_input($data)."</br></br>";
		$data = array('name' => 'item_link', 'size' => '50', 'class' => 'input');
		echo "Your item link: ".form_input($data)."</br></br>";
		foreach($categories as $category) {
			$options[$category->pavadinimas] = $category->pavadinimas;
		}
		echo "Select category: </br>".form_dropdown('item_category', $options, '', 'class="dropdown"')."</br>";
		$data = array('name' => 'item_description', 'cols' => '38', 'rows' => '10', 'class' => 'input');
		echo "Description: </br>".form_textarea($data)."</br></br>";
		echo form_submit('item_submit', 'Add item!', 'class="button"')."</br></br>";
		echo form_close();

		?>
            </div> <!-- end of new_item -->
	</div> <!-- end of content-->
<?php $this->load->view('sidebar');?>
<?php $this->load->view('footer'); ?>