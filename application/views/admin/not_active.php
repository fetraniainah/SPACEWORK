<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listes of employee not active</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Lastname</th>
                            <th>Firstname</th>
                            <th>Job Title</th>
                            <th>Employment Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['matriculId']; ?></td>
                            <td><?= $user['firstname']; ?></td>
                            <td><?= $user['lastname']; ?></td>
                            <td><?= $user['stack']; ?></td>
                            <td><?= date('d-M-Y', strtotime($user['timestamp'])); ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-info btn-sm px-4"
                                        href="restore/<?php echo $user['matriculId']; ?>">Restore</a>
                                </div>

                            </td>


                            <!-- Ajoutez d'autres colonnes pour afficher d'autres informations si nécessaire -->
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->