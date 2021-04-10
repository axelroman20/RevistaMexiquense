<?php require_once INCLUDES.'header.php'; ?>
<!-------------------------------MAIN------------------------------------>
<main>
    <section class="myarticle">
        <div class="container">
            <?php if($d->active == 0): ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Cuenta no verificada!</h5>
                                <p class="card-text">
                                    Para poder subir articulos en necesario que verifiques tu cuenta. <br>
                                    Presiona el boton para reenviar el correo de verificación de cuenta.
                                </p>
                                <a onclick="" href="<?php echo 'account/resend?email='.$d->email.'&name='.$d->name.'&lastname='.$d->lastname.'&user='.$d->user.'&token='.$d->token; ?>"
                                class="btn btn-secondary">Enviar Correo</a>
                                <script>
                                    function toast() {
                                        toastr.success('Revisa tu bandeja de entrada para verificar tu cuenta', 'Correo Enviado!');
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div> <br><br>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <h3>Panel de Control</h3>
                            </li>
                            <li class="nav-item">
                                <h3>‎      ‏‏‎‎      ‏‏‎‎      ‏‏‎‎   </h3>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-success">Nuevo</button>
                            </li>
                            <li class="nav-item">
                                <h3>‎      ‏‏‎‎  </h3>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-warning">Editar</button>
                            </li>
                            <li class="nav-item">
                                <h3>‎      ‏‏‎‎  </h3>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-danger">Eliminar</button>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>