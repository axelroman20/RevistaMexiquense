<div class="row row-cols-auto">
    <div class="col">
        <h3>Panel de Control</h3>
    </div>
    <div class="col align-self-end">
        <button onclick="" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">
            <i class="fas fa-plus"></i>&nbsp;&nbsp;Crear Usuario</button>
            <button onclick="window.location='cpanel'"
             type="button" class="btn btn-info"><i class="fas fa-sync"></i></button>
    </div>
    <div class="col align-self-end">
        <form class="d-flex" method="get" id="search-user">
            <input class="form-control me-2" type="search" name="search" placeholder="Buscar Usuario" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" form="search-user">Buscar</button>
        </form>
    </div>   
    
</div>
<div class="row">
    <div class="col-md-12">
        <hr>
    </div>
</div>

<?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
    <div class="row">
        <div class="col">
            <h5>Resultado de la busqueda: <?php echo $_GET['search']; ?></h5>
        </div>
    </div>
<?php endif; ?>

<?php if($d->links != "false"): ?>
    <div class="table-responsive">
        <table class="table table-light table-striped table-hover">
            <thead>
                <th scope="col">ID Alumno</th>
                <th scope="col">Rol</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Usuario</th>
                <th scope="col">Carrera</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Verificado</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </thead>

            <tbody>
        <?php foreach ($d->links as $link) : ?>
            <tr>
                <th scope="row"><?php echo $link->id; ?></th>
                <td><?php echo getRolFilter($link->rol); ?></td>
                <td><?php echo $link->name; ?></td>
                <td><?php echo $link->lastname; ?></td>
                <td><?php echo $link->user; ?></td>
                <td><?php echo getCarrerFilter($link->carrer); ?></td>
                <td><?php echo $link->email; ?></td>
                <td>
                    <?php if($link->active): ?>
                        <span class="badge bg-success"><i class="fas fa-check"></i></span>
                    <?php else: ?>
                        <span class="badge bg-danger"><i class="fas fa-times"></i></span>
                    <?php endif; ?>
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit-<?php echo $link->user; ?>">
                    <i class="fas fa-pen"></i></button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-<?php echo $link->user; ?>">
                        <i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>

                <!-- Eliminar -->
                <div class="modal fade" id="delete-<?php echo $link->user; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Eliminar la cuenta de @<?php echo $link->user; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Si eliminas la cuenta del usuario, tambien eliminaras sus datos y articulos que existan! <br>
                            Si deseas hacerlo presiona el boton de confirmar.
                            <p style="color: red;">No se podra recuperar los datos despues de esta accion</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button onclick="window.location='cpanel/delete?user=<?php echo $link->id; ?>'"
                                    type="button" class="btn btn-danger">Confirmar</button>
                        </div>
                        </div>
                    </div>
                </div>

                
                <!-- EditUser -->
                <div class="modal fade" id="edit-<?php echo $link->user; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel-<?php echo $link->user; ?>">Editar cuenta de @<?php echo $link->user; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        <div class="modal-body">
                            <form method="post" id="form-<?php echo $link->user; ?>" class="needs-validation-<?php echo $link->user; ?>" novalidate>
                                <div class="input-group mb-3">
                                    <input hidden type="text" class="form-control" name="id" aria-label="id" aria-describedby="basic-addon1" value="<?php echo $link->id; ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3"><i class="fas fa-user-shield"></i></span>
                                    <select required class="form-select" id="rol-<?php echo $link->user; ?>" name="rol">
                                        <option value="" >Rol de Usuario</option>
                                        <?php if($link->rol == 0): ?>
                                            <option selected value="0">Visitante</option>   
                                        <?php else: ?>
                                            <option value="0">Visitante</option>
                                        <?php endif; ?>
                                        <?php if($link->rol == 1): ?>   
                                            <option selected value="1">Estudiante</option>
                                        <?php else: ?>
                                            <option value="1">Estudiante</option>
                                        <?php endif; ?>
                                        <?php if($link->rol == 2): ?>   
                                            <option selected value="2">Maestro</option> 
                                        <?php else: ?>
                                            <option value="2">Maestro</option>
                                        <?php endif; ?>
                                        <?php if($link->rol == 3): ?>    
                                            <option selected value="3">Administrador</option>
                                        <?php else: ?>
                                            <option value="3">Administrador</option>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-circle"></i></span>
                                    <input required type="text" class="form-control" placeholder="Nombre" name="name" aria-label="name" aria-describedby="basic-addon1" maxlength="50" value="<?php echo $link->name; ?>">
                                    <input required type="text" class="form-control" placeholder="Apellido" name="lastname" aria-label="lastname" aria-describedby="basic-addon1" maxlength="50" value="<?php echo $link->lastname; ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input required type="text" class="form-control" placeholder="Usuario" name="user" aria-label="user" aria-describedby="basic-addon1" minlength="5" maxlength="50" value="<?php echo $link->user; ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                                    <input required type="password" class="form-control" placeholder="Contraseña" name="pass" aria-label="pass"  aria-describedby="basic-addon1" minlength="5" maxlength="50" value="<?php echo $link->pass_noencrypt; ?>">
                                </div>
                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></i></span>
                                    <input required type="email" class="form-control" placeholder="Correo Electronico" name="email" aria-label="email" aria-describedby="basic-addon1" minlength="5" maxlength="50" value="<?php echo $link->email; ?>">
                                </div> 
                                    <div id="carrer" class="">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                                            <select required class="form-select" name="carrer" id="basic-addon2-<?php echo $link->user; ?>">
                                                <?php if($link->carrer == 0): ?> 
                                                    <option selected value="0">Ninguno</option>   
                                                <?php else: ?>
                                                    <option value="0">Ninguno</option>
                                                <?php endif; ?>
                                                <?php if($link->carrer == 1): ?> 
                                                    <option selected value="1">Ingeniería En Sistemas</option>   
                                                <?php else: ?>
                                                    <option value="1">Ingeniería En Sistemas</option>
                                                <?php endif; ?>
                                                <?php if($link->carrer == 2): ?>   
                                                    <option selected value="2">Ingenieria Industrial</option> 
                                                <?php else: ?>
                                                    <option value="2">Ingenieria Industrial</option>
                                                <?php endif; ?>
                                                <?php if($link->carrer == 3): ?>
                                                    <option selected value="3">Psicologia</option>    
                                                <?php else: ?>
                                                    <option value="3">Psicologia</option>
                                                <?php endif; ?>
                                                <?php if($link->carrer == 4): ?> 
                                                    <option selected value="4">Derecho</option>
                                                <?php else: ?>
                                                    <option value="4">Derecho</option>
                                                <?php endif; ?>
                                                <?php if($link->carrer == 5): ?>
                                                    <option selected value="5">Arquitectura</option>    
                                                <?php else: ?>
                                                    <option value="5">Arquitectura</option>
                                                <?php endif; ?>
                                                <?php if($link->carrer == 6): ?> 
                                                    <option selected value="6">Ciencias de la Educación</option>
                                                <?php else: ?>
                                                    <option value="6">Ciencias de la Educación</option>
                                                <?php endif; ?>
                                                <?php if($link->carrer == 7): ?> 
                                                    <option selected value="7">Contaduria</option>
                                                <?php else: ?>
                                                    <option value="7">Contaduria</option>
                                                <?php endif; ?>
                                                <?php if($link->carrer == 8): ?>   
                                                    <option selected value="8">Diseño Digital</option>
                                                <?php else: ?>
                                                    <option value="8">Diseño Digital</option>
                                                <?php endif; ?>
                                                <?php if($link->carrer == 9): ?> 
                                                    <option selected value="9">Enfermeria</option>
                                                <?php else: ?>
                                                    <option value="9">Enfermeria</option>
                                                <?php endif; ?>
                                                <?php if($link->carrer == 10): ?> 
                                                    <option selected value="10">Informática Administrativa</option>
                                                <?php else: ?>
                                                    <option value="10">Informática Administrativa</option>
                                                <?php endif; ?>
                                                <?php if($link->carrer == 11): ?>  
                                                    <option selected value="11">Mercadotecnia</option>
                                                <?php else: ?>
                                                    <option value="11">Mercadotecnia</option>
                                                <?php endif; ?>
                                                <?php if($link->carrer == 12): ?>  
                                                    <option selected value="12">Negocios Internacionales</option>
                                                <?php else: ?>
                                                    <option value="12">Negocios Internacionales</option>
                                                <?php endif; ?>
                                                <?php if($link->carrer == 13): ?> 
                                                    <option selected value="13">Pedagogía</option>
                                                <?php else: ?>
                                                    <option value="13">Pedagogía</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                            
                                <div class="">
                                    <label for="validationTextarea" class="form-label">El usuario tiene que verificar su cuenta?</label>
                                    <div class="form-check">
                                        <?php if($link->active == 0): ?> 
                                            <input checked type="radio" class="form-check-input" id="validationFormCheck2-<?php echo $link->user; ?>" name="active" value="0" required>
                                        <?php else: ?>
                                            <input type="radio" class="form-check-input" id="validationFormCheck2-<?php echo $link->user; ?>" name="active" value="0" required>
                                        <?php endif; ?>
                                        <label class="form-check-label" for="validationFormCheck2">Cuenta no Verificada</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <?php if($link->active == 1): ?> 
                                            <input checked type="radio" class="form-check-input" id="validationFormCheck3-<?php echo $link->user; ?>" name="active" value="1" required>
                                        <?php else: ?>
                                            <input type="radio" class="form-check-input" id="validationFormCheck3-<?php echo $link->user; ?>" name="active" value="1"  required>
                                        <?php endif; ?>
                                        
                                        <label class="form-check-label" for="validationFormCheck3">Cuenta Verificada</label>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button class="btn btn-warning" data-bs-target="#edit-validation-<?php echo $link->user; ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Editar</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Second modal dialog -->
                <div class="modal fade" id="edit-validation-<?php echo $link->user; ?>" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel-<?php echo $link->user; ?>">Confirmar cambios en la cuenta de @<?php echo $link->user; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                            
                            <p>¿Estas seguro realizar estos cambios?</p>
                            </div>
                            <div class="modal-footer">
                                <!-- Toogle to first dialog, `data-bs-dismiss` attribute can be omitted - clicking on link will close dialog anyway -->
                                <button class="btn btn-secondary" data-bs-target="#edit-<?php echo $link->user; ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Volver</button>
                                <button type="submit" class="btn btn-warning" form="form-<?php echo $link->user; ?>" name="submitEdit">Editar</button>
                            </div>

                        </div>
                    </div>
                </div>

                <script>
                    var user = "<?php echo $link->user; ?>";
                    (function () {
                    'use strict'

                    var forms = document.querySelectorAll('.needs-validation-'+user)

                    Array.prototype.slice.call(forms)
                        .forEach(function (form) {
                        form.addEventListener('submit', function (event) {
                            if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                            }
                            form.classList.add('was-validated')
                        }, false)
                        })
                    })()
                </script>

        <?php endforeach; ?>
            </tbody>
        </table>
                
        </div>
    <?php else: ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">No hay nada aqui!</h5>
                    <p class="card-text">
                        No se encontro lo que buscabas! o si no existe, puedes agregar un nuevo usuario presionando el boton verde!
                    </p>
                </div>
            </div>
        </div>
    </div> 
<?php endif; ?>

 <!-- AddUser -->
 <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Crear cuenta de usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="needs-validation" novalidate method="post" id="form1">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3"><i class="fas fa-user-shield"></i></span>
                    <select required class="form-select" id="rol" name="rol" onchange="carrerlistadd();">
                        <option selected value="" >Rol de Usuario</option>
                        <option value="0">Visitante</option>
                        <option value="1">Estudiante</option>
                        <option value="2">Maestro</option>
                        <option value="3">Administrador</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-circle"></i></span>
                    <input required type="text" class="form-control" placeholder="Nombre" name="name" aria-label="name" aria-describedby="basic-addon1" maxlength="50">
                    <input required type="text" class="form-control" placeholder="Apellido" name="lastname" aria-label="lastname" aria-describedby="basic-addon1" maxlength="50">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    <input required type="text" class="form-control" placeholder="Usuario" name="user" aria-label="user" aria-describedby="basic-addon1" minlength="5" maxlength="50">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    <input required type="text" class="form-control" placeholder="Contraseña" name="pass" aria-label="pass"  aria-describedby="basic-addon1" minlength="5" maxlength="50">
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></i></span>
                    <input required type="email" class="form-control" placeholder="Correo Electronico" name="email" aria-label="email" aria-describedby="basic-addon1" minlength="5" maxlength="50">
                </div>

                <div id="carrers" class="hidden">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                        <select class="form-select" name="carrer" id="" >
                            <option selected value="">Selecciona Carrera</option>
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
                </div>

                <div class="">
                    <label for="validationTextarea" class="form-label">El usuario tiene que verificar su cuenta?</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="validationFormCheck2" name="active" value="false" required>
                        <label class="form-check-label" for="validationFormCheck2">Si tiene que verificar su cuenta</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="radio" class="form-check-input" id="validationFormCheck3" name="active" value="true" required>
                        <label class="form-check-label" for="validationFormCheck3">No tiene que verificar su cuenta</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success"  name="addUsers" form="form1" value="Submit">Crear</button>
        </div>
        </div>
    </div>
</div>



<script>
    function carrerlistadd() {
        var rol = $('#rol').val();
        var carrer = $('#carrers');
        if(rol == 1) {
            carrer.removeClass('hidden');
        } else {
            carrer.addClass('hidden');
        }
    }
</script>