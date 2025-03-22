<?php 
    require("../LinkToSQL.php");
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
                    <div class="shape-ex4"><p><a class="link" href="userInsert.php">新增</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="userUpdate.php">更新</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="userSearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="userDelete.php">刪除</a></p></div>
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
                    <div class="shape-ex4"><p><a class="link" href="../team/teamInsert.php">新增</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="../team/teamDelete.php">刪除</a></p></div>
                </center>
        </div>
        

        <div class="bar"></div>
        <div class="content" style="font-size:42px; width:83%;">
        <center>

        帳號管理更新</br>
            <?php
            if(isset($_POST["email"])){
                if($_POST["no"]==null){
                    $no="WHERE no like '%'";
                }else{
                    $no="WHERE no=".$_POST["no"]."";
                }
                $email=sqlFormat($_POST["email"],"email","String");
                $name=sqlFormat($_POST["name"],"name","String");
                $pwd=sqlFormat($_POST["pwd"],"pwd","String");
                $bankAccount=sqlFormat($_POST["bankAccount"],"bankAccount","num");
                $role=sqlFormat($_POST["role"],"role","String");
                
                $SQLSearch="SELECT * FROM users $no $email $name $pwd $bankAccount $role";
                $searchResult=mysqli_query($LinkToSQL,$SQLSearch);
                if($searchResult){
                    echo "<table border='3px' style='border-collapse:collapse;'>";
                    ?>
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                    <th>no</th><th>電子信箱</th><th>姓名</th><th>密碼</th><th>郵局帳號</th><th colspan="2">權限</th>
                    </tr>
                    <form action="userUpdate.php" method="post" enctype="multipart/form-data">
                    <tr style="background-color:#EAEAEA;">
                        <td><input type="text" name="no"></td>
                        <td><input type="email" name="email"></td>
                        <td><input type="text" name="name"></td>
                        <td><input type="text" name="pwd"></td>
                        <td><input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "14" name="bankAccount"></td>
                        <td colspan="2">
                            <select id="role" name="role" style="width:100%;">
                                <option value="">--</option>
                                <option value="U">U</option>
                                <option value="A">A</option>
                            </select>
                        </td>
                      
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align:center; background-color:#EAEAEA;"><input type="submit" value="查詢" style="width:30%;"></td>
                    </tr>
                    </form>
                    <tr>
                        <td colspan="8" style="text-align:center; background-color:#6B6B6B;">所有資料</td> 
                    </tr>
                    <tr>
                    <th>no</th><th>電子信箱</th><th>姓名</th><th>密碼</th><th>郵局帳號</th><th>權限</th><th>更新</th>
                    </tr>    
                    <?php
                    while($row=mysqli_fetch_assoc($searchResult)){
                        echo "<tr>";
                        echo "<td>".$row["no"]."</td><td>".$row["email"]."</td><td>".$row["name"]."</td><td>".$row["pwd"]."</td><td>".$row["bankAccount"]."</td><td>".$row["role"]."</td>";
                        ?>

                        <td>             
                            <a href="javascript:window.open('<?php echo "userUpdateConfirming.php?no=".$row["no"]?>','mypopuptitle','width=1100px,height=200px')">
                            <button  onclick="updateNote()" style='width:100%;' type='button'>更新</button></a>
                        </td>
                        
                        <?php
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }else{
                ?>
                <form action="userUpdate.php" method="post" enctype="multipart/form-data">
                <table border="3px" style="border-collapse:collapse;">
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                        <th>no</th><th>電子信箱</th><th>姓名</th><th>密碼</th><th>郵局帳號</th><th colspan="2">權限</th>
                    </tr>
                    <tr style="background-color:#EAEAEA;">
                        <td><input type="text" name="no"></td>
                        <td><input type="email" name="email"></td>
                        <td><input type="text" name="name"></td>
                        <td><input type="text" name="pwd"></td>
                        <td><input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "14" name="bankAccount"></td>
                        <td colspan="2">
                            <select id="role" name="role" style="width:100%;">
                                <option value="">--</option>
                                <option value="U">U</option>
                                <option value="A">A</option>
                            </select>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align:center; background-color:#EAEAEA;"><input type="submit" value="查詢" style="width:30%;"></td>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align:center; background-color:#6B6B6B;">所有資料</td> 
                    </tr>
                    <tr>
                    <th>no</th><th>電子信箱</th><th>姓名</th><th>密碼</th><th>郵局帳號</th><th>權限</th><th>更新</th>
                    </tr>
                </form>
                    <?php
                    $SQL="SELECT * FROM users";
                    //搜尋所有資料
                    $result=mysqli_query($LinkToSQL,$SQL);     
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<tr>";

                            echo "<td>".$row["no"]."</td><td>".$row["email"]."</td><td>".$row["name"]."</td><td>".$row["pwd"]."</td><td>".$row["bankAccount"]."</td><td>".$row["role"]."</td>";
                            
                            ?>
                            <!--這段用於建立彈出視窗-->
                            <td>
                                     
                                <a  href="javascript:window.open('<?php echo "userUpdateConfirming.php?no=".$row["no"]?>','mypopuptitle','width=1100px,height=200px')">
                                <button onclick="updateNote()" style='width:100%;' type='button'>
                                更新
                                </button>
                                </a>
                                
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

<script>
function updateNote() {
  alert("更新完後請重新整理此頁面!");
}
</script>
