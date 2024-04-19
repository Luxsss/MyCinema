<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style-Js/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Document</title>
</head>
<body class="bg-newMovie">

  <header class="bg-black">
    <h2 class="p-4 text-center"><a href="index.php" class="link-warning">My cinema</a></h2>
  </header>
  <div class="text-center m-4">
    <form action="" method="POST">
      <label for="fname">First name:</label><br>
      <input type="text" id="fname" name="fname" placeholder="Joe"><br>
      <label for="lname">Last name:</label><br>
      <input type="text" id="lname" name="lname" placeholder="Doe"><br><br>
      <label for="fname">Email : </label><br>
      <input type="text" id="email" name="email" placeholder="joedoe314@dsldf.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"><br>
      <label for="lname">Birthdate : </label><br>
      <input type="date" id="birthdate" name="birthdate"><br><br>
      <label for="fname">Address : </label><br>
      <input type="text" id="address" name="address" placeholder="30 Rue de Toblo"><br>
      <label for="lname">Zipcode : </label><br>
      <input type="text" id="zipcode" name="zipcode" placeholder="10190"><br><br>
      <label for="fname">Country : </label><br>
      <input type="text" id="country" name="country" placeholder="France"><br>
      <label for="lname">City : </label><br>
      <input type="text" id="city" name="city" placeholder="Paris"><br><br>
      <input type="submit" value="Submit">
    </form>
    <?php
      require("connect.php");

      if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["birthdate"]) && isset($_POST["address"]) && isset($_POST["zipcode"]) && isset($_POST["country"]) && isset($_POST["city"]) ) {
        $time = date("H:i:s");

        $firstname = $_POST["fname"];
        $lastname = $_POST["lname"];
        $email = $_POST["email"];
        $birthdate = $_POST["birthdate"]. "T$time";
        $addresss = $_POST["address"];
        $zipcode = $_POST["zipcode"];
        $country = $_POST["country"];
        $city = $_POST["city"];

        try {
          $db->query("INSERT INTO user (email, firstname, lastname, birthdate, address, zipcode, city, country) VALUES ('$email', '$firstname', '$lastname', '$birthdate', '$addresss', '$zipcode', '$city', '$country')");
        } catch (\Throwable $th) {
          echo "The user already exist or fill the form correctly";
        }
      }
    ?>
  </div>
</body>
</html>
