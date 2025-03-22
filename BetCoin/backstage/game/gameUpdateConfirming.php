<?php
    require("../LinkToSQL.php");
?>
<center>
<?php
    $no=$_GET["no"];
    $SQL="SELECT * FROM game WHERE no='$no'";
    $result=mysqli_query($LinkToSQL,$SQL);
    $row=mysqli_fetch_assoc($result);

    $SQLTeam1="SELECT * FROM team WHERE no=".$row["t1No"];
    $resultTeam1=mysqli_query($LinkToSQL,$SQLTeam1);
    $rowTeam1=mysqli_fetch_assoc($resultTeam1);

    $SQLTeam2="SELECT * FROM team WHERE no=".$row["t2No"];
    $resultTeam2=mysqli_query($LinkToSQL,$SQLTeam2);
    $rowTeam2=mysqli_fetch_assoc($resultTeam2);

    echo "<table border='1'>";
    echo "<form action='gameUpdateConfirming.php?no=".$row["no"]."' method='post' enctype='multipart/form-data'>";
    echo "<tr class='tableTitle' style='background-color:#6B6B6B;'>";
    echo "<th>註記</th><th>no</th><th>隊伍1</th><th>隊伍2</th><th>隊伍1賠率</th><th>隊伍2賠率</th><th>隊伍1勝負</th><th>頻道參數</th><th>賽局開始時間</th>";
    echo "</tr>";
    echo "<tr class='tableTitle' style='background-color:#919191;'>";
    echo "<td>原始資料</td><td>".$row["no"]."</td><td>".$rowTeam1["no"]."-".$rowTeam1["teamName"]."</td><td>".$rowTeam2["no"]."-".$rowTeam2["teamName"]."</td><td>".$row["team1Odds"]."</td><td>".$row["team2Odds"]."</td><td>".$row["outcome"]."</td><td>".$row["channelParameter"]."</td><td>".$row["gameStartTime"]."</td>";
    echo "</tr><tr>";

    $SQLTeam="SELECT * FROM team";
    $resultTeam=mysqli_query($LinkToSQL,$SQLTeam);
    echo "<td>修改資料</td><td>".$row["no"]."</td><td>
    <select id='t1No' name='t1No' style='width:100%;'>
        <option value='".$rowTeam1["no"]."'>".$rowTeam1["no"]."-".$rowTeam1["teamName"]."</option>";

    while($rowTeam=mysqli_fetch_assoc($resultTeam)){
        echo "<option value='".$rowTeam["no"]."'>".$rowTeam["no"]."-".$rowTeam["teamName"]."</option>";
    }

    echo "</select>
    </td><td>";
    $resultTeam=mysqli_query($LinkToSQL,$SQLTeam);
    echo "
    <select id='t2No' name='t2No' style='width:100%;'>
        <option value='".$rowTeam2["no"]."'>".$rowTeam2["no"]."-".$rowTeam2["teamName"]."</option>";

    while($rowTeam=mysqli_fetch_assoc($resultTeam)){
        echo "<option value='".$rowTeam["no"]."'>".$rowTeam["no"]."-".$rowTeam["teamName"]."</option>";
    }
    echo "</select>
    </td><td><input type='text' name='team1Odds' value='".$row["team1Odds"]."' required></td><td><input type='text' name='team2Odds' value='".$row["team2Odds"]."' required></td><td>
    <select id='outcome' name='outcome' style='width:100%;'>
        <option value='".$row["outcome"]."'>".$row["outcome"]."</option>
        <option value='未知'>未知</option>
        <option value='勝'>勝</option>
        <option value='負'>負</option>
    </select>
    </td><td>
    <input type='text' name='channelParameter' value='".$row["channelParameter"]."' required>
    </td><td>
    <input type='datetime-local' step='1' name='gameStartTime' value='".getDatetime($row["gameStartTime"],"")."' required>
    </td>";
    echo "</tr>";
    echo "<td colspan='9'><input style='width:100%; text-align:center;' type='submit' name='setted' value='確認'></td>";
    echo "</form>";
    echo "</table>";
    
    if(isset($_POST["setted"])){
        $t1No=$_POST["t1No"];
        $t2No=$_POST["t2No"];
        $team1Odds=$_POST["team1Odds"];
        $team2Odds=$_POST["team2Odds"];
        $outcome=$_POST["outcome"];
        $channelParameter=$_POST["channelParameter"];
        $gameStartTime=$_POST["gameStartTime"]; 
        $SQLUpdate="UPDATE game SET t1No = '$t1No',t2No='$t2No' ,team1Odds='$team1Odds', team2Odds='$team2Odds',outcome='$outcome',channelParameter='$channelParameter',gameStartTime='$gameStartTime' WHERE no='$no'";

        if($row["outcome"]=="未知" &&($outcome=="勝"||$outcome=="負")){
            $SQLTable="SELECT * FROM usergame where gNo=".$no;
            $result=mysqli_query($LinkToSQL,$SQLTable);//usergame[""]
            while($rowUsergame=mysqli_fetch_assoc($result)){    
                if($outcome=="勝" && $rowUsergame["tNo"]==$row["t1No"]){
                    $total=($row["team1Odds"]*$rowUsergame["betAmount"])-$rowUsergame["betAmount"];
                    $uNo=$rowUsergame["uNo"];
                    $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','G','$total','".getDatetime($rowUsergame["date"],"")."')";
                    $resultInsert=mysqli_query($LinkToSQL,$SQLInsert);
                }else if($outcome=="勝" && $rowUsergame["tNo"]==$row["t2No"]){
                    $total=(-1)*$rowUsergame["betAmount"];
                    $uNo=$rowUsergame["uNo"];
                    $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','G','$total','".getDatetime($rowUsergame["date"],"")."')";
                    $resultInsert=mysqli_query($LinkToSQL,$SQLInsert);       
                }else if($outcome=="負" && $rowUsergame["tNo"]==$row["t1No"]){
                    $total=(-1)*$rowUsergame["betAmount"];
                    $uNo=$rowUsergame["uNo"];
                    $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','G','$total','".getDatetime($rowUsergame["date"],"")."')";
                    $resultInsert=mysqli_query($LinkToSQL,$SQLInsert);       
                }else if($outcome=="負" && $rowUsergame["tNo"]==$row["t2No"]){
                    $total=($row["team2Odds"]*$rowUsergame["betAmount"])-$rowUsergame["betAmount"];
                    $uNo=$rowUsergame["uNo"];
                    $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','G','$total','".getDatetime($rowUsergame["date"],"")."')";
                    $resultInsert=mysqli_query($LinkToSQL,$SQLInsert);       
                }
            }
        }else{
            $SQLTable="SELECT * FROM usergame where gNo=".$no;
            $result=mysqli_query($LinkToSQL,$SQLTable);//usergame[""]
            while($rowUsergame=mysqli_fetch_assoc($result)){
                $uNo=$rowUsergame["uNo"];
                $SQLDelete="DELETE FROM money WHERE uNo='$uNo' AND changeTime='".getDatetime($rowUsergame["date"],"")."'";
                $resultDelete=mysqli_query($LinkToSQL,$SQLDelete);

                if($outcome=="勝" && $rowUsergame["tNo"]==$row["t1No"]){
                    $total=($row["team1Odds"]*$rowUsergame["betAmount"])-$rowUsergame["betAmount"];
                    $uNo=$rowUsergame["uNo"];
                    $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','G','$total','".getDatetime($rowUsergame["date"],"")."')";
                    $resultInsert=mysqli_query($LinkToSQL,$SQLInsert);
                }else if($outcome=="勝" && $rowUsergame["tNo"]==$row["t2No"]){
                    $total=(-1)*$rowUsergame["betAmount"];
                    $uNo=$rowUsergame["uNo"];
                    $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','G','$total','".getDatetime($rowUsergame["date"],"")."')";
                    $resultInsert=mysqli_query($LinkToSQL,$SQLInsert);       
                }else if($outcome=="負" && $rowUsergame["tNo"]==$row["t1No"]){
                    $total=(-1)*$rowUsergame["betAmount"];
                    $uNo=$rowUsergame["uNo"];
                    $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','G','$total','".getDatetime($rowUsergame["date"],"")."')";
                    $resultInsert=mysqli_query($LinkToSQL,$SQLInsert);       
                }else if($outcome=="負" && $rowUsergame["tNo"]==$row["t2No"]){
                    $total=($row["team2Odds"]*$rowUsergame["betAmount"])-$rowUsergame["betAmount"];
                    $uNo=$rowUsergame["uNo"];
                    $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','G','$total','".getDatetime($rowUsergame["date"],"")."')";
                    $resultInsert=mysqli_query($LinkToSQL,$SQLInsert);       
                }
            }
        }
        
        /*else if(($row["outcome"]=="勝"||$row["outcome"]=="負") && $outcome=="未知"){
            $SQLTable="SELECT * FROM usergame where gNo=".$no;
            $result=mysqli_query($LinkToSQL,$SQLTable);

            while($rowUsergame=mysqli_fetch_assoc($result)){
                $uNo=$rowUsergame["uNo"];
                $SQLDelete="DELETE FROM money WHERE uNo='$uNo' AND changeTime='".getDatetime($rowUsergame["date"],"")."'";
                $resultDelete=mysqli_query($LinkToSQL,$SQLDelete);
            }


        }else if($row["outcome"]=="負" && $outcome=="勝"){
            $SQLTable="SELECT * FROM usergame where gNo=".$no;
            $result=mysqli_query($LinkToSQL,$SQLTable);
            
            while($rowUsergame=mysqli_fetch_assoc($result)){
                $uNo=$rowUsergame["uNo"];
                $SQLDelete="DELETE FROM money WHERE uNo='$uNo' AND changeTime='".getDatetime($rowUsergame["date"],"")."'";
                $resultDelete=mysqli_query($LinkToSQL,$SQLDelete);

                if($rowUsergame["tNo"]==$row["t1No"]){
                    $total=$row["team1Odds"]*$rowUsergame["betAmount"];
                    $uNo=$rowUsergame["uNo"];
                    $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','G','$total','".getDatetime($rowUsergame["date"],"")."')";
                    $resultInsert=mysqli_query($LinkToSQL,$SQLInsert);
                }else if($rowUsergame["tNo"]==$row["t2No"]){
                    $total=(-1)*$rowUsergame["betAmount"];
                    $uNo=$rowUsergame["uNo"];
                    $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','G','$total','".getDatetime($rowUsergame["date"],"")."')";
                    $resultInsert=mysqli_query($LinkToSQL,$SQLInsert);       
                }
            }


        }else if($row["outcome"]=="勝" && $outcome=="負"){
            $SQLTable="SELECT * FROM usergame where gNo=".$no;
            $result=mysqli_query($LinkToSQL,$SQLTable);
            
            while($rowUsergame=mysqli_fetch_assoc($result)){
                $uNo=$rowUsergame["uNo"];
                $SQLDelete="DELETE FROM money WHERE uNo='$uNo' AND changeTime='".getDatetime($rowUsergame["date"],"")."'";
                $resultDelete=mysqli_query($LinkToSQL,$SQLDelete);

                if($rowUsergame["tNo"]==$row["t1No"]){
                    $total=(-1)*$rowUsergame["betAmount"];
                    $uNo=$rowUsergame["uNo"];
                    $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','G','$total','".getDatetime($rowUsergame["date"],"")."')";
                    $resultInsert=mysqli_query($LinkToSQL,$SQLInsert);       
                }else if($rowUsergame["tNo"]==$row["t2No"]){
                    $total=$row["team2Odds"]*$rowUsergame["betAmount"];
                    $uNo=$rowUsergame["uNo"];
                    $SQLInsert="INSERT INTO money (no, uNo, sourceFrom, changeAmount, changeTime) VALUES (NULL,'$uNo','G','$total','".getDatetime($rowUsergame["date"],"")."')";
                    $resultInsert=mysqli_query($LinkToSQL,$SQLInsert);       
                }
            }
        }
*/
        if(mysqli_query($LinkToSQL,$SQLUpdate)){
            echo "<script type='text/javascript'>";
            echo "alert('更新成功');";
            echo "window.close();";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('更新失敗');";
            echo "window.close();";
            echo "</script>";
        }
    }
?>
</center>