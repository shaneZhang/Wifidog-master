<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../css/index.css" rel="stylesheet" type="text/css">

        <?php
            session_start();
            if (empty($_SESSION['loginname'])) {
                // echo '<meta http-equiv="refresh" content="1;URL=http://www.slll.info/">';
                die("错误的请求");
            }
        ?>
        <title>你现在可以正常访问外网了-山里来了攻城狮</title>
    </head>
<body>
    <div class="backimg"></div>
	<div class="header">
    	<div class="logo">
            <a class="box" target="_blank" href="http://www.slll.info/"></a>
        </div>
    </div>
    <div class="main">
        <div>
            <h1>登录信息</h1>
            <ul class="rss-list">
                <li>当前登录用户:<?php echo $_SESSION['loginname'] ?></li>
                <a href="<?php echo $_SESSION['loginurl'] ?>"><li>继续访问:<?php echo @$_SESSION['loginurl']; ?></li></a>
            </ul>
            <h1>
                注销网络
            </h1>
            <div class="login-button">
                <form method="post">
                    <button name="sub">注销</button>
                    <?php
                        if (isset($_POST['sub'])) {
                            include("../FCT.php");
                            $sql="update users set usertoken='' where userid={$_SESSION['logiinname']}";
                            mysql_query($sql);
                            session_destroy();
                            echo "<script type='text/javascript'>document.onload = window.close();</script>"; 
                            }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <div class="bottom">
        <div class="white"></div>
        <div class="lightgray"></div>
        <div class="gray"></div>
        <div class="darkgray"></div>
        <div class="black"></div>
        <div class="dark-teal"></div>
        <div class="teal"></div>
        <div class="orange"></div>
    </div>
    </body
</html>
