<?php require("LinkToSQL.php")?>
<html>
    <header>
        <title>後臺管理</title>
        <link href="css/main.css" rel="stylesheet">
    </header>
    <body>
        <div class="navbar">
        <div class="titleText"><h1>帳號管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="userInsert.php">新增</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="userUpdate.php">更新</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="userSearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="userDelete.php">刪除</a></p></div>
                </center>
            <div class="titleText"><h1>金錢管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="moneyUpdate.php">更新</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="moneySearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="moneyDelete.php">刪除</a></p></div>
                </center>
            <div class="titleText"><h1>匯款管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="transferUpdate.php">更新</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="transferSearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="transferDelete.php">刪除</a></p></div>
                </center>
            <div class="titleText"><h1>參賽管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="userGameSearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="userGameDelete.php">刪除</a></p></div>
                </center>
            <div class="titleText"><h1>賽局管理</h1></div>
                <center>    
                    <div class="shape-ex4"><p><a class="link" href="gameInsert.php">新增</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="gameUpdate.php">更新</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="gameSearch.php">查詢</a></p></div>
                    <div class="shape-ex4"><p><a class="link" href="gameDelete.php">刪除</a></p></div>
                </center>
                
        </div>
            
        <div class="bar"></div>
        <div class="content">
            <?php
             $SQL="SELECT * FROM game WHERE no=8";
             $result=mysqli_query($LinkToSQL,$SQL);
             $row=mysqli_fetch_assoc($result);
             $total=round($row["team2Odds"]*10);
             echo $total;
            ?>
        </div>
    </body>
</html>