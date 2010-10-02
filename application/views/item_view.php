<?php $this->load->view('header'); ?>
	<div id="content">
            <div class="item_more_table">
                <table class="more_table">
                <tr>
                <?php
                foreach($item as $items) {
                    echo "<td><a href='".base_url()."index.php/item/edit/".$items->id."' />Edit item</a></td>";
                    echo "<td>".$items->pavadinimas."</td>";
                    echo "<td>".$items->kategorija."</td>";
                    echo "<td>
			<a class='icon' href='".$items->nuoroda."'><img src='".base_url()."images/link.png'> </a>
                        <a class='icon' href='".base_url()."index.php/item/delete/".$items->id."'><img src='".base_url()."images/delete.png'> </a>
			</td>";
                ?>
                </tr>
                </table>
                <table class="more_table_desc">
                <tr>
                <?php
                    echo "<td>".nl2br($items->aprasymas)."</td>";
                }
                ?>
                </tr>
                </table>
            </div><!-- end of item_more -->
	</div> <!-- end of content-->
<?php $this->load->view('sidebar');?>
<?php $this->load->view('footer'); ?>