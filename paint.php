<div class="container">
            <div class="row ng-scope">
              <div style="padding-left: 18em" class="col-md-9 col-md-pull-3">
                <p class="search-results-count">
<?php
if(isset($_REQUEST['car'])){
    if(isset($_REQUEST['model'])){
        $car = $_REQUEST['car']; 
        $brand = $_REQUEST['model'];
        include('apiCalls.php');
        $cars = new Cars();
        $cars->listCarByName($car,$brand);
    }
}
?>
</div>
            </div>
          </div>