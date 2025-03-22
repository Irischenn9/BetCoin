<?php 
    require("../LinkToSQL.php");

    if(isset($_GET["no"])){
        $no=$_GET["no"];
        $SQLDelete="DELETE FROM team WHERE no='$no'";
        $result=mysqli_query($LinkToSQL,$SQLDelete);
            if($result){
                echo "<script type='text/javascript'>";
                echo "alert('刪除成功');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0;url=teamDelete.php'>";
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('刪除失敗');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0;url=teamDelete.php'>";
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

        隊伍管理刪除</br>
            <?php
            if(isset($_POST["search"])){
                if($_POST["no"]==null){
                    $no="WHERE no like '%'";
                }else{
                    $no="WHERE no=".$_POST["no"]."";
                }
                $teamName=sqlFormat($_POST["teamName"],"teamName","String");
                $SQLSearch="SELECT * FROM team $no $teamName";
                $searchResult=mysqli_query($LinkToSQL,$SQLSearch);
                if($searchResult){
                    echo "<table border='3px' style='border-collapse:collapse;'>";
                    ?>
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                        <th>no</th><th>隊伍名稱</th><th>隊伍圖示</th><th></th>
                    </tr>
                    <form action="teamDelete.php" method="post" enctype="multipart/form-data">
                    <tr style="background-color:#EAEAEA;">
                        <td><input type="number" name="no"></td>
                        <td><input type="text" name="teamName"></td>
                        <td colspan="2"></td>                    
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align:center; background-color:#EAEAEA;"><input type="submit" name="search" value="查詢" style="width:30%;"></td>
                    </tr>
                    </form>
                    <tr>
                        <td colspan="8" style="text-align:center; background-color:#6B6B6B;">所有資料</td> 
                    </tr>
                    <tr>
                        <th>no</th><th>隊伍名稱</th><th>隊伍圖示</th><th>刪除</th>
                    </tr>    
                    <?php
                    while($row=mysqli_fetch_assoc($searchResult)){
                        echo "<tr>";
                        echo "<td>".$row["no"]."</td><td>".$row["teamName"]."</td><td><img src='../../".$row["icon"]."' width='50px' height='50px'></td>";
                        ?>

                        <td>             
                            <a href="<?php echo "teamDelete.php?no=".$row["no"]?>">
                            <button  style='width:100%;' type='button'>刪除</button></a>
                        </td>

                        <?php
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }else{
                ?>
                <form action="teamDelete.php" method="post" enctype="multipart/form-data">
                <table border="3px" style="border-collapse:collapse;">
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                    <th>no</th><th>隊伍名稱</th><th>隊伍圖示</th><th></th>
                    </tr>
                    <tr style="background-color:#EAEAEA;">
                        <tr style="background-color:#EAEAEA;">
                        <td><input type="number" name="no"></td>
                        <td><input type="text" name="teamName"></td>
                        <td colspan="2"></td>     
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align:center; background-color:#EAEAEA;"><input type="submit" name="search" value="查詢" style="width:30%;"></td>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align:center; background-color:#6B6B6B;">所有資料</td> 
                    </tr>
                    <tr>
                        <th>no</th><th>隊伍名稱</th><th>隊伍圖示</th><th>刪除</th>
                    </tr>
                </form>
                    <?php
                    $SQL="SELECT * FROM team";
                    //搜尋所有資料
                    $result=mysqli_query($LinkToSQL,$SQL);     
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$row["no"]."</td><td>".$row["teamName"]."</td><td><img src='../../".$row["icon"]."' width='50px' height='50px'></td>";
                            ?>
                            <td>             
                                <a href="<?php echo "teamDelete.php?no=".$row["no"]?>">
                                <button  style='width:100%;' type='button'>刪除</button></a>
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