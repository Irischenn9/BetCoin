<?php 
    require("../LinkToSQL.php");
?>
<html>
    <header>
        <title>後臺管理</title>
        <link href="../css/backStage.css?version=1" rel="stylesheet">
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
                    <div class="shape-ex4"><p><a class="link" href="moneySearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="moneyDelete.php">刪除</a></p></div>
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

        金錢管理查詢</br>
            <?php
            if(isset($_POST["search"])){
                if($_POST["no"]==null){
                    $no="WHERE no like '%'";
                }else{
                    $no="WHERE no=".$_POST["no"]."";
                }
                $uNo=sqlFormat($_POST["uNo"],"uNo","num");
                $sourceFrom=sqlFormat($_POST["sourceFrom"],"sourceFrom","String");
                $changeAmount=sqlFormat($_POST["changeAmount"],"changeAmount","num");
                $changeDate=sqlFormatDatetime($_POST["changeLowerLimit"],$_POST["changeUpperLimit"],"changeTime");
                // and gameStartTime like $gameStartTime[0]
                $SQLSearch="SELECT * FROM money $no $uNo $sourceFrom $changeAmount $changeDate";
                $searchResult=mysqli_query($LinkToSQL,$SQLSearch);
                if($searchResult){
                    echo "<table border='3px' style='border-collapse:collapse;'>";
                    ?>
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                        <th>no</th><th>玩家編號</th><th>來源</th><th>數量</th><th>發生時間(下限)</th><th>發生時間(上限)</th>
                    </tr>
                    </tr>
                    <form action="moneySearch.php" method="post" enctype="multipart/form-data">
                    <tr style="background-color:#EAEAEA;">
                        <td><input type="number" name="no" ></td>
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
                            <select id="sourceFrom" name="sourceFrom" style="width:100%;">
                                <option value="">--</option>
                                <option value="T">T</option>
                                <option value="G">G</option>
                            </select>
                        </td>
                        <td><input type="number" name="changeAmount"></td>

                        <td><input type="datetime-local" step="1" name="changeLowerLimit"></td>
                        <td><input type="datetime-local" step="1" name="changeUpperLimit"></td>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align:center; background-color:#EAEAEA;"><input type="submit" name="search" value="查詢" style="width:30%;"></td>
                    </tr>
                    </form>
                    <tr>
                        <td colspan="9" style="text-align:center; background-color:#6B6B6B;">所有資料</td> 
                    </tr>

                    <tr>
                        <td colspan="7">
                        <a href="moneyExcel.php">
                        <button  style='width:100%;' type='button'>匯出成excel</button></a>
                        </td>
                    </tr>

                    <tr>
                        <th>no</th><th>玩家編號</th><th>來源</th><th>數量</th><th colspan="2">發生時間</th>
                    </tr>    
                    <?php
                    while($row=mysqli_fetch_assoc($searchResult)){
                        $SQLUser="SELECT * FROM users WHERE no=".$row["uNo"];
                        $resultUser=mysqli_query($LinkToSQL,$SQLUser);
                        $user=mysqli_fetch_assoc($resultUser);
                        
                        echo "<tr>";
                        echo "<td>".$row["no"]."</td><td>".$row["uNo"]."-".$user["email"]."</td><td>".$row["sourceFrom"]."</td><td>".$row["changeAmount"]."</td><td colspan='2'>".$row["changeTime"]."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }else{
                ?>
                <form action="moneySearch.php" method="post" enctype="multipart/form-data">
                <table border="3px" style="border-collapse:collapse;">
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                        <th>no</th><th>玩家編號</th><th>來源</th><th>數量</th><th>發生時間(下限)</th><th>發生時間(上限)</th>
                    </tr>
                    <tr style="background-color:#EAEAEA;">
                        <td><input type="number" name="no" ></td>
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
                            <select id="sourceFrom" name="sourceFrom" style="width:100%;">
                                <option value="">--</option>
                                <option value="T">T</option>
                                <option value="G">G</option>
                            </select>
                        </td>
                        <td><input type="number" name="changeAmount"></td>
                        <td><input type="datetime-local" step="1" name="changeLowerLimit"></td>
                        <td><input type="datetime-local" step="1" name="changeUpperLimit"></td>
                        
                    </tr>
                    <tr>
                        <td colspan="7" style="text-align:center; background-color:#EAEAEA;"><input type="submit" name="search" value="查詢" style="width:30%;"></td>
                    </tr>
                    <tr>
                        <td colspan="7" style="text-align:center; background-color:#6B6B6B;">所有資料</td> 
                    </tr>

                    <tr>
                        <td colspan="7">
                        <a href="moneyExcel.php">
                        <button  style='width:100%;' type='button'>匯出成excel</button></a>
                        </td>
                    </tr>

                    <tr>
                    <th>no</th><th>玩家編號</th><th>來源</th><th>數量</th><th colspan="2">發生時間</th>
                    </tr>
                </form>
                    <?php
                    $SQL="SELECT * FROM money";
                    //搜尋所有資料
                    $result=mysqli_query($LinkToSQL,$SQL);     
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $SQLUser="SELECT * FROM users WHERE no=".$row["uNo"];
                            $resultUser=mysqli_query($LinkToSQL,$SQLUser);
                            $user=mysqli_fetch_assoc($resultUser);                
                            
                            echo "<tr>";
                            echo "<td>".$row["no"]."</td><td>".$row["uNo"]."-".$user["email"]."</td><td>".$row["sourceFrom"]."</td><td>".$row["changeAmount"]."</td>
                            <td colspan='2'>".$row["changeTime"]."</td>";
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