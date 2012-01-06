<?php

class stream extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		//$api_key = '7cbd5d696570717c6493eedbdedb7753';
		function nb_films($xml)
		{
			$nb = 0;
			foreach($xml->movies->movie as $movie)
			{
				$nb = $nb + 1;
			}
			return $nb;
		}
		function search_title($title)
		{
			$title = str_replace(' ', '+', $title);
			$url = 'http://api.themoviedb.org/2.1/Movie.search/fr/xml/**********/'.$title; //Remplacer ******** par votre clé API IMDB
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$contenu = curl_exec($ch);
			$xml = new simpleXMLElement($contenu);
			return $xml;
		}
		function search_id($id)
		{
			$id = str_replace(' ', '+', $id);
			$url = 'http://api.themoviedb.org/2.1/Movie.getInfo/fr/xml/**************/'.$id; //Remplacer ******** par votre clé API IMDB
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$contenu = curl_exec($ch);
			$xml = new simpleXMLElement($contenu);
			return $xml;
		}
		function debrid_lien($lien)
		{
			$ch = curl_init($lien);
			curl_setopt($ch, CURLOPT_COOKIE, "user=****************"); //Remplacer ******** par votre cookie "user" de Megaupload
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_exec($ch);
			$ch = curl_multi_getcontent($ch);
			$lien = explode('<div class="download_member_bl" style="display:block;">', $ch);
			$lien = explode("</a>", $lien[1]);
			$lien = explode('<a href="', $lien[0]);
			$lien = explode('" class="download_premium_but">', $lien[1]);
			$lien = $lien[0];
			return $lien;
		}
		function verif_video($lien)
		{
			preg_match_all("#http://(www\.)?megaupload\.com/[a-zA-Z]*/?\?d=([A-Za-z0-9]{8}$)#i",$lien, $lien_mu);
			if ($lien_mu[0][0] != '') 
			{
				$lien = $lien_mu[0][0];
				$lien = debrid_lien($lien);
				$extension = substr($lien, -3, 3);
				if ($extension == "avi" OR $extension == "Avi" OR $extension == "AVI")
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function verif_film($id){
			$xml = search_id($id);
			if ($xml->movies->movie->adult == 'false')
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		function pass_info($movie)
		{
			$data = array(
				'id' => $movie->id,
				'tmdb' => $movie->tmdb,
				'title' => $movie->title,
				'description' => $movie->description,
				'img' => $movie->img,
				'lien' => $movie->lien,
				'duree' => $movie->duree,
				'date' => $movie->date,
				'genres' => $movie->genres,
				'vu' => $movie->vu
			);
			return $data;
		}

    }
	function index()
	{
		$this->load->view('header');
		$this->load->model('movies');
		$movies = $this->movies->find(0,10,4);
		foreach($movies as $movie) {
			$data = pass_info($movie);
			$this->load->view('movie', $data);
		}
		$this->load->view('down');
		$this->load->view('footer');
	}
	function page($order, $page)
	{
		if (isset($order) && isset($page) && $order <= 7 && $order >= 0)
		{
			$start = 10 * ($page - 1) ;
			$stop = 10;
			$this->load->model('movies');
			$movies = $this->movies->find($start, $stop, $order);
			foreach($movies as $movie) {
				$data = pass_info($movie);
				$this->load->view('movie', $data);
			}
		}
	}
	function nb()
	{
		$title = $this->input->get('title');
		if ($title != FALSE) 
		{
			$xml = search_title($title);
			echo nb_films($xml);
		}
	}
	function titleID()
	{
		$title = $this->input->get('title');
		if ($title != FALSE) 
		{
			$xml = search_title($title);
			$movies = $xml->movies->movie;
			$data = array('movies' => $movies);
			$this->load->view('titleID', $data);
		}
	}
	function get_info(){
		$this->load->model('movies');
		$id = $this->input->get('id');
		if ($id != FALSE) 
		{
			$xml = search_id($id);
			$movie = $xml->movies->movie; 
			if ($movie)
			{
				if($this->movies->exist($id))
				{
					$this->load->view('exist');
				}
				else
				{
					$data = array('movie' => $movie);
					$this->load->view('movieID', $data);
				}
			}
		}
	}
	function is_video()
	{
		if ($this->input->get('lien'))
		{
			preg_match_all("#http://(www\.)?megaupload\.com/[a-zA-Z]*/?\?d=([A-Za-z0-9]{8}$)#i",$this->input->get('lien'), $lien_mu);
			if ($lien_mu[0][0] != '') 
			{
				$lien = $lien_mu[0][0];
				$ch = curl_init($lien);
				curl_setopt($ch, CURLOPT_COOKIE, "user=***************"); //Remplacer ******** par votre cookie "user" de Megaupload
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_exec($ch);
				$ch = curl_multi_getcontent($ch);
				$lien = explode('<div class="download_member_bl" style="display:block;">', $ch);
				$lien = explode("</a>", $lien[1]);
				$lien = explode('<a href="', $lien[0]);
				$lien = explode('" class="download_premium_but">', $lien[1]);
				$lien = explode('/', $lien[0]);
				$lien = $lien[5];
				$extension = substr($lien, -3, 3);
				if ($extension == "avi" OR $extension == "Avi" OR $extension == "AVI")
				{
					echo 'true';
				}
				else
				{
					echo 'false';
				}
			}
		}
	}
	function enregistrer()
	{
		if ($this->input->get('lien') && $this->input->get('id'))
		{
			$this->load->model('movies');
			$lien = $this->input->get('lien');
			$id = $this->input->get('id');
			if (verif_video($lien) && verif_film($id) && !$this->movies->exist($id))
			{
				$xml = search_id($id);
				$movie = $xml->movies->movie;
				$tmdb = $movie->id;
				$title = $movie->name;
				$description = $movie->overview;
				$img = $movie->images->image[4]['url'];
				$date = $movie->released;
				$duree = $movie->runtime;
				$genres = '';
				foreach($movie->categories->category as $categorie) 
				{
					$genres = $genres . $categorie['name'] .','; 
				}
				$data = array(
					'tmdb' => $tmdb,
					'title' => $title,
					'description' => $description,
					'img' => $img,
					'lien' => $lien,
					'date' => $date,
					'duree' => $duree,
					'genres' => $genres
				);
				$this->movies->save($tmdb, $title, $description, $img, $lien, $date, $duree, $genres);
				echo 'true';
			}
			else
			{
				echo 'false';
			}
		}
		else
		{
			echo 'false';
		}
	}
	function lien($id)
	{
		$this->load->model('movies');
		$lien = $this->movies->return_lien($id);
		if ($lien != false)
		{
			$lien = debrid_lien($lien);
			echo $lien;
		}
	}
	function lecteur() 
	{
		if($this->input->get('lien')){
			$this->load->helper('url');
			$data = array(
				'lien' => $_GET['lien'],
				'baseurl' => base_url()
			);
			$this->load->view('lecteur', $data);
		}
	}
	function vu($id) {
		$this->load->model('movies');
		$this->movies->vu($id);
	}
}




