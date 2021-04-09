<!-- NAME -->
<div class="modal fade" id="name" tabindex="-1" aria-labelledby="name" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="name">¿Desea modificar sus datos?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="form-name">
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nombre:</label>
                <input required type="text" class="form-control" id="recipient-name" name="name-update">
            </div>
            <div class="mb-3">
                <label for="recipient-lastname" class="col-form-label">Apellido:</label>
                <input required type="text" class="form-control" id="recipient-lastname" name="lastname-update">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-secondary" name="submitUpdateName" form="form-name">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<!-- USER -->
<div class="modal fade" id="user" tabindex="-1" aria-labelledby="user" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="user">¿Desea modificar sus datos?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="form-user">
            <div class="mb-3">
                <label for="recipient-user" class="col-form-label">Usuario:</label>
                <input required type="text" class="form-control" id="recipient-user" name="user-update">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-secondary" name="submitUpdateUser" form="form-user">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<!-- PASS -->
<div class="modal fade" id="pass" tabindex="-1" aria-labelledby="pass" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pass">¿Desea modificar sus datos?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="form-pass">
            <div class="mb-3">
                <label for="recipient-pass" class="col-form-label">Contraseña Actual:</label>
                <input required type="text" class="form-control" id="recipient-pass" name="pass-update">
            </div>
            <div class="mb-3">
                <label for="recipient-passnew" class="col-form-label">Contraseña Nueva:</label>
                <input  type="text" class="form-control" id="recipient-passnew" name="passnew-update">
            </div>
            <div class="mb-3">
                <label for="recipient-repitpassnew" class="col-form-label">Repite Contraseña Nueva:</label>
                <input  type="text" class="form-control" id="recipient-repitpassnew" name="repitpassnew-update">
            </div>
            <div class="mb-3">
                <a href="account/recover-password" class="btn btn-link">¿Olvidaste tu contraseña?</a>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-secondary" name="submitUpdatePass" form="form-pass">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<!-- EMAIL -->
<div class="modal fade" id="email" tabindex="-1" aria-labelledby="email" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="email">¿Desea modificar sus datos?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="form-email">
            <div class="mb-3">
                <label for="recipient-email" class="col-form-label">Correo Electronico:</label>
                <input required type="email" class="form-control" id="recipient-email" name="email-update">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-secondary" name="submitUpdateEmail" form="form-email">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<!-- CARRER -->
<div class="modal fade" id="carrer" tabindex="-1" aria-labelledby="carrer" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="carrer">¿Desea modificar sus datos?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="form-carrer">
            <div class="mb-3">
                <label for="recipient-carrer" class="col-form-label">Carrera:</label>
                <select required class="form-select" id="recipient-carrer" name="carrer-update">
                    <option selected>Selecciona</option>
                    <option>Ingeniería En Sistemas</option>
                    <option>Ingeniería Industrial</option>
                    <option>Psicología</option>
                    <option>Derecho</option>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-secondary" name="submitUpdateCarrer" form="form-carrer">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

