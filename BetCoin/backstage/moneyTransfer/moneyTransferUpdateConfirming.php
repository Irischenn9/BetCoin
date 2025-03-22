<?php
    require("../LinkToSQL.php");
?>
<center>
<?php
    $no=$_GET["no"];
    $SQL="SELECT * FROM moneytransfer WHERE no='$no'";
    $result=mysqli_query($LinkToSQL,$SQL);
    $row=mysqli_fetch_assoc($result);

    $SQLUserNo="SELECT * FROM users WHERE no=".$row["uNo"];
    $resultUserNo=mysqli_query($LinkToSQL,$SQLUserNo);
    $rowUserNo=mysqli_fetch_assoc($resultUserNo);


    echo "<table border='1'>";
    echo "<form action='moneyTransferUpdateConfirming.php?no=".$row["no"]."' method='post' enctype='multipart/form-data'>";
    echo "<tr class='tableTitle' style='background-color:#6B6B6B;'>";
    echo "<th>註記</th><th>no</th><th>玩家編號</th><th>數量</th><th>I存入/O取出</th><th>認證</th><th>詢問時間</th><th>認證時間</th>";
    echo "</tr>";
    echo "<tr class='tableTitle' style='background-color:#919191;'>";
    echo "<td>原始資料</td><td>".$row["no"]."</td><td>".$row["uNo"]."-".$rowUserNo["email"]."</td><td>".$row["amount"]."</td>
    <td>".$row["inOrOut"]."</td><td>".$row["comfirm"]."</td><td>".$row["askDate"]."</td><td>".$row["comfirmDate"]."</td>";
    echo "</tr><tr>";


    $SQLUser="SELECT * FROM users";
    $resultUser=mysqli_query($LinkToSQL,$SQLUser);

    echo "<td>修改資料</td>
    <td>".$row["no"]."</td>
    <td>
    <select id='uNo' name='uNo' style='width:100%;'>
        <option value='".$rowUserNo["no"]."'>".$rowUserNo["no"]."-".$rowUserNo["email"]."</option>";

    echo "
    </select>
    </td>
    <td><input type='number' name='amount' value='".$row["amount"]."' readonly></td>
    <td style='min-width:100px;'>
        <select id='inOrOut' name='inOrOut' style='width:100%;'>
            <option value='".$row["inOrOut"]."'>".$row["inOrOut"]."</option>
            <option value='I'>I</option>
            <option value='O'>O</option>
        </select>
    </td>
    <td>
        <select id='comfirm' name='comfirm' style='width:100%;'>
            <option value='".$row["comfirm"]."'>".$row["comfirm"]."</option>
            <option value='Y'>Y</option>
            <option value='N'>N</option>
        </select>
    </td> 
    <td>
        <input type='datetime-local' step='1' name='askDate' value='".getDatetime($row["askDate"],"")."' required>
    </td>
    <td>
        <input type='datetime-local' step='1' name='comfirmDate' value='".getDatetime($row["comfirmDate"],"")."' required>
    </td>";

    echo "</tr>";
    echo "<tr><td colspan='9'><input style='width:100%; text-align:center;' type='submit' name='setted' value='確認'></td>";
    echo "</tr>";
    echo "</form>";
    echo "</table>";
    
    if(isset($_POST["setted"])){
        $uNo=$_POST["uNo"];
        $amount=$_POST["amount"];
        $inOrOut=$_POST["inOrOut"];
        $comfirm=$_POST["comfirm"];
        $askDate=$_POST["askDate"];
        $comfirmDate=$_POST["comfirmDate"];
        $SQLUpdate="UPDATE moneytransfer SET uNo = '$uNo',amount='$amount', inOrOut='$inOrOut' ,comfirm='$comfirm', askDate='$askDate',comfirmDate='$comfirmDate' WHERE no='$no'";
        
        if($comfirm==$row["comfirm"]){
            if($row["inOrOut"]=="I" && $inOrOut=="O"){
                $amount=(-1)*$amount;
                $SQLDelete="DELETE FROM money WHERE sourceFrom='T' AND changeTime='".getDatetime($row["comfirmDate"],"")."'";
                mysqli_query($LinkToSQL,$SQLDelete);
                $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','T','$amount','$comfirmDate')";
                mysqli_query($LinkToSQL,$SQLInsert);
                if(mysqli_query($LinkToSQL,$SQLUpdate)){
                    echo "<script type='text/javascript'>";
                    echo "alert('匯款管理更新成功，並新增至金錢管理');";
                    echo "window.close();";
                    echo "</script>";
                }else{
                    echo "<script type='text/javascript'>";
                    echo "alert('更新失敗');";
                    echo "window.close();";
                    echo "</script>";
                }
            }else if($row["inOrOut"]=="O" && $inOrOut=="I"){
                $SQLDelete="DELETE FROM money WHERE sourceFrom='T' AND changeTime='".getDatetime($row["comfirmDate"],"")."'";
                mysqli_query($LinkToSQL,$SQLDelete);
                $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','T','$amount','$comfirmDate')";
                mysqli_query($LinkToSQL,$SQLInsert);
                if(mysqli_query($LinkToSQL,$SQLUpdate)){
                    echo "<script type='text/javascript'>";
                    echo "alert('匯款管理更新成功，並新增至金錢管理');";
                    echo "window.close();";
                    echo "</script>";
                }else{
                    echo "<script type='text/javascript'>";
                    echo "alert('更新失敗');";
                    echo "window.close();";
                    echo "</script>";
                }
            }

        }

        //此if是用於認證若是認證後新增資料至money表，y改成n則需要刪除
        if($row["comfirm"]=="N"&& $comfirm=="Y"){
            if($row["inOrOut"]=="I"){
                $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','T','$amount','$comfirmDate')";
            }else if($row["inOrOut"]=="O"){
                $amount=(-1)*$amount;
                $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','T','$amount','$comfirmDate')";
            }
            mysqli_query($LinkToSQL,$SQLInsert);
            if(mysqli_query($LinkToSQL,$SQLUpdate)){
                echo "<script type='text/javascript'>";
                echo "alert('匯款管理更新成功，並新增至金錢管理');";
                echo "window.close();";
                echo "</script>";
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('更新失敗');";
                echo "window.close();";
                echo "</script>";
            }
        }else if($row["comfirm"]=="Y"&& $comfirm=="N"){
            $SQLDelete="DELETE FROM money WHERE sourceFrom='T' AND changeTime='".getDatetime($row["comfirmDate"],"")."'";
            mysqli_query($LinkToSQL,$SQLDelete);
            if(mysqli_query($LinkToSQL,$SQLUpdate)){
                echo "<script type='text/javascript'>";
                echo "alert('匯款管理更新成功，並刪除金錢管理中的資料!');";
                echo "window.close();";
                echo "</script>";
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('更新失敗');";
                echo "window.close();";
                echo "</script>";
            }
        }
        echo "<script type='text/javascript'>";
        echo "alert('更新失敗');";
        echo "window.close();";
        echo "</script>";   
    }
?>
</center>