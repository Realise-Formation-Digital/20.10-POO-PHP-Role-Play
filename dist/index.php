<?php

require_once '../src/config/loader.php';

// use \App\;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon Svg -->
    <link rel="icon" type="image/svg+xml" href="favicon.svg">

    <title>Balsam Role Play</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/e0632129c8.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php

    $page = 'home';

    if (isset($_GET['id'])) {
        $page = $_GET['id'];
    }

    switch ($page) {
        case 'home':
            include 'home.php';
            break;
        case 'npc':
            include 'npc.php';
            break;
        case 'sell':
            include 'sell.php';
            break;
        case 'fight':
            include 'fight.php';
            break;
        case 'win':
            include 'win.php';
            break;
        case 'over':
            include 'over.php';
            break;
    }

    /* 
    $servername = "localhost";
    $username = "user";
    $password = "user";
    $dbname = "pooroleplay_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `Hero` (`heroName`, `health`, `xp`, `strength`, `stamina`, `bitcoin`) VALUES ('louis222', '10', '0', '1', '1', '20')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
 */


    ?>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>

</html>