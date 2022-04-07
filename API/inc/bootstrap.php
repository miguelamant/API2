<?php
define("PROJECT_ROOT_PATH", __DIR__ ."/.."); // __DIR__ .

// include main configuration file
require_once PROJECT_ROOT_PATH . "/inc/config.php";
 
// include the base controller file
require_once PROJECT_ROOT_PATH . "/Controller/API/BaseController.php";
 
// include the use model file
require_once PROJECT_ROOT_PATH . "/Model/SessionModel.php";
require_once PROJECT_ROOT_PATH . "/Model/PlantModel.php";

//database =  reponsible for the connection and handling the queries
//bootstrap = what is its functionality? 
//config = the configuration, linking everything. 
//

?>

