<?php require_once INCLUDES.'header.php'; ?>
<!-------------------------------MAIN------------------------------------>
<main>
    <section class="account">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Recuperación de contraseña</h3>
                    <hr>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-12">
                    <form method="post" id="form-email">
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-at"></i>
                                </span>
                                <input type="email" class="form-control" value="<?php echo $d->email; ?>" aria-label="Email" aria-describedby="basic-addon1">
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-outline-secondary" name="submitUpdateEmail" form="form-email">
                        <i class="fas fa-paper-plane"></i> Enviar Correo de Recuperación
                    </button>
                </div>
            </div>
        </div>
    </section>
</main>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'setting.php'; ?>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>