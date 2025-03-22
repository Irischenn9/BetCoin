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
                    <div class="shape-ex4"><p><a class="link" href="../game/gameInsert.php">新增</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../game/gameUpdate.php">更新</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../game/gameSearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../game/gameDelete.php">刪除</a></p></div>
                </center>
            <div class="titleText"><h1>隊伍管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="teamInsert.php">新增</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="teamDelete.php">刪除</a></p></div>
                </center>
        </div>
            
        
        <div class="content" style="font-size:42px; width:83%;">
            <center>
            隊伍管理新增</br>
            <form action="teamInsert.php" method="post" enctype="multipart/form-data">
            <table border="2" style="font-size:32px; ">
                <tr>
                    <th>隊伍名稱</th><td><input type="text" name="teamName" required></td>
                </tr>
                <tr>
                    <th>圖示</th><td><input type="file" name="icon" accept="image/*"/></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;"><input type="submit" name="comfirm" style="width:45%;"> </td>
                </tr>
            </table>
            </form>
            </center>        
            
            <?php
                $SQLTable="SELECT * FROM team";
                if(isset($_POST["comfirm"])){
                $teamName=$_POST["teamName"];
                $pathpart=pathinfo($_FILES['icon']['name']);
                $noData="TRUE";
                if($teamName!=null && $pathpart!=null){
                    $result=mysqli_query($LinkToSQL,$SQLTable);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            if($row["teamName"]==$teamName){
                                $noData="FALSE";
                                break;
                            }else{
                                $noData="TRUE";
                            }
                        }
                        if($noData=="TRUE"){
                            $extname=$pathpart['extension'];
                            //產生新黨案名稱
                            $icon="../../image/icon".time().".".$extname;
                            $iconData="image/icon".time().".".$extname;
                            $SQL="INSERT INTO team (no, teamName, icon) VALUES (NULL,'$teamName','$iconData')";
                            if(copy($_FILES['icon']["tmp_name"],$icon)){
                                mysqli_query($LinkToSQL,$SQL);
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
            }else{
                echo "請輸入資料";
            }
            ?>
        </div>
    </body>
</html>