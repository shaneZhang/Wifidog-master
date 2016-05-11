<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../css/index.css" rel="stylesheet" type="text/css">

        <title>网络登录-山里来了攻城狮</title>
        <?php
             @$gw_address = $_REQUEST['gw_address'];
             @$gw_port = $_REQUEST['gw_port'];
             if(empty($gw_address) || empty($gw_port)){
                die("错误的请求");
             }
             include("../FCT.php");
             }
             session_start(10800);
             if (!empty(@$_SESSION['loginname'])) {
                header("Location:../portal/index.php"); 
             }
        ?>
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
                <h1>站点新闻</h1>
                <ul class="rss-list">
                    <?php
                        $rss=simplexml_load_file('http://www.slll.info/feed');
                        foreach($rss->channel->item as $item)
                        {
                            echo "<a href='{$item->link}' target='_blank'><li>{$item->title}</li></a>";
                        }
                    ?>
                </ul>
                <h1>
                    登录网络
                </h1>
                <form method="POST">
                    <?php
                        if (isset($_POST['sub'])) {
                            if (!empty($_POST['us_name']) && !empty($_POST['us_pass'])) {
                                $username=mysql_real_escape_string($_POST['us_name']);
                                $password=mysql_real_escape_string($_POST['us_pass']);
                                $sql="select * from users where userid='{$username}'";
                                $res=mysql_query($sql);
                                if (mysql_num_rows($res)>0) {
                                    $row=mysql_fetch_array($res);
                                    if ($password==$row['userpass']) {
                                        echo "<span style='color:#666;'>登录成功</span>";
                                        $token = md5(uniqid());
                                        
                                        $_SESSION['loginname']=$username;
                                        $_SESSION['loginurl']=@$_GET['url'];
                                        $sql="update users set usertoken='{$token}' where userid='{$username}'";
                                        mysql_query($sql);
                                        $gw_address = $_REQUEST['gw_address'];
                                        $gw_port = $_REQUEST['gw_port'];
                                        $url="http://".$gw_address.":".$gw_port."/wifidog/auth?token=".$token;
                                        $_SESSION['loginurl1']=$url;
                                        echo "<meta http-equiv='refresh' content='0.1;../'>";
                                    }
                                    else
                                    {
                                        echo "<span style='color:#666;'>密码错误</span>";
                                    }
                                }
                                else
                                {
                                    echo "<span style='color:#666;'>用户名错误</span>";
                                }
                            }
                            else
                            {
                                echo "<span style='color:#666;'>请输入用户名或密码</span>";
                            }
                        }
                    ?>
                    <input type="text" name="us_name" class="inputtext" value=""></input>
                    <input type="password" name="us_pass" class="inputtext" value=""></input>
                    <div class="login-button">
                        <button name="sub">登录</button>
                    </div>
                </form>
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
    </body>
</html>
