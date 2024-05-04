<?php
require_once '../Models/AnimeModel.php';

class AnimeController
{

    protected $model;
    public $feedbackData;

    public function addForm()
    {
        include 'add_anime_form.php';
    }

    public function saveAnime()
    {
        $title = $_POST['title'];
        $synopsis = $_POST['synopsis'];
        $studio = $_POST['studio'];
        $genres = $_POST['genres'];
        $rating = $_POST['rating'];
        //$cover = $_FILES["cover"]["name"]; // Handle file upload as needed
        $coverUrl = $this->getCoverUrl();

        if (!$this->model) {
            $this->model = new AnimeData($title, $coverUrl, $synopsis, $rating, $studio, $genres);
            AnimeModel::save($this->model);
        }
    }

    public function editAnime($id)
    {
        $title = $_POST['title'];
        $synopsis = $_POST['synopsis'];
        $studio = $_POST['studio'];
        $genres = $_POST['genres'];
        $rating = $_POST['rating'];
        //$cover = $_FILES["cover"]["name"]; // Handle file upload as needed
        $coverUrl = $this->getCoverUrl();

        if (!$this->model) {
            $this->model = new AnimeData($title, $coverUrl, $synopsis, $rating, $studio, $genres);
            AnimeModel::edit($id, $this->model);
        }
    }

    public function getCoverUrl()
    {
        $uploadDirectory = "..\..\shared\graphics\saved_cover/";
        $finalUploadDirectory = "\shared\graphics\saved_cover/";

        // Generate a unique filename
        $randomFileName = uniqid() . "_" . $_FILES['cover']['name'];

        // Path to the uploaded file
        $uploadedFile = $uploadDirectory . "/" . $randomFileName;

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['cover']['tmp_name'], $uploadedFile)) {

            // Generate the URL to access the uploaded file
            $baseUrl = 'http://localhost:8000'; // Change this to your website's base URL
            $fileUrl = $baseUrl . $finalUploadDirectory . $randomFileName;

            return $fileUrl;
        } else {
            // Failed to upload file
            return "";
        }
    }
}


// Handle form edit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $controller = new AnimeController();
    $controller->editAnime($_POST['id']);
    header(
        "Location: ../../Master/Views/Animes/index.php"
    );
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    $controller = new AnimeController();
    $controller->saveAnime();
    header(
        "Location: ../../Master/Views/Animes/index.php"
    );
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    // Assuming you have a method named deleteAnime in your controller
    $controller = new AnimeController();
    AnimeModel::delete($_POST['delete']); // Assuming you're passing the ID of the anime to delete

    // Redirect to the index page after deletion
    header("Location: ../../Master/Views/Animes/index.php");
    exit;
}
