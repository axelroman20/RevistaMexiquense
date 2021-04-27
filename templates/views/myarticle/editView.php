<?php require_once INCLUDES.'header.php'; ?>
<!-------------------------------MAIN------------------------------------>
<main>
    <section class="myarticle">
        <div class="container">
                
                <div class="row row-cols-auto">
                    <div class="col ">
                        <h3>Editar Articulo</h3>
                    </div>
                    <div class="col align-self-end">
                        <button onclick="window.location='myarticle'" type="button" class="btn btn-secondary"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Volver</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                
                <div class="row justify-content-center"  id="form">
                    
                <div class="col-md-9 col-lg-8 ">
                    <div class="card shadow">
                        <div class="card-body">            
                            <form enctype="multipart/form-data" method="post" id="form-new" class="needs-validation" novalidate>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                                    <input required type="text" name="title" class="form-control" id="exampleFormControlInput1" maxlength="50" value="<?php echo $d->title; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                                    <textarea required name="description" class="form-control" id="exampleFormControlTextarea1"  maxlength="250" style="height: 100px"><?php echo $d->description; ?></textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Archivo PDF</label>
                                    <input  type="file" name="file" class="form-control" id="formFile" accept=".pdf">
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Imagen Previa</label>
                                    <input value="fondo.jpg"  type="file" name="thumb" class="form-control" id="formFile" accept="image/png, image/jpeg" onchange="readURL(this);">
                                </div>
                                
                                <div class="d-flex justify-content-center">
                                    <div class="card bg-light text-dark mb-3  col-md-12 col-lg-9" id="preview">
                                        <img class="card-img preview" id="img" height="400" src="<?php echo UPLOADS.$d->id_user.'/'.$d->thumb; ?>"/>
                                    </div>
                                </div>

                                <div class="mb-3 d-grid gap-2">
                                    <button  type="submit" class="btn btn-success" name="submitArticleEdit" form="form-new">Subir Articulo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                </div>
        </div>
    </section>
</main>
<!------------------------------------------------------------------->  
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img')
                    .attr('src', e.target.result);
                $('#preview').show();
                $('#text').hide();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
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
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>