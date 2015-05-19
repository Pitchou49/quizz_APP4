<?php 
include_once("pdo.php");
include_once("common.php");
class  coq_collection
{
	private $id;
	private $title;
	private $difficulty;
	private $pdo;

	public function coq_collection($title,$difficulty)
	{ 
		$this->title = $title;
		$this->difficulty= $difficulty;
		$this->pdo = initPDOObject();
	} 

	
	// Les accesseurs
	public function get_id()
	{	
		return $this->id; 
	}

	public function get_title()
	{	
		return $this->title; 
	}

	public function get_difficulty()
	{	
		return $this->difficulty; 
	}

	// Les mutateurs
	public function set_id($value)
	{
		$this->id = $value;
	}

	public function set_title($value)
	{
		$this->title = $value;
	}

	public function set_difficulty($value)
	{
		$this->difficulty = $value;
	}

	public function add()
	{
		$rqt = 
		'INSERT INTO coq_collection
		(
			id,
			title,
			difficulty
		)
		VALUES
		(
			"'.$this->id.'",
			"'.$this->title.'",
			"'.$this->difficulty.'"
		)';
		$this->pdo->request($rqt, $error);
		echo ("error = ". $error);
	}

	public function update($id)
	{ 
		$rqt = 
		'UPDATE coq_collection SET
			id = "'.$this->id.'",
			title = "'.$this->title.'",
			difficulty = "'.$this->difficulty.'"
		WHERE id ='.$id;
		$this->pdo->request($rqt, $error);
		echo ("error = ". $error);
	}
	public function list_()
	{
		$rqt = "SELECT * FROM coq_collection";
		return $this->pdo->request($rqt, $error);
	}

	public function find($id)
	{
		$rqt = "SELECT * FROM coq_collection WHERE id = ".$id;
		$data = $this->pdo->request($rqt, $error);
		if ($data.count > 0) return $data[0];
		else return 0;
	}
	public function JSON ()
	{
		return json_encode(array("id" => $this->$id, "title" => $this->title, "difficulty" => $this->difficulty));
	}
}
?>