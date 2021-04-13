<?php include("./components/header.php"); ?>

<!-- header section -->
<header class="jumbotron">
    <img src="./public/res/university_logo.png" alt="University Logo" />
    <h1 class="display-4">University Of Mumbai</h1>
    <h2>Alumni Portal</h2>
</header>

<!-- login and signup button section  -->
<main class="jumbotron main-area">
    <div class="container">
        <a onclick="goToLogin()" href="#" class="btn btn-lg login-btn"
            >LOGIN</a
        >
        <a
            onclick="goToRegister()"
            href="#"
            class="btn btn-lg register-btn"
            >REGISTER</a
        >
    </div>
</main>

<?php include("./components/footer.php"); ?>
    