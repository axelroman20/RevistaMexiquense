<nav class="menu">
    <ul>
        <?php if(CONTROLLER == 'home'): ?>
            <li><a class="active" href="home">Inicio</a></li>
        <?php else: ?>
            <li><a href="home">Inicio</a></li>
        <?php endif; ?>

        <?php if(CONTROLLER == 'publications'): ?>
            <li><a class="active" href="publications">Publicaciones</a></li>
        <?php else: ?>
            <li><a href="publications">Publicaciones</a></li>
        <?php endif; ?>

        <?php if(isset($_SESSION['user'])): ?>
            <?php if(CONTROLLER == 'myarticle'): ?>
                <li><a class="active" href="myarticle">Mis Articulos</a></li>
            <?php else: ?>
                <li><a href="myarticle">Mis Articulos</a></li>
            <?php endif; ?>

            <?php if(CONTROLLER == 'account'): ?>
                <li><a class="active" href="account">Mi Cuenta</a></li>
            <?php else: ?>
                <li><a href="account">Mi Cuenta</a></li>
            <?php endif; ?>
            <li><a href="close">Cerrar Sesion</a></li>
        <?php else: ?>
            <li><a href="#" id="login-btn-open-popup">Ingresar</a></li>
        <?php endif; ?>
    </ul>
</nav>