<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Active user</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $active_users[0]['count'];?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                User not active</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $not_active[0]['count'];?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Admin
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?= $count_admin[0]['count'];?></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Users connected</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="userCount"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<section class="w-100">
    <div class="row mx-auto">
        <div class="col-lg-10 mx-auto bg-light">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white ">User connected</h6>
                </div>
                <div class="card-body" id="userConnected">
                    <h2>Chargement .....</h2>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
const uri = "<?= base_url('user/users_connected');?>";

async function getuser() {
    try {
        const response = await fetch(uri);
        const data = await response.json();
        const userConnectedDiv = document.getElementById("userConnected");
        const userCountConnected = document.getElementById("userCount");
        userCountConnected.innerHTML = data.length;

        // Videz la div avant d'ajouter les données
        userConnectedDiv.innerHTML = '';

        // Parcourez les données et ajoutez-les à la div
        data.forEach(user => {
            const userHtml = `
            <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" style="width:50" src="<?= base_url('assets/img/undraw_profile_1.svg');?>"
                alt="...">
                                        <div class="status-indicator bg-success p-1 rounded-circle"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate large">${user.lastname} ${user.firstname}</div>
                                        <div class="small text-gray-800">Job title : ${user.stack}</div>
                                    </div>
                                </a>`;
            userConnectedDiv.insertAdjacentHTML('beforeend', userHtml);
        });
    } catch (error) {
        console.error("Erreur lors de la récupération des utilisateurs connectés :", error);
    }
}

setInterval(() => {
    getuser()
}, 2000)
</script>