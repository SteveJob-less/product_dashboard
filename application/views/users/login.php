
    <form style="font-size: 16px" class="mt-5 position-relative mx-auto pt-5 pb-4 col-md-3 d-flex flex-column align-items-center border border-2 border-dark rounded" action="<?= base_url('users/process_login') ?>" method="POST">
        <h1 style="margin-top: -34px; border-left: 2px solid black; border-right: 2px solid black;" class="bg-white fw-bold position-absolute top-0 pt-1 pb-2 px-3 mx-3">Login</h1>
        <label class="mb-3 col-md-9 position-relative" for="log_email">
            <p class="mb-0 fw-bolder">Email</p>
            <input class="w-100 py-1 px-2 border border-dark rounded" type="text" name="log_email" id="log_email" value="<?= $input['log_email'] ?? '' ?>">
            <p style="margin-top: 54px" class="error px-1 position-absolute top-0 text-danger"><?= $error['log_email'] ?? '' ?></p>
        </label>
        <label class="mb-3 col-md-9 position-relative" for="log_password">
            <p class="mb-0 fw-bolder">Password</p>
            <input class="w-100 py-1 px-2 border border-dark rounded" type="password" name="log_password" id="log_password" value="<?= $input['log_password'] ?? '' ?>">
            <p style="margin-top: 54px" class="error px-1 position-absolute top-0 text-danger"><?= $error['log_password'] ?? '' ?></p>
        </label>
        <p class="mb-2 mt-0 text-center text-muted" style="font-size: 15px; font-style: italic;">Create an account? <a href="<?= base_url('users/signup') ?>" class="fw-bold text-body"><u>Signup here</u></a></p>
        <button class="bg-success text-white col-md-3 rounded border-dark" type="submit">Login</button>
    </form>
