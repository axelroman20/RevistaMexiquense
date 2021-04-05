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
            <li><a href="myarticle">Mis Articulos</a></li>
            <li><a href="file-upload">Subir Arituclo</a></li>
            <li><a href="setting">Configuración</a></li>
            <li><a href="<?php session_destroy(); ?>">Cerrar Sesion</a></li>
        <?php else: ?>
            <li><a href="#" id="login-btn-open-popup">Ingresar</a></li>
        <?php endif; ?>
    </ul>
</nav>