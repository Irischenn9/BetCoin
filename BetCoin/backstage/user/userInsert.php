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
            
        
        <div class="content" style="font-size:42px; width:83%;">
            <center>
            帳號管理新增</br>
            <form action="userInsert.php" method="post" enctype="multipart/form-data">
            <table border="2" style="font-size:32px; ">
                <tr>
                    <th>電子信箱</th><td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <th>姓名</th><td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <th>密碼</th><td><input type="text" name="pwd" required></td>
                </tr>
                <tr>
                    <th>郵局帳戶</th><td><input type="number"  name="bankAccount"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "14" required></td>
                </tr>
                <tr>
                    <th>權限</th>
                    <td>
                        <select id="role" name="role" style="width:100%;">
                            <option value="">--</option>
                            <option value="U">U</option>
                            <option value="A">A</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;"><input type="submit" style="width:45%;"> </td>
                </tr>
            </table>
            </form>
            </center>        
            
            <?php
                $SQLTable="SELECT * FROM users";
                if(isset($_POST["email"])){
                $email=$_POST["email"];
                $name=$_POST["name"];
                $pwd=$_POST["pwd"];
                $bankAccount=$_POST["bankAccount"];
                $role=$_POST["role"];
                $noData="TRUE";
                if($email!=null && $pwd!=null){
                    $result=mysqli_query($LinkToSQL,$SQLTable);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            if($row["email"]==$email){
                                $noData="FALSE";
                                break;
                            }else{
                                $noData="TRUE";
                            }
                        }
                        if($noData=="TRUE"){
                            $SQL="INSERT INTO users (no, email, name, pwd, bankAccount, role) VALUES (NULL,'$email','$name','$pwd','$bankAccount','$role')";
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
            }else{
                echo "請輸入資料";
            }
            ?>
        </div>
    </body>
</html>