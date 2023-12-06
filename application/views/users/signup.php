
    <div class="text-white position-absolute w-100 h-100 d-flex top-0 bg-none text-center mx-auto">
        <p id="x" class="col-md-4 m-auto p-3 fs-5 rounded border border-dark bg-success"  style="z-index: 1;">Successfully Signed Up</p>
    </div>
    <form style="font-size: 16px" class="mt-4 position-relative mx-auto pt-5 pb-4 col-md-3 d-flex flex-column align-items-center border border-2 border-dark rounded" action="<?= base_url('users/process_signup') ?>" method="POST">
        <h1 style="margin-top: -34px; border-left: 2px solid black; border-right: 2px solid black;" class="bg-white fw-bold position-absolute top-0 pt-1 pb-2 px-3 mx-3">Signup</h1>
        <label class="mb-3 col-md-9 position-relative" for="firstname">
            <p class="mb-0 fw-bolder">Firstname</p>
            <input class="w-100 py-1 px-2 border <?= empty($error['firstname']) ? 'border-dark': 'border-danger'; ?> rounded" type="text" name="firstname" id="firstname" value="<?= $input['firstname'] ?? '' ?>">
            <p style="margin-top: 54px" class="error px-1 position-absolute top-0 text-danger"><?= $error['firstname'] ?? '' ?></p>
         </label>
        <label class="mb-3 col-md-9 position-relative" for="lastname">
            <p class="mb-0 fw-bolder">Lastname</p>
            <input class="w-100 py-1 px-2 border <?= empty($error['lastname']) ? 'border-dark': 'border-danger'; ?> rounded" type="text" name="lastname" id="lastname" value="<?= $input['lastname'] ?? '' ?>">
            <p style="margin-top: 54px" class="error px-1 position-absolute top-0 text-danger"><?= $error['lastname'] ?? '' ?></p>
        </label>
        <label class="mb-3 col-md-9 position-relative" for="email">
            <p class="mb-0 fw-bolder">Email</p>
            <input class="w-100 py-1 px-2 border <?= empty($error['email']) ? 'border-dark': 'border-danger'; ?> rounded" type="text" name="email" id="email" value="<?= $input['email'] ?? '@email.com' ?>">
            <p style="margin-top: 54px" class="error px-1 position-absolute top-0 text-danger"><?= $error['email'] ?? '' ?></p>
        </label>
        <label class="mb-3 col-md-9 position-relative" for="password">
            <p class="mb-0 fw-bolder">Password</p>
            <input class="w-100 py-1 px-2 border <?= empty($error['password']) ? 'border-dark': 'border-danger'; ?> rounded" type="password" name="password" id="password" value="<?= $input['password'] ?? '' ?>">
            <p style="margin-top: 54px" class="error px-1 position-absolute top-0 text-danger"><?= $error['password'] ?? '' ?></p>
        </label>
        <label class="mb-3 col-md-9 position-relative" for="password2">
            <p class="mb-0 fw-bolder">Repeat password</p>
            <input class="w-100 py-1 px-2 border <?= empty($error['password2']) ? 'border-dark': 'border-danger'; ?> rounded" type="password" name="password2" id="password2" value="<?= $input['password2'] ?? '' ?>">
            <p style="margin-top: 54px" class="error px-1 position-absolute top-0 text-danger"><?= $error['password2'] ?? '' ?></p>
        </label>
        <p class="mb-2 mt-0 text-center text-muted" style="font-size: 15px; font-style: italic;">Already have an account? <a href="<?= base_url('users/login') ?>" class="fw-bold text-body"><u>Login here</u></a></p>
        <button class="bg-success text-white col-md-3 rounded border-dark" type="submit">Signup</button>
    </form>
