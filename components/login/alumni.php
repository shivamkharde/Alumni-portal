<!-- alumni login controller -->
<?php 
include("../../controllers/login/alumni.controller.php");
?>

<div class="alumni-login-card">
    <form action="#" method="POST">
        <!-- show error if available -->
        <?php if($error!=null){
                    echo "<p class='login-error'>$error</p>";
                    echo "<script>
                        document.querySelector('.login-error').style.display='flex'
                        setTimeout(()=>{
                            document.querySelector('.login-error').style.display='none';
                        },3000);
                        // alert('$error');
                        changeLoginType('alumni');
                    </script>";
                }
        ?>
        <input type="text" name="alumni-username" id="alumni-username" placeholder="Username" required />
        <input type="password" name="alumni-password" id="alumni-password" placeholder="Password" required />
        <button name="alumni-login-btn">LOG IN</button>
        <div class="alumni-register-here">
            <p>If you don’t have an alumni account </p>
            <p><a href="../../views/register">Register Here</a></p>
        </div>
    </form>
</div>