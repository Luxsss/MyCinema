<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Style-Js/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Document</title>
</head>
<body class="bg-add">
<?php
    require("../connect.php");
    $id = $_GET["updateid"];

    ?>
    <section>
      <div class="text-center">
        <h2 class="white">AJOUTEEE</h2>
        <div>
          <span>Menu Admin -> <a href="http://localhost:8000/admin.php"> Here </a> </span>
        </div>
        <form name="form" method="post">
          <select name="UpdateValue">
            <option>VIP</option>
            <option>GOLD</option>
            <option>Classic</option>
            <option>Pass Day</option>
          </select>
          <button type="submit" name="button-updtate">Update</button>
        </form>
      </div>
    </section>
    <?php

    if (isset($_GET["updateid"])) {
      $id = $_GET["updateid"];

      if (isset($_POST["button-updtate"])) {
        if ($_POST["UpdateValue"] == "VIP") {
          $db->query("
          INSERT INTO membership (id_user, id_subscription) VALUE ($id, 1);
          ");
          header('Location: http://localhost:8000/admin.php?search_member=');
          exit;
        }
        elseif ($_POST["UpdateValue"] == "GOLD") {
          $db->query("
          INSERT INTO membership (id_user, id_subscription) VALUE ($id, 2);
          ");
          header('Location: http://localhost:8000/admin.php?search_member=');
          exit;
        }
        elseif ($_POST["UpdateValue"] == "Classic") {
          $db->query("
          INSERT INTO membership (id_user, id_subscription) VALUE ($id, 3);
          ");
          header('Location: http://localhost:8000/admin.php?search_member=');
          exit;
        }
        else {
          $db->query("
          INSERT INTO membership (id_user, id_subscription) VALUE ($id, 4);
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
