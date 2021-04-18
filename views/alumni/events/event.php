<!-- check if user is signed in or not otherwise redirect to login page -->
<?php 
session_start();
if(isset($_SESSION['user_data'])){
    if($_SESSION['user_data']['role'] == "alumni"){
        include("../../../components/header.php");
?>

<main class="single-event-main-container">
    <div>
        <?php 
        include("../../../components/navbar.php"); 
        include("../../../components/alumni/nav.php"); 
        ?>
    </div>
    <div class="single-event-container">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/components/alumni/singleevent.php'); ?>
    </div>
    <?php include("../../../components/footer.php"); ?>
</main>

<?php 
    }else{
        header("Location: ../../../views/admin");
    }
}else{
    header("Location: ../../../");
}
?>
