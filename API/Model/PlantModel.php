
<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class PlantModel extends Database
{
    public function getUsers($limit)
    {
        return $this->select("SELECT * FROM plant ORDER BY idplant ASC LIMIT ?", ["i", $limit]);
    }
    public function getPlants()
    {
        return $this->select("SELECT * FROM plant",[]);
    }
    public function getThresholdsOf($plantid) //is there a way to dynamically fetch only one column of the threshold properties. 
    {
        return $this->select("SELECT plantid, triggertype, threshold1, threshold2 from thresholds where plantid = ?",['i',$plantid]); //i is concerning the plantid, which is the plantid. 
    }



    

    
        
 
    
}

//
/*$queryTest = new UserModel();
$queryTest->getPlants();
echo '<pre>';
var_dump($queryTest);
echo '</pre>';
echo "hello";*/

//how to connect with the project_root_path
//