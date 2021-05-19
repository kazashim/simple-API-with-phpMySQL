<?php
class Items{   
    
    private $itemsTable = "items";      
    public $id;
    public $email;
    public $industry;
    public $country; 
    public $created_date;
    private $conn;
	
    public function __construct($db){
        $this->conn = $db;
    }	

    function read(){	
		if($this->id) {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable." WHERE id = ?");
			$stmt->bind_param("i", $this->id);					
		} else {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable);		
		}		
		$stmt->execute();			
		$result = $stmt->get_result();		
		return $result;	
	}
	
    function create(){
		
		$stmt = $this->conn->prepare("
			INSERT INTO ".$this->itemsTable."(`email`, `industry`, `country`, `created_date`)
			VALUES(?,?,?,?)");
		
		$this->email = htmlspecialchars(strip_tags($this->email));
		$this->industry = htmlspecialchars(strip_tags($this->industry));
		$this->country = htmlspecialchars(strip_tags($this->country));
	    $this->created_date = htmlspecialchars(strip_tags($this->created_date));
		
		
		$stmt->bind_param("ssss", $this->email, $this->industry, $this->country, $this->created_date);
		
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}

    function update(){
	 
		$stmt = $this->conn->prepare("
			UPDATE ".$this->itemsTable." 
			SET email= ?, industry = ?, country = ?, category_id = ?, created_date = ?
			WHERE id = ?");
	 
		$this->id = htmlspecialchars(strip_tags($this->id));
		$this->email = htmlspecialchars(strip_tags($this->email));
		$this->industry = htmlspecialchars(strip_tags($this->industry));
		$this->country = htmlspecialchars(strip_tags($this->country));
		$this->created = htmlspecialchars(strip_tags($this->created_date));
	 
		$stmt->bind_param("ssssi", $this->email, $this->industry, $this->country, $this->created_date, $this->id);
		
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}