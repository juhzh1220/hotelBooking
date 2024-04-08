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
        <a class="active" href="hotel.php">Hotels</a>
        <a href="chambre.php">Chambres</a>
        <a href="reservations.php">Reservations</a>
        <a href="location.php">Locations</a>
        <a href="welcome.php">Logout</a>
    </div>
    <form method="post">
        <input type="text" name="nombre" placeholder="Nombre-Chambres" />
        <input type="text" name="adresse" placeholder="Adresse" />
        <input type="number" name="phone" placeholder="Telephone" />
        <input type="text" name="Email" placeholder="Email" />
        <input type="submit" name="insert" class="button" value="Insert" />
        <br>
        <input type="number" name="id" placeholder="ID" />
        <input type="submit" name="delete" class="button" value="Delete" />
        <input type="submit" name="modify" class="button" value="Modify" />
        <input type="submit" name="dispon" class="button" value="Chambre Disponible" />
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th></th>
            <th>Number_Chambres</th>
            <th></th>
            <th>Adresse</th>
            <th></th>
            <th>Telephone</th>
            <th></th>
            <th>Email</th>


        <tr>


            <?php
            $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
            $sql = "Select * From hotel";
            $result = pg_query($cn, $sql);
            while ($row = pg_fetch_object($result)) {
                echo "<tr><td>" . $row->hotelid . "<td><td>" . $row->nombre_chambres . "<td><td>" . $row->adresse . "<td><td>" . $row->telephone . "<td><td>" . $row->courriel . "<td><td>";
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
                if (array_key_exists('dispon', $_POST)) {
                    button4();
                }

                function button1()
                {
                    $Name = $_POST['nombre'];
                    $Adresse = $_POST['adresse'];
                    $Nas = $_POST['phone'];
                    $date = $_POST['Email'];


                    $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
                    $sql = "Insert into hotel (nombre_chambres, adresse, telephone,courriel)
          VALUES ('$Name','$Adresse', $Nas, '$date')";

                    pg_query($cn, $sql);
                }


                function button2()
                {
                    $ID = $_POST['id'];

                    $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
                    $sql = "DELETE FROM hotel WHERE hotelid=$ID;";
                    pg_query($cn, $sql);


                    // $sql2 = "DELETE FROM chambre WHERE hotelid=$ID;";
                    // pg_query($cn, $sql2);
                }

                function button3()
                {

                    $Name = $_POST['nombre'];
                    $Adresse = $_POST['adresse'];
                    $Nas = $_POST['phone'];
                    $Date = $_POST['Email'];
                    $ID = $_POST['id'];
                    $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
                    $sql = "Update hotel
          SET nombre_chambres = '$Name', adresse= '$Adresse', telephone=$Nas, courriel ='$Date'
          Where hotelid = $ID
          ;";
                    pg_query($cn, $sql);
                }
                function button4()
                {
                    $ID = $_POST['id'];
                    $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
                    $sql = "Select Count (*) as count
                    From chambre
                    Where disponibilite=true
                    and hotelid=$ID
                   ;";
                    $result = pg_query($cn, $sql);
                    while ($row = pg_fetch_assoc($result)) {
                        $output = $row['count'];
                    }




                    echo "<script type='text/javascript'>alert({$output});</script>";
                }






                ?>



</body>

</html>