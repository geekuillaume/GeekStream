<?php
class movies extends CI_Model 
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function find($start, $end, $order) {
    	$sql = 'SELECT * FROM movies ORDER BY ';
    	switch ($order)
    	{
    		case 0:
    		$sql .= 'title';
    		break;
    		
    		case 1:
    		$sql .= 'title DESC';
    		break;
    		
    		case 2:
    		$sql .= 'vu';
    		break;
    		
    		case 3:
    		$sql .= 'vu DESC';
    		break;
    		
    		case 4:
    		$sql .= 'id DESC';
    		break;
    		
    		case 5:
    		$sql .= 'id';
    		break;
    		
    		case 6:
    		$sql .= 'date DESC';
    		break;
    		
    		case 7:
    		$sql .= 'date';
    		break;
      	}
    	$sql .= ' LIMIT '.$start.', '.$end;
    	$result = $this->db->query($sql);
    	return $result->result();
    }
    function save($tmdb, $title, $description, $img, $lien, $date, $duree, $genres)
    {
		$data = array(
			'tmdb' => $this->db->escape_str($tmdb),
			'title' => $this->db->escape_str($title),
			'description' => $this->db->escape_str($description),
			'img' => $this->db->escape_str($img),
			'lien' => $this->db->escape_str($lien),
			'date' => $this->db->escape_str($date),
			'duree' => $this->db->escape_str($duree),
			'genres' => $this->db->escape_str($genres)
		);
		$this->db->insert('movies', $data);
    }
    function exist($id)
    {
    	$sql = "SELECT id FROM movies WHERE tmdb =".$id;
    	$result = $this->db->query($sql);
    	if ($result->num_rows() == 1)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    function return_lien($id)
    {
    	$sql = "SELECT lien FROM movies WHERE id =".$id;
    	$result = $this->db->query($sql);
    	if ($result->num_rows() == 1)
    	{
    		$row = $result->row();
    		$lien = $row->lien;
    		return $lien;
    	}
    	else
    	{
    		return false;
    	}
    }
    function vu($id) {
    	$sql = "SELECT vu FROM movies WHERE id =".$id;
    	$result = $this->db->query($sql);
    	if ($result->num_rows() == 1)
    	{
    		$row = $result->row();
    		$vu = $row->vu;
    		$vu = $vu + 1;
    		$sql = "UPDATE movies SET vu = ".$vu." WHERE id= ".$id;
    		$result = $this->db->query($sql);
    	}
    }
}