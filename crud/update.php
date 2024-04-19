<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Style-Js/style.css">
  <title>Document</title>
</head>
<body class="bg-update">
<?php
    require("../connect.php");
    $id = $_GET["updateid"];

    ?>
    <section>
      <div class="text-center">
        <h2 class="white">Rechercher un film :</h2>
        <div>
          <span>Menu Admin -> <a href="http://localhost:8000/admin.php"> Here </a> </span>
        </div>
        <form name="form" method="post">
          <select name="merde">
            <option>VIP</option>
            <option>GOLD</option>
            <option>Classic</option>
            <option>Pass Day</option>
          </select>
          <button type="submit" name="merde1">Update</button>
        </form>
      </div>
    </section>
    <?php

    if (isset($_GET["updateid"])) {
      $id = $_GET["updateid"];

      if (isset($_POST["merde1"])) {
        if ($_POST["merde"] == "VIP") {
          $db->query("
          UPDATE membership SET id_user = $id, id_subscription=1  WHERE id_user = $id;
          ");
          header('Location: http://localhost:8000/admin.php?search_member=');
          exit;
        }
        elseif ($_POST["merde"] == "GOLD") {
          $db->query("
          UPDATE membership SET id_user = $id, id_subscription=2  WHERE id_user = $id;
          ");
          header('Location: http://localhost:8000/admin.php?search_member=');
          exit;
        }
        elseif ($_POST["merde"] == "Classic") {
          $db->query("
          UPDATE membership SET id_user = $id, id_subscription=3  WHERE id_user = $id;
          ");
          header('Location: http://localhost:8000/admin.php?search_member=');
          exit;
        }
        else {
          $db->query("
          UPDATE membership SET id_user = $id, id_subscription=4  WHERE id_user = $id;
          ");
          header('Location: http://localhost:8000/admin.php?search_member=');
          exit;
        }
      }
    }
    else {
      echo "Can't get id !";
    }
    ?>
</body>
</html>
