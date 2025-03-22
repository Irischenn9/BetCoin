<?php

$con = mysqli_connect('localhost','root','','betcoin') or die('Unable To connect');

  $sql = "SELECT *FROM `game` WHERE 1;";
  $car_brands = mysqli_query ($con, $sql);

?>
<html>
    <head>
    <title>Dynamic Drop Down Box</title>
    </head>
    <BODY bgcolor ="yellow">
        <form id="form" name="form" method="post">
            Car Brands:
            <select id="t1No" name="t1No" style="width:100%;">
            <option value="">--</option>
             <?php
            $SQL="SELECT * FROM team";
             $result=mysqli_query($LinkToSQL,$SQL);
             while($row=mysqli_fetch_assoc($result)){
             echo "<option value='".$row["no"]."'>".$row["no"]."-".$row["teamName"]."</option>";
                    }
            ?>
             

        <?php

            while ($cat = mysqli_fetch_array(
                                $car_brands,MYSQLI_ASSOC)):;

                ?>
                    <option value="<?php echo $cat['t1No'];
                    ?>">
                               <?php echo $cat['t2No'];?>
                    </option>
                <?php
              endwhile;
                ?>
            </select>
            <input type="submit" name="Submit" value="Select" />
        </form>
    </body>
</html>