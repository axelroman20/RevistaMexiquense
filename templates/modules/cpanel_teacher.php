<div class="row row-cols-auto">
    <div class="col ">
        <h3>Panel de Control</h3>
    </div>
    <div class="col align-self-end">
        <button onclick="" type="button" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;&nbsp;Crear Usuario</button>
        <button onclick="" type="button" class="btn btn-primary"><i class="fas fa-link"></i>&nbsp;&nbsp;Vincular Usuario</button>
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
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Usuario</th>
                <th scope="col">Carrera</th>
                <th scope="col">Acciones</th>
            </thead>

            <tbody>
        <?php foreach ($d->links as $link) : ?>
            <tr>
                <th scope="row"><?php echo $link->id; ?></th>
                <td><?php echo $link->name; ?></td>
                <td><?php echo $link->lastname; ?></td>
                <td><?php echo $link->user; ?></td>
                <td><?php echo getCarrerFilter($link->carrer); ?></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" ><i class="fas fa-eye"></i></i></button>
                    <button type="button" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></button>
                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#unlink">
                        <i class="fas fa-unlink"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete">
                        <i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
            </tbody>
        </table>
                <!-- Desvincular -->
                <div class="modal fade" id="unlink" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Desvincular la cuenta del usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Si desvinculas la cuenta del usuario, se te quitara los permisos sobre el usuario! <br>
                            Si deseas hacerlo presiona el boton de confirmar.
                            <p style="color: red;">Sus datos y Archivos no se borraran</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-dark">Confirmar</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Eliminar -->
                <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Eliminar la cuenta del usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Si eliminas la cuenta del usuario, tambien eliminaras sus datos y articulos que existan! <br>
                            Si deseas hacerlo presiona el boton de confirmar.
                            <p style="color: red;">No se podra recuperar los datos despues de esta accion</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-danger">Confirmar</button>
                        </div>
                        </div>
                    </div>
                </div>
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

<!-- Crear Usuario -->
<div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Desvincular la cuenta del usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Si desvinculas la cuenta del usuario, se te quitara los permisos sobre el usuario! <br>
            Si deseas hacerlo presiona el boton de confirmar.
            <p style="color: red;">Sus datos y Archivos no se borraran</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-dark">Confirmar</button>
        </div>
        </div>
    </div>
</div>