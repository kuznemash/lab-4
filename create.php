<?php

if (isset($_POST['submit'])) {
    $cardphoto = $_POST['cardphoto'];
    $cardphrase = $_POST['cardphrase'];

    $xml = simplexml_load_file('data.xml');

    $lastEl = $xml->card[$xml->count() - 1];

    $newcard = $xml->addChild('card', '');
    $newcard->addChild('photo', $cardphoto);
    $newcard->addChild('phrase', $cardphrase);

    $newcard->addAttribute('id', $lastEl['id'] + 1);

    $xml->saveXML('data.xml');
    echo "<script>alert('Карточка создана!');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание аффирмации</title>
    <link rel="stylesheet" href="css/newstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;700&family=Rubik&display=swap" rel="stylesheet">
</head>
<body>
    <div class="create-block">
        <form action="" method="POST">
            <input type="text" name="cardphoto" required placeholder="ссылка на картинку" autocomplete="off" style="width: 50%;">
            <br>
            <input type="text" name="cardphrase" required placeholder="текст фразы" autocomplete="off" style="width: 50%;">
            <br>
            <button type="submit" name="submit">создать</button>
        </form>
    </div>

    <a href="index.php" class="create-buttom">назад</a>
</body>
</html>