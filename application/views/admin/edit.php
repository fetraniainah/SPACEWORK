<div class="container-fluid">
    <div class="row mx-auto">
        <div class="col-md-6 py-3 mx-auto">

            <?php if ($this->session->flashdata('error_message')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('error_message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php elseif($this->session->flashdata('success_message')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('success_message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>

            <h3 class="text-center py-2">Edit user</h3>
            <form action="<?= base_url('post_edit/'.$user->matriculId) ?>" method="post">
                <div class="form-group">
                    <label for="firstname" class="text-label text-primary">Firstname</label>
                    <input type="text" name="firstname" class="form form-control shadow-none border-dark" id="firstname"
                        value="<?= $user->firstname;?>">
                    <small class="p-0 m-0 text-danger"><?= form_error('firstname');?></small>
                </div>

                <div class="form-group">
                    <label for="lastname" class="text-label text-primary">Lastname</label>
                    <input type="text" name="lastname" class="form form-control shadow-none border-dark" id="lastname"
                        value="<?= $user->lastname;?>">
                    <small class="p-0 m-0 text-danger"><?= form_error('lastname');?></small>
                </div>

                <div class="form-group">
                    <label for="email" class="text-label text-primary">Email</label>
                    <input type="text" name="email" class="form form-control shadow-none border-dark" id="email"
                        value="<?= $user->email;?>">
                    <small class="p-0 m-0 text-danger"><?= form_error('email');?></small>
                </div>

                <div class="form-group">
                    <label for="stack" class="text-label text-primary">Stack</label>
                    <input type="text" name="stack" class="form form-control shadow-none border-dark" id="stack"
                        value="<?= $user->stack;?>">
                    <small class="p-0 m-0 text-danger"><?= form_error('stack');?></small>
                </div>

                <div class="form-group">
                    <label for="access_code" class="text-label text-primary">Access code</label>
                    <input type="text" name="access_code" class="form form-control shadow-none border-dark"
                        id="access_code" value="<?= $user->access_code;?>">
                    <small class="p-0 m-0 text-danger"><?= form_error('access_code');?></small>
                </div>

                <div class="d-flex justify-content-end ">
                    <button class="btn btn-success shadow-none border-2 px-5 align-end ">Confirm</button>
                </div>

            </form>
        </div>
    </div>
</div>