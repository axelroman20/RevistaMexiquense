<?php require_once INCLUDES.'header.php'; ?>

<!-------------------------------MAIN------------------------------------>
<main>
    <section class="account">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <h3>Restablecer de contraseña</h3>
                    <hr>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <form method="post" id="form-newpassword" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-key"></i>  
                                </span>
                                <input required
                                    type="text" 
                                    class="form-control" 
                                    value="<?php echo isset($d->email) ? $d->email : ''; ?>" 
                                    aria-label="Email" 
                                    aria-describedby="basic-addon1"
                                    placeholder="Nueva Contraseña"
                                    name="restore-pass">
                                <div class="invalid-feedback"> Ingresa una Nueva Contraseña </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-key"></i>
                                </span>
                                <input required
                                    type="text" 
                                    class="form-control" 
                                    value="<?php echo isset($d->email) ? $d->email : ''; ?>" 
                                    aria-label="Email" 
                                    aria-describedby="basic-addon1"
                                    placeholder="Repetir Nueva Contraseña"
                                    name="restore-repitpass">
                                <div class="invalid-feedback"> Repite la Nueva Contraseña </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-6 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-secondary" name="submitRestore" form="form-newpassword">
                        <i class="fas fa-paper-plane"></i> Guardar Cambios
                    </button>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
</script>

<!------------------------------------------------------------------->
<?php if(!isset($_SESSION['user'])): ?>
    <?php require_once INCLUDES.'login.php'; ?>
    <?php require_once INCLUDES.'register.php'; ?>
<?php endif; ?>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>