<?php 
    require("../LinkToSQL.php");
?>
<html>
    <header>
        <title>後臺管理</title>
        <link href="../css/backStage.css?version=1" rel="stylesheet" type="text/css">
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

        賽局管理查詢</br>
            <?php
            if(isset($_POST["search"])){
                if($_POST["no"]==null){
                    $no="WHERE no like '%'";
                }else{
                    $no="WHERE no=".$_POST["no"]."";
                }
                $t1No=sqlFormat($_POST["t1No"],"t1No","num");
                $t2No=sqlFormat($_POST["t2No"],"t2No","num");
                $team1Odds=sqlFormat($_POST["team1Odds"],"team1Odds","num");
                $team2Odds=sqlFormat($_POST["team2Odds"],"team2Odds","num");
                $outcome=sqlFormat($_POST["outcome"],"outcome","String");
                $channelParameter=sqlFormat($_POST["channelParameter"],"channelParameter","String");
                $gameStartTime=sqlFormatDatetime($_POST["gameStartTimeLowerLimit"],$_POST["gameStartTimeUpperLimit"],"gameStartTime");
                
                // and gameStartTime like $gameStartTime[0]
                $SQLSearch="SELECT * FROM game $no $t1No $t2No $team1Odds $team2Odds $outcome $channelParameter $gameStartTime";
                $searchResult=mysqli_query($LinkToSQL,$SQLSearch);
                if($searchResult){
                    echo "<table border='3px' style='border-collapse:collapse; width:90%;'>";
                    ?>
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                        <th>no</th><th>隊伍1</th><th>隊伍2</th><th>隊伍1賠率</th><th>隊伍2賠率</th><th>隊伍1勝負</th><th>頻道參數</th><th>賽局開始時間(下限)</th><th>賽局開始時間(上限)</th>
                    </tr>
                    </tr>
                    <form action="gameSearch.php" method="post" enctype="multipart/form-data">
                    <tr style="background-color:#EAEAEA;">
                        <td><input type="text" name="no" ></td>
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
                        <td><input type="text" name="team1Odds" ></td>
                        <td><input type="text" name="team2Odds" ></td>
                        <td style="min-width:100px;">
                            <select id="outcome" name="outcome" style="width:100%;">
                                <option value="">--</option>
                                <option value="未知">未知</option>
                                <option value="勝">勝</option>
                                <option value="負">負</option>
                            </select>
                        </td>
                        <td><input type="text" name="channelParameter"></td>
                        <td><input type="datetime-local" step="1" name="gameStartTimeLowerLimit"></td>
                        <td><input type="datetime-local" step="1" name="gameStartTimeUpperLimit"></td>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align:center; background-color:#EAEAEA;"><input type="submit" name="search" value="查詢" style="width:30%;"></td>
                    </tr>
                    </form>
                    <tr>
                        <td colspan="9" style="text-align:center; background-color:#6B6B6B;">所有資料</td> 
                    </tr>
                    <tr>
                       <th>no</th><th>隊伍1</th><th>隊伍2</th><th>隊伍1賠率</th><th>隊伍2賠率</th><th>隊伍1勝負</th><th>頻道參數</th><th colspan="2">賽局開始時間</th>
                    </tr>    
                    <?php
                    while($row=mysqli_fetch_assoc($searchResult)){
                        $SQLTeam1="SELECT * FROM team WHERE no=".$row["t1No"];
                        $resultTeam1=mysqli_query($LinkToSQL,$SQLTeam1);
                        $team1Name=mysqli_fetch_assoc($resultTeam1);

                        $SQLTeam2="SELECT * FROM team WHERE no=".$row["t2No"];
                        $resultTeam2=mysqli_query($LinkToSQL,$SQLTeam2);
                        $team2Name=mysqli_fetch_assoc($resultTeam2);
                        echo "<tr>";
                        echo "<td>".$row["no"]."</td><td>".$row["t1No"]."-".$team1Name["teamName"]."</td><td>".$row["t2No"]."-".$team2Name["teamName"]."</td><td>".$row["team1Odds"]."</td><td>".$row["team2Odds"]."</td><td>".$row["outcome"]."</td><td>".$row["channelParameter"]."</td><td colspan='2'>".$row["gameStartTime"]."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }else{
                ?>
                <form action="gameSearch.php" method="post" enctype="multipart/form-data">
                <table border="3px" style="border-collapse:collapse;">
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                        <th>no</th><th>隊伍1</th><th>隊伍2</th><th>隊伍1賠率</th><th>隊伍2賠率</th><th>隊伍1勝負</th><th>頻道參數</th><th>賽局開始時間(下限)</th><th>賽局開始時間(上限)</th>
                    </tr>
                    <tr style="background-color:#EAEAEA;">
                        <td><input type="text" name="no" ></td>
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
                        <td><input type="text" name="team1Odds" ></td>
                        <td><input type="text" name="team2Odds" ></td>
                        <td style="min-width:100px;">
                            <select id="outcome" name="outcome" style="width:100%;">
                                <option value="">--</option>
                                <option value="未知">未知</option>
                                <option value="勝">勝</option>
                                <option value="負">負</option>
                            </select>
                        </td>
                        <td><input type="text" name="channelParameter"></td>
                        <td><input type="datetime-local" step="1" name="gameStartTimeLowerLimit"></td>
                        <td><input type="datetime-local" step="1" name="gameStartTimeUpperLimit"></td>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align:center; background-color:#EAEAEA;"><input type="submit" name="search" value="查詢" style="width:30%;"></td>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align:center; background-color:#6B6B6B;">所有資料</td> 
                    </tr>
                    <tr>
                        <th>no</th><th>隊伍1</th><th>隊伍2</th><th>隊伍1賠率</th><th>隊伍2賠率</th><th>隊伍1勝負</th><th>頻道參數</th><th colspan="2">賽局開始時間</th>
                    </tr>
                </form>
                    <?php
                    $SQL="SELECT * FROM game";
                    //搜尋所有資料
                    $result=mysqli_query($LinkToSQL,$SQL);     
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $SQLTeam1="SELECT * FROM team WHERE no=".$row["t1No"];
                            $resultTeam1=mysqli_query($LinkToSQL,$SQLTeam1);
                            $team1Name=mysqli_fetch_assoc($resultTeam1);

                            $SQLTeam2="SELECT * FROM team WHERE no=".$row["t2No"];
                            $resultTeam2=mysqli_query($LinkToSQL,$SQLTeam2);
                            $team2Name=mysqli_fetch_assoc($resultTeam2);

                            echo "<tr>";
                            echo "<td>".$row["no"]."</td><td>".$row["t1No"]."-".$team1Name["teamName"]."</td>
                            <td>".$row["t2No"]."-".$team2Name["teamName"]."</td><td>".$row["team1Odds"]."</td><td>".$row["team2Odds"]."</td>
                            <td>".$row["outcome"]."</td><td>".$row["channelParameter"]."</td><td colspan='2'>".$row["gameStartTime"]."</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
                <?php   
            }
            ?>
        </center>
        </div>
    </body>
</html>