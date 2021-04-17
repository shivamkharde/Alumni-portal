<!-- admin login controller -->
<?php 
include("../../controllers/login/admin.controller.php");
?>

<div class="admin-login-card">
    <form action="../../views/login" method="POST">
    <!-- show error if available -->
        <?php if($error!=null){
                    echo "<p class='login-error'>$error</p>";
                    echo "<script>
                        document.querySelector('.login-error').style.display='flex'
                        setTimeout(()=>{
                            document.querySelector('.login-error').style.display='none';
                        },3000);
                        changeLoginType('admin');
                    </script>";
                }
        ?>
        <input type="text" name="username" id="admin-username" placeholder="Username" required />
        <input type="password" name="password" id="admin-password" placeholder="Password" required />
        <button type="submit">LOG IN</button>
    </form>
</div>