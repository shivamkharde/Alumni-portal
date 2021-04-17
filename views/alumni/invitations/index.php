<!-- check if user is signed in or not otherwise redirect to login page -->
<?php 
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['role'])){
    if($_SESSION['role'] == "alumni"){
        include("../../../components/header.php");
        include("../../../components/navbar.php");
        include("../../../components/alumni/nav.php");
?>

<!-- main content -->
<h1>Invitations</h1>

<?php 
        include("../../../components/footer.php");
    }else{
        header("Location: ../../../views/admin");
    }
}else{
    header("Location: ../../../");
}
?>
