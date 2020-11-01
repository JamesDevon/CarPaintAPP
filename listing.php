<div class="container">
            <div class="row ng-scope">
              <div style="padding-left: 18em" class="col-md-9 col-md-pull-3">
                <p class="search-results-count">
                <?php 
                    include('apiCalls.php');
                    $cars = new Cars();
                    $cars->listCars();
                ?>
              </div>
            </div>
          </div>