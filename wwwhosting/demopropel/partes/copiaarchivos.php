 <?php
    $val[0] = "";
    $val[1] = "";
    $val[2] = "";
    $val[3] = "";
    $val[4] = "";

    if ($dat[1] == "verduras") {
        $val[4] = "selected";
    } elseif ($dat[1] == "limpieza") {
        $val[3] = "selected";
    } elseif ($dat[1] == "salchichonería") {
        $val[2] = "selected";
    } elseif ($dat[1] == "higiene") {
        $val[1] = "selected";
    } else {
        $val[0] = "selected";
    }
    ?>
 <div class="form-group">
     <label for="exampleSelectBorder">Clasificacion del productos</label>
     <select name="lstClas" class="custom-select form-control-border" id="exampleSelectBorder">
         <option value="abarrotes" <?php echo $val[0]; ?>>abarrotes</option>
         <option value="higiene" <?php echo $val[1]; ?>>higiene</option>
         <option value="salchichonería" <?php echo $val[2] ?>>salchichonería</option>
         <option value="limpieza" <?php echo $val[3] ?>>limpieza</option>
         <option value="verduras" <?php echo $val[4] ?>>verduras</option>
     </select>
 </div>


 ////////////////////////////////////////////////////
 Ventas editar ç





 <?php
    $val[0] = "";
    $val[1] = "";
    $val[2] = "";
    $val[3] = "";
    $val[4] = "";

    if ($dat[1] == "verduras") {
        $val[4] = "selected";
    } elseif ($dat[1] == "limpieza") {
        $val[3] = "selected";
    } elseif ($dat[1] == "salchichonería") {
        $val[2] = "selected";
    } elseif ($dat[1] == "higiene") {
        $val[1] = "selected";
    } else {
        $val[0] = "selected";
    }
    ?>
 <div class="form-group">
     <label for="exampleSelectBorder">ID Usuario</label>
     <select name="lstClas" class="custom-select form-control-border" id="exampleSelectBorder">
         <option value="abarrotes" <?php echo $val[0]; ?>>abarrotes</option>
         <option value="higiene" <?php echo $val[1]; ?>>higiene</option>
         <option value="salchichonería" <?php echo $val[2] ?>>salchichonería</option>
         <option value="limpieza" <?php echo $val[3] ?>>limpieza</option>
         <option value="verduras" <?php echo $val[4] ?>>verduras</option>
     </select>
 </div>