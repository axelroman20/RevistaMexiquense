<div class="register-overlay" id="register-overlay">
    <div class="register-popup" id="register-popup">
        <div class="register-box">
            <a href="#" id="register-btn-close-popup" class="register-btn-close-popup"><i class="fa fa-times" aria-hidden="true"></i></a>
            <img src="<?php echo IMAGES.'icono.png';?>" class="register-avatar" alt="Avatar Image">
            <h1>Registro de usuario</h1>
            <form method="post" id="form-register">
                <div id="step1" class="">
                    <h4>Paso 1</h4>
                    <!-- CORREO -->
                    <label class="labelemail_register" for="email">Correo Electronico</label>
                    <input class="inputemail_register" type="email" name="email" id="email" placeholder="Ingresar Correo Electronico">
                    <!-- CONTRASEÑA -->
                    <label class="labelpass_register" for="password">Contraseña</label>
                    <input class="inputpass_register" type="password" name="pass" id="pass" placeholder="Ingresar Contraseña" minlength="5" maxlength="50">
                    <div id="resp"></div>
                    <!-- SIGUIENTE -->
                    <button type="button" onclick="window.step1_next();" name="step1_next" style="width: 100%;">Siguente</button>
                </div>
                
                <div id="step2" class="hidden">
                    <h4>Paso 2</h4>
                    <!-- USUARIO -->
                    <label class="labeluser_register" for="user">Usuario</label>
                    <input class="inputuser_register"  type="text" name="user" id="user" placeholder="Ingresar Usuario" minlength="5" maxlength="50">
                    <!-- NOMBRE -->
                    <label class="labelname_register" for="name">Nombre</label>
                    <input class="inputname_register" type="text" name="name" id="name" placeholder="Ingresar Nombre" maxlength="50">
                    <!-- APELLIDO -->
                    <label class="labellastname_register" for="lastname">Apellido</label>
                    <input class="inputlastname_register" type="text" name="lastname" id="lastname" placeholder="Ingresar Apellido" maxlength="50">
                    <!-- SIGUEINTE -->
                    <button type="button" onclick="window.step2_back();" name="step2_back" style="width: 49%;">Volver</button>
                    <button type="button" onclick="window.step2_next();" name="step2_next" style="width: 49%;">Siguente</button>
                </div>

                <div id="step3" class="hidden">
                    <h4>Paso 3</h4>
                    <!-- TIPO DE USUARIO -->
                    <div id="user-list" class="">
                        <label class="labelrol_register" for="rol">Tipo de Usuario</label>
                        <select class="inputrol_register" name="rol" id="rol" onchange="step3_next()">
                            <option selected disabled value="">Seleccionar</option>
                            <option value="0">Visitante</option>
                            <option value="1">Estudiante</option>
                            <option value="2">Maestro</option>
                        </select>
                    </div>
                    <!-- CARRERA -->
                    <div id="carrer-list" class="hidden">
                        <label class="labelcarrer_register" for="carrer">Carrera</label>
                        <select class="inputcarrer_register" name="carrer" id="carrer">
                            <option selected disabled value="">Selecciona Carrera</option>
                            <option value="1">Ingeniería En Sistemas</option>
                            <option value="2">Ingenieria Industrial</option>
                            <option value="3">Psicologia</option>
                            <option value="4">Derecho</option>
                            <option value="5">Arquitectura</option>
                            <option value="6">Ciencias de la Educación</option>
                            <option value="7">Contaduria</option>
                            <option value="8">Diseño Digital</option>
                            <option value="9">Enfermeria</option>
                            <option value="10">Informática Administrativa</option>
                            <option value="11">Mercadotecnia</option>
                            <option value="12">Negocios Internacionales</option>
                            <option value="13">Pedagogía</option>
                        </select>
                    </div>
                    <!-- CONTRASEÑA -->
                    <div id="typepass" class="hidden">
                        <label class="labeltypepass_register" for="rolpass">Contraseña</label>
                        <input class="inputtypepass_register" type="password" name="rolpass" id="rolpass" placeholder="Contraseña del tipo de usuario" minlength="5" maxlength="50">
                    </div>
                    <!-- ENVIAR -->
                    <button type="button" onclick="window.step3_back();" name="step3_back" style="width: 49%;">Volver</button>
                    <button class="disabled" disabled type="button" onclick="window.submit();" name="step3_submit" id="step3_submit"style="width: 49%;">Registrarse</button>
                    <!--
                    <input  type="submit" onclick="window.step3_submit();" name="submitRegister" value="Registrarse" style="width: 49%;">
                     -->
                </div>

                <a id="login-btn-open-popup2">¿Ya tienes una cuenta?</a>

                <?php if (!empty($d->errorRegister)) : ?>
                    <div class="register-error"><?php echo "$d->errorRegister"; ?></div>
                    <script type="text/javascript" charset="utf-8">
                        document.querySelector('#register-overlay').classList.add('active');
                        document.querySelector('#register-popup').classList.add('active');
                    </script>
                <?php endif; ?>

            </form>
            
            <script>
                var email, pass, user, name, lastname, carrer, typepass, rol;
            //==================== PASO 1 ========================//
                function step1_next() {
                    var error = '';
                    email = $('#email').val();
                    pass = $('#pass').val();
                    if(email == ''){
                        $('.labelemail_register').addClass('errorLabel');
                        $('.inputemail_register').addClass('errorInput');
                        error = 'email';
                    } else {
                        $('.labelemail_register').removeClass('errorLabel');
                        $('.inputemail_register').removeClass('errorInput');
                    }
                    if(pass == '') {
                        $('.labelpass_register').addClass('errorLabel');
                        $('.inputpass_register').addClass('errorInput');
                        error = 'pass';
                    } else {
                        $('.labelpass_register').removeClass('errorLabel');
                        $('.inputpass_register').removeClass('errorInput');
                    }
                    if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
                        toastr.error('Ingresa un correo valido.', 'Formato no permitido!');
                        $('.labelemail_register').addClass('errorLabel');
                        $('.inputemail_register').addClass('errorInput');
                        error = 'email';
                    } else {
                        $('.labelemail_register').removeClass('errorLabel');
                        $('.inputemail_register').removeClass('errorInput');
                    }
                    if(error == '') {
                        $.ajax({
                            type: "POST",
                            url: './app/ajax/register.php',
                            dataType: "json",
                            data:{email:email, pass:pass},
                            success:function (data){
                                console.log(data);
                                if(data.email == 'false') {
                                    toastr.error('Elije otro correo electronico para poder registrarte', 'Correo Elctronico ya en uso!');
                                    $('.labelemail_register').addClass('errorLabel');
                                    $('.inputemail_register').addClass('errorInput');
                                }
                                if(data.pass == 'false') {
                                    toastr.error('Ingrese una contraseña de minimo 4 caracteres', 'Contraseña demaciado corta!');
                                    $('.labelpass_register').addClass('errorLabel');
                                    $('.inputpass_register').addClass('errorInput');
                                }
                                
                                if(data.email != 'false' && data.pass != 'false'){
                                    $('#step1').addClass('hidden');
                                    $('#step2').removeClass('hidden');
                                }
                            },
                            error: function (){}
                        });
                    }

                    
                }
            //==================== PASO 2 ========================//
                function step2_back() {
                    $('#step2').addClass('hidden');
                    $('#step1').removeClass('hidden');
                }
                function step2_next() {
                    var error = '';
                    user = $('#user').val();
                    name = $('#name').val();
                    lastname = $('#lastname').val();
                    if(user == ''){
                        $('.labeluser_register').addClass('errorLabel');
                        $('.inputuser_register').addClass('errorInput');
                        error = 'user';
                    } else {
                        $('.labeluser_register').removeClass('errorLabel');
                        $('.inputuser_register').removeClass('errorInput');
                    }
                    if(name == '') {
                        $('.labelname_register').addClass('errorLabel');
                        $('.inputname_register').addClass('errorInput');
                        error = 'name';
                    } else {
                        $('.labelname_register').removeClass('errorLabel');
                        $('.inputname_register').removeClass('errorInput');
                    }
                    if(lastname == '') {
                        $('.labellastname_register').addClass('errorLabel');
                        $('.inputlastname_register').addClass('errorInput');
                        error = 'lastname';
                    } else {
                        $('.labellastname_register').removeClass('errorLabel');
                        $('.inputlastname_register').removeClass('errorInput');
                    }
                    if(error == '') {
                        $.ajax({
                            type: "POST",
                            url: './app/ajax/register.php',
                            dataType: "json",
                            data:{user:user, name:name, lastname:lastname},
                            success:function (data){
                                console.log(data);
                                if(data.user == 'leght') {
                                    toastr.error('Ingresa un usuario de minimo 5 caracteres', 'Usuario muy corto!');
                                    $('.labeluser_register').addClass('errorLabel');
                                    $('.inputuser_register').addClass('errorInput');
                                } else if(data.user == 'false') {
                                    toastr.error('Elije otro nombre de usuario para poder registrarte', 'Usuario ya en uso!');
                                    $('.labeluser_register').addClass('errorLabel');
                                    $('.inputuser_register').addClass('errorInput');
                                } else {
                                    $('#step2').addClass('hidden');
                                    $('#step3').removeClass('hidden');
                                }

                            },
                            error: function (){}
                        });
                    }
                }
            //==================== PASO 3 ========================//
                function step3_back() {
                    $('#step3').addClass('hidden');
                    $('#step2').removeClass('hidden');
                }
                function step3_next() {
                    rol = $('#rol').val();
                    if(rol != null) {
                        $('#step3_submit').removeClass('disabled');
                        $('#step3_submit').removeAttr('disabled');
                        if(rol == 1) {
                            $('#carrer-list').removeClass('hidden');
                        } else {
                            $('#carrer-list').addClass('hidden');
                        }
                        if(rol == 2) {
                            $('#typepass').removeClass('hidden');
                            
                        } else {
                            $('#typepass').addClass('hidden');
                        }
                    } else {
                        $('#step3_submit').addClass('disabled');
                    }
                }
                function submit() {
                    var error = '';
                    carrer = $('#carrer').val();
                    rolpass = $('#rolpass').val();
                    
                    switch(rol) {
                        case '0':
                            rol = 'visitante';
                            break;
                        case '1':
                            if(carrer == null) {
                                $('.labelcarrer_register').addClass('errorLabel');
                                $('.inputcarrer_register').addClass('errorInput');
                                error = 'carrer';
                            } else {
                                $('.labelcarrer_register').removeClass('errorLabel');
                                $('.inputcarrer_register').removeClass('errorInput');
                                error = '';
                            }
                            break;
                        case '2':
                            if(rolpass == '') {
                                $('.labeltypepass_register').addClass('errorLabel');
                                $('.inputtypepass_register').addClass('errorInput');
                                error = 'typepass';	
                            } else {
                                $('.labeltypepass_register').removeClass('errorLabel');
                                $('.inputtypepass_register').removeClass('errorInput');
                                error = '';	
                            }
                            break;
                    }
                    if(error == '') {
                        $.ajax({
                            type: "POST",
                            url: './app/ajax/register.php',
                            dataType: "json",
                            data:{
                                email:email,
                                pass:pass, 
                                user:user, 
                                name:name, 
                                lastname:lastname, 
                                rol:rol, 
                                carrer:carrer,
                                rolpass:rolpass
                            },
                            success:function (data){
                                console.log(data);
                                if(data.status == "true") {
                                    toastr.success('Ya puedes iniciar sesion!', 'Registro Correcto!');
                                    overlayRegister.classList.remove('active');
                                    popupRegister.classList.remove('active');
                                    overlayLogin.classList.add('active');
                                    popupLogin.classList.add('active');
                                }
                                if(data.status == "false") {
                                    toastr.error('Comprueba tus datos que esten escritos correctamente', 'Error al Registrarse!');
                                }
                            },
                            error: function (){}
                        });
                    }
                    
                }
            </script>

        </div>
    </div>
</div>
 