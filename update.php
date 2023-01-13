<?php
$xml = simplexml_load_file('data.xml');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    foreach ($xml->card as $card) {
        if ($card['id'] == $id) {
            $cardphoto = $card->photo;
            $cardphrase = $card->phrase;
            break;
        }
    }

} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    foreach($xml->card as $card) {
        if ($card['id'] == $id) {
            $card->photo = $_POST['cardphoto'];
            $card->phrase = $_POST['cardphrase'];
            break;
        }
    }
    $xml->saveXML("data.xml");
    echo "<script>
    alert('Данные изменены');
    location.href = 'index.php';
    </script>";
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
        <div class="card" style="margin: 45px;">
            <div class="card-item">

                <a href="delete.php?id=<?php echo $card['id']?>" onclick="return confirm('Вы точно хотите удалить карточку?');">
                <img src="img/delete.png" class="delete-buttom"></a>

                <img src="<?php echo $card->photo ?>" class="card-image">
                <p class="card-text"><?php echo $card->phrase ?></p>

            </div>
        </div>


    <div class="create-block">
        <form action="" method="POST">
            <input type="text" name="cardphoto" value="<?php echo $cardphoto?>" style="margin-top: 0px; width: 50%;">
            <br>
            <input type="text" name="cardphrase" value="<?php echo $cardphrase?>" style="width: 50%;">
            <input type="hidden" name="id" value="<?php echo $id?>"> 
            <br>
            <button type="submit" name="submit">обновить</button>
        </form>
    </div>

    <a href="index.php" class="create-buttom">назад</a>
</body>
</html>