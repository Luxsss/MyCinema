<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style-Js/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Document</title>
</head>
<body class="bg-historique">

  <header class="Style-Js/bg-black">
    <h2 class="p-4 text-center">Historique d'un membre : </h2>
    <div>
      <p>Menu Admin -> <a href="http://localhost:8000/admin.php"> Here </a> </p>
      <br>
    </div>
  </header>

  <?php
    require ("connect.php");
    if (isset($_GET["historiqueid"])) {

      $id = $_GET["historiqueid"];

      $history = $db->query("SELECT firstname FROM user WHERE id = $id");
    };
  ?>

  <section>
      <div class="text-left">
        <p class="white">Ajouter un film a l'historique de <?php echo $history->fetch()["firstname"]."<br>";?> </p>
        <form name="form" action="" method="POST">
          <select name="historySelect">
            <?php
              require ("connect.php");

              if (isset($_GET["historiqueid"])) {
                $id = $_GET["historiqueid"];
              }

              $all_history = $db->query("SELECT movie.title AS title, room.name AS room, date_begin AS datest FROM movie_schedule JOIN movie ON movie.id = movie_schedule.id_movie JOIN room ON room.id = movie_schedule.id_room WHERE date_begin >= '2018-01-01 00:00:00' ORDER BY date_begin ASC;");

              while ($history = $all_history->fetch()) {
                ?>
                  <option> <?php echo $history["title"] . " / " . $history["room"] . " / " . $history["datest"]?> </option>
                <?php
              }
            ?>
          </select>
          <input type="submit" value=" Add ">
        </form>

        <?php
        if (isset($_POST["historySelect"])) {
          $pli = $_POST["historySelect"];
          $array_schedule = $pli;
          $arr = preg_split("/\//", $array_schedule);
          $movie = trim($arr["0"]);
          $room = trim($arr["1"]);

          $time = trim($arr["2"]);
          $time = str_replace(" ","T","$time");

          $id_movie = $db->query("SELECT id FROM movie WHERE title LIKE '$movie' ");
          $id_movie = $id_movie->fetch()["id"];

          $id_room = $db->query("SELECT id FROM room WHERE room.name LIKE '$room' ");
          $id_room = $id_room->fetch()["id"];

          $id_membership = $db->query("SELECT membership.id AS id, user.firstname FROM membership JOIN user ON membership.id_user = user.id WHERE user.id LIKE '$id' ");
          $id_membership = $id_membership->fetch()["id"];

          $id_session = $db->prepare("SELECT movie_schedule.id AS id FROM movie_schedule JOIN movie ON movie_schedule.id_movie = movie.id JOIN room ON movie_schedule.id_room = room.id WHERE movie.title = :movie AND room.name = :room AND date_begin = :time");

          $id_session->execute([
              'movie' => $movie,
              'room' => $room,
              'time' => $time
          ]);

          $res = $id_session->fetch();

          if ($res) {
            $id_session = $res['id'];
            $db->query("INSERT INTO membership_log (id_membership, id_session) VALUES ('$id_membership', '$id_session')");
          }
          else {
            echo "ERROR";
          }
        }
        ?>
      </div>
      <br>
    </section>



  <?php
    require("connect.php");
    if (isset($_GET["historiqueid"])) {

      $id = $_GET["historiqueid"];

      $history = $db->query(
        "SELECT movie.title AS title, user.firstname AS firstname, movie_schedule.date_begin AS date_begin, room.name AS namee FROM movie
        JOIN movie_schedule ON movie.id = movie_schedule.id_movie
        JOIN room ON movie_schedule.id_room = room.id
        JOIN membership_log ON movie_schedule.id = membership_log.id_session
        JOIN membership ON membership_log.id_membership = membership.id
        JOIN user ON membership.id_user = user.id
        WHERE id_user = $id
      ");
  ?>
    <table>
      <thead>
        <tr>
          <th>Movies</th>
          <th>Rooms</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>

    <?php
      while ($historys = $history->fetch()) {
        ?>
          <tr>
            <td>
              <?php echo $historys["title"].'<br>'; ?>
            </td>
            <td>
              <?php echo $historys["namee"].'<br>'; ?>
            </td>
            <td>
              <?php echo $historys["date_begin"].'<br>'; ?>
            </td>
          </tr>
        <?php
      }
    ?>
      </tbody>
      </table>
    <?php
  }
  ?>
</body>
</html>
