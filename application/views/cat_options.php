<?php $this->load->view('header'); ?>
	<div id="content">
            <div id="add_cat">
                <h3>Add new category</h3>
            <?php
            $attributes = array('class' => 'form');
            echo form_open('category/add_new/', $attributes);
            $data = array('name' => 'cat_name', 'maxlength' => '100', 'class'=>'input');
            echo "Your category name: ".form_input($data)."</br></br>";
            echo form_submit('cat_submit', 'Add Category!', 'class="button"')."</br></br>";
            echo form_close();
            ?>
            </div>
            <div id="show_cat">
                <h3>Remove categories</h3>
                <table class="main_table">
            <?php foreach($categories as $row) : ?>
                <tr>
                <td><a href="view/<?php echo $row->adresas; ?>"><?=$row->pavadinimas?></a></td>
                <td><a href="delete/<?php echo $row->id; ?>"><img src="<?php echo base_url().'images/delete.png'; ?>"></a></td>
                </tr>
            <?php endforeach; ?>
                </table>
            </div>
	</div> <!-- end of content-->
<?php $this->load->view('sidebar');?>
<?php $this->load->view('footer'); ?>

