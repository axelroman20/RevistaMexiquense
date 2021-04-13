<?php require_once INCLUDES.'header.php'; ?>

<!-------------------------------MAIN------------------------------------>

<main>
    <section class="account">
        <div class="container " style="margin-bottom: 280px;">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <h3>Recuperación de contraseña</h3>
                    <hr>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <form method="post" id="form-email" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-at"></i>
                                </span>
                                <input required 
                                    type="email" 
                                    class="form-control" 
                                    value="<?php echo isset($d->email) ? $d->email : ''; ?>" 
                                    name="email"
                                    placeholder="Correo Electronico">
                                <div class="invalid-feedback"> Ingresa un Correo Electronico </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-6 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-secondary" name="submitRecover" form="form-email">
                        <i class="fas fa-paper-plane"></i> Enviar Correo de Recuperación
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
    <?php require_once MODULES.'login.php'; ?>
    <?php require_once MODULES.'register.php'; ?>
<?php endif; ?>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>