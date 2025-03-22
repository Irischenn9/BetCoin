<?php require("../LinkToSQL.php")?>
<html>
    <header>
        <title>後臺管理</title>
        <link href="../css/backStage.css" rel="stylesheet">
    </header>
    <body>
        <div class="navbar">
        <div class="bar"></div>
        <div class="titleText"><h1>帳號管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="../user/userInsert.php">新增</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../user/userUpdate.php">更新</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../user/userSearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../user/userDelete.php">刪除</a></p></div>
                </center>
            <div class="titleText"><h1>金錢管理</h1></div>
                <center>    
                     
                    <div class="shape-ex4"><p><a class="link" href="../money/moneySearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../money/moneyDelete.php">刪除</a></p></div>
                </center>
            <div class="titleText"><h1>匯款管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="../moneyTransfer/moneyTransferUpdate.php">更新</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../moneyTransfer/moneyTransferSearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../moneyTransfer/moneyTransferDelete.php">刪除</a></p></div>
                </center>
            <div class="titleText"><h1>參賽管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="../userGame/userGameSearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../userGame/userGameDelete.php">刪除</a></p></div>
                </center>
            <div class="titleText"><h1>賽局管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="gameInsert.php">新增</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="gameUpdate.php">更新</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="gameSearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="gameDelete.php">刪除</a></p></div>
                </center>
            <div class="titleText"><h1>隊伍管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="../team/teamInsert.php">新增</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../team/teamDelete.php">刪除</a></p></div>
                </center>
        </div>
            
        
        <div class="content" style="font-size:42px; width:83%;">
            <center>
            賽局管理新增</br>
            <form action="gameInsert.php" method="post" enctype="multipart/form-data">
            <table border="2" style="font-size:32px; ">
                <tr>
                    <th>隊伍1</th>
                    <td style="min-width:100px;">
                        <select id="t1No" name="t1No" style="width:100%;">
                            <option value="">--</option>
                            <?php
                                $SQL="SELECT * FROM team";
                                $result=mysqli_query($LinkToSQL,$SQL);
                                while($row=mysqli_fetch_assoc($result)){
                                    echo "<option value='".$row["no"]."'>".$row["no"]."-".$row["teamName"]."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>隊伍2</th>
                    <td style="min-width:100px;">
                    <select id="t2No" name="t2No" style="width:100%;">
                        <option value="">--</option>
                        <?php
                            $SQL="SELECT * FROM team";
                            $result=mysqli_query($LinkToSQL,$SQL);
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<option value='".$row["no"]."'>".$row["no"]."-".$row["teamName"]."</option>";
                            }
                        ?>
                    </select>
                </td>
                </tr>
                <tr>
                    <th>隊伍1賠率</th><td><input type="text" name="team1Odds" required></td>
                </tr>
                <tr>
                    <th>隊伍2賠率</th><td><input type="text" name="team2Odds" required></td>
                </tr>
                <tr>
                    <th>隊伍1勝負</th>
                    <td>
                        <select id="outcome" name="outcome" style="width:80%;">
                            <option value="">--</option>
                            <option value="未知">未知</option>
                            <option value="勝">勝</option>
                            <option value="負">負</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>頻道參數</th><td><input type="text" name="channelParameter" required></td>
                </tr>
                <tr>
                    <th>賽局開始時間</th><td><input type="datetime-local" step="1" name="gameStartTime" required></td> <!--format: 0000-00-00 00:00:00 -->
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;"><input type="submit" name="comfirm" style="width:45%;"> </td>
                </tr>
            </table>
            </form>
            </center>        
            
            <?php
                $SQLTable="SELECT * FROM game";
                if(isset($_POST["comfirm"])){
                $t1No=$_POST["t1No"];
                $t2No=$_POST["t2No"];
                $team1Odds=$_POST["team1Odds"];
                $team2Odds=$_POST["team2Odds"];
                $outcome=$_POST["outcome"];
                $channelParameter=$_POST["channelParameter"];
                $gameStartTime=$_POST["gameStartTime"];
                $noData="TRUE";

                $result=mysqli_query($LinkToSQL,$SQLTable);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        if($row["gameStartTime"]==$gameStartTime){
                            $noData="FALSE";
                            break;
                        }else{
                            $noData="TRUE";
                        }
                    }
                    if($noData=="TRUE"){
                        $SQL="INSERT INTO game (no, t1No, t2No, team1Odds, team2Odds, outcome,channelParameter,gameStartTime) VALUES (NULL,'$t1No','$t2No','$team1Odds','$team2Odds', '$outcome','$channelParameter','$gameStartTime')";
                        $insert=mysqli_query($LinkToSQL,$SQL);
                        if($insert){
                            echo "1 record added</br>";
                        }else{
                            echo "0 record added";
                        }
                        echo "資料庫沒有相同資料!"; 
                    }else{
                        echo "資料庫有相同資料";
                    }
                }                                       
                
                }else{
                    echo "請輸入資料";
                }
            ?>
        </div>
    </body>
</html>