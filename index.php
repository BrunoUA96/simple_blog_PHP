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
    <?php require_once 'partials/header.php' ?>

    <div class="container-fluid my-5 px-5">
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-12">
                        <h4>
                            All posts
                        </h4>
                    </div>

                    <!-- Card -->
                    <?php 
                        $posts = mysqli_query($connect, "SELECT * FROM `posts` ORDER BY `id` DESC LIMIT 6");
                        $posts = mysqli_fetch_all($posts);
                        foreach ($posts as $post) {
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
                                            if ($category[0] == $post[3]) {
                                                $category_name = $category;
                                                break;
                                            } 
                                        }
                                    ?>

                                    <small class="text-secondary">
                                        <?=$category_name[1] ?>
                                    </small>

                                    <h5 class="card-title">
                                        <?=$post[1] ?>
                                    </h5>
                                    <p class="card-text">
                                        <?=$post[2] ?>
                                    </p>
                                    <a href="post.php?id=<?=$post[0]?>" class="btn btn-secondary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    <?php
                        } 
                    ?>
                    <div class="col-12 mt-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h4>
                            Cars
                        </h4>
                    </div>
                    <!-- Card -->
                    <?php 
                        $posts = mysqli_query($connect, "SELECT * FROM `posts` WHERE `category_id` = 1 ORDER BY `id` DESC LIMIT 3");
                        $posts = mysqli_fetch_all($posts);
                        foreach ($posts as $post) {
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
                                            if ($category[0] == $post[3]) {
                                                $category_name = $category;
                                                break;
                                            } 
                                        }
                                    ?>

                                    <small class="text-secondary">
                                        <?=$category_name[1] ?>
                                    </small>

                                    <h5 class="card-title">
                                        <?=$post[1] ?>
                                    </h5>
                                    <p class="card-text">
                                        <?=$post[2] ?>
                                    </p>
                                    <a href="post.php?id=<?=$post[0]?>" class="btn btn-secondary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    <?php
                        } 
                    ?>
                </div>
            </div>
            <div class="col-3 offset-1">
                <div class="row">
                    <div class="col-12">
                        <h4>
                            Top Views Posts
                        </h4>

                        <?php 
                            $topPosts = mysqli_query($connect, "SELECT * FROM `posts` ORDER BY `views` DESC LIMIT 4");
                            $topPosts = mysqli_fetch_all($topPosts);
                            foreach ($topPosts as $topPost) {
                        ?>

                            <div class="col-12 mb-4 alert alert-success">
                                <article class="row">
                                    <div class="col-4">
                                        <svg class="bd-placeholder-img card-img-top" width="100%" height="90" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#868e96"></rect>
                                            <text x="30%" y="50%" fill="#dee2e6" dy=".3em">
                                                Image
                                            </text>
                                        </svg>
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0"><?= $topPost[1] ?></h6 class="mb-0">
                                        <span class="mb-2 d-block">
                                            <?= $topPost[2] ?>
                                        </span>
                                        <a href="post.php?id=<?=$topPost[0]?>" class="btn btn-success d-block py-1"><small>See post</small></a>
                                    </div>
                                </article>
                            </div> 

                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-12">
                        <h4>
                            Last Comments
                        </h4>
                        <?php 

                            $comments = mysqli_query($connect, "SELECT * FROM `comments` ORDER BY `id` DESC LIMIT 4");
                            $comments = mysqli_fetch_all($comments);
                            foreach ($comments as $comment ) {
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
                                        <a href="post.php?id=<?=$comment[2]?>" class="btn btn-secondary d-block py-1"><small>See post</small></a>
                                    </div>
                                </article>
                            </div>
                        <?php
                            }

                        ?>
                    </div>
                </div>
            </div>
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