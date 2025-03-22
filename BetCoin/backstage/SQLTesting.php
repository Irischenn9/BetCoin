<?php require("LinkToSQL.php")?>
<html>
    <header>
        <title>後臺管理</title>
        <link href="css/backStage.css" rel="stylesheet">
    </header>
    <body>
        <div class="navbar">
        <div class="bar"></div>
            <div class="titleText"><h1>帳號管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="#">新增</a></p></div>
                    <div class="shape-ex4"><p>更新</p></div>
                    <div class="shape-ex4"><p><a class="link" href="#">查詢</a></p></div>
                    <div class="shape-ex4"><p>刪除</p></div>
                </center>
            <div class="titleText"><h1>使用者金錢管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p>更新</p></div>
                    <div class="shape-ex4"><p>查詢</p></div>
                    <div class="shape-ex4"><p>刪除</p></div>
                </center>
            <div class="titleText"><h1>使用者參賽管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p>查詢</p></div>
                    <div class="shape-ex4"><p>刪除</p></div>
                </center>
            <div class="titleText"><h1>賽局管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p>新增</p></div>
                    <div class="shape-ex4"><p>更新</p></div>
                    <div class="shape-ex4"><p>查詢</p></div>
                    <div class="shape-ex4"><p>刪除</p></div>
                </center>
                
        </div>
        
        <div class="content">
            <center>
            Register</br>
            <form action="SQLTesting.php" method="post" enctype="multipart/form-data">
            <table border="2">
                <tr>
                    <td>Email</td><td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>password</td><td><input type="password" name="pwd"></td>
                </tr>
                <tr>
                    <td>bank account</td><td><input type="text" name="bankAccount"></td>
                </tr>
                <tr>
                    <td>role</td><td><input type="text" name="role"></td>
                </tr>
                <tr>
                    <td></td><td><input type="submit"></td>
                </tr>
            </table>
            </form>
            </center>        
            
            <?php
                $SQLTable="SELECT * FROM users";
                if(isset($_POST["email"])){
                $email=$_POST["email"];
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
                            $SQL="INSERT INTO users (no, email, pwd, bankAccount, role, savings) VALUES (NULL,'$email','$pwd','$bankAccount','$role', 0)";
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