<?php require_once INCLUDES.'header.php'; ?>
<!-------------------------------MAIN------------------------------------>
<main>
    <section class="myarticle">
        <div class="container">
            <?php if($d->active == 0): ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Cuenta no verificada!</h5>
                                <p class="card-text">
                                    Para poder subir articulos en necesario que verifiques tu cuenta. <br>
                                    Presiona el boton para reenviar el correo de verificación de cuenta.
                                </p>
                                <a onclick="toastArticle();" href="<?php echo 'myarticle/resend?email='.$d->email.'&name='.$d->name.'&lastname='.$d->lastname.'&user='.$d->user.'&token='.$d->token; ?>"
                                class="btn btn-secondary">Enviar Correo</a>
                                <script>
                                    function toastArticle() {
                                        toastr.success('Revisa tu bandeja de entrada para verificar tu cuenta', 'Correo Enviado!');
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div> 
            <?php else: ?> 
                <div class="row row-cols-auto">
                    <div class="col ">
                        <h3>Panel de Control</h3>
                    </div>
                    <div class="col align-self-end">
                        <button type="button" class="btn btn-success">Nuevo</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                
                <div class="b-example-divider"><br></div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 justify-content-center">
                    <div class="col">
                        <div class="card shadow">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="38%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-dark">Edit</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="38%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-dark">Edit</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="38%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-dark">Edit</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="38%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-dark">Edit</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="b-example-divider"><br></div>
                <div class="row">
                    <div class="container">
                        <div class="col">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>