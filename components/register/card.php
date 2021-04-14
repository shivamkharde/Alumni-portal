<div class="alumni-register-card">
    <form class="register-form" action="#">
        <div class="container">
            <div class="row">
                <div class="col-md-6 register-left-part">
                    <input type="text" name="full-name" id="full-name" required  placeholder="Full Name"/>
                    <input type="email" name="email" id="email" required placeholder="Email Id" />
                    <input type="number" name="phone-no" id="phone-no" required placeholder="Phone No." />
                    <label for="dob">DOB:</label>
                    <input type="date" name="dob" id="dob" required placeholder="DOB (dd:mm:yy)">
                    <textarea name="home-address" id="home-address" cols="30" rows="3" placeholder="Home Address"></textarea>
                    <input type="text" name="roll-no" id="roll-no" required placeholder="College Roll No.">
                </div>
                <div class="col-md-6 register-right-part">
                    <select name="college-name" id="college-name" required>
                        <option value="" disabled selected hidden>Select College Name</option>
                        <option value="option1" >option 1</option>
                    </select>
                    <input type="text" name="college-institute-code" id="college-institute-code" required disabled placeholder="Institute Code ( automatically populate )">
                    <select name="college-department" id="college-department" required>
                        <option value="" disabled selected hidden>Select College Department</option>
                        <option value="option1" >option 1</option>
                    </select>
                    <select name="passout-year" id="joining-year" required>
                        <option value="" disabled selected hidden>Joining Year</option>
                        <option value="2000" >2000</option>
                    </select>
                    <select name="passout-year" id="joining-year" required>
                        <option value="" disabled selected hidden>Passout Year</option>
                        <option value="2000" >2000</option>
                    </select>
                    <input type="number" name="cgpa" id="cgpa" required placeholder="CGPA">

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
                    <button name="register"  id="register">SUBMIT</button>
                </div>
            </div>
        </div>
    </form>
</div>