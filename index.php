<?php

use phplab7\Model\{database, car};

require_once "vendor/autoload.php";


$dbcon = database::getDb();
$c = new Car();

$cars = $c->getAllCars($dbcon);

?>

<!-- test commit -->

<html lang="en">
<head>
    <title>Lab 6: PHP and SQL</title>
    <link rel="stylesheet" href="" />
</head>
<body>
    <h1>Cars Table</h1>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($cars as $car){ ?>
        <tr>
            <!-- because fetched as associative array, have to format it like below -->
            <th><?= $car['carid']; ?></th>
            <td><?= $car['car_make']; ?></td>
            <td><?= $car['car_model']; ?></td>
            <td><?= $car['car_year']; ?></td>

            <!-- two forms, one for update, one for delete -->
            <td>
                <form action="updatecar.php" method="post">
                    <input type="hidden" name="carid" value="<?= $car['carid'];?>"/>
                    <input type="submit" class="button" name="updateCar" value="Update"/>
                </form>
            </td>
            <td>
                <form action="deletecar.php" method="post">
                    <input type="hidden" name="carid" value="<?= $car['carid'];?>"/>
                    <input type="submit" class="button" name="deleteCar" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php } ?>


        </tbody>


    </table>
    <!-- Add a car -->
    <a href="addcar.php" id="addCarBtn">Add Car</a>
</body>
</html>