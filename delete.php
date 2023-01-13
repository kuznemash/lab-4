<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $xml = simplexml_load_file("data.xml");
    $i = 0;
    
    foreach($xml->card as $card) {
        if ($card['id'] == $id) {
            unset($xml->card[$i++]);
            break;
        }
        $i++;
    }

    $xml->saveXML("data.xml");
    header("location:index.php");
}

?>