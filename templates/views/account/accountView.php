<?php require_once INCLUDES.'header.php'; ?>
<!-------------------------------MAIN------------------------------------>
<main>
    <section class="account">
        <div class="container">
        <?php if($d->active == 0): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Cuenta no verificada!</h5>
                            <p class="card-text">Presiona el boton para reenviar el correo de verificacion de cuenta.</p>
                            <a href="<?php echo 'account/resend?email='.$d->email.'&name='.$d->name.'&lastname='.$d->lastname.'&user='.$d->user.'&token='.$d->token; ?>" class="btn btn-secondary">Enviar Correo</a>
                            
                        </div>
                    </div>
                </div>
            </div> <br><br>
        <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <h3>Configuración de cuenta</h3>
                    <hr>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-12">
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                        <i class="fas fa-user-circle"></i>
                        </span>
                        <input disabled type="text" aria-label="First name" class="form-control" value="<?php echo $d->name; ?>">
                        <input disabled type="text" aria-label="Last name" class="form-control" value="<?php echo $d->lastname; ?>">
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#name" id="button-addon2">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user"></i>
                        </span>
                        <input disabled type="text" class="form-control" value="<?php echo $d->user; ?>" aria-label="Username" aria-describedby="basic-addon1">
                        <button disabled type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#user" id="button-addon2">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-key"></i>
                        </span>
                        <input disabled type="password" class="form-control" value="<?php echo $d->pass_noencrypt; ?>" aria-label="Password" aria-describedby="basic-addon1">
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#pass" id="button-addon2">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-at"></i>
                        </span>
                        <input disabled type="email" class="form-control" value="<?php echo $d->email; ?>" aria-label="Email" aria-describedby="basic-addon1">
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#email" id="button-addon2">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-university"></i>
                        </span>
                        <input disabled type="text" class="form-control" value="<?php echo $d->carrer; ?>" aria-label="Carrer" aria-describedby="basic-addon1">
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#carrer" id="button-addon2">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'setting.php'; ?>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>