<!-- check if user is signed in or not otherwise redirect to login page -->
<?php 
session_start();
if(isset($_SESSION['user_data'])){
    if($_SESSION['user_data']['role'] == "admin"){
        include("../../../components/header.php");
?>

<main class="manage-event-invite-main-container">
    <div>
        <?php 
        include("../../../components/navbar.php"); 
        include("../../../components/admin/nav.php"); 
        include("../../../components/admin/manageeventsnav.php"); 
        ?>
        <br>
    </div>
        <div class="manage-event-invite-card-container">
            <?php include("../../../components/admin/inviteeventcard.php"); ?>
        </div>
    <?php include("../../../components/footer.php"); ?>
</main>

<?php 
    }else{
        header("Location: ../../../views/alumni");
    }
}else{
    header("Location: ../../../");
}
?>
