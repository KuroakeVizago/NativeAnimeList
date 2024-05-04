<?php

require "Database.php";

final class AnimeModel
{

    public static function save($animeData)
    {
        $database = new Database();

        $sql = "INSERT INTO animes (title, slug, cover_url, genres, synopsis, studio, rating) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $statement = $database->instance->prepare($sql);
        $statement->bind_param(
            "ssssssd",
            $animeData->title,
            $animeData->slug,
            $animeData->coverUrl,
            $animeData->genres,
            $animeData->synopsis,
            $animeData->studio,
            $animeData->rating
        );
        $statement->execute();
        $statement->close();
        $database->instance->close();
    }

    public static function edit($id, $animeData)
    {
        $database = new Database();

        $sql = "UPDATE animes SET title = ?, slug = ?, genres = ?, synopsis = ?, studio = ?, rating = ? WHERE id = ?";
        $statement = $database->instance->prepare($sql);
        $statement->bind_param(
            "sssssdi",
            $animeData->title,
            $animeData->slug,
            $animeData->genres,
            $animeData->synopsis,
            $animeData->studio,
            $animeData->rating,
            $id
        );
        $statement->execute();
        $statement->close();
        $database->instance->close();
    }

    public static function getAllAnime()
    {

        $database = new Database();

        $sql = "SELECT * FROM animes";
        $result = $database->instance->query($sql);
        // Check if there are any records
        if ($result->num_rows > 0) {
            // Fetch all rows and return them as an array
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            // No records found, return an empty array
            return [];
        }
    }

    public static function get($id)
    {
        // Connect to the database (you may already have a database connection)
        $database = new Database();

        // Prepare the SQL query to select the anime record by its ID
        $sql = "SELECT * FROM animes WHERE id = ?";
        $statement = $database->instance->prepare($sql);
        // Bind the parameter (ID) to the prepared statement
        $statement->bind_param("i", $id);
        $statement->execute();

        // Get the result set
        $result = $statement->get_result();
        $animeData = $result->fetch_assoc();

        // Close the prepared statement and database connection
        $statement->close();
        $database->instance->close();

        // If no anime record found, return null
        if (!$animeData) {
            return null;
        }

        // Create a new Anime object with the retrieved data and return it
        $anime = new AnimeData(
            $animeData['title'],
            $animeData['cover_url'],
            $animeData['synopsis'],
            $animeData['rating'],
            $animeData['studio'],
            $animeData['genres'],
        );
        $anime->id = $animeData['id'];
        $anime->slug = $animeData['slug'];

        return $anime;
    }

    public static function delete($id)
    {
        $database = new Database();

        $sql = "DELETE FROM animes WHERE id = ?";
        $statement = $database->instance->prepare($sql);
        $statement->bind_param("i", $id);
        $statement->execute();
        $statement->close();
        $database->instance->close();
    }

    public static function findBySlug($slug)
    {
        $database = new Database();

        $sql = "SELECT * FROM animes WHERE slug = ?";
        $statement = $database->instance->prepare($sql);
        $statement->bind_param("s", $slug);
        $statement->execute();

        $result = $statement->get_result()->fetch_assoc();

        $statement->close();
        $database->instance->close();

        return new AnimeData(
            $result['title'],
            $result['cover_url'],
            $result['synopsis'],
            $result['rating'],
            $result['studio'],
            $result['genres'],
        );
    }
}

final class AnimeData
{
    public $id;
    public $title;
    public $slug;
    public $coverUrl;
    public $synopsis;
    public $rating;
    public $studio;
    public $genres;

    public function __construct($title, $coverUrl, $synopsis, $rating, $studio, $genres)
    {

        $this->title = $title;
        $this->coverUrl = $coverUrl;
        $this->synopsis = $synopsis;
        $this->rating = $rating;
        $this->studio = $studio;
        $this->genres = $genres;
        $this->slug = $this->createSlug($title);
    }

    function createSlug($title)
    {
        // Convert title to lowercase
        $title = strtolower($title);

        // Remove non-alphanumeric characters except spaces and hyphens
        $title = preg_replace('/[^a-z0-9\s-]/', '', $title);

        // Replace spaces with hyphens
        $title = str_replace(' ', '-', $title);

        // Convert first character of each word to uppercase
        $title = ucwords($title);

        // Remove spaces and convert to lower camel case
        $title = lcfirst(str_replace(' ', '', $title));

        return $title;
    }
}