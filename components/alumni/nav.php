<html>
    <link rel="stylesheet" href="../../public/css/alumni.css">
</html>
<!-- logic to change the active nav color -->
<?php 
    $navItem = "";
    if($url_path == "/views/alumni"){
        $navItem = "home";
    }else if($url_path == "/views/alumni/events"){
        $navItem = "events";
    }else if($url_path == "/views/alumni/invitations"){
        $navItem = "invitations";
    }else if($url_path == "/views/alumni/request-to-host-events"){
        $navItem = "request-to-host-events";
    }
?>
<nav class="nav justify-content-center alumni-navbar">
    <a class="nav-link" href="../../views/alumni" style="color: <?= $navItem == 'home'?'white':'#929292'?>">Home</a>
    <a class="nav-link" href="../../views/alumni/events" style="color: <?= $navItem == 'events'?'white':'#929292'?>">Events</a>
    <a class="nav-link" href="../../views/alumni/invitations" style="color: <?= $navItem == 'invitations'?'white':'#929292'?>">Invitations</a>
    <a class="nav-link" href="../../views/alumni/request-to-host-events" style="color: <?= $navItem == 'request-to-host-events'?'white':'#929292'?>">Request To Host Events</a>
</nav>