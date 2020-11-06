<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>
<main>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?= view('Views\flash_message') ?>
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form method="POST" action="<?= route_to('register'); ?>" accept-charset="UTF-8"  onsubmit="registerButton.disabled = true; return true;"
                              oninput='password2.setCustomValidity(password2.value != password.value ? "Passwords do not match." : "")'>
                                <?= csrf_field() ?>
                            <div class="form-group row">
                                <label for="full_name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="full_name" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type=email id="email_address" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Confirm Password </label>
                                <div class="col-md-6">
                                    <input type="password" id="password2" class="form-control" name="password_confirm" required>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
