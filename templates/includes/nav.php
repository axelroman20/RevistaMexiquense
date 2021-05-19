<nav class="menu navbar navbar-expand-lg navbar-dark" id="menu">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" onclick="nav()" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
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
                <?php if($_SESSION['rol'] == 1): ?>
                    <li class="nav-item">
                        <?php if(CONTROLLER == 'myarticle'): ?>
                            <a class="nav-link active" href="myarticle">Mis Articulos</a>
                        <?php else: ?>
                            <a class="nav-link" href="myarticle">Mis Articulos</a>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
                <?php if(($_SESSION['rol'] == 3) || ($_SESSION['rol'] == 2)): ?>
                    <li class="nav-item">
                        <?php if(CONTROLLER == 'cpanel'): ?>
                            <a class="nav-link active" href="cpanel">Panel de Control</a>
                        <?php else: ?>
                            <a class="nav-link" href="cpanel">Panel de Control</a>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
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
                    <?php elseif(METHOD == 'new'): ?>
                    <?php elseif(METHOD == 'edit'): ?>
                    <?php else: ?>
                        <a class="nav-link" href="<?php echo CONTROLLER.'/close'; ?>">Cerrar Sesion</a>
                    <?php endif; ?>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="login-btn-open-popup">Ingresar</a>
                </li>
            <?php endif; ?>
        </ul>
        
        
    </div>
        <form method="post" class="search-box ">
            <input class="search-txt" type="text" name="search" placeholder="Busqueda">
            <button class="search-btn" type="submit" id="search" name="submitSearch">
                <box-icon name='search-alt'></box-icon>
                <i class="fas fa-search"></i>
            </button>
        </form>
  </div>
</nav>
<script>
    var toggle = false;
    function nav() {
        console.log(toggle);
        if(!toggle) {
            $('#menu').addClass('bg-dark');
            toggle = true;
        } else {
            $('#menu').removeClass('bg-dark');
            toggle = false;
        }
    }
</script>
