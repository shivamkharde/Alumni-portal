<!-- include search alumni controller to get all the alumnis and store them in localstorage then search in localstorages array -->
<?php include($_SERVER['DOCUMENT_ROOT']."/controllers/admin/search_alumni.controller.php")?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alumni-search-bar">
                <input type="search" onkeyup="searchForAlumni()" placeholder="Type To Search For Alumni (By. Name, Email, Phone, Department Name )" name="alumni-search-bar-input" id="alumni-search-bar-input">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="search-alumni-info-list-container">
            <!-- populate initial  alumnis from database -->
            <?php 
                // check if alumni available
                if($error!=""){
                    echo "<h5 align='center'>$error</h5>";
                }else{
                    foreach($alumni_data['data'] as $row){
            ?>
            <!-- search card starts here -->
            <div class="alumni-search-list-item">
                <div class="row">
                    <div class="col-md-7">
                        <div class="alumni-info-short">
                            <h4 class="alumni-info-name"><?=$row['fullname']?></h4>
                            <p class="text-muted"><?=$row['email']?></p>
                            <p class="text-muted"><?=$row['phone']?></p>
                            <p class="text-muted"><?=$row['department_name']?></p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="see-alumni-profile-btn">
                            <button type="button" onclick="window.location.href='/views/admin/search-alumni/alumni.php?id=<?=$row['id']?>'">SEE PROFILE</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
            <!-- search card ends here -->
        </div>
    </div>
</div>
<br>