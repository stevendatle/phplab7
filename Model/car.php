<?php
namespace phplab7\Model;
class Car {

    public function getAllCars($dbcon){
        $sql = "Select * FROM cars";

        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $cars = $pdostm->fetchAll(\PDO::FETCH_ASSOC);
        return $cars;
    }

    public function addCar ($car_make, $car_model, $car_year, $db){
        $sql = "insert into cars (car_make, car_model, car_year) values (:car_make, :car_model, :car_year)";


        $post = $db->prepare($sql);

        $post->bindParam(':car_make', $car_make);
        $post->bindParam(':car_model', $car_model);
        $post->bindParam(':car_year', $car_year);

        $count = $post->execute();
        return $count;
    }

    public function deleteCar ($carid, $db){
        $sql = "delete from cars where carid = :carid";

        $post = $db->prepare($sql);
        $post->bindParam(':carid', $carid);
        $count = $post->execute();
        return $count;
    }

    public function getCarById ($carid, $db){
        $sql = "select * from cars where carid = :carid";
        $post = $db->prepare($sql);
        $post->bindParam(':carid', $carid);
        $post->execute();
        return $post->fetch(\PDO::FETCH_OBJ);
    }

    public function updateCar($carid, $car_make, $car_model, $car_year, $db){
        $sql = "Update cars 
                set car_make = :car_make,
                    car_model = :car_model,
                    car_year = :car_year
                    WHERE carid = :carid
        ";

        $post = $db->prepare($sql);

        $post->bindParam(':car_make', $car_make);
        $post->bindParam(':car_model', $car_model);
        $post->bindParam(':car_year', $car_year);
        $post->bindParam(':carid', $carid);

        $count = $post->execute();

        return $count;
    }
}