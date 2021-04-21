<div class="row row-cols-auto">
    <div class="col ">
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

<?php if($d->links): ?>
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
                <th scope="col">Ver</th>
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
                    <button onclick=""
                        type="button" class="btn btn-primary btn-sm" ><i class="fas fa-eye"></i></i></button>
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit">
                    <i class="fas fa-pen"></i></button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#<?php echo $link->user; ?>">
                        <i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>

                <!-- Eliminar -->
                <div class="modal fade" id="<?php echo $link->user; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        Agrega nuevos estudiantes o vincula estudiantes ya existenes.
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
                    <select required class="form-select" id="rol" name="rol" onchange="carrerlist();">
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

                <div id="carrer" class="hidden">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                        <select class="form-select" name="carrer" id="basic-addon2">
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
                        <input type="radio" class="form-check-input" id="validationFormCheck2" name="active" value="true" required>
                        <label class="form-check-label" for="validationFormCheck2">Si tiene que verificar su cuenta</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="radio" class="form-check-input" id="validationFormCheck3" name="active" value="false" required>
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

 <!-- EditUser -->
 <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editar cuenta de usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" id="form-add" class="needs-validation" novalidate>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3"><i class="fas fa-user-shield"></i></span>
                    <select required class="form-select" id="rol" name="rol" onchange="carrerlist();">
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

                <div id="carrer" class="hidden">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                        <select required class="form-select" name="carrer" id="basic-addon2">
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
                        <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
                        <label class="form-check-label" for="validationFormCheck2">Si tiene que verificar su cuenta</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
                        <label class="form-check-label" for="validationFormCheck3">No tiene que verificar su cuenta</label>
                    </div>
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success" form="form-add" name="äddUsers">Crear</button>
        </div>
        </div>
    </div>
</div>


<script>
    function carrerlist() {
        var rol = $('#rol').val();
        if(rol == 1) {
            $('#carrer').removeClass('hidden');
        } else {
            $('#carrer').addClass('hidden');
        }
    }
</script>