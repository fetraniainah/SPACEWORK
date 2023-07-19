<div class="container-fluid">
    <div class="row mx-auto">
        <div class="col-md-6 py-3 mx-auto">
            <h3 class="text-center py-2">Add new employee</h3>
            <form action="/store" method="post">
                <div class="form-group">
                    <label for="matricule" class="text-label text-primary">Matricule ID</label>
                    <input type="text" name="matriculId" class="form form-control shadow-none border-dark"
                        id="matricule">
                    <small class="p-0 m-0 text-danger"><?= form_error('matriculId');?></small>
                </div>
                <div class="form-group">
                    <label for="firstname" class="text-label text-primary">Firstname</label>
                    <input type="text" name="firstname" class="form form-control shadow-none border-dark"
                        id="firstname">
                    <small class="p-0 m-0 text-danger"><?= form_error('firstname');?></small>
                </div>

                <div class="form-group">
                    <label for="lastname" class="text-label text-primary">Lastname</label>
                    <input type="text" name="lastname" class="form form-control shadow-none border-dark" id="lastname">
                    <small class="p-0 m-0 text-danger"><?= form_error('lastname');?></small>
                </div>

                <div class="form-group">
                    <label for="email" class="text-label text-primary">Email</label>
                    <input type="text" name="email" class="form form-control shadow-none border-dark" id="email">
                    <small class="p-0 m-0 text-danger"><?= form_error('email');?></small>
                </div>

                <div class="form-group">
                    <label for="stack" class="text-label text-primary">Job Title</label>
                    <input type="text" name="stack" class="form form-control shadow-none border-dark" id="stack">
                    <small class="p-0 m-0 text-danger"><?= form_error('stack');?></small>
                </div>

                <div class="d-flex justify-content-end ">
                    <button class="btn btn-success shadow-none border-2 px-5 align-end ">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>