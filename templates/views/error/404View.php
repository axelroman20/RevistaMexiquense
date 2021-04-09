<?php require_once INCLUDES.'header.php'; ?>
<!------------------------------------------------------------------->
    <main>
        <section class="not-found">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>404</h1>
                        <h2>No encontrado.</h2>
                        <h3>¡UPS! La página que busca no existe. Puede que se haya movido o eliminado.</h3><br>
                        <a href="error/back" class="back">Regresar</a>
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