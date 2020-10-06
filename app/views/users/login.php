<?php include_once APPROOT . '/views/inc/header.php';?>

<div class="container">
<div class="row">
    <div class="col-md-6 mx-auto mt-4">
        <div class="card card-body p-3">
            <h2 class="text-center">Connexion</h2>
            <span class="mb-2 text-center">Accédez à votre gallerie avec un seul compte.</span>
            <form action="<?php echo URLROOT; ?>users/login" method="post">
                <!-- email   -->
                <div class="form-group">
                    <span for="email">Email <sup>*</sup></span>
                    <input type="email" name="userEmail" value="<?php echo $data['email'] ?>" class="form-control form-control-lg <?php echo (!empty($data['email_err']) ? 'is-invalid' : '') ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
                </div>
                <!-- passowrd   -->
                <div class="form-group">
                    <span for="password">Password <sup>*</sup></span>
                    <input type="password" name="userPassword" value="<?php echo $data['password'] ?>" class="form-control form-control-lg <?php echo (!empty($data['password_err']) ? 'is-invalid' : '') ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
                </div>
                <div class="text-center">
                    <input type="submit" value="Register" class="btn btn-success">
                    <a href="<?php echo URLROOT; ?>users/register" class="btn btn-secondary">Inscription</a>
                </div>

            </form>
        </div>
    </div>
</div>
</div>