<!-- check if user is signed in or not otherwise redirect to login page -->
<?php 
session_start();
if(isset($_SESSION['user_data'])){
    if($_SESSION['user_data']['role'] == "alumni"){
        include("../../../components/header.php");
        include("../../../components/navbar.php");
        include("../../../components/alumni/nav.php");
?>

<!-- main content -->
<h1>Events</h1>

<?php 
        include("../../../components/footer.php");
    }else{
        header("Location: ../../../views/admin");
    }
}else{
    header("Location: ../../../");
}
?>
