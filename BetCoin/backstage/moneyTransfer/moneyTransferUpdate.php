<?php 
    require("../LinkToSQL.php");
    if(isset($_GET["no"])){
        $no=$_GET["no"];
        $SQLDelete="DELETE FROM moneytransfer WHERE no='$no'";
        $result=mysqli_query($LinkToSQL,$SQLDelete);
            if($result){
                echo "<script type='text/javascript'>";
                echo "alert('刪除成功');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0;url=moneyTransferDelete.php'>";
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('刪除失敗');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0;url=moneyTransferDelete.php'>";
            }
    }
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
                     
                    <div class="shape-ex4"><p><a class="link" href="../money/moneySearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../money/moneyDelete.php">刪除</a></p></div>
                </center>
            <div class="titleText"><h1>匯款管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="moneyTransferUpdate.php">更新</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="moneyTransferSearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="moneyTransferDelete.php">刪除</a></p></div>
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

        匯款管理修改</br>
            <?php
            if(isset($_POST["search"])){
                if($_POST["no"]==null){
                    $no="WHERE no like '%'";
                }else{
                    $no="WHERE no=".$_POST["no"]."";
                }
                $uNo=sqlFormat($_POST["uNo"],"uNo","num");
                $amount=sqlFormat($_POST["amount"],"amount","num");
                $inOrOut=sqlFormat($_POST["inOrOut"],"inOrOut","String");
                $comfirm=sqlFormat($_POST["comfirm"],"comfirm","String");
                $askDate=sqlFormatDatetime($_POST["askLowerLimit"],$_POST["askUpperLimit"],"askDate");
                $comfirmDate=sqlFormatDatetime($_POST["comfirmLowerLimit"],$_POST["comfirmUpperLimit"],"comfirmDate");
                // and gameStartTime like $gameStartTime[0]
                $SQLSearch="SELECT * FROM moneytransfer $no $uNo $amount $inOrOut $comfirm $askDate $comfirmDate";
                $searchResult=mysqli_query($LinkToSQL,$SQLSearch);
                if($searchResult){
                    echo "<table border='3px' style='border-collapse:collapse;'>";
                    ?>
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                        <th>no</th><th>玩家編號</th><th>數量</th><th>I存入/O取出</th><th>認證</th><th>詢問時間(下限)</th><th>詢問時間(上限)</th><th>認證時間(下限)</th><th>認證時間(上限)</th>
                    </tr>
                    </tr>
                    <form action="moneyTransferUpdate.php" method="post" enctype="multipart/form-data">
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
                        <td><input type="number" name="amount"></td>
                        <td style="min-width:100px;">
                            <select id="inOrOut" name="inOrOut" style="width:100%;">
                                <option value="">--</option>
                                <option value="I">I</option>
                                <option value="O">O</option>
                            </select>
                        </td>
                        <td style="min-width:100px;">
                            <select id="comfirm" name="comfirm" style="width:100%;">
                                <option value="">--</option>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </td>
                        <td><input type="datetime-local" step="1" name="askLowerLimit"></td>
                        <td><input type="datetime-local" step="1" name="askUpperLimit"></td>
                        <td><input type="datetime-local" step="1" name="comfirmLowerLimit"></td>
                        <td><input type="datetime-local" step="1" name="comfirmUpperLimit"></td>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align:center; background-color:#EAEAEA;"><input type="submit" name="search" value="查詢" style="width:30%;"></td>
                    </tr>
                    </form>
                    <tr>
                        <td colspan="9" style="text-align:center; background-color:#6B6B6B;">所有資料</td> 
                    </tr>
                    <tr>
                        <th>no</th><th>玩家編號</th><th>數量</th><th>I存入/O取出</th><th>認證</th><th colspan="2">詢問時間</th><th>認證時間</th><th>更新</th>
                    </tr>    
                    <?php
                    while($row=mysqli_fetch_assoc($searchResult)){
                        $SQLUser="SELECT * FROM users WHERE no=".$row["uNo"];
                        $resultUser=mysqli_query($LinkToSQL,$SQLUser);
                        $user=mysqli_fetch_assoc($resultUser);
                        if($row["comfirmDate"]==null){
                            $comfirmDateCheck="NULL";
                        }else{
                            $comfirmDateCheck=$row["comfirmDate"];
                        }
                        echo "<tr>";
                        echo "<td>".$row["no"]."</td><td>".$row["uNo"]."-".$user["email"]."</td><td>".$row["amount"]."</td><td>".$row["inOrOut"]."</td><td>".$row["comfirm"]."</td>
                        <td colspan='2'>".$row["askDate"]."</td>
                        <td>".$comfirmDateCheck."</td>";
                        ?>
                        <td>             
                            <a href="javascript:window.open('<?php echo "moneyTransferUpdateConfirming.php?no=".$row["no"]?>','mypopuptitle','width=1400px,height=200px')">
                            <button  onclick="updateNote()" style='width:100%;' type='button'>更新</button></a>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }else{
                ?>
                <form action="moneyTransferUpdate.php" method="post" enctype="multipart/form-data">
                <table border="3px" style="border-collapse:collapse;">
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                    <th>no</th><th>玩家編號</th><th>數量</th><th>I存入/O取出</th><th>認證</th><th>詢問時間(下限)</th><th>詢問時間(上限)</th><th>認證時間(下限)</th><th>認證時間(上限)</th>
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
                        <td><input type="number" name="amount"></td>
                        <td style="min-width:100px;">
                            <select id="inOrOut" name="inOrOut" style="width:100%;">
                                <option value="">--</option>
                                <option value="I">I</option>
                                <option value="O">O</option>
                            </select>
                        </td>
                        <td style="min-width:100px;">
                            <select id="comfirm" name="comfirm" style="width:100%;">
                                <option value="">--</option>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                        </td>
                        <td><input type="datetime-local" step="1" name="askLowerLimit"></td>
                        <td><input type="datetime-local" step="1" name="askUpperLimit"></td>
                        <td><input type="datetime-local" step="1" name="comfirmLowerLimit"></td>
                        <td><input type="datetime-local" step="1" name="comfirmUpperLimit"></td>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align:center; background-color:#EAEAEA;"><input type="submit" name="search" value="查詢" style="width:30%;"></td>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align:center; background-color:#6B6B6B;">所有資料</td> 
                    </tr>
                    <tr>
                    <th>no</th><th>玩家編號</th><th>數量</th><th>I存入/O取出</th><th>認證</th><th colspan="2">詢問時間</th></th><th>認證時間</th><th>修改</th>
                    </tr>
                </form>
                    <?php
                    $SQL="SELECT * FROM moneytransfer";
                    //搜尋所有資料
                    $result=mysqli_query($LinkToSQL,$SQL);     
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $SQLUser="SELECT * FROM users WHERE no=".$row["uNo"];
                            $resultUser=mysqli_query($LinkToSQL,$SQLUser);
                            $user=mysqli_fetch_assoc($resultUser);                
                            if($row["comfirmDate"]==null){
                                $comfirmDateCheck="NULL";
                            }else{
                                $comfirmDateCheck=$row["comfirmDate"];
                            }
                            echo "<tr>";
                            echo "<td>".$row["no"]."</td><td>".$row["uNo"]."-".$user["email"]."</td><td>".$row["amount"]."</td>
                            <td>".$row["inOrOut"]."</td><td>".$row["comfirm"]."</td><td colspan='2'>".$row["askDate"]."</td>
                            <td colspan='1'>".$comfirmDateCheck."</td>";
                            ?>

                            <td>             
                                <a href="javascript:window.open('<?php echo "moneyTransferUpdateConfirming.php?no=".$row["no"]?>','mypopuptitle','width=1400px,height=200px')">
                                <button  onclick="updateNote()" style='width:100%;' type='button'>更新</button></a>
                            </td>

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