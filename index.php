<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../css/index.css" rel="stylesheet" type="text/css">

        <?php
            session_start();
            if (empty($_SESSION['loginurl1'])) {
                die("错误的请求");
            }
        ?>
        <title>正在验证中-山里来了攻城狮</title>
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
            <h1>正在验证...</h1>
            <?php
                echo "<meta http-equiv='refresh' content='1;{$_SESSION['loginurl1']}'>";
            ?>
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
