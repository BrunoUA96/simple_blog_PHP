<?php require_once 'config/connect.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <!-- Header -->
    <?php require_once 'partials/header.php' ?>

    <!-- content -->
    <div class="container mt-5">
        <div class="row">
            <?php
                if ($_GET['category']) { 
                    $list_items = mysqli_query($connect, "SELECT * FROM `posts` WHERE `category_id` =".$_GET['category'] );
                 } else if ($_GET['posts']) {
                    $list_items = mysqli_query($connect, "SELECT * FROM `posts`");
                 } else {
                     header("Location: index.php");
                 }

                
                $list_items = mysqli_fetch_all($list_items);

                foreach ($list_items as $item) {
                    ?>
                    <div class="col-4">
                        <div class="card alert-secondary">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#868e96"></rect>
                                <text x="40%" y="50%" fill="#dee2e6" dy=".3em">
                                    Image cap
                                </text>
                            </svg>
                            
                            <div class="card-body">
                                <?php
                                    $category_name = '';
                                    foreach ($categories as $category) {
                                        if ($category[0] == $item[3]) {
                                            $category_name = $category;
                                            break;
                                        } 
                                    }
                                ?>

                                <small class="text-secondary">
                                    <?=$category_name[1] ?>
                                </small>

                                <h5 class="card-title">
                                    <?=$item[1] ?>
                                </h5>
                                <p class="card-text">
                                    <?=$item[2] ?>
                                </p>
                                <a href="post.php?id=<?=$item[0]?>" class="btn btn-secondary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>