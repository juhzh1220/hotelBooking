<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <a href="employe.php">Employes</a>
        <a href="client.php">Clients</a>
        <a href="hotel.php">Hotels</a>
        <a class="active" href="chambre.php">Chambres</a>
        <a href="reservations.php">Reservations</a>
        <a href="location.php">Locations</a>
        <a href="welcome.php">Logout</a>
    </div>
    <form method="post">
        <input type="text" name="adresse" placeholder="Adresse" />
        <input type="text" name="price" placeholder="Price" />
        <input type="text" name="commo" placeholder="Commodities" />
        <input type="number" name="capacity" placeholder="Capacity" />
        <select name="disponibility">
            <option value="true">Disponibile</option>
            <option value="false">Occupé</option>

        </select>
        <input type="text" name="vue" placeholder="View" />
        <input type="text" name="etendue" placeholder="Extendable" />
        <input type="text" name="probleme" placeholder="Probleme" />
        <input type="number" name="hotelid" placeholder="HotelID" />




        <input type="submit" name="insert" class="button" value="Insert" />
        <br>
        <input type="number" name="id" placeholder="ID" />
        <input type="submit" name="delete" class="button" value="Delete" />
        <input type="submit" name="modify" class="button" value="Modify" />
        <br>
        <input type="number" name="hotelid" placeholder="HotelID" />
        <input type="submit" name="cap" class="button" value="ChambresCapacity" />
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th></th>
            <th>Adress</th>
            <th></th>
            <th>Price</th>
            <th></th>
            <th>Commodities</th>
            <th></th>
            <th>Capacity</th>
            <th></th>
            <th>Disponibilite</th>
            <th></th>
            <th>View</th>
            <th></th>
            <th>Etendue</th>
            <th></th>
            <th>Probleme</th>
            <th></th>
            <th>HotelID</th>


        <tr>


            <?php
            ob_start();
            $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
            $sql = "Select * From chambre
              ";
            $result = pg_query($cn, $sql);
            while ($row = pg_fetch_object($result)) {
                echo "<tr><td>" . $row->chambreid . "<td><td>" . $row->adresse . "<td><td>" . $row->prix . "<td><td>" . $row->commodities . "<td><td>" . $row->capacity . "<td><td>" . $row->disponibilite . "<td><td>"  . $row->vue . "<td><td>" . $row->etendue . "<td><td>" . $row->probleme . "<td><td>" . $row->hotelid . "<td><td>";
                echo "</tr>";
            }



            ?>
            <table>

                <?php
                if (array_key_exists('insert', $_POST)) {
                    button1();
                }
                if (array_key_exists('delete', $_POST)) {
                    button2();
                }
                if (array_key_exists('modify', $_POST)) {
                    button3();
                }
                if (array_key_exists('cap', $_POST)) {
                    button4();
                }

                function button1()
                {
                    $adresse = $_POST['adresse'];
                    $price = $_POST['price'];
                    $commo = $_POST['commo'];
                    $capacity = $_POST['capacity'];
                    $disponibility = $_POST['disponibility'];
                    $view = $_POST['vue'];
                    $etendue = $_POST['etendue'];
                    $probleme = $_POST['probleme'];
                    $hotelid = $_POST['hotelid'];



                    $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
                    $sql = "Insert into chambre (adresse, prix, commodities,capacity,disponibilite,vue,etendue,probleme)
          VALUES ('$adresse',$price, '$commo', $capacity, '$disponibility','$view','$etendue','$probleme',$hotelid   )";

                    pg_query($cn, $sql);
                }


                function button2()
                {
                    $ID = $_POST['id'];

                    $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
                    $sql = "DELETE FROM chambre WHERE chambreid=$ID;";

                    pg_query($cn, $sql);
                }

                function button3()
                {

                    $adresse = $_POST['adresse'];
                    $price = $_POST['price'];
                    $commo = $_POST['commo'];
                    $capacity = $_POST['capacity'];
                    $disponibility = $_POST['disponibility'];
                    $view = $_POST['vue'];
                    $etendue = $_POST['etendue'];
                    $probleme = $_POST['probleme'];
                    $hotelid = $_POST['hotelid'];
                    $ID = $_POST['id'];
                    $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
                    $sql = "Update chambre
          SET adresse = '$adresse', prix= $price, commodities='$commo', capacity =$capacity, disponibilite=$disponibility, vue=$view, etendue=$etendue, probleme=$probleme, hotelid=$hotelid
          Where chambreid = $ID
          ;";
                    pg_query($cn, $sql);
                }
                function button4()
                {
                    ob_end_clean();
                    $ID = $_POST['hotelid'];

                    $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");

                    $sql = "Select *
                    from chambre
                    where hotelid=$ID
                    ";

                    $result = pg_query($cn, $sql);
                    while ($row = pg_fetch_object($result)) {
                        echo "<tr><td>" . $row->chambreid . "<td><td>" . $row->adresse . "<td><td>" . $row->prix . "<td><td>" . $row->commodities . "<td><td>" . $row->capacity . "<td><td>" . $row->disponibilite . "<td><td>"  . $row->vue . "<td><td>" . $row->etendue . "<td><td>" . $row->probleme . "<td><td>" . $row->hotelid . "<td><td>";
                        echo "</tr>";
                    }
                }







                ?>



</body>

</html>