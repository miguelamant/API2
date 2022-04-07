<?php

//try to retrieve the information out of the sql typed
//put it in query and execute it 
//and display it flexibly in on the api interface 
//return the information to the app

?>

<?php
/*
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
      
</body>
</html> 
*/
?>
//all above can be removed. //yaya
<!--rest API transfers the GET and POST requests into a sql query and passes the data again. -->
<!-- what is the point of adding the user to the URL, and how is it redirected to the list action? or is this default and is the rest of the user handled by if statements? -->
<?php
require __DIR__ . "/inc/bootstrap.php";
 
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo 'uri is ___';
var_dump($uri);
$uri = explode( '/', $uri );
echo 'URI parsed in JSON based on the slashes';
var_dump($uri);
 
/*if ((isset($uri[3]) && $uri[3] != 'user') || !isset($uri[3])) { //uri 3 because the third element should be user, because we add an additional API to the URL which wasn't there in the 
  //previous version.
    header("HTTP/1.1 404 Not Found");
    exit();
}*/
//the part above is error handling
 

require PROJECT_ROOT_PATH . "/Controller/API/PlantController.php";
require PROJECT_ROOT_PATH . "/Controller/API/SessionController.php";

//$objFeedController = new SessionController();

if($uri[3] == "plant"){
  $objFeedController = new PlantController();
}
else if($uri[3] == "session"){
  $objFeedController = new SessionController();
}

//$strMethodName = $uri[4] . 'Action'; //we concatenate the string, uri[4] will be list, we add Action, and that way we can dynamically call the functions within tabb. 

$strMethodName = $uri[4];
$objFeedController->{$strMethodName}();
//the fifth uri should be the get/post 
?>

<?php 

//copy everything and try to make it functional. 
//I understand everything, except for how you should call the url and how it responds exactly. 

//1. copy and implement
//2. understand call and response from the api 
//3. make classes in the android studio used to handle the api calls and make it functional
// if those three work, the base frame works. 
// from then on we can start implementing and using it in the application. 

//next = the parameters don't work, check how they can. both limit and functionName
//if they work, try to call the functions in a flexible way. 
//after that, try to fix the post calls, note that there is an implemented method which knows whether there is a post or get
//https://a21iot05.studev.groept.be/API/index.php/session/getList/?functionName=getThresholdsOf?limit=1

//next problem = the way post request are send and handled is different from gets.
//basically what the difference is: in post, you send over a type = JSON and a body, the JSON array. and all the data you want to post is within the array.
//so it a more secure way, because the data you post is not visible in the URI 

//URI VS URL 
//URI = uniform resource identifyer, sends you to a place on the web, but does not specify where within that resource.
//whereas the URL (location) gives you the location as well, within the resource, fe a subpage.

//try to make multiple parameters work. by hardcoding if statements in the controller
//later we can optimize it
//in the end, we will only need a few queries, so we can hardcode everything
//tradeoff between flexibility and dynamics. don't make it too complex. 
//https://a21iot05.studev.groept.be/API/index.php/session/getList/?funcionName=testFunction&plantid=1&limit=1

//optimizations possible = make it more dynamic, so you don't have to write an if statement for each
//different functions you would like to call. Clue = dynamically assign the parameters, so you 
//have one function which can have 1 or 5 parameters. 
//second, make the controller more flexible. we could, theoretically, handle everything in one controller. 
//check for different names for the getList 

//make a frontEnd page so you can work more dynamically with a team, instead of all hardcoding stuff within the code. 

//also another optimalisation is tokens. So in each header there is a token, where you can save the data of the user
//rather required when working with a login system. So you can save a permission in a token for a certain time, 
//this way you avoid having to enter the mail and password each time. 
//also, the credentials could be saved at start, when logging in, and then reuse it later
//the passwords should be encrypted whenever you send them. Theoretically best when you 
//send the password to the server and it gets encrypted there. 
?>

