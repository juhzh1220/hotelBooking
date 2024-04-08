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
        <a href="chambre.php">Chambres</a>
        <a href="reservations.php">Reservations</a>
        <a class="active" href="location.php">Locations</a>
        <a href="welcome.php">Logout</a>


    </div>
    <form method="post">
        <input type="number" name="id" placeholder="ID" />
        <input type="submit" name="transform" class="button" value="Delete" />

    </form>
    <table>
        <tr>
            <th>ID</th>
            <th></th>
            <th>Start date</th>
            <th></th>
            <th>End date</th>
            <th></th>
            <th>ChambreID</th>



        <tr>


            <?php
            $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
            $sql = "Select * From location
              ";
            $result = pg_query($cn, $sql);
            while ($row = pg_fetch_object($result)) {
                echo "<tr><td>" . $row->locationid . "<td><td>" . $row->date_de_debut . "<td><td>" . $row->date_de_fin . "<td><td>" . $row->chambreid . "<td><td>";
                echo "</tr>";
            }



            ?>
            <table>

                <?php

                if (array_key_exists('transform', $_POST)) {
                    button2();
                }


                //         function button1()
                //         {
                //             $start = $_POST['debut'];
                //             $end = $_POST['fin'];
                //             $id = $_POST['chambreid'];






                //             $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
                //             $sql = "Insert into location (date_de_debut, date_de_fin, chambreid)
                //   VALUES ('$start','$end', $id  )";

                //             pg_query($cn, $sql);
                //         }


                function button2()
                {
                    $ID = $_POST['id'];


                    $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
                    $sql3 = "DELETE FROM location WHERE locationid=$ID;";
                    pg_query($cn, $sql3);
                }








                ?>



</body>

</html>