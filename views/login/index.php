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