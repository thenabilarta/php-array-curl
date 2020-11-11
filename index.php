<?php

$ch = curl_init(); 

$authorization = "Authorization: Bearer 56rxKKUckvr6nCYjwXfFiQZKQXnKPo4gvEkNgzrv";

$url = "http://192.168.44.127/xibo-cms/web/api/layout?layout=&embed=regions,playlists";

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

curl_close($ch);

$data = json_decode($result, true);

$layoutList = array();
$counter = 0;

foreach ($data as $d) {
    $layoutList[$counter] = $d["layout"];
    $counter++;
}

var_dump($layoutList);


// var_dump($layoutList);

// echo($data[2]["layout"]);

// print("<pre>".print_r($result, true)."</pre>");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php foreach($layoutList as $l): ?>
        <li><?= $l ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
