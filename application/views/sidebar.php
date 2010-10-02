		<div id="sidebar">
                    <h2>Search:</h2>
                    <?php
                    echo form_open('main/search/');
                    $data = array('name' => 'query', 'size'=>'20');
                    echo form_input($data)."</br></br>";
                    echo form_submit('search_submit', 'Find!', 'class="button"')."</br></br>";
                    echo form_close();
                    ?>
                    <h2>Categories: </h2>
                    <a href="<?php echo base_url(); ?>index.php/category/options" ><p>Categories options </p></a>
		<ul>
	<?php foreach($categories as $row) : ?>
		<a href="<?php echo base_url().'index.php/category/view/'.$row->adresas; ?>"><?=$row->pavadinimas?></a><br /></li>
	<?php endforeach; ?>
                </ul>
		</div> <!-- end of sidebar-->
		