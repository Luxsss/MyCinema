<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style-Js/style.css">
  <link rel="shortcut icon" href="#">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="Style-Js/home.js" defer></script>
  <title>My cinema</title>
</head>
<body class="bg">
  <header class="bg-black">
      <h2 class="p-4 text-center"><a href="index.php" class="link-warning">My cinema</a></h2>
  </header>
  <div class="m-4">

    <section class="border-top my-4">
      <p class="m-4">Connect to admin here : <a  onclick="passwordd()" href="">Here !</a></p>
    </section>

    <section class="border-top my-4">
      <p class="m-4">Want to become a new member ? <a href="sign_in.php">Here !</a></p>
    </section>

    <section>
      <h2 class="white">Rechercher un film :</h2>
      <div class="d-flex justify-content-between">
        <div class="text-left">
          <form name="form" action="" method="get">
            <input type="text" name="search" id="search" placeholder="Search">
            <select name="valueSelect">
              <option>Title</option>
              <option>Genre</option>
              <option>Distributor</option>
            </select>
            <input type="submit">
          </form>
        </div>

        <div>
          <form name="form" action="" method="get">
            <input type="date" name="date-project" id="date-project">
            <input type="time" name="time-project" id="time-project">
            <input type="submit">
          </form>
        </div>

      </div>

    </div>
    </section>

    <section>
      <?php
        require("connect.php");
        require("title.php");
      ?>
    </section>

  </div>
</body>
</html>
