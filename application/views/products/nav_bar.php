
    <nav class="fs-5 d-flex mx-auto py-3 border-bottom border-dark col-md-10 text-center">
        <a class="logo col-md-3 text-decoration-none text-black" href="<?= base_url('products/dashboard') ?>"><h1 class="fw-bolder">Shupee</h1></a>
        <a class="align-self-center px-4 px-2 text-decoration-none text-black <?= $title === 'Dashboard'? 'fw-bold' : '' ?>" href="<?= base_url('products/dashboard') ?>">Dashboard</a>
        <a class="align-self-center px-4 px-2 text-decoration-none text-black <?= $title === 'Profile'? 'fw-bold' : '' ?>" href="<?= base_url('users/profile') ?>">Profile</a>
        <div class="col-md-6 align-self-center text-end">
            <a class="col-md-4 align-self-center text-dark text-end px-5" type="button" href="<?= base_url('users/logout') ?>">Logout</a>
        </div>
    </nav>