<?php include_once APPROOT . '/views/inc/header.php';?>


<div class="row">
    <div class="col-md-6 mx-auto mt-4">
        <div class="card card-body  p-3">
        <h2 class="text-center">Inscription</h2>
        <span class="mb-2 text-center">Veuillez remplir le formulaire pour vous inscrire</span>
            <form action="<?php  echo URLROOT ;?>users/register" method="POST"> 
            <!-- name -->
                <div class="form-group">
                    <span for="name">Nom <sup>*</sup></span>
                    <input type="text" name="userName" value="<?php echo $data['name'] ?>" class="form-control form-control-lg <?php echo(!empty($data['name_err']) ? 'is-invalid' : '') ?>">
                    <span class="invalid-feedback"><?php echo $data["name_err"] ?></span>
                </div>
            <!-- email -->
                <div class="form-group">
                    <span for="email">Email <sup>*</sup></span>
                    <input type="email" name="userEmail" value="<?php echo $data['email'] ?>" class="form-control form-control-lg <?php echo(!empty($data['email_err']) ? 'is-invalid' : '') ?>" >
                    <span class="invalid-feedback"><?php echo $data["email_err"] ?></span>
                </div>
            <!-- password -->
                <div class="form-group">
                    <span for="password">Mot de passe <sup>*</sup></span>
                    <input type="password" name="userPassword" value="<?php echo $data['password'] ?>" class="form-control form-control-lg <?php echo(!empty($data['password_err']) ? 'is-invalid' : '') ?>" >
                    <span class="invalid-feedback"><?php echo $data["password_err"] ?></span>
                </div>

            <!-- confirmation du password -->
                 <div class="form-group">
                    <span for="confirmpassword">Confirmer le mot de passe <sup>*</sup></span>
                    <input type="password" name="userConfirmPassword" value="<?php echo $data['confirm-password'] ?>" class="form-control form-control-lg <?php echo(!empty($data['confirm-password_err']) ? 'is-invalid' : '') ?>" >
                    <span class="invalid-feedback"><?php echo $data["confirm-password_err"] ?></span>
                </div>
                <div class="text-center">
                    <input type="submit" value="Validé" class="btn btn-xl btn-success">
                    <a href="<?php echo URLROOT; ?>users/login" class="btn btn-secondary"> Connectez-vous</a>
                </div>
            </form>
        </div>
    </div>
</div>
