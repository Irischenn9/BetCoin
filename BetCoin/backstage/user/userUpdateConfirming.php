<?php
    require("../LinkToSQL.php");
?>
<center>
<?php
    $no=$_GET["no"];
    $SQL="SELECT * FROM users WHERE no='$no'";
    $result=mysqli_query($LinkToSQL,$SQL);
    $row=mysqli_fetch_assoc($result);
    echo "<table border='1'>";
    echo "<form action='userUpdateConfirming.php?no=".$row["no"]."' method='post' enctype='multipart/form-data'>";
    echo "<tr class='tableTitle' style='background-color:#6B6B6B;'>";
    echo "<th>註記</th><th>no</th><th>email</th><th>password</th><th>bank account</th><th>role</th>";
    echo "</tr>";
    echo "<tr class='tableTitle' style='background-color:#919191;'>";
    echo "<td>原始資料</td><td>".$row["no"]."</td><td>".$row["email"]."</td><td>".$row["pwd"]."</td><td>".$row["bankAccount"]."</td><td>".$row["role"]."</td>";
    echo "</tr><tr>";
    echo "<td>修改資料</td><td>".$row["no"]."</td><td><input type='email' name='email' value='".$row["email"]."' required></td><td><input type='text' name='pwd' value='".$row["pwd"]."' required></td><td><input type='text' name='bankAccount' value='".$row["bankAccount"]."' required></td>
    <td>
    <select id='role' name='role' style='width:100%;'>
        <option value='.".$row["role"].".'>".$row["role"]."</option>
        <option value='U'>U</option>
        <option value='A'>A</option>
    </select>
    </td>";
    echo "</tr>";
    echo "<td colspan='7'><input style='width:100%; text-align:center;' type='submit' value='確認'></td>";
    echo "</form>";
    echo "</table>";
    if(isset($_POST["email"])){
        $email=$_POST["email"];
        $pwd=$_POST["pwd"];
        $bankAccount=$_POST["bankAccount"];
        $role=$_POST["role"];
        $SQLUpdate="UPDATE users SET email = '$email',pwd='$pwd' ,bankAccount='$bankAccount', role='$role' WHERE no='$no'";
        if(mysqli_query($LinkToSQL,$SQLUpdate)){
            echo "<script type='text/javascript'>";
            echo "alert('更新成功');";
            echo "window.close();";
            echo "</script>";
        }else{
            echo "失敗";
        }
    }
?>
</center>