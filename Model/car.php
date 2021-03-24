<?php
namespace phplab7\Model;


class Car {

    public function getMakes($db) {
        $sql = "SELECT * FROM makes";

        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        //getting results
        $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $results;


    }


    public function getAllCars($dbcon){
        $sql = "Select * FROM cars";

        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $cars = $pdostm->fetchAll(\PDO::FETCH_ASSOC);
        return $cars;
    }

    public function addCar ($make_id, $car_model, $car_year, $db){
        $sql = "insert into cars (make_id, car_model, car_year) values (:make_id, :car_model, :car_year)";


        $post = $db->prepare($sql);

        $post->bindParam(':make_id', $make_id);
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

    public function updateCar($carid, $make, $car_model, $car_year, $db){
        $sql = "Update cars 
                set make_id = :make,
                    car_model = :car_model,
                    car_year = :car_year
                    WHERE carid = :carid
        ";

        $post = $db->prepare($sql);

        $post->bindParam(':make', $make);
        $post->bindParam(':car_model', $car_model);
        $post->bindParam(':car_year', $car_year);
        $post->bindParam(':carid', $carid);

        $count = $post->execute();

        return $count;
    }
}