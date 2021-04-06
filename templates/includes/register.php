<div class="register-overlay" id="register-overlay">
    <div class="register-popup" id="register-popup">
        <div class="register-box">
            <a href="#" id="register-btn-close-popup" class="register-btn-close-popup"><i class="fa fa-times" aria-hidden="true"></i></a>
            <img src="<?php echo IMAGES.'icono.png';?>" class="register-avatar" alt="Avatar Image">
            <h1>Registro de usuario</h1>
            <form action="<?php echo CONTROLLER; ?>" method="post">
                <!-- Nombre -->
                <label for="name">Nombre</label>
                <input type="text" name="name" placeholder="Ingresar Nombre">
                <!-- APELLIDO -->
                <label for="lastname">Apellido</label>
                <input type="text" name="lastname" placeholder="Ingresar Apellido">
                <!-- CORREO -->
                <label for="email">Correo Electronico</label>
                <input type="email" name="email" placeholder="Ingresar Correo Electronico">
                <!-- USUARIO -->
                <label for="user">Usuario</label>
                <input type="text" name="user" placeholder="Ingresar Usuario">
                <!-- contraseña -->
                <label for="password">Contraseña</label>
                <input type="password" name="pass" placeholder="Ingresar Contraseña">
                <label for="carrer">Carrera</label>
                <select name="carrer" id="carrer">
                    <option selected>Selecciona Carrera</option>
                    <option>Ingeniería En Sistemas</option>
                    <option>Ingeniería Industrial</option>
                    <option>Psicología</option>
                    <option>Derecho</option>
                </select">
                <input type="submit" name="submitRegister" value="Registrarse">
                <a id="login-btn-open-popup">¿Ya tienes una cuenta?</a>
                <?php if (!empty($errorRegister)) : ?>
                    <div class="register-error"><?php echo "$errorRegister"; ?></div>
                    <script type="text/javascript" charset="utf-8">
                        document.querySelector('#register-overlay').classList.add('active');
                        document.querySelector('#register-popup').classList.add('active');
                    </script>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
