<?php 

$xml = simplexml_load_file("data.xml") or die("Error: Cannot create object"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аффирмации</title>
    <link rel="stylesheet" href="css/newstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;700&family=Rubik&display=swap" rel="stylesheet">
</head>

<body>
    <div class="back">
    <header>
        <img src="img/header.png" class="header-image">
        <div class="header-items">
            <img src="img/logo.png" class="logo">
            <h1 class="name">Аффирмации</h1>
        </div>
    </header>

    <main>
        <h2 class="main-text">Чем будем вдохновляться сегодня?</h2>
        <div class="main-cards">

        <?php foreach($xml->card as $card) { ?>
            <div class="card">
                <div class="card-item">

                    <a href="delete.php?id=<?php echo $card['id']?>" onclick="return confirm('Вы точно хотите удалить карточку?');">
                    <img src="img/delete.png" class="delete-buttom"></a>

                    <img src="<?php echo $card->photo ?>" class="card-image">
                    <p class="card-text"><?php echo $card->phrase ?></p>

                </div>
                <a href="update.php?id=<?php echo $card['id']?>" class="update-buttom">изменить</a>
            </div>
        <?php } ?>

        </div>
        <a href="create.php" class="create-buttom">добавить новую аффирмацию</a>
    </main>
    <footer>
        <div class="devider"></div>
    </footer>
    </div>
</body>
</html>
