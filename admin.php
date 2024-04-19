<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style-Js/style.css">
  <link rel="shortcut icon" href="#">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>My cinema</title>
</head>
<body class="bg-2">

  <header class="Style-Js/bg-black">
      <h2 class="p-4 text-warning text-center"><a href="index.php">My cinema</a></h2>
  </header>
  <div class="m-4">

  <div>
      <span>Menu Admin -> <a href="http://localhost:8000/admin.php">ici !</a> </span>
  </div>

  <div>
      <span>Add movie to schedule <a href="http://localhost:8000/add_movie.php">ici !</a> </span>
  </div>

    <section class="my-4">
      <div class="text-left">
        <h2 class="white">Rechercher un membre :</h2>
        <form name="form" action="" method="get">
          <input type="text" name="search_member" id="search_member" placeholder="Search member">
          <input type="submit">
        </form>
      </div>
    </section>

    <section>
      <?php
        require("connect.php");
        require("member.php");
      ?>
    </section>

  </div>
</body>
</html>
