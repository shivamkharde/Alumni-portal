<!-- check if session is already started and navigate based on role-->
<?php 
session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['role'])){
        // redirect user to the page based on role
        if($_SESSION['role'] == "admin"){
            header("Location: ../views/admin");
        }else if($_SESSION['role'] == "alumni"){
            header("Location: ../views/alumni");
        }else{
            header("Location: ../../");
        }
    }
?>
<?php include("../../components/header.php"); ?>

    <main class="login-container">
        <!-- navbar -->
        <?php include("../../components/navbar.php"); ?>

        <div class="login-card">
            <!-- login card nav -->
            <?php include("../../components/login/nav.php"); ?>

            <!-- select login card based on login nav -->
            <?php include("../../components/login/admin.php"); ?>
            <?php include("../../components/login/alumni.php"); ?>
        </div>

        <!-- footer -->
        <?php include("../../components/footer.php"); ?>
    </main>