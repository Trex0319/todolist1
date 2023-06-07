<?php

class DB
{
    // attributes (optional)
    public $host = 'devkinsta_db';
    public $dbname = 'Todo_List';
    public $dbuser = 'root';
    public $dbpassword = 'r9wz9RSYYaTbjS7v';
    public $db;

    // methods (functions / actions)
    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=$this->host;dbname=$this->dbname", 
            $this->dbuser, // username
            $this->dbpassword // password 
        );
    }

    public function fetchAll( $sql, $data = [] )
    {
        // prepare SQL query (prepare your materials)
        $query = $this->db->prepare($sql);
        // execute SQL squery (to cook)
        $query->execute($data);
        // fetch all results (eat)
        return $query->fetchAll();
    }

    public function fetch( $sql, $data = [] )
    {
        // prepare
        $query = $this->db->prepare( $sql );
        // execute
        $query->execute($data);
        // fetch (eat)
        return $query->fetch(); // fetch() will only return one row of data
    }

    public function insert( $sql, $data = [] )
    {
        // prepare
        $query = $this->db->prepare( $sql );
        // execute
        $query->execute( $data );
    }

    public function update( $sql, $data = [] )
    {
        // prepare
        $query = $this->db->prepare( $sql );
        // execute
        $query->execute( $data );
    }

    public function delete( $sql, $data = [] )
    {
        // prepare
        $query = $this->db->prepare( $sql );
        // execute
        $query->execute( $data );
    }
}