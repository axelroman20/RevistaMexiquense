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
                        <button onclick="window.location='myarticle/new'" type="button" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;&nbsp;Nuevo Articulo</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                <?php if($d->posts): ?>
                    <div class="b-example-divider"><br></div>
                    <div class="row justify-content-center">
                    <?php foreach ($d->posts as $post) : ?>
                    
                        <div class="col-md-6 col-lg-4 col-xl-4 g-4">
                            <div class="card shadow">
                                <a href="publications/single?article=<?php echo $post->id; ?>">
                                    <img src="<?php echo UPLOADS.$post->id_user.'/'.$post->thumb; ?>" 
                                    class="card-img-top" alt="..." width="100%"  height="300">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $post->title; ?> </h5>
                                    <p class="card-text"><?php echo $post->description; ?></p>
                                    <?php if($d->rol == 1): ?>
                                        <p class="card-text d-flex justify-content-end">
                                        <small class="text-muted">
                                            <i class="fas fa-eye"></i> <?php echo $post->views; ?> &nbsp
                                            <i class="fas fa-heart"></i>  <?php echo $post->likes; ?> &nbsp
                                        </small>
                                    </p>
                                    <?php endif; ?>
                                    <div class="justify-content-end">
                                        <div class="btn-group">
                                            <button onclick="window.location='publications/single?article=<?php echo $post->id; ?>&user=<?php echo $post->user; ?>&file=<?php echo $post->file; ?>'" 
                                                class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> View </button>
                                            <button onclick="window.location='myarticle/edit?article=<?php echo $post->id; ?>'" 
                                                class="btn btn-sm btn-outline-dark"><i class="fas fa-edit"></i> Edit </button>
                                            <button onclick="window.location='myarticle/delete?article=<?php echo $post->id; ?>'" 
                                                class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="card-text"><small class="text-muted"><?php echo getDateFilter($post->created_at); ?></small></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <?php require_once MODULES.'pagination.php'; ?>
                
                <?php else: ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">No hay nada aqui!</h5>
                                    <p class="card-text">
                                        Puedes empezar a escribir tus articulos presionando el boton verde. 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> 
                <?php endif; ?>

            <?php endif; ?>
        </div>
    </section>
</main>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>