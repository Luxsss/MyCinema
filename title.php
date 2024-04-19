<?php
  if (isset($_GET['search'])) {
    $selectOption = $_GET['valueSelect'];

    $pe = $_GET['search'];
    $pe = trim(preg_replace('/\s+/', '_', $pe));
    $res = 0;
    if ($selectOption == "Title") {

      $count = $db->query("SELECT COUNT(title) AS zebi FROM movie WHERE title LIKE '%$pe%' ORDER BY title ASC");
      $count = $count->fetch();
      $count = $count["zebi"];

      $page = isset($_GET['page']) ? intval($_GET['page']): 1 ;
      $nbr_elem_page = 10;
      $nbr_page = ceil($count/$nbr_elem_page);

      $debut = ($page-1) * $nbr_elem_page;

      $all_movies = $db->query("SELECT title,duration FROM movie WHERE title LIKE '%$pe%' ORDER BY title ASC LIMIT $debut,$nbr_elem_page");
      ?>
        <table>
          <thead>
            <tr>
              <th>Films</th>
            </tr>
          </thead>
          <tbody>
      <?php
      if (trim($pe) == "") {
        ?>
          <p class="white">
            <?php echo "There is no movies with this title" .PHP_EOL?>
          </p>
        <?php
      }
      else {
        while ($movie = $all_movies->fetch()) {
          ?>
          <tr>
            <td><?php echo $movie["title"]?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
      </table>
      <?php
        for ($i=1; $i <= $nbr_page ; $i++) {
          echo "<a href='?search=$pe&valueSelect=Title&page=$i'>$i</a>&nbsp";
        }
      }
    }
    else if ($selectOption == "Genre") {

      $count = $db->query("SELECT COUNT(title) AS zebi FROM movie JOIN movie_genre ON movie.id = movie_genre.id_movie JOIN genre ON genre.id = movie_genre.id_genre WHERE genre.name LIKE '%$pe%'");
      $count = $count->fetch();
      $count = $count["zebi"];

      $page = isset($_GET['page']) ? intval($_GET['page']): 1 ;
      $nbr_elem_page = 10;
      $nbr_page = ceil($count/$nbr_elem_page);

      $debut = ($page-1) * $nbr_elem_page;

      $all_movies = $db->query("SELECT title FROM movie JOIN movie_genre ON movie.id = movie_genre.id_movie JOIN genre ON genre.id = movie_genre.id_genre WHERE genre.name LIKE '%$pe%' LIMIT $debut,$nbr_elem_page");
      ?>
        <table>
          <thead>
            <tr>
              <th>Films</th>
            </tr>
          </thead>
          <tbody>
      <?php
      if (trim($pe) == "") {
        ?>
          <p class="white">
            <?php echo "There is no movies with this option" .PHP_EOL?>
          </p>
        <?php
      }
      else {
        while ($movie = $all_movies->fetch()) {
          ?>
          <tr>
            <td><?php echo $movie["title"]?></td>
          </tr>
          <?php
        }
        ?>
        </tbody>
        </table>
        <?php
        for ($i=1; $i <= $nbr_page ; $i++) {
          echo "<a href='?search=$pe&valueSelect=Genre&page=$i'>$i</a>&nbsp";
        }
      }
    }
    else {
      
      $count = $db->query("SELECT COUNT(title) AS zebi FROM movie INNER JOIN distributor ON movie.id_distributor = distributor.id WHERE distributor.name LIKE '%$pe%'");
      $count = $count->fetch();
      $count = $count["zebi"];

      $page = isset($_GET['page']) ? intval($_GET['page']): 1 ;
      $nbr_elem_page = 10;
      $nbr_page = ceil($count/$nbr_elem_page);

      $debut = ($page-1) * $nbr_elem_page;

      $all_movies = $db->query("SELECT title FROM movie INNER JOIN distributor ON movie.id_distributor = distributor.id WHERE distributor.name LIKE '%$pe%' ORDER BY title ASC LIMIT $debut,$nbr_elem_page");
      ?>
        <table>
          <thead>
            <tr>
              <th>Films</th>
            </tr>
          </thead>
          <tbody>
      <?php
      if (trim($pe) == "") {
        ?>
          <p class="white">
            <?php echo "There is no movies with this option" .PHP_EOL?>
          </p>
        <?php
      }
      else {
        while ($movie = $all_movies->fetch()) {
          ?>
          <tr>
            <td><?php echo $movie["title"]?></td>
          </tr>
          <?php
        }
        ?>
        </tbody>
        </table>
        <?php
        for ($i=1; $i <= $nbr_page ; $i++) {
          echo "<a href='?search=$pe&valueSelect=Distributor&page=$i'>$i</a>&nbsp";
        }
      }
    }
  }
  else if (isset($_GET["date-project"]) && isset($_GET["time-project"])) {
    $date = $_GET["date-project"];
    $time = $_GET["time-project"] . ':00';

    $all_movies_date = $db->query("SELECT movie.title AS title FROM movie_schedule JOIN movie ON movie_schedule.id_movie = movie.id WHERE date_begin LIKE '$date $time' ");
    ?>
        <table>
          <thead>
            <tr>
              <th>Films</th>
            </tr>
          </thead>
          <tbody>
      <?php
    if ($date == "") {
      ?>
        <p class="white">
          <?php echo "There is no movies with this option" .PHP_EOL?>
        </p>
      <?php
    }
    else {
      while ($movie = $all_movies_date->fetch()) {
        ?>
          <tr>
            <td><?php echo $movie["title"]?></td>
          </tr>
        <?php
      }
      ?>
      </tbody>
      </table>
      <?php
    }

  }
?>
