<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anime List</title>

    <!-- Style Linking -->
    <link rel="stylesheet" href="../../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../shared/css/style.css">
</head>

<body>
    <header class="p-3 mb-3 border-bottom">
        <!-- Include Navbar here -->
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/Master/Views/Pages/home.php" class="nav-link px-2 link-secondary">Home</a></li>
                    <li><a href="/Master/Views/Pages/about.php" class="nav-link px-2 link-dark">About</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Genre</a></li>
                    <li><a href="index.php" class="nav-link px-2 link-dark">Anime List</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../../../shared/Sprite/Icon/ZhongliPP.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Include Content here -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-3">My Anime List
                    <a href="create.php" class="btn btn-outline-primary mb-1">Add Your Anime</a>
                </h1>
                <table class=" table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php
                    require_once '../../Models/AnimeModel.php';
                    $animeList = AnimeModel::getAllAnime(); ?>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($animeList as $anime) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><img src="<?= $anime["cover_url"]; ?>" alt="" class="cover"></td>
                                <td><?= $anime["title"]; ?></td>
                                <td>
                                    <a href="detail.php?id=<?= $anime["id"]; ?>" class="btn btn-outline-success">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- JavaScript Linking -->
    <script src="../../../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>