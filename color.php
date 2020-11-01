<?php
if(isset($_REQUEST['color'])){
    include('apiCalls.php');
    $colors = new Colors();
    $color = $colors->getColors($_REQUEST['color']);
}
?>

<body onload="loadQ()">
  <table style="width:100%">
    <tr>
      <th style="width:30%">Color</th>
      <th>Recipe</th>
      <th>Add quantity</th>
      <th>You will need</th>
    </tr>

    <tr>
      <td><img width="212" height="112" class="image" src="<?php echo($color['img']); ?>" /></td>
      <td><?php
        if(array_key_exists('recipe',$color)){
          $recipe = $color['recipe'];
          $recipeColors = $colors->getColors($recipe['colors']);
          foreach($recipeColors as $recipeColor){
              echo($recipeColor['name'].'<img width="20" height="20" class="image"
              src="'.$recipeColor['img'].'"
            /><br/>');
          }
          $flag=true;
        }else{
          $flag=false;
        }
      ?></td>
      <td><?php if($flag){
        foreach($recipeColors as $recipeColor){
          echo('<button class="buttons" style="width:20%; margin-bottom:23px" type="button" onclick="incr(this)" onmousedown="clickLongPress(this)" onmouseup="unclickLongPress(this)">^</button><input style="width:60%;" class="added" type="number"value="0" min="0" onchange="calc(this)">ml<br/>');
        }
      } ?></td>

      <td>
        <?php 
        foreach($recipeColors as $recipeColor){
          echo('<a class="signs"></a><input style="width:70%" class="colors" readonly min="0" value="0">millilitres<br/>');
        }
      ?>
      </td>
      <td>for a total of :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input style="width:50%" id="total"
          value="10" type="number" step="1" min="0" onchange="changeTotal(this)">Lt</td>
    </tr>
    <tr>
      <td><?php echo($color['name']); ?></td>
      <td> ratio <a id="ratio"> <?php echo($recipe['ratio']);?><a /></td>

    </tr>
  </table>
</body>