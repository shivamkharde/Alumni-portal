// to goto login
function goToLogin() {
    window.location.href = "./views/login";
}
// to goto register
function goToRegister() {
    window.location.href = "./views/register";
}

// to change the login type (admin/alumni) based on click
function changeLoginType(loginType) {
    if (loginType === "admin") {
        document.querySelector(".admin-login-card").style.display = "flex";
        document.querySelector(".alumni-login-card").style.display = "none";

        // change color of nav admin item
        document.querySelector(".admin-login-nav-item > p").style.color =
            "#1c4966";
        document.querySelector(".alumni-login-nav-item > p").style.color =
            "#929292";
    } else if (loginType === "alumni") {
        document.querySelector(".alumni-login-card").style.display = "flex";
        document.querySelector(".admin-login-card").style.display = "none";

        // change color of nav admin item
        document.querySelector(".alumni-login-nav-item > p").style.color =
            "#1c4966";
        document.querySelector(".admin-login-nav-item > p").style.color =
            "#929292";
    }
}

// this function is to get the selected college id from the college name dropdown
function getSelectedOptionFromCollegeName() {
    const selectedCollegeId = document.getElementById("college-name").value;
    $.post("../../helpers/get_departments_by_college_id.helper.php", {
        college_id: selectedCollegeId,
    })
        .then((data) => {
            // populate data inside select box
            populateDepartmentData(data);
        })
        .catch((err) => {
            alert(err.message);
        });
}

// this function si to populate the departments
function populateDepartmentData(data) {
    // get id ref of select box
    const selectElement = document.getElementById("college-department");
    // loop over data and and create options element
    data.data.forEach((data) => {
        const optionsElement = document.createElement("option");
        optionsElement.value = data.id;
        const text = document.createTextNode(data.department_name);
        optionsElement.appendChild(text);
        // append this option element to department select box
        selectElement.appendChild(optionsElement);
    });
}

// function to accept the invitation
function acceptInvitation(college_id, invitation_id) {
    const confirmation = confirm("Accept this invitation ??");
    if (confirmation) {
        $.post("/helpers/accept_invitation.helper.php", {
            college_id: college_id,
            invitation_id: invitation_id,
        })
            .then((data) => {
                //    show alert to the user that invitation accepted successfully
                alert(data.message);
                // redirect user to all invitation page
                window.location.href = "/views/alumni/invitations";
            })
            .catch((err) => {
                alert(err.message);
            });
    }
}
