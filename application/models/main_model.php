<?php

class Main_model extends Model {

	function Main_model()
        {
            parent::Model();
	}
        
        /*
        *  Pažymi visas kategorijos iš lentelės ir išdėsto abėcėlės tvarka
        *  Naudojamas main.php 
        */
	function get_categories()
        {
            $query = $this->db->query("SELECT * FROM kategorijos ORDER BY pavadinimas ASC");
            foreach($query->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
	}

        /*
        * Pažymį visu lentelėje esančius įrašus pagal vienos kategorijos adresą
        * Naudojamas category.php
         */
         function getCategory($name, $kiek, $nuo)
        {
             $this->db->order_by("id", "desc");
                $query = $this->db->get_where('irasai', array('kategorija' => $name) , $kiek, $nuo);
                foreach($query->result() as $row)
                {
                    $data[] = $row;
                }
                return $data;
        }

        /*
        * Prideda naują kategoriją
        * Naudojamas category.php
         */ 
        function addCategory($cat_name, $cat_adress)
        {
            $data['pavadinimas'] = $cat_name;
            $data['adresas'] = $cat_adress;
            if($this->db->insert('kategorijos',$data))
            {
                return TRUE;
            } 
            else
            {
                return FALSE;
            }
        }

        /*
        * Ištrina kategoriją pagal jos ID
        * Naudojama: categor.php
         */
        function deleteCat($id)
        {
            $id = $this->db->escape($id);
            if ($this->db->query("DELETE FROM kategorijos WHERE `id`=$id"))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }

        /*
        * Pažymi visus įrašus pagal ID mažėjimo tvarka. Yra puslapaivimas
        * Naudojamas: main.php
         */
	function get_items($kiek, $nuo)
        {
             $this->db->order_by("id", "desc");
		$query = $this->db->get('irasai', $kiek, $nuo);
		foreach($query->result() as $row)
                {
			$data[] = $row;
		}
		return $data;
	}
        
	function item_rows()
        {
		return $this->db->get('irasai')->num_rows();
	}
        
	function delete_item($id)
        {
		$this->db->query("DELETE FROM irasai WHERE `id`=".$this->db->escape($id));
	}
        
        function addItem($name, $link, $category, $description)
        {
            $data['kategorija'] = $category;
            $data['pavadinimas'] = $name;
            $data['nuoroda'] = $link;
            $data['aprasymas'] = $description;
            if ($this->db->insert('irasai', $data))
                return TRUE;
            else
                return FALSE;
        }
        
        function updateItem($id, $name, $link, $category, $description)
        {
            $data['kategorija'] = $category;
            $data['pavadinimas'] = $name;
            $data['nuoroda'] = $link;
            $data['aprasymas'] = $description;
            //$this->db->where('id', $id);
            if ($this->db->update('irasai', $data, "id = ".$id))
                return TRUE;
            else
                return FALSE;
        }

        function get_item($id)
        {
            $id = $this->db->escape($id);
            $query = $this->db->query("SELECT * FROM irasai WHERE `id`=$id");
            foreach($query->result() as $item)
            {
                $data[] = $item;
            }
            return $data;
        }
        
        function search($for)
        {
            $search_for = array('pavadinimas' => $for, 'aprasymas' => $for);
            $this->db->select('id, kategorija, pavadinimas, nuoroda, aprasymas')->from('irasai')->like($search_for);
            $query = $this->db->get();
	    foreach($query->result() as $row)
            {
		$data[] = $row;
            }
            return $data;
        }
}

