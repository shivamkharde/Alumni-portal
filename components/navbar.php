<?php 
    // change navbar name based on dir
    $url_path = $_SERVER["REQUEST_URI"];
    $navbar_name = "";
    if($url_path == "/views/register"){
        $navbar_name = "Alumni Portal Registration";
    }else if($url_path == "/views/login"){
        $navbar_name = "Alumni Portal Login";
    }else{
        $navbar_name ="Alumni Portal";
    }
?>
<nav class="navbar navbar-expand-sm navbar-light bg-light main-nav">
    <a class="navbar-brand" href="..<?=$url_path?>"><?=$navbar_name?></a>
    <div class="my-2 my-lg-0 date-and-profile">
        <div class="date-and-time">
            <h4 class="navbar-brand" style="margin: 0px">26<sup>th</sup> January 2021</h4>
        </div>
        <!-- <img src="../public/res/user.png" alt="" class="profile-icon"> -->
    </div>
</nav>