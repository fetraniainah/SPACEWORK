<div id="container">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <h2 class="fw-bolder" style="font-weight: 900; font-style: italic;">SPACEWORK</h2>



        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span
                        class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$this->session->userdata('email');?></span>
                    <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('user_info'); ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('logout'); ?>">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->
</div>


<section class="w-100">
    <div class="container-fluid">

        <!--- Show button to access adminpage when user have an role admin--->
        <?php if($this->session->userdata('is_admin')==1):?>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success shadow-none border-0" href="<?= base_url('home'); ?>">
                <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
                Administrator
            </a>
        </div>
        <?php endif?>
        <!--- end section button--->

        <!--- Display message flashdata--->
        <div class="d-flex justify-content-center">
            <?php if ($this->session->flashdata('welcome_message')): ?>
            <div class="alert alert-success alert-dismissible fade show col-md-4" role="alert">
                <?php echo $this->session->flashdata('welcome_message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php elseif($this->session->flashdata('error_message')): ?>
            <div class="alert alert-danger alert-dismissible fade show col-md-4" role="alert">
                <?php echo $this->session->flashdata('error_message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
        </div>
        <!--- end section message flashdata--->

        <!--- Show Information about user--->
        <h5 class="text-center py-5" style="font-weight: 700;">My profile
        </h5>

        <div class="row mx-auto py-4">
            <div class="col-lg-7 mx-auto shadow-lg rounded-4 py-5 position-relative">
                <div class="d-flex justify-content-center position-absolute w-100" style="top:-50px">
                    <img class="img-profile rounded-circle" src="<?= base_url('/');?>assets/img/undraw_profile.svg"
                        width="100">
                </div>

                <div class="d-flex justify-content-between px-lg-5 bg-light m-3">
                    <h6 clas="text-dark">Matricul ID : <?=$profile->matriculId;?></h6>
                    <?php if($profile->status == 1):;?>
                    <h6>Status : <small class="text-white bg-success align-items-center text-center px-1"
                            style="border-radius:10px"><?="Active";?></small></h6>
                    <?php elseif($profile->status == 0):;?>
                    <h6>Status : <small class="text-white bg-danger align-items-center text-center px-1 p-1"
                            style="border-radius:10px"><?="Not active";?></small></h6>
                    <?php endif;?>
                </div>

                <div class="d-flex justify-content-between px-lg-5 bg-light m-3">
                    <h6>Name : <?=$profile->firstname;?></h6>
                    <h6>Lastname : <?=$profile->lastname;?></h6>
                </div>

                <div class="d-flex justify-content-between px-lg-5 bg-light m-3">
                    <h6>Job Title : <?=$profile->stack;?></h6>

                    <h6>Email : <?=$profile->email;?></h6>
                </div>

                <div class="d-flex justify-content-between px-lg-5 bg-light m-3">
                    <h6>Access code : <?=$profile->access_code;?></h6>

                    <h6>Employment Date : <?= date("d-M-Y",strtotime($profile->timestamp));?></h6>
                </div>
            </div>
        </div>



    </div>

</section>