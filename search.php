<?php
    include('apiCalls.php');
    $search = $_GET['search'];
    $cars = new Cars();
    $results = $cars->getBrand($search);
    if($results==false){
        $cars->listCarByName(false,$search);
    }else{
        $models = $cars->getCarsByBrand($results);
        foreach($models as $model){
            $cars->listCarByName($model['name'],$search);
        }
        unset($_GET['search']);
    }
?>