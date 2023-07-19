<style>
#section-home {
    background-image: url('<?= base_url('/')?>assets/img/logo.png');
    background-position: center;
    background-size: cover;
    background-blend-mode: color-burn;
    background-color: #010614af;
}
</style>

<div class="w-100 d-flex justify-content-center align-items-center " style="height: 100vh;" id="section-home">


    <div class="w-100">
        <div class="row mx-auto">
            <div class="col-lg-4 mb-5 mx-auto">
                <?php if ($this->session->flashdata('error_message')): ?>
                <div class="alert alert-danger alert-dismissible position-sticky fade show" role="alert">
                    <?php echo $this->session->flashdata('error_message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-12 ">
                <div class="position-relative w-100" style="top:-60px">
                    <h1 class="text-center" style=" font-weight: 900; letter-spacing: 3px; font-style: italic; ">
                        SPACEWORK</h1>
                </div>
            </div>
            <div class="col-lg-4 mx-auto  rounded-4" style="max-width:500px">
                <div class="py-4 px-4 fw-bold shadow-lg border bg-light" style="border-radius:10px">
                    <div class="text-center position-relative py-4">
                        <div class="position-absolute w-100" style="top: -80px;">
                            <img src="<?= base_url('/')?>assets/img/undraw_profile.svg" width="120"
                                class="shadow-lg rounded-circle" alt="" style="border:4px solid violet">
                        </div>

                    </div>
                    <form class="user" method="post" action="<?= base_url('login')?>">
                        <div class="form-group ">
                            <label for="email" class="text-label">Enter your matricul ID</label>
                            <input type="text" name="matriculId"
                                class="form form-control shadow-none mb-1 border-primary text-dark">
                            <small class="p-0 m-0 text-danger "><?= form_error('matriculId');?></small>
                        </div>
                        <div class="form-group ">
                            <label for="code_access" class="text-label">Enter your access code</label>

                            <input name="access_code" type="text"
                                class="form form-control shadow-none mb-1 bg-transparent border-primary text-dark">
                            <small class="p-0 m-0 text-danger "><?= form_error('access_code');?></small>
                        </div>
                        <button type="submit" class="btn btn-primary shadow-none mt-5 btn-block fw-bold">LOGIN</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>