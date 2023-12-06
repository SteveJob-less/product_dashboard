
<style>
    * {
        /* outline: 1px solid black; */
    }
</style>
    <main>
        <h2 class="col-md-10 mx-auto mt-2"><?= $title ?></h2>
        <div class="d-flex justify-content-around flex-row w-75 table py-0 px-5 mx-auto text-center">
            <form class="d-flex rounded flex-column col-md-5 py-3 mt-3 position-relative border border-2 border-dark justify-content-center" action="<?= base_url('users/edit_profile') ?>" method="POST">
                <h3 style="margin-top: -20px" class="position-absolute bg-white w-75 top-0 align-self-center">Edit Information</h3>
                <label class="mx-auto mb-3 col-md-9 position-relative" for="email">
                    <p class="py-0 mb-0 fw-bolder text-start">Email</p>
                    <input class="w-100 py-1 px-2 border border-dark rounded" type="text" name="email" id="email" value="<?= $user['email'] ?>">
                    <p style="margin-top: 59px; font-size: 13px;" class="error py-0 px-2 top-0 position-absolute text-danger"><?= $error['email'] ?? '' ?></p>
                </label>
                <label class="mx-auto mb-3 col-md-9 position-relative" for="firstname">
                    <p class="py-0 mb-0 fw-bolder text-start">Firstname</p>
                    <input class="w-100 py-1 px-2 border border-dark rounded" type="text" name="firstname" id="firstname" value="<?= ucfirst($user['firstname']) ?>">
                    <p style="margin-top: 59px; font-size: 13px;" class="error py-0 px-2 top-0 position-absolute text-danger"><?= $error['firstname'] ?? '' ?></p>
                </label>
                <label class="mx-auto mb-3 col-md-9 position-relative" for="lastname">
                    <p class="py-0 mb-0 fw-bolder text-start">Lastname</p>
                    <input class="w-100 py-1 px-2 border border-dark rounded" type="text" name="lastname" id="lastname" value="<?= ucfirst($user['lastname']) ?>">
                    <p style="margin-top: 59px; font-size: 13px;" class="error py-0 px-2 top-0 position-absolute text-danger"><?= $error['lastname'] ?? '' ?></p>
                </label>
                <div class="w-100 text-end px-5">
                    <input class="py-1 px-3 rounded bg-primary text-white border border-dark" type="submit" value="Save">
                </div>
            </form>
            <form class="d-flex rounded flex-column col-md-5 py-3 mt-3 position-relative border border-2 border-dark justify-content-center" action="<?= base_url('users/change_password') ?>" method="POST">
                <h3 style="margin-top: -20px" class="position-absolute bg-white w-75 top-0 align-self-center">Change Password</h3>
                <label class="mx-auto mb-3 col-md-9 position-relative" for="old_password">
                    <p class="py-0 mb-0 fw-bolder text-start">Old Password</p>
                    <input class="w-100 py-1 px-2 border border-dark rounded" type="password" name="old_password" id="old_password" value="<?= $input['old_password'] ?? '' ?>">
                    <p style="margin-top: 59px; font-size: 13px;" class="error py-0 px-2 top-0 position-absolute text-danger"><?= $error['old_password'] ?? '' ?></p>
                </label>
                <label class="mx-auto mb-3 col-md-9 position-relative" for="new_password">
                    <p class="py-0 mb-0 fw-bolder text-start">New Password</p>
                    <input class="w-100 py-1 px-2 border border-dark rounded" type="password" name="new_password" id="new_password" value="<?= $input['new_password'] ?? '' ?>">
                    <p style="margin-top: 59px; font-size: 13px;" class="error py-0 px-2 top-0 position-absolute text-danger"><?= $error['new_password'] ?? '' ?></p>
                </label>
                <label class="mx-auto mb-3 col-md-9 position-relative" for="confirm_password">
                    <p class="py-0 mb-0 fw-bolder text-start">Confirm Password</p>
                    <input class="w-100 py-1 px-2 border border-dark rounded" type="password" name="confirm_password" id="confirm_password" value="<?= $input['confirm_password'] ??'' ?>">
                    <p style="margin-top: 59px; font-size: 13px;" class="error py-0 px-2 top-0 position-absolute text-danger"><?= $error['confirm_password'] ?? '' ?></p>
                </label>
                <div class="w-100 text-end px-5">
                    <input class="py-1 px-3 rounded bg-primary text-white border border-dark" type="submit" value="Change">
                </div>
            </form>
        </div>
    </main>