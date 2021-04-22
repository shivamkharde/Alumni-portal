
<!-- logic to change the active nav color -->
<?php 
    $navItem = "";
    if($url_path == "/views/admin/manage-events"){
        $navItem = "all_events";
    }else if($url_path == "/views/admin/manage-events/add_event.php"){
        $navItem = "add_event";
    }else if($url_path == "/views/admin/manage-events/invite_alumni.php"){
        $navItem = "invite_alumni";
    }
?>
<nav class="nav justify-content-center admin-manage-events-navbar">
    <a class="nav-link" href="/views/admin/manage-events" style="color: <?= $navItem == 'all_events'?'white':'#929292'?>">All Events</a>
    <a class="nav-link" href="/views/admin/manage-events/add_event.php" style="color: <?= $navItem == 'add_event'?'white':'#929292'?>">Add Event</a>
    <a class="nav-link" href="/views/admin/manage-events/invite_alumni.php" style="color: <?= $navItem == 'invite_alumni'?'white':'#929292'?>">Invite Alumni</a>
</nav>