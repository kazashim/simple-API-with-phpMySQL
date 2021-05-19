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