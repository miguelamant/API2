<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class SessionModel extends Database
{
    public function getUsers($limit)
    {
        return $this->select("SELECT * FROM plant ORDER BY idplant ASC LIMIT ?", ["i", $limit]);
    }
    public function getPlants()
    {
        return $this->select("SELECT * FROM plant",[]);
    }
    public function getThresholdsOf($plantid) //is there a w y to dynamically fetch only one column of the threshold properties. 
    {
        return $this->select("SELECT plantid, triggertype, threshold1, threshold2 from thresholds where plantid = ?",['i ',$plantid]); //i is concerning the plantid, which is the plantid. 
    }
    public function testFunction($plantid, $limit){
        return $this->select("SELECT * from thresholds where plantid = ? order by plantid asc limit ?", ['ii', $plantid, $limit]);//d is stringtype I guess
    } //select must be capital.
    public function addPlant($plantName){
        $this->insert("INSERT into plant (name) values (?)",['s',$plantName]); //later run this select with an insert into
    }
    
}