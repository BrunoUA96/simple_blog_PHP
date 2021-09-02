<?php require_once 'config/connect.php' ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <!-- Header -->
    <?php require_once 'partials/header.php';?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <?php 
                    $idPost = $_GET['id'];
                    $post = mysqli_query($connect, "SELECT * FROM `posts` WHERE `id` = $idPost");
                    $post = mysqli_fetch_assoc($post);
                ?>
                <svg class="bd-placeholder-img card-img-top" width="100%" height="380" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#868e96"></rect>
                    <text x="45%" y="50%" fill="#dee2e6" dy=".3em">
                        Image cap
                    </text>
                </svg>
                <h1 class="my-5">
                    <?=$post['title']?>
                </h1>
                <p><?=$post['description']?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr>
            </div>
            <div class="col-12">
                <form action="vendor/addComment.php?id=<?=$idPost?>" method="POST" id="form">
                    <div class="mb-3">
                        <label for="name-user" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name-user" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                    </div>
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr>
            </div>
            <div class="col-12">
                <h4>
                    Copmments
                </h4>
            </div>
            <?php 
                $comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `post_id` = $idPost"); 
                $comments = mysqli_fetch_all($comments);
                foreach ($comments as $comment) {
            ?>

                <div class="col-12 mb-4 alert alert-success">
                    <article class="row">
                        <div class="col-3">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="80" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#868e96"></rect>
                                <text x="25%" y="50%" fill="#dee2e6" dy=".3em">
                                    Image
                                </text>
                            </svg>
                        </div>
                        <div class="col-9">
                            <h6 class="mb-0"><?=$comment[3]?></h6>
                            <small><?=$comment[1]?></small>
                        </div>
                    </article>
                </div>
            <?php
                }
            ?>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>

</html>