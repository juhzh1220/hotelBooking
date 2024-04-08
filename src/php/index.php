<?php
Session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="index.css">

  <!-- <link rel="stylesheet" href="style.css" /> -->
  <title>Hotel Booking</title>
  <style>
    body {

      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
      overflow: hidden;
      background-color: #333;
    }

    .topnav a {
      float: left;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    .topnav a.active {
      background-color: #04AA6D;
      color: white;
    }
  </style>
</head>

<body>

  <div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="welcome.php">Logout</a>

  </div>

  <nav>
  </nav>
  </header>
  <main>
    <section id="search">
      <form method="post">
        <input type="date" value="2013-01-08" name="start" placeholder="Start From" />
        <input type="date" value="2013-01-08" name="end" placeholder="To" />
        <select name="capacity">
          <option value="1">1Personne</option>
          <option value="2">2Personnes</option>
          <option value="3">3Personnes</option>
          <option value="4">4Personnes</option>
          <option value="5">5Personnes</option>
          <option value="6">6Personnes</option>
          <option value="7">7Personnes</option>
          <option value="8">8Personnes</option>

        </select>
        <select name="chain">
          <option value="1">Hotel1</option>
          <option value="2">Hotel2</option>
          <option value="3">Hotel3</option>
          <option value="4">Hotel4</option>
          <option value="5">Hotel5</option>
        </select>

        <select name="price">
          <option value="0">0-500$</option>
          <option value="500">500-1000$</option>
          <option value="1000">1000-1500$</option>
          <option value="1500">1500-2000$</option>
        </select>
        <input type="submit" name="button1" class="button" value="Search" />
      </form>


    </section>
    <table>
      <tr>
        <th>Address</th>
        <th></th>
        <th>Price</th>
        <th></th>
        <th>Commodities</th>
        <th></th>
        <th>View</th>
        <th></th>
        <th>Etendue?</th>
        <th></th>
        <th>Probleme?</th>
      <tr>
        <?php






        if (array_key_exists('button1', $_POST)) {
          button1();
        }
        function button1()
        {

          $Capacity = $_POST['capacity'];
          $Chain = $_POST['chain'];
          $Price = $_POST['price'];
          $Start = $_POST['start'];
          $End = $_POST['end'];
          $_SESSION['starter'] = $Start;
          $_SESSION['ender'] = $End;

          $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
          $sql = "Select * From chambre
            INNER JOIN hotel ON chambre.hotelid=hotel.hotelID
            where disponibilite=true
            And capacity=$Capacity
            And hotel.chaine_hoteliereid=$Chain
            And prix between $Price And $Price+500
            ;";
          $result = pg_query($cn, $sql);
          while ($row = pg_fetch_object($result)) {
            echo "<tr><td>" . $row->adresse . "<td><td>" . $row->prix . "<td><td>" . $row->commodities . "<td><td>" . $row->vue . "<td><td>" . $row->etendue . "<td><td>" . $row->probleme . "<td><td>";
            echo "<td><a href='reserve.php?id=" . $row->chambreid . "'>reserve</a></td>";
            echo "</tr>";
          }
        }
        ?>









    </table>


  </main>
</body>

</html>