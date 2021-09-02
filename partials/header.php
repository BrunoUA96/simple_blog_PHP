<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?='index.php'?>">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                    $categories = mysqli_query($connect, "SELECT * FROM `categories`");
                    $categories = mysqli_fetch_all($categories);
                    foreach ($categories as $category) {
                ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        <?= $category[1] ?>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
