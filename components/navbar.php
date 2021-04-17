<?php 
    // function to check starts with
    function startsWith ($string, $startString)
    {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }
    
    // change navbar name based on dir
    $url_path = $_SERVER["REQUEST_URI"];
    $navbar_name = "";
    if($url_path == "/views/register"){
        $navbar_name = "Alumni Portal Registration";
    }else if($url_path == "/views/login"){
        $navbar_name = "Alumni Portal Login";
    }else if(startsWith($url_path,"/views/alumni")){
        $navbar_name ="Welcome Alumni - ";
        $navbar_name.=$_SESSION['username'];
    }else if(startsWith($url_path,"/views/admin")){
        $navbar_name ="Welcome Admin - ";
        $navbar_name.=$_SESSION['username'];
    }
?>
<nav class="navbar navbar-expand-sm navbar-light bg-light main-nav">
    <a class="navbar-brand" href="..<?=$url_path?>"><?=$navbar_name?></a>
    <div class="my-2 my-lg-0 date-and-profile">
        <div class="date-and-time">
            <h4 class="navbar-brand" style="margin: 0px">26<sup>th</sup> January 2021</h4>
        </div>
        <?php if(isset($_SESSION['username'])){ ?>
            <img src="../../public/res/user.png" alt="" class="profile-icon">
        <?php }?>
    </div>
</nav>