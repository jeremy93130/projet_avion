<?php 


class Database {
    public static function dbConnect(){
        $co = null;

        try{
            $co = new PDO('mysql:host=localhost;dbname=avion', "root", "");
        }catch(PDOException $e){
            $co = $e->getMessage();
        }
        return $co;
    }
}