<section class="w-100">
    <div class="container-fluid">
        <!--- Show Information about user--->
        <h5 class="text-center py-5">Click confirm to delete this user</h5>

        <div class="row mx-auto py-4">
            <div class="col-lg-7 mx-auto shadow-lg rounded-4 py-5 position-relative">
                <div class="d-flex justify-content-center position-absolute w-100" style="top:-50px">
                    <img class="img-profile rounded-circle" src="<?= base_url('/');?>assets/img/undraw_profile.svg"
                        width="100">
                </div>
                <div class="d-flex justify-content-between bg-light m-3">
                    <h6 clas="text-dark">Matricul ID : <?=$profile->matriculId;?></h6>
                    <h6>Status : <small class="text-white px-1 rounded-4 bg-info"><?="Active";?></small></h6>
                </div>
                <div class="d-flex justify-content-between bg-light m-3">
                    <h6>Name : <?=$profile->firstname;?></h6>
                    <h6>Lastname : <?=$profile->lastname;?></h6>
                </div>
                <div class="d-flex justify-content-between bg-light m-3">
                    <h6>Job Title : <?=$profile->stack;?></h6>

                    <h6 class="text-start">Email : <?=$profile->email;?></h6>
                </div>
                <div class="d-flex justify-content-between bg-light m-3">
                    <h6>Access code : <?=$profile->access_code;?></h6>

                    <h6>Employment Date : <?= date("d-M-Y",strtotime($profile->timestamp));?></h6>
                </div>

                <form action="<?=base_url('corfirm_to_delete/'.$profile->matriculId);?>" method="post">
                    <div class="d-flex justify-content-around">
                        <button class="btn btn-info shadow-none border-0 px-5">Confirm</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>