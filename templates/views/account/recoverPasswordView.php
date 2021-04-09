<?php require_once INCLUDES.'header.php'; ?>

<!-------------------------------MAIN------------------------------------>

<main>
    <section class="account">
        <div class="container" style="margin-bottom: 280px;">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <h3>Recuperación de contraseña</h3>
                    <hr>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <form method="post" id="form-recover">
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-at"></i>
                                </span>
                                <input 
                                    type="email" 
                                    class="form-control" 
                                    value="<?php echo isset($d->email) ? $d->email : ''; ?>" 
                                    aria-label="Email" 
                                    aria-describedby="basic-addon1"
                                    name="email">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-6 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-secondary" name="submitRecover" form="form-recover">
                        <i class="fas fa-paper-plane"></i> Enviar Correo de Recuperación
                    </button>
                </div>
            </div>
        </div>
    </section>
</main>

<!------------------------------------------------------------------->
<?php if(!isset($_SESSION['user'])): ?>
    <?php require_once INCLUDES.'login.php'; ?>
    <?php require_once INCLUDES.'register.php'; ?>
<?php endif; ?>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>