<?php

    class Cars{

        private $cars;

        function __construct(){
            $this->cars = json_decode(file_get_contents("https://carpaint.herokuapp.com/brands"),true);
        }
        

        public function getCarsCount(){
            $count = 0;
            foreach($this->cars as $value){
                $count += count($value["models"]);
            }
            return $count;
        }

        public function listCars(){
            $colors = new Colors();
            foreach($this->cars as $car){
                $brand = $car['brand'];
                foreach($car['models'] as $model){
                    $paints = $colors->getColors($model['colors']);
                    echo('<section class="search-result-item">
                    <a class="image-link" href="#"
                      ><img width="512" height="312" class="image"
                        src="'.$model['img'].'"
                      />
                    </a>
                    <div class="search-result-item-body">
                      <div class="row">
                        <div class="col-sm-9">
                          <h4 class="search-result-item-heading">
                            <a href="#">'.$brand.'</a>
                          </h4>
                          <p class="info">'.$model['name'].'</p>
                        </div>
                        <div class="col-sm-3 text-align-center">
                          <a class="btn btn-primary btn-info btn-sm" href="./index.php?p=paint&model='.$brand.'&car='.$model['name'].'">Paint it</a>
                          </br>
                          <p>colors : </br>
                        ');
                        foreach($paints as $singlePaint){
                            echo('<img  width="20" height="20" class="image" src="'.$singlePaint['img'].'"/>');
                        }
                        echo('</p></div>
                        </div>
                      </div>
                    </section>');
                }
            }
        }

        public function listCarByName($name,$brand){
          if($name==false){
            echo("results : 0");
          }else{
            $colors = new Colors();
            $carBrand = $this->getBrand($brand);
            $carModel = $this->getCar( $carBrand, $name );
            echo('
            <a class="image-link" href="#"
              ><img width="512" height="312" class="image"
                src="'.$carModel['img'].'"
              />
            </a>
            <div class="search-result-item-body">
              <div class="row">
                <div class="col-sm-9">
                  <h4 class="search-result-item-heading">
                    <a href="#">'.$carBrand['brand'].'</a>
                  </h4>
                  <p class="info">'.$carModel['name'].'</p>
                </div>
                <div class="col-sm-3 text-align-center">
                  <p>Select color : </br>
                ');
                $paints = $colors->getColors($carModel['colors']);
                foreach($paints as $singlePaint){
                    echo('
                    <a class="btn  btn-info btn-sm" href="./index.php?p=color&color='.$singlePaint['id'].'">
                    <img " width="50" height="50" class="image" src="'.$singlePaint['img'].'"/>
                    </a>
                    ');
                }
                echo('</p></div>
                </div>
              </div>
            ');
          }
            
        }

        public function getBrand($brand){
            foreach($this->cars as $car){
                if($brand==$car['brand']){
                    return $car;
                }
            }
            return false;
        }

        private function getCar($brand,$car){
            foreach($brand['models'] as $model){
                if($model['name']==$car){
                    return $model;
                }
            }
        }

        public function getCarsByBrand($brand){
          $models = [];
          foreach($brand['models'] as $model){
                array_push($models , $model);     
        }
        return $models;
      }
    
    }

    class Colors{

        private $colors;

        function __construct(){
            $this->colors = json_decode(file_get_contents("https://carpaint.herokuapp.com/colors"),true);
        }

        function getColors($ids){
            if(is_array($ids)){
              $paints =[];
              foreach($ids as $color){
                foreach($this->colors as $values){
                    if($values['id']==$color){
                        array_push($paints , $values);
                    }
                }
            }
            return $paints;
            }
            foreach($this->colors as $values){
              if($values['id']==$ids){
                  return $values;
              }
        }
    }
  }

?>