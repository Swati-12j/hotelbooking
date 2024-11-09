<?php
require('inc/essentials.php');
adminLogin();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL - Dashboard</title>
    <?php require('inc/links.php') ?>
</head>

<body class="bg-light">

    <?php require('inc/header.php') ?>
    <div class="container-fliud" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">SETTINGS</h3>

                <!-- Genreal settings section  -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 ">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#general-s">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">About us</h6>
                        <p class="card-text" id="site_about"></p>
                    </div>
                </div>



                <!-- General Settings Modal  -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">General Settings</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="ps-0"> <label class="form-label fw-bold">Site Title</label>
                                        <input type="text" id="site_title_inp" class="form-control shadow-none"
                                            name="site_title">
                                    </div>
                                    <div class="mb-3"> <label class="form-label fw-bold">About us</label>
                                        <textarea name="site_about" id="site_about_inp" class="form-control"
                                            rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal"
                                        onclick="site_title.value=general_data.site_title, site_about.value=general_data.site_about">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- Shutdown section  -->
                <div class="card border-0 shadow-sm mb-4 ">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 ">Shutdown Website</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox"
                                        id="shutdown-toggle">

                                </form>

                            </div>
                        </div>

                        <p class="card-text">
                            No customers will be allowed to book hotel room,when shutdown mode is turned on
                        </p>
                    </div>
                </div>


                <!-- Contact details section  -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 ">Contact Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#contacts-s">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text" id="address"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text" id="gmap"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                                    <p class="card-text"><i class="bi bi-telephone-fill mb-1"></i>
                                        <span id="pn1"></span>
                                    </p>
                                    <p class="card-text"><i class="bi bi-telephone-fill"></i>
                                        <span id="pn2"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">E-mail</h6>
                                    <p class="card-text" id="email"></p>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-facebook me-1"></i>
                                        <span id="fb"></span>
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-instagram me-1"></i>
                                        <span id="insta"></span>
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-twitter me-1"></i>
                                        <span id="tw"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                    <iframe id="iframe" class="border p-2 w-100" loading="lazy"
                                        frameborder="0"></iframe>
                                </div>

                            </div>

                        </div>


                    </div>
                </div>

                <!-- Contact details Modal  -->
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">General Settings</h5>
                                </div>
                                <div class="modal-body">

                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3"> <label class="form-label fw-bold">Address</label>
                                                    <input type="text" id="address_inp" class="form-control shadow-none"
                                                        name="address" required>
                                                </div>
                                                <div class="mb-3"> <label class="form-label fw-bold">Google Map</label>
                                                    <input type="text" id="gmap_inp" class="form-control shadow-none"
                                                        name="gmap" required>
                                                </div>
                                                <div class="mb-3"> <label class="form-label fw-bold">Phone No (with
                                                        country code)</label>

                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal"
                                        onclick="site_title.value=general_data.site_title, site_about.value=general_data.site_about">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- Management Team Section  -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 ">Management Team </h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#team-s">
                                <i class="bi bi-plus-square"></i>
                                Add
                            </button>

                        </div>
                        <div class="row" id="team-data">
                            


                        </div>


                    </div>
                </div>
                <!-- Management Team Modal  -->

                <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="team_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Team Member</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="ps-0"> <label class="form-label fw-bold">Name</label>
                                        <input type="text" id="member_name_inp" class="form-control shadow-none"
                                            name="member_name">
                                    </div>
                                    <div class="mb-3"> <label class="form-label fw-bold">Picture</label>
                                        <input type="file" id="member_picture_inp" accept=".jpg,.png,.webp,.jpeg"
                                            class="form-control shadow-none" name="member_picture">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal"
                                        onclick="member_name.value='',member_picture.value=''">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php echo $_SERVER['DOCUMENT_ROOT'] ?>
            </div>
        </div>
    </div>


    <?php require('inc/scripts.php') ?>

    <script>
        let general_data;
        let contacts_data;

        let general_s_form = document.getElementById('general_s_form');
        let site_title_inp = document.getElementById('site_title_inp');
        let site_about_inp = document.getElementById('site_about_inp');

        let team_s_form = document.getElementById('team_s_form');
        let member_name_inp = document.getElementById('member_name_inp');
        let member_picture_inp = document.getElementById('member_picture_inp');



        function get_general() {
            let site_title = document.getElementById('site_title');
            let site_about = document.getElementById('site_about');



            let shutdown_toggle = document.getElementById('shutdown-toggle');


            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onload = function () {
                general_data = JSON.parse(this.responseText);
                site_title.innerText = general_data.site_title;
                site_about.innerText = general_data.site_about;

                site_title_inp.value = general_data.site_title;
                site_about_inp.value = general_data.site_about;

                if (general_data.shutdown == 0) {
                    shutdown_toggle.checked = false;
                    shutdown_toggle.value = 0;
                }
                else {
                    shutdown_toggle.checked = true;
                    shutdown_toggle.value = 1;
                }
            }


            xhr.send('get_general');
        }

        general_s_form.addEventListener('submit', function (e) {
            e.preventDefault();
            upd_general(site_title_inp.value, site_about_inp.value);
        })


        function upd_shutdown(val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");



            xhr.onload = function () {

                if (this.responseText == 1 && general_data.shutdown == 0) {
                    alert('success', 'Site has been shutdown!');

                }
                else {
                    alert('success', 'Shutdown mode off!');
                }
                get_general();
            }

            xhr.send('upd_shutdown=' + val);
        }


        function upd_general(site_title_val, site_about_val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");



            xhr.onload = function () {
                var myModal = document.getElementById('general-s');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();
                if (this.responseText == 1) {
                    alert('success', 'Changes saved!');
                    get_general();
                }
                else {
                    alert('error', 'No changes made');
                }
            }

            xhr.send('site_title=' + site_title_val + '&site_about=' + site_about_val + '&upd_general');
        }

        function get_contacts() {

            let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'insta', 'tw'];

            // Corrected to use document.getElementById()
            let iframe = document.getElementById('iframe');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onload = function () {
                // Assuming the response is JSON formatted
                contacts_data = JSON.parse(this.responseText);
                contacts_data = Object.values(contacts_data);
                for (i = 0; i < contacts_p_id.length; i++) {
                    document.getElementById(contacts_p_id[i]).innerText = contacts_data[i + 1];
                }
                iframe.src = contacts_data[9];
            }

            xhr.send('get_contacts');
        }


        team_s_form.addEventListener('submit', function (e) {
            e.preventDefault();
            add_member();
        });

        function add_member() {
            let data = new FormData();
            data.append('name', member_name_inp.value);
            data.append('picture', member_picture_inp.files[0]);
            data.append('add_member', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);


            xhr.onload = function () {
                
                var myModal = document.getElementById('team-s');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();
                if(this.responseText == 'inv_img'){
                  alert('error','Only JPG and PNG images are allowed!') ;
                }
                else if (this.responseText ==' inv_size'){
              alert('error','Image should be less than 2MB! ');   
                }
                else if(this.responseText ==' upd_failed'){
                    alert('error','Image upload failed serevr down!');
                }
                else {
                    alert('success','New member added!');
                    member_name_inp.value='';
                    member_picture_inp.value='';
                    get_members();

                }
            }

            xhr.send(data);
        }

       function get_members() {

        let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onload = function () {
              document.getElementById('team-data').innerHTML=this.responseText;
            }


            xhr.send('get_members');

       }
      function rem_member(val){
        let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onload = function () {
                if(this.responseText==1){
                    alert('success','Member removed!');
                    get_members();
                }
                else {
                    alert('error','Server down!');
                }
              

            }


            xhr.send('rem_member='+val);

      }



        window.onload = function () {
            get_general(); // Assuming this function exists
            get_contacts();
            get_members();
        }

    </script>
</body>

</html>