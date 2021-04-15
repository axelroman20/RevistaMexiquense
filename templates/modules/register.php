<div class="register-overlay" id="register-overlay">
    <div class="register-popup" id="register-popup">
        <div class="register-box">
            <a href="#" id="register-btn-close-popup" class="register-btn-close-popup"><i class="fa fa-times" aria-hidden="true"></i></a>
            <img src="<?php echo IMAGES.'icono.png';?>" class="register-avatar" alt="Avatar Image">
            <h1>Registro de usuario</h1>
            <form method="post">
                <!-- Nombre -->
                <label class="labelname_register" for="name">Nombre</label>
                <input class="inputname_register" type="text" name="name" placeholder="Ingresar Nombre" maxlength="50">
                <!-- APELLIDO -->
                <label class="labellastname_register" for="lastname">Apellido</label>
                <input class="inputlastname_register" type="text" name="lastname" placeholder="Ingresar Apellido" maxlength="50">
                <!-- CORREO -->
                <label class="labelemail_register" for="email">Correo Electronico</label>
                <input class="inputemail_register" type="email" name="email" placeholder="Ingresar Correo Electronico">
                <!-- USUARIO -->
                <label class="labeluser_register" for="user">Usuario</label>
                <input class="inputuser_register"  type="text" name="user" placeholder="Ingresar Usuario" minlength="10" maxlength="50">
                <!-- contraseña -->
                <label class="labelpass_register" for="password">Contraseña</label>
                <input class="inputpass_register" type="password" name="pass" placeholder="Ingresar Contraseña" minlength="10" maxlength="50">
                <label class="labelcarrer_register" for="carrer">Carrera</label>
                <select class="inputcarrer_register" name="carrer" id="carrer">
                    <option selected>Selecciona Carrera</option>
                    <option>Ingeniería En Sistemas</option>
                    <option>Ingeniería Industrial</option>
                    <option>Psicología</option>
                    <option>Derecho</option>
                </select">
                <input type="submit" name="submitRegister" value="Registrarse">
                <a id="login-btn-open-popup2">¿Ya tienes una cuenta?</a>
                <?php if (!empty($d->errorRegister)) : ?>
                    <div class="register-error"><?php echo "$d->errorRegister"; ?></div>
                    <script type="text/javascript" charset="utf-8">
                        document.querySelector('#register-overlay').classList.add('active');
                        document.querySelector('#register-popup').classList.add('active');
                    </script>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
