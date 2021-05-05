<?php require_once INCLUDES.'header.php'; ?>
<!------------------------------------------------------------------->
    <main>
        <section class="contact" id="contact">
            <div class="container containerr">
                <div class="row justify-content-md-center">
                    <div class="col-md-8 col-xl-6">
                        <h3>Formulario de Contacto</h3>
                    </div> 
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-8 col-xl-6">
                        <hr>
                    </div>
                </div>
                <div class="row justify-content-md-center ">
                    <div class="col-md-8 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" id="form-contact" class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Correo Electornico</label>
                                        <input required type="email" class="form-control" id="emailcontact" name="email" aria-describedby="emailHelp" maxlength="50">
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Nombre:</label>
                                        <input required type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" maxlength="50">
                                    </div>
                                    <div class="mb-3">
                                        <label for="subject" class="form-label">Asunto:</label>
                                        <input required type="text" class="form-control" id="subject" name="subject" aria-describedby="emailHelp" maxlength="50">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="col-form-label">Mensaje:</label>
                                        <textarea required class="form-control" id="message" name="message" maxlength="250"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="submitContact" class="btn btn-success" form="form-contact">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
    </main>

<script>
    (function () {
    'use strict'
        var forms = document.querySelectorAll('.needs-validation')
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