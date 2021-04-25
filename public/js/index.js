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
    selectElement.innerHTML = "";
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

// function to get confirmation for deleting event
function deleteEvent(event_id) {
    const confirmation = confirm("do you really want to delete this event??");
    if (confirmation) {
        // redirect user to delete event file
        window.location.href =
            "/controllers/admin/delete_event.controller.php?id=" + event_id;
    }
}

// function to get invited alumni list by event id
function getInvitedAlumniListByEventId(event_id) {
    // send get request to get all the invited alumni list
    $.get("/helpers/get_invited_alumni_list.helper.php", {
        event_id: event_id,
    })
        .then((data) => {
            if (data.status == 404) {
                // populate err
                const message = data.message;
                const template = `<h3 align="center">${message}</h3>`;
                document.querySelector(
                    "#see-invited-alumni-list-modal .modal-body .container",
                ).innerHTML = template;
            } else {
                // store it in local storage for future use
                window.localStorage.setItem(
                    "invited_alumni_list",
                    JSON.stringify(data),
                );
                console.log(data);
                // populate data in see invited alumni modal
                populateDataInInvitedAlumniModal(data);
            }
        })
        .catch((err) => {
            console.log(err.responseJSON.message);
        });
}

// this function is to populate the invited alumni data
function populateDataInInvitedAlumniModal(data) {
    let invited_container = `
            <div class="row">
                <div class="col-md-12">
                    <!-- create a search bar to search invited alumni in list -->
                    <div class="invited-alumni-search-bar">
                        <input type="text" onkeyup="searchInInvitedAlumni()" placeholder="Search Invited Alumni By Name Or Email" name="invited-alumni-search-input" id="invited-alumni-search-input">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 populate-invited-alumni-list-cell">
                    <!-- all the invited alumni list -->            
                    <!-- invite alumni list card end -->
                </div>
            </div>
        `;

    let invited_card = ``;
    // loop on data and create list of invited alumni card
    data.data.forEach((list, index) => {
        invited_card += `
            <div class="invited-alumni-list-item">
                <div class="row">
                    <div class="col-md-7">
                        <div class="invited-alumni-info">
                            <h4 class="invited-alumni-name">${
                                list.fullname
                            }</h4>
                            <p class="text-muted">${list.email}</p>
                            <p class="text-muted"><span class="badge ${
                                list.accepted == 0
                                    ? "badge-secondary"
                                    : "badge-primary"
                            }">${
            list.accepted == 0 ? "Not Accepted" : "Accepted"
        }</span></p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="invited-alumni-see-details-button">
                            <button type="button" onclick="window.location.href='/views/admin/search-alumni/alumni.php?id=${
                                list.alumni_id
                            }'">SEE PROFILE</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    // add first invited container to the body and then attach all invited cards
    document.querySelector(
        "#see-invited-alumni-list-modal .modal-body .container",
    ).innerHTML = invited_container;

    document.querySelector(
        "#see-invited-alumni-list-modal .modal-body .populate-invited-alumni-list-cell",
    ).innerHTML = invited_card;
}

// to search in invited alumni list
function searchInInvitedAlumni() {
    let search_input = document.querySelector("#invited-alumni-search-input")
        .value;
    let search_len = search_input.length;
    const data = JSON.parse(window.localStorage.getItem("invited_alumni_list"));
    let result = data.data.filter(
        (li) =>
            li.fullname.substring(0, search_len) == search_input ||
            li.email.substring(0, search_len) == search_input,
    );
    let invited_card = ``;
    // check if alumni found if not then show no invitation found by this name or email error
    if (result.length == 0) {
        invited_card += `<h5 align="center">No invitation found by this name or email</h5>`;
    } else {
        // get filtered list and show the results
        result.forEach((list, index) => {
            invited_card += `
                <div class="invited-alumni-list-item">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="invited-alumni-info">
                                <h4 class="invited-alumni-name">${
                                    list.fullname
                                }</h4>
                                <p class="text-muted">${list.email}</p>
                                <p class="text-muted"><span class="badge ${
                                    list.accepted == 0
                                        ? "badge-secondary"
                                        : "badge-primary"
                                }">${
                list.accepted == 0 ? "Not Accepted" : "Accepted"
            }</span></p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="invited-alumni-see-details-button">
                                <button type="button" onclick="window.location.href='/views/admin/search-alumni/alumni.php?id=${
                                    list.alumni_id
                                }'">SEE PROFILE</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
    }
    document.querySelector(
        "#see-invited-alumni-list-modal .modal-body .populate-invited-alumni-list-cell",
    ).innerHTML = invited_card;
}

// function to get non invited alumni for a particular event
function getNonInvitedAlumniForParticularEvent(college_id, event_id) {
    // send get request to get all the invited alumni list
    $.get("/helpers/get_not_invited_alumni_list.helper.php", {
        college_id: college_id,
        event_id: event_id,
    })
        .then((data) => {
            if (data.status == 404) {
                // populate err
                const message = data.message;
                const template = `<h3 align="center">${message}</h3>`;
                document.querySelector(
                    "#invite-alumni-to-event-modal .modal-body .container",
                ).innerHTML = template;
            } else {
                // store it in local storage for future use
                window.localStorage.setItem(
                    "alumni_list",
                    JSON.stringify(data),
                );
                console.log(data);
                // populate data in see invited alumni modal
                populateDataInInviteAlumniToEventModal(data, event_id);
            }
        })
        .catch((err) => {
            console.log(err.responseJSON.message);
        });
}

// this function is to populate the alumni data in invite alumni to event modal
function populateDataInInviteAlumniToEventModal(data, event_id) {
    let non_invited_container = `
    <div class="row">
        <div class="col-md-12">
            <!-- create a search bar to search alumni in list -->
            <div class="invite-to-event-alumni-search-bar">
                <input type="search" onkeyup="searchInNonInvitedAlumni(${event_id})" placeholder="Search Alumni By Name Or Email" name="invite-to-event-alumni-search-input" id="invite-to-event-alumni-search-input">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 populate-non-invited-alumni-list-cell">
            <!-- all the non invited alumni list -->            
            <!-- invite alumni list card end -->
        </div>
    </div>
`;

    let non_invited_card = ``;
    // loop on data and create list of invited alumni card
    data.data.forEach((list, index) => {
        non_invited_card += `
    <div class="alumni-list-item">
        <div class="row">
            <div class="col-md-7">
                <div class="alumni-info-short">
                    <h4 class="alumni-info-name">${list.fullname}</h4>
                    <p class="text-muted">${list.email}</p>
                    <p class="text-muted">${list.phone}</p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="see-alumni-profile-and-invite-btn">
                    <button type="button" onclick="window.location.href='/views/admin/search-alumni/alumni.php?id=${list.id}'">SEE PROFILE</button>
                    <button type="button" id="open-send-invite-to-alumni-modal" data-toggle="modal" data-event-id="${event_id}" data-alumni-id="${list.id}" data-target="#invitation-title-message-modal" >INVITE</button>
                </div>
            </div>
        </div>
    </div>
`;
    });

    // add first invited container to the body and then attach all invited cards
    document.querySelector(
        "#invite-alumni-to-event-modal .modal-body .container",
    ).innerHTML = non_invited_container;

    document.querySelector(
        "#invite-alumni-to-event-modal .modal-body .populate-non-invited-alumni-list-cell",
    ).innerHTML = non_invited_card;
}

// this function is to search the non invited alumni in the list
function searchInNonInvitedAlumni(event_id) {
    let search_input = document.querySelector(
        "#invite-to-event-alumni-search-input",
    ).value;
    const data = JSON.parse(window.localStorage.getItem("alumni_list"));
    let search_len = search_input.length;
    let result = data.data.filter(
        (li) =>
            li.fullname.substring(0, search_len) == search_input ||
            li.email.substring(0, search_len) == search_input,
    );
    let non_invited_card = ``;
    // check if alumni found if not then show no invitation found by this name or email error
    if (result.length == 0) {
        non_invited_card += `<h5 align="center">No alumni found by this name or email</h5>`;
    } else {
        // get filtered list and show the results
        result.forEach((list, index) => {
            non_invited_card += `
                <div class="alumni-list-item">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="alumni-info-short">
                                <h4 class="alumni-info-name">${list.fullname}</h4>
                                <p class="text-muted">${list.email}</p>
                                <p class="text-muted">${list.phone}</p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="see-alumni-profile-and-invite-btn">
                                <button type="button" onclick="window.location.href='/views/admin/search-alumni/alumni.php?id=${list.id}'">SEE PROFILE</button>
                                <button type="button" id="open-send-invite-to-alumni-modal" data-toggle="modal" data-event-id="${event_id}" data-alumni-id="${list.id}" data-target="#invitation-title-message-modal">INVITE</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
    }
    document.querySelector(
        "#invite-alumni-to-event-modal .modal-body .populate-non-invited-alumni-list-cell",
    ).innerHTML = non_invited_card;
}

// listener to set the alumni id and event id to the send invite modal
$(document).on("click", "#open-send-invite-to-alumni-modal", function () {
    let event_id = $(this).data("event-id");
    let alumni_id = $(this).data("alumni-id");

    $("#invitation-title-message-modal #send-invitation-event-id").val(
        event_id,
    );
    $("#invitation-title-message-modal #send-invitation-alumni-id").val(
        alumni_id,
    );
});

// this function is to search for alumni
function searchForAlumni() {
    // get search string here
    let search_string = document.querySelector("#alumni-search-bar-input")
        .value;
    // get data from localstorage
    let alumni_data = JSON.parse(window.localStorage.getItem("alumni_data"));
    let search_len = search_string.length;
    let result = alumni_data.data.filter(
        (li) =>
            li.fullname.substring(0, search_len).toLowerCase() ==
                search_string.toLowerCase() ||
            li.email.substring(0, search_len) == search_string ||
            li.phone.substring(0, search_len) == search_string ||
            li.department_name.substring(0, search_len).toLowerCase() ==
                search_string.toLowerCase(),
    );

    // create a alumni search card and populate
    let alumni_search_card = "";
    if (result.length == 0) {
        alumni_search_card += `<h5 align="center">No Alumnis Found</h5>`;
    } else {
        // get filtered list and show the results
        result.forEach((list, index) => {
            alumni_search_card += `
                <div class="alumni-search-list-item">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="alumni-info-short">
                                <h4 class="alumni-info-name">${list.fullname}</h4>
                                <p class="text-muted">${list.email}</p>
                                <p class="text-muted">${list.phone}</p>
                                <p class="text-muted">${list.department_name}</p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="see-alumni-profile-btn">
                                <button type="button" onclick="window.location.href='/views/admin/search-alumni/alumni.php?id=${list.id}'">SEE PROFILE</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
    }
    document.querySelector(
        ".search-alumni-main-container .search-alumni-container #search-alumni-info-list-container",
    ).innerHTML = alumni_search_card;
}

// this function is to verify and accept alumni
function verifyAndAcceptRegistration(
    college_id,
    department_id,
    id,
    fullname,
    phone,
    email,
    dob,
    roll_no,
) {
    let confirmation = confirm("Verify And Accept Registration Request ??");
    if (confirmation) {
        // send user to verify page with params
        window.location.href = `/controllers/admin/verify_registration.controller.php?id=${id}&college_id=${college_id}&department_id=${department_id}&fullname=${fullname}&phone=${phone}&email=${email}&dob=${dob}&roll_no=${roll_no}`;
    }
}

// this function is to deny and reject alumni registration request
function denyNewRegistration(
    college_id,
    department_id,
    id,
    fullname,
    phone,
    email,
    dob,
    roll_no,
) {
    let confirmation = confirm("Deny this registration request ??");
    if (confirmation) {
        // send user to verify page with params
        window.location.href = `/controllers/admin/deny_new_registration.controller.php?id=${id}&college_id=${college_id}&department_id=${department_id}&fullname=${fullname}&phone=${phone}&email=${email}&dob=${dob}&roll_no=${roll_no}`;
    }
}
