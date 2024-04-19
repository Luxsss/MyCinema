<?php
  if (isset($_GET['search_member'])) {
    $pe = $_GET['search_member'];
    $pe = trim(preg_replace('/\s+/', '_', $pe));
    $res = 0;

    $all_names = $db->query("SELECT user.firstname, user.lastname, subscription.name, user.id FROM user left JOIN membership ON user.id = membership.id_user LEFT JOIN subscription ON subscription.id = membership.id_subscription WHERE firstname LIKE '%$pe%' OR lastname LIKE '%$pe%' OR CONCAT(firstname, ' ' ,lastname) LIKE '$pe' OR CONCAT(lastname, ' ', firstname) LIKE '%$pe%' ORDER BY id ASC ");

    if (trim($pe) == "") {
      ?>
      <table>
        <thead>
          <tr>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Abonnement</th>
            <th scope="col">Modify</th>
            <th scope="col">Historique</th>
        </tr>
      </thead>
      <tbody>
      <?php
      while ($name = $all_names->fetch()) {
        ?>
          <tr>
            <td><?php echo $name["firstname"]?></td>
            <td><?php echo $name["lastname"]?></td>
            <td><?php
            if (!isset($name["name"])) {
              echo "None";
              ?>
                <td>
                  <a href="crud/add.php?updateid=<?php echo $name["id"]?>"><button>ADD</button></a>
                </td>
              <?php
            }
            else {
              echo $name["name"];
              ?>
                <td>
                  <a href="crud/update.php?updateid=<?php echo $name["id"]?>"><button>UPDATE</button></a>
                  <a href="crud/delete.php?deleteid=<?php echo $name["id"]?>"><button>DELETE</button></a>
                </td>
                <td>
                  <a href="historique.php?historiqueid=<?php echo $name["id"]?>"><button>HISTORIQUE</button></a>
                </td>
              <?php
            }
            ?></td>
          </tr>
          <?php
      }
      ?>
      </tbody>
      </table>
      <?php
    }
    else {
      ?>
      <table>
        <thead>
          <tr>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Abonnement</th>
            <th scope="col">Modify</th>
        </tr>
      </thead>
      <tbody>
      <?php
      while ($name = $all_names->fetch()) {
        ?>
          <tr>
            <td><?php echo $name["firstname"]?></td>
            <td><?php echo $name["lastname"]?></td>
            <td>
              <?php
              if (!isset($name["name"])) {
                echo "None";
                ?>
                  <td>
                    <a href="crud/add.php?updateid=<?php echo $name["id"]?>"><button>ADD</button></a>
                  </td>
                <?php
              }
              else {
                echo $name["name"];
                ?>
                  <td>
                    <a href="crud/update.php?updateid=<?php echo $name["id"]?>"><button>UPDATE</button></a>
                    <a href="crud/delete.php?deleteid=<?php echo $name["id"]?>"><button>DELETE</button></a>
                  </td>
                  <td>
                    <a href="historique.php?historiqueid=<?php echo $name["id"]?>"><button>Historique</button></a>
                  </td>
                <?php
              }
              ?>
            </td>
          </tr>
        <?php
      }
      ?>
      </tbody>
      </table>
      <?php
      }
    }
  else {

  }
?>
