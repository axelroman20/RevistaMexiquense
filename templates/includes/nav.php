<nav class="menu navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav" >
        <li class="nav-item">
            <?php if(CONTROLLER == 'home' || CONTROLLER == 'error'): ?>
                <a class="nav-link active" href="home">Inicio</a>
            <?php else: ?>
                <a class="nav-link" href="home">Inicio</a>
            <?php endif; ?>
        </li>
        <li class="nav-item">
            <?php if(CONTROLLER == 'publications'): ?>
                <a class="nav-link active" href="publications">Publicaciones</a>
            <?php else: ?>
                <a class="nav-link" href="publications">Publicaciones</a>
            <?php endif; ?>
        </li>
        
        <?php if(isset($_SESSION['user'])): ?>
            <li class="nav-item">
                <?php if(CONTROLLER == 'myarticle'): ?>
                    <a class="nav-link active" href="myarticle">Mis Articulos</a>
                <?php else: ?>
                    <a class="nav-link" href="myarticle">Mis Articulos</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <?php if(CONTROLLER == 'account'): ?>
                    <a class="nav-link active" href="account">Mi Cuenta</a>
                <?php else: ?>
                    <a class="nav-link" href="account">Mi Cuenta</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <?php if(METHOD == 'recover_password'): ?>
                <?php elseif(METHOD == 'restore_password'): ?>
                <?php else: ?>
                    <a class="nav-link" href="<?php echo CONTROLLER.'/close'; ?>">Cerrar Sesion</a>
                <?php endif; ?>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="#" id="login-btn-open-popup">Ingresar</a>
            </li>
        <?php endif; ?>
        
    </div>
  </div>
</nav>
