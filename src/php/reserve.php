<?php
Session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <a href="index.php">Home</a>
        <a href="welcome.php">Logout</a>

    </div>



</body>

</html>
<?php
$S = $_SESSION['starter'];
$E = $_SESSION['ender'];
echo ("RESERVATION SUCCESFULL");
$id = $_GET['id'];



$cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
$sql2 = "Insert into reservation (date_de_debut, date_de_fin, chambreid)
VALUES ('$S','$E', $id)";
pg_query($cn, $sql2);






?>