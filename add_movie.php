<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style-Js/style.css">
  <title>Document</title>
</head>
<body class="bg-addMovie">

  <?php
    require("connect.php");

    $movies = $db->query("SELECT title FROM movie ORDER BY title");

    $rooms = $db->query("SELECT room.name AS name FROM room ORDER BY name");
  ?>

  <section>
    <div class="text-left">
      <h2 class="white">Add a movie : </h2>
      <div>
        <span>Menu Admin -> <a href="http://localhost:8000/admin.php"> Here </a> </span>
      </div>
        <form name="form" method="get">
          <select name="movieSelect">
            <option disabled selected >~~ Choose a movie ~~</option>
            <?php
             while ($movie = $movies->fetch()) {
              ?>
                <option> <?php echo $movie["title"] ?> </option>
              <?php
            }
            ?>
          </select>
          <select name="roomSelect">
            <option disabled selected>~~ Choose a room ~~</option>
            <?php
             while ($room = $rooms->fetch()) {
              ?>
                <option> <?php echo $room["name"] ?> </option>
              <?php
            }
            ?>
          </select>
          <input type="date" name="date-schedule">
          <input type="time" name="time-schedule">
          <input type="submit" value="Add this schedule">
        </form>
      </div>
    </section>

    <?php
      if (isset($_GET["movieSelect"]) && isset($_GET["roomSelect"]) && isset($_GET["date-schedule"]) && isset($_GET["time-schedule"])) {
      $movieSelect = $_GET["movieSelect"];
      $roomSelect = $_GET["roomSelect"];
      $dateMovie = $_GET["date-schedule"];
      $timeMovie = $_GET["time-schedule"];

      $date_start = $dateMovie. "T" . $timeMovie. ":00";

      $id_movie_select = $db->query("SELECT id FROM movie WHERE title LIKE '$movieSelect'");
      $id_movie = $id_movie_select->fetch()["id"];

      $id_romm_select = $db->query("SELECT id FROM room WHERE name LIKE '$roomSelect'");
      $id_room = $id_romm_select->fetch()["id"];

      $db->query("INSERT INTO movie_schedule (id_movie, id_room, date_begin) VALUES ('$id_movie', '$id_room', '$date_start')");

      ?>
        <br>
      <?php
      echo "The movie ' $movieSelect ' has been had to the schedule for $dateMovie at $timeMovie:00 in the room ' $roomSelect '.";
    }else {
      echo "Add all the values necessary to add a movie";
    }
    ?>
</body>
</html>
