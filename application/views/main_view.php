<?php $this->load->view('header'); ?>
	<div id="content">
		<table class="main_table">
		 <tr> 
			<td class="id">ID</td>
			<td class="category">Kategorija</td>
			<td class="title">Pavadinimas</td>
			<td class="actions">Veiksmai</td>
		</tr>		
	
        <?php  foreach($items as $row) : ?>
		<tr class="data_table">
			<td><?php echo $row->id; ?> </td>
			<td class="t_align"><?php echo $row->kategorija; ?></td>
			<td class="t_align">
				<a href="<?php echo base_url().'index.php/item/view/'.$row->id; ?>"><?php echo $row->pavadinimas; ?></a>
			</td>
			<td>
				<a class="icon" href="<?=$row->nuoroda?>"><img src="<?php echo base_url().'images/link.png'; ?>"> </a>	<a class="icon" href="<?=base_url().'index.php/item/delete/'.$row->id?>"><img src="<?php echo base_url().'images/delete.png'; ?>"> </a>
			</td>
			</tr>
	<?php endforeach; ?>
		</table>
	<?php echo $this->pagination->create_links();  ?>
		
	</div> <!-- end of content-->
<?php $this->load->view('sidebar');?>
<?php $this->load->view('footer'); ?>