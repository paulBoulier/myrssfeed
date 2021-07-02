<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="<?= !empty($_COOKIE) && $_COOKIE["theme"] == "dark" ? "text-light bg-dark" : "" ?>">
    <?php
    include "../navbar.php";
    ?>
    <div class="row">
        <div class="container">
            <h1 class="text-center"><?= $categories[array_keys($categories)[$_GET["q"] - 1]] ?></h1>
            <?php
            require '../controllers/pages-controller.php';
            ?>
        </div>
    </div>
</body>

</html>