<?php

class Database
{
    protected $connection = null;
 
    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
         
            if ( mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");   
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());   
        }           
    }
 
    public function select($query = "" , $params = []) //this is the query in where you specify what to select, in case you need to select. 
    { //so in the query you write a normal query, the params you replace with :calories. 
        try {
            echo "this is the query and the params";
            var_dump($query, $params);
            
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);               
            $stmt->close();
 
            //return $result;
            return 'return result';
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }
    public function insert($query = "", $params = []){ //error handling
        { //now rewrite this insertInto post statments with JSON objects and stuff. 
            try {
                $stmt = $this->executeStatement( $query , $params );
                $result = "insert succesfull";               
                $stmt->close();
     
                return $result;
            } catch(Exception $e) {
                throw New Exception( $e->getMessage() );
            }
            return false;
        }    
    }
 
    private function executeStatement($query = "" , $params = [])
    {
        try {
            $stmt = $this->connection->prepare( $query ); //prepare query, but still with variables. needs to be bound later with the passed arguments. 
 
            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
 
            if( $params ) {
                $stmt->bind_param(...$params); //automatically adjusts the amount of params to the amount passed with. 
                //or bind_values
            }
 
            $stmt->execute();
 
            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }   
    }
}
