<?php
class SessionController extends BaseController
{
    /**
     * "/user/list" Endpoint - Get list of users
     */
    //verify whether the plan makes sense: 
    // so we have to hardcode the queries, in the model tabs. But the listAction is quite similar for 
    public function getList() //call function, retrieve data, and send data through the web. 
    //function is called in the model and invokes database. 
    //the send invokes the baseController, just a collection of all general functions. 
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"]; //already implemented function to retrieve the request method. 
        echo "the request method of this query is: ";
        var_dump($requestMethod);
        $arrQueryStringParams = $this->getQueryStringParams(); //function of baseController
        $jsonData = $this->getQueryJSONStringParams(); //this object can be handled similarly to the previous ones. 
        $sessionModel = new SessionModel();
       

        if (strtoupper($requestMethod) == 'GET') { //userController and userModel are hard linked 
            try {
                $arrResponse = "";
                echo "check front";
                var_dump($arrQueryStringParams);
                $intLimit = 10;
                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $intLimit = $arrQueryStringParams['limit'];
                    echo "check limit"; //did not render, meaning that the limit is not set. 
                }
                $functionName = '';
                if (isset($arrQueryStringParams['functionName']) && $arrQueryStringParams['functionName']) {
                    $functionName = $arrQueryStringParams['functionName'];
                    echo "check functionName";

                   
                }
                $plantid = '';
                if (isset($arrQueryStringParams['plantid']) && $arrQueryStringParams['plantid']) {
                    $plantid = $arrQueryStringParams['plantid'];
                    echo "check plantid";

                   
                }
                echo 'this is limit';
                var_dump($intLimit);
                if($functionName == "testFunction"){
                    $arrResponse = $sessionModel->{$functionName}($plantid, $intLimit); //this is where we call the function. 
                }

                else if($functionName == "getThresholdsOf"){
                    $arrResponse = $sessionModel->{$functionName}($plantid);
                }
                //$arrResponse = $sessionModel->{$functionName}($intLimit); //this is where we call the function. 
                echo 'arrResponse';
                var_dump($arrResponse);
                $responseData = json_encode($arrResponse);
                echo 'responseData';
                var_dump($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }

        }
        else if( strtoupper($requestMethod) == "POST"){
            $arrResponse = "";
            //$functionName = $_POST["functionName"];
            //functionName is part of the query, right? 
            
            
              $functionName = '';
              if (isset($arrQueryStringParams['functionName']) && $arrQueryStringParams['functionName']) {
                  $functionName = $arrQueryStringParams['functionName'];
                  echo "check functionName";
               
              }  
              
              $plantName = '';
              if (isset($jsonData['plantName']) && $jsonData['plantName']) {
                $plantName = $jsonData['plantName'];
                echo "check limit"; //did not render, meaning that the limit is not set. 
            }
            if($functionName == "addPlant"){
                $sessionModel->{$functionName}($plantName);
            }
            try {
                $arrResponse = "";
                echo "check front";
                var_dump($arrQueryStringParams);
                
                $functionName = '';
                if (isset($arrQueryStringParams['functionName']) && $arrQueryStringParams['functionName']) {
                    $functionName = $arrQueryStringParams['functionName'];
                    echo " the functionName is";
                    var_dump($functionName);

                   
                }
                $plantName = '';
                if (isset($arrQueryStringParams['plantName']) && $arrQueryStringParams['plantName']) {
                    $plantid = $arrQueryStringParams['plantName'];
                    echo "  plantName is  ";
                    var_dump($plantName);

                   
                }
                if (empty($plantName)) {
                    echo "Name is empty";
                  } else {
                    echo $plantName;
                  }
                

                if($functionName == "addPlant"){
                    $sessionModel->{$functionName}($plantName);
                }
                //$arrResponse = $sessionModel->{$functionName}($intLimit); //this is where we call the function. 
                echo 'arrResponse';
                var_dump($arrResponse);
                $responseData = json_encode($arrResponse);
                echo 'responseData';
                var_dump($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
            //call a post method 
        }
        else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output //this is how the output is sent. 
       
        if (!$strErrorDesc) { //if everything is going well. //and request method == GET 
            $this->sendOutput( //function of baseController, with the headers. 
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else { //in case of an error
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}