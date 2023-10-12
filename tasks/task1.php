<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <input name = "request"></input>
        <button name = "sumbit">Найти</button>

    </form>
</body>
</html>

<?php
       
     
       $curl = curl_init();
       $url = "https://jsonplaceholder.typicode.com/users";
       
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       
       $response = curl_exec($curl);
       $responseData = json_decode($response, true);

       if (isset($_GET["request"])) {
        $search = $_GET["request"];
        $searchLower = mb_strtolower($search);

        $userFound = false;

           foreach ($responseData as $i) {  
               $result = $i["name"];
               $respoLower = mb_strtolower($i["name"]);
               
               if (str_contains($respoLower,$searchLower )) {
                   echo $result, '<br>';
                   $userFound = true;
                }
            }
            if (!$userFound){
                echo "Такого пользователя не существует";
            }
        }
        else{
            echo "Все пользователи",'<br>';

            foreach ($responseData as $i) {  
                $result = $i["name"];
                echo '<br>',$result;
            }
            }
       

?>

