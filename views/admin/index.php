<!-- check if user is signed in or not otherwise redirect to login page -->
<?php 
session_start();
if(isset($_SESSION['user_data'])){
    if($_SESSION['user_data']['role'] == "admin"){
        include("../../components/header.php");
        include("../../components/navbar.php");
        include("../../components/footer.php");
    }else{
        header("Location: ../../views/alumni");
    }
}else{
    header("Location: ../../");
}
?>
