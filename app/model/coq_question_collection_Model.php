<?php 
include_once("pdo.php");
include_once("common.php");
class  coq_question_collection_Model extends Model  
{
	private $id;
	private $question_id;
	private $collection_id;
	private $pdo;

	public function coq_question_collection($question_id, $collection_id)
	{ 
		$this->question_id = $question_id;
		$this->collection_id = $collection_id;
		$this->pdo = initPDOObject();
	} 

	
	// Les accesseurs
	public function get_id()
	{	
		return $this->id;
	}

	public function get_question_id()
	{	
		return $this->question_id; 
	}

	public function get_collection_id()
	{	
		return $this->collection_id; 
	}

	// Les mutateurs
	public function set_id($value)
	{
		$this->id = $value;
	}

	public function set_question_id($value)
	{
		$this->question_id = $value;
	}

	public function set_collection_id($value)
	{
		$this->collection_id = $value;
	}

	public function add()
	{
		$rqt = 
		'INSERT INTO coq_question_collection
		(
			id,
			question_id,
			collection_id
		)
		VALUES
		(
			"'.$this->id.'",
			"'.$this->question_id.'",
			"'.$this->collection_id.'"
		)';
		$this->pdo->request($rqt, $error);
	}

	public function update($id)
	{
		$rqt = 
		'UPDATE coq_question_collection SET
			id = "'.$this->id.'",
			question_id = "'.$this->question_id.'",
			collection_id = "'.$this->collection_id.'"
		WHERE id ='.$id;
		$this->pdo->request($rqt, $error);
	}

	public function get_questions_by_collection_id ($id)
	{
		$rqt = "SELECT * FROM coq_question_collection WHERE collection_id = ".$id;
		return $this->pdo->request($rqt, $error);;
	}

	public function find($id)
	{
		$rqt = "SELECT * FROM coq_question_collection WHERE id = ".$id;
		$data = $this->pdo->request($rqt, $error);
		if ($data.count > 0) return $data[0];
		else return 0;
	}
}
?>
