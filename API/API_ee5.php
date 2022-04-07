<?php
$pdo = new PDO('mysql:host=mysql.studev.groept.be;port=3306;dbname=a21iot05','a21iot05','Rtp19RHc');
//for new commands, double check the exact documentation, details of dot comma and double dot can be confusing. 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * from plant');
$statement->execute();
$return = $statement->fetchAll();
echo '<pre>';
var_dump($return);
echo '</pre>'

//try to retrieve the information out of the sql typed
//put it in query and execute it 
//and display it flexibly in on the api interface 
//return the information to the app

?>



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
<!--rest API transfers the GET and POST requests into a sql query and passes the data again. -->
