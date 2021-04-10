<?php require_once INCLUDES.'header.php'; ?>

<!-------------------------------MAIN------------------------------------>

    <main>
        <section class="not-found">
            <div class="container">
                <div class="row">
                    <?php if($d->active == 0): ?>
                        <div class="col-md-12">
                            <h1><i class="fas fa-check-circle"></i></h1>
                            <h2>Cuenta Verificada!</h2> <br>
                            <a href="back" class="back">Ir a Mi Cuenta</a>
                        </div>
                    <?php else: ?>
                        <div class="col-md-12">
                            <h1><i class="fas fa-times-circle"></i></h1>
                            <h2>Error de Activación!</h2>
                            <h3>¡Tu cuenta ya fue Activada o la URL es Incorrecta.</h3><br>
                            <a href="back" class="back">Ir a Mi Cuenta</a>
                        </div>
                    <?php endif; ?>
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