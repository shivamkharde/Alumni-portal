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
    if($url_path == "/views/register/"){
        $navbar_name = "Alumni Portal Registration";
    }else if($url_path == "/views/login/"){
        $navbar_name = "Alumni Portal Login";
    }else if(startsWith($url_path,"/views/alumni/")){
        $navbar_name ="Welcome Alumni - ";
        $navbar_name.=$_SESSION['user_data']['username'];
    }else if(startsWith($url_path,"/views/admin/")){
        $navbar_name ="Welcome Admin - ";
        $navbar_name.=$_SESSION['user_data']['username'];
    }
?>
<nav class="navbar navbar-expand-sm navbar-light bg-light main-nav">
    <a class="navbar-brand" style="font-size: 19px;" href="<?=$url_path?>"><?=$navbar_name?></a>
    <div class="my-2 my-lg-0 date-and-profile">
        <div class="date-and-time">
            <h4 class="navbar-brand" style="margin: 0px;font-size: 19px;"><?= date("F jS, Y",time())?></h4>
        </div>
        <?php if(isset($_SESSION['user_data'])){ ?>
            <div class="dropdown dropleft">
                <span id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="/public/res/user.png" alt="profile" class="profile-icon">
                </span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/controllers/login/logout.controller.php">Logout</a>
                </div>
            </div>
        <?php }?>
    </div>
</nav>
