<?php
use phplab7\Model\{database, car};

if (isset($_POST['carid'])){
    $carid = $_POST['carid'];
    $db = database::getDb();

    $c = new Car();
    $count = $c->deleteCar($carid, $db);
    if ($count) {
        //redirecting back to index
        header("Location: index.php");
    } else {
        echo "Error in deleting";
    }

}