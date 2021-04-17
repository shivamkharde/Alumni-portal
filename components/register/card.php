<!-- 
    alumni register controller
 -->
 <?php include("../../controllers/register/alumni.controller.php"); ?>

<div class="alumni-register-card">
    <form class="register-form" action="#" method="GET">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p style="margin:0;">*All fields are mandatory</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 register-left-part">
                    <input type="text" name="full-name" id="full-name" required  placeholder="Full Name" value="<?=isset($_GET['full-name'])? $_GET['full-name'] : ''?>"/>
                    <input type="email" name="email" id="email" required placeholder="Email Id"  value="<?=isset($_GET['email'])? $_GET['email'] : ''?>"/>
                    <input type="number" name="phone-no" id="phone-no" required placeholder="Phone No." value="<?=isset($_GET['phone-no'])? $_GET['phone-no'] : ''?>"/>
                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="dob" id="dob" required placeholder="Date Of Birth" value="<?=isset($_GET['dob'])? $_GET['dob'] : ''?>">
                    <textarea name="home-address" id="home-address" cols="30" rows="3" placeholder="Home Address"><?=isset($_GET['home-address'])? $_GET['home-address'] : ''?></textarea>
                    <input type="text" name="roll-no" id="roll-no" required placeholder="College Roll No." value="<?=isset($_GET['roll-no'])? $_GET['roll-no'] : ''?>">
                </div>
                <div class="col-md-6 register-right-part">
                <!-- show all the list of colleges -->
                    <select name="college-name" id="college-name" required onchange="getSelectedOptionFromCollegeName()">
                        <option value="" disabled selected hidden>Select College Name</option>
                        <?php 
                            while($row = mysqli_fetch_assoc($colleges)){
                        ?>
                            <option value="<?=$row['id']?>"><?= $row['name']?></option>
                        <?php } ?>
                    </select>
                    <select name="college-department" id="college-department" required>
                        <option value="" disabled selected hidden>Select College Department</option>
                    </select>
                    <input type="text" onfocus="(this.type='month')" onblur="(this.type='text')"  name="joining-year" id="joining-year" required placeholder="Joining Year">
                    <input type="text" onfocus="(this.type='month')" onblur="(this.type='text')"  name="passout-year" id="passout-year" required placeholder="Passout Year">
                    <input type="number" step="0.1"  name="cgpa" id="cgpa" required placeholder="CGPA">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 register-info">
                    <p>This information will be sent to your college. once your information is verified by college  you’ll get your alumni id and password to your email</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 alumni-register-btn">
                    <!-- form submit -->
                    <button  name="register"  id="register">SUBMIT</button>
                </div>
            </div>
        </div>
    </form>
</div>