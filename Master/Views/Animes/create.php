<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Anime List</title>

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
                <h2 class="my-3">Add New Anime Data</h2>
                <form action="../../Controllers/AnimeController.php" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" autofocus value="title">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" aria-label="With textarea" id="synopsis" name="synopsis"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="studio" class="col-sm-2 col-form-label">Studio</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="studio" name="studio" value="studio">
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label for="genres" class="col-sm-2 col-form-label">Genres (seperate using ,)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="genres" name="genres" value="comedy, slice-of-life">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="rating" class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="rating" name="rating" value="5.0" min="0" max="10">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Cover</label>
                        <input class="form-control" type="file" id="cover" name="cover" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit Data</button>
                </form>
            </div>
        </div>
    </div>
    <!-- JavaScript Linking -->
    <script src="../../../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>