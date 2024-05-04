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
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <?php
  require_once '../../Models/AnimeModel.php';
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $animeDetail = AnimeModel::get($id);
  } else {
    die("Id not received");
  } ?>

  <div class="container">
    <div class="row">
      <div class="col">
        <h1></h1>
        <div class="card mb-3" style="max-width: 1000;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="<?= $animeDetail->coverUrl; ?>" class="img-fluid rounded-start" alt="">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?= $animeDetail->title; ?></h5>
                <p class="card-text">Synopsis: <?= $animeDetail->synopsis; ?></p>
                <p class="card-text"><small>Studio: <?= $animeDetail->studio; ?></small></p>
                <p class="card-text"><small>Genres: <?= $animeDetail->genres; ?></small></p>
                <p class="card-text"><small>Rating: <?= $animeDetail->rating; ?>/10</small></p>
                <a href="edit.php?id=<?= $_GET['id']; ?>" class="btn btn-outline-warning">Edit</a>
                <form action="../../Controllers/AnimeController.php" method="post" class="d-inline">
                  <input type="hidden" name="delete" value="<?= $animeDetail->id; ?>">
                  <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete this data?');">
                    Delete
                  </button>
                </form>
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- JavaScript Linking -->
  <script src="../../../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>