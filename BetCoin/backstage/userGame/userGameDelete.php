<?php 
    require("../LinkToSQL.php");

    if(isset($_GET["no"])){
        $no=$_GET["no"];
        $SQLDelete="DELETE FROM usergame WHERE no='$no'";
        $result=mysqli_query($LinkToSQL,$SQLDelete);
            if($result){
                echo "<script type='text/javascript'>";
                echo "alert('刪除成功');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0;url=userGameDelete.php'>";
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('刪除失敗');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0;url=userGameDelete.php'>";
            }
    }
?>
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
                    <div class="shape-ex4"><p><a class="link" href="userGameSearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="userGameDelete.php">刪除</a></p></div>
                </center>
            <div class="titleText"><h1>賽局管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="../game/gameInsert.php">新增</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../game/gameUpdate.php">更新</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../game/gameSearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../game/gameDelete.php">刪除</a></p></div>
                </center>
            <div class="titleText"><h1>隊伍管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="../team/teamInsert.php">新增</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../team/teamDelete.php">刪除</a></p></div>
                </center>
        </div>
        

        <div class="content" style="font-size:42px; width:83%;">
        <center>

        參賽管理刪除</br>
            <?php
            if(isset($_POST["search"])){
                if($_POST["no"]==null){
                    $no="WHERE no like '%'";
                }else{
                    $no="WHERE no=".$_POST["no"]."";
                }
                $gNo=sqlFormat($_POST["gNo"],"gNo","num");
                $uNo=sqlFormat($_POST["uNo"],"uNo","num");
                $tNo=sqlFormat($_POST["tNo"],"tNo","num");
                $betAmount=sqlFormat($_POST["betAmount"],"betAmount","num");
                $date=sqlFormatDatetime($_POST["dateLowerLimit"],$_POST["dateUpperLimit"],"date");
                // and gameStartTime like $gameStartTime[0]
                $SQLSearch="SELECT * FROM usergame $no $gNo $uNo $tNo $betAmount $date";
                $searchResult=mysqli_query($LinkToSQL,$SQLSearch);
                if($searchResult){
                    echo "<table border='3px' style='border-collapse:collapse;'>";
                    ?>
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                        <th>no</th><th>賽局編號</th><th>玩家編號</th><th>投注隊伍編號</th><th>投注金額</th><th>投注時間(下限)</th><th>投注時間(上限)</th>
                    </tr>
                    </tr>
                    <form action="userGameDelete.php" method="post" enctype="multipart/form-data">
                    <tr style="background-color:#EAEAEA;">
                        <td><input type="number" name="no" ></td>
                        <td style="min-width:100px;">
                            <select id="gNo" name="gNo" style="width:100%;">
                                <option value="">--</option>
                                <?php
                                    $SQL="SELECT * FROM game";
                                    $result=mysqli_query($LinkToSQL,$SQL);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $SQLTeam1= "SELECT * FROM team WHERE no=".$row["t1No"];
                                        $resultTeam1=mysqli_query($LinkToSQL,$SQLTeam1);
                                        $team1=mysqli_fetch_assoc($resultTeam1);

                                        $SQLTeam2="SELECT * FROM team WHERE no=".$row["t2No"];
                                        $resultTeam2=mysqli_query($LinkToSQL,$SQLTeam2);
                                        $team2=mysqli_fetch_assoc($resultTeam2);

                                        echo "<option value='".$row["no"]."'>".$row["no"]."-".$team1["teamName"]." vs ".$team2["teamName"]."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td style="min-width:100px;">
                            <select id="uNo" name="uNo" style="width:100%;">
                                <option value="">--</option>
                                <?php
                                    $SQL="SELECT * FROM users";
                                    $result=mysqli_query($LinkToSQL,$SQL);
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo "<option value='".$row["no"]."'>".$row["no"]."-".$row["email"]."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td style="min-width:100px;">
                            <select id="tNo" name="tNo" style="width:100%;">
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
                        <td><input type="number" name="betAmount"></td>
                        <td><input type="datetime-local" step="1" name="dateLowerLimit"></td>
                        <td><input type="datetime-local" step="1" name="dateUpperLimit"></td>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align:center; background-color:#EAEAEA;"><input type="submit" name="search" value="查詢" style="width:30%;"></td>
                    </tr>
                    </form>
                    <tr>
                        <td colspan="9" style="text-align:center; background-color:#6B6B6B;">所有資料</td> 
                    </tr>
                    <tr>
                        <th>no</th><th>賽局編號</th><th>玩家編號</th><th>投注隊伍編號</th><th>投注金額</th><th>投注時間</th><th>刪除</th>
                    </tr>    
                    <?php
                    while($row=mysqli_fetch_assoc($searchResult)){
                        $SQLGame="SELECT * FROM game WHERE no=".$row["gNo"];
                        $resultGame=mysqli_query($LinkToSQL,$SQLGame);
                        $game=mysqli_fetch_assoc($resultGame);

                        $SQLUser="SELECT * FROM users WHERE no=".$row["uNo"];
                        $resultUser=mysqli_query($LinkToSQL,$SQLUser);
                        $user=mysqli_fetch_assoc($resultUser);

                        $SQLUserTeam="SELECT * FROM team WHERE no=".$row["tNo"];
                        $resultUserTeam=mysqli_query($LinkToSQL,$SQLUserTeam);
                        $userTeam=mysqli_fetch_assoc($resultUserTeam);

                        $SQLTeam1= "SELECT * FROM team WHERE no=".$game["t1No"];
                        $resultTeam1=mysqli_query($LinkToSQL,$SQLTeam1);
                        $team1=mysqli_fetch_assoc($resultTeam1);

                        $SQLTeam2="SELECT * FROM team WHERE no=".$game["t2No"];
                        $resultTeam2=mysqli_query($LinkToSQL,$SQLTeam2);
                        $team2=mysqli_fetch_assoc($resultTeam2);

                        echo "<tr>";
                        echo "<td>".$row["no"]."</td><td>".$row["gNo"]."-".$team1["teamName"]." vs ".$team2["teamName"]."</td><td>".$row["uNo"]."-".$user["email"]."</td><td>".$row["tNo"]."-".$userTeam["teamName"]."</td><td>".$row["betAmount"]."</td><td>".$row["date"]."</td>";
                        
                        ?>
                        <td>             
                            <a href="<?php echo "userGameDelete.php?no=".$row["no"]?>">
                            <button  style='width:100%;' type='button'>刪除</button></a>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }else{
                ?>
                <form action="userGameDelete.php" method="post" enctype="multipart/form-data">
                <table border="3px" style="border-collapse:collapse;">
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                        <th>no</th><th>賽局編號</th><th>玩家編號</th><th>投注隊伍編號</th><th>投注金額</th><th>投注時間(下限)</th><th>投注時間(上限)</th>
                    </tr>
                    <tr style="background-color:#EAEAEA;">
                        <td><input type="number" name="no" ></td>
                        <td style="min-width:100px;">
                            <select id="gNo" name="gNo" style="width:100%;">
                                <option value="">--</option>
                                <?php
                                    $SQL="SELECT * FROM game";
                                    $result=mysqli_query($LinkToSQL,$SQL);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $SQLTeam1= "SELECT * FROM team WHERE no=".$row["t1No"];
                                        $resultTeam1=mysqli_query($LinkToSQL,$SQLTeam1);
                                        $team1=mysqli_fetch_assoc($resultTeam1);

                                        $SQLTeam2="SELECT * FROM team WHERE no=".$row["t2No"];
                                        $resultTeam2=mysqli_query($LinkToSQL,$SQLTeam2);
                                        $team2=mysqli_fetch_assoc($resultTeam2);

                                        echo "<option value='".$row["no"]."'>".$row["no"]."-".$team1["teamName"]." vs ".$team2["teamName"]."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td style="min-width:100px;">
                            <select id="uNo" name="uNo" style="width:100%;">
                                <option value="">--</option>
                                <?php
                                    $SQL="SELECT * FROM users";
                                    $result=mysqli_query($LinkToSQL,$SQL);
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo "<option value='".$row["no"]."'>".$row["no"]."-".$row["email"]."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td style="min-width:100px;">
                            <select id="tNo" name="tNo" style="width:100%;">
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
                        <td><input type="number" name="betAmount"></td>
                        <td><input type="datetime-local" step="1" name="dateLowerLimit"></td>
                        <td><input type="datetime-local" step="1" name="dateUpperLimit"></td>
                    </tr>
                    <tr>
                        <td colspan="7" style="text-align:center; background-color:#EAEAEA;"><input type="submit" name="search" value="查詢" style="width:30%;"></td>
                    </tr>
                    <tr>
                        <td colspan="7" style="text-align:center; background-color:#6B6B6B;">所有資料</td> 
                    </tr>
                    <tr>
                        <th>no</th><th>賽局編號</th><th>玩家編號</th><th>投注隊伍編號</th><th>投注金額</th><th>投注時間</th><th>刪除</th>
                    </tr>
                </form>
                    <?php
                    $SQL="SELECT * FROM usergame";
                    //搜尋所有資料
                    $result=mysqli_query($LinkToSQL,$SQL);     
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $SQLGame="SELECT * FROM game WHERE no=".$row["gNo"];
                            $resultGame=mysqli_query($LinkToSQL,$SQLGame);
                            $game=mysqli_fetch_assoc($resultGame);

                            $SQLUser="SELECT * FROM users WHERE no=".$row["uNo"];
                            $resultUser=mysqli_query($LinkToSQL,$SQLUser);
                            $user=mysqli_fetch_assoc($resultUser);

                            $SQLUserTeam="SELECT * FROM team WHERE no=".$row["tNo"];
                            $resultUserTeam=mysqli_query($LinkToSQL,$SQLUserTeam);
                            $userTeam=mysqli_fetch_assoc($resultUserTeam);

                            $SQLTeam1= "SELECT * FROM team WHERE no=".$game["t1No"];
                            $resultTeam1=mysqli_query($LinkToSQL,$SQLTeam1);
                            $team1=mysqli_fetch_assoc($resultTeam1);

                            $SQLTeam2="SELECT * FROM team WHERE no=".$game["t2No"];
                            $resultTeam2=mysqli_query($LinkToSQL,$SQLTeam2);
                            $team2=mysqli_fetch_assoc($resultTeam2);

                            

                            echo "<tr>";
                            echo "<td>".$row["no"]."</td><td>".$row["gNo"]."-".$team1["teamName"]." vs ".$team2["teamName"]."</td><td>".$row["uNo"]."-".$user["email"]."</td><td>".$row["tNo"]."-".$userTeam["teamName"]."</td><td>".$row["betAmount"]."</td><td>".$row["date"]."</td>";
                            
                            ?>
                            <!--這段用於建立彈出視窗-->
                            <td>             
                                <a href="<?php echo "userGameDelete.php?no=".$row["no"]?>">
                                <button  style='width:100%;' type='button'>刪除</button></a>
                            </td>
                            <!---->
                            <?php
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