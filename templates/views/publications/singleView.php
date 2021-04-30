<?php require_once INCLUDES.'header.php'; ?>

<!-------------------------------MAIN------------------------------------>
<main>
    <section class="publications">
            <div class="container">
                <div class="row">
                    <div class="col-auto me-auto">
                        <ul class="nav">
                            <li class="article nav-item">
                                <button class="home" id="home">
                                    <i class="fas fa-home"></i>
                                </button>
                            </li>
                            <li class="article nav-item">
                                <button class="zoomIn" id="zoomIn">
                                    <i class="fas fa-search-plus"></i>
                                </button> 
                            </li>
                            <li class="article nav-item">
                                <button class="zoomOut" id="zoomOut">
                                    <i class="fas fa-search-minus"></i>
                                </button> 
                            </li>
                            <li class="article nav-item">
                                <button class="zoomNormal" id="zoomNormal">
                                    <i class="fas fa-search"></i>
                                </button> 
                            </li>
                        </ul>
                    </div>

                    <div class="col-auto">
                        <ul class="nav">
                            <li class="article nav-item">
                                <button class="views" id="views">
                                    <i class="fas fa-eye"></i> <?php echo $d->article[0]->views; ?>
                                </button>
                            </li>
                            <li class="article nav-item">
                                <button class="likes" id="likes">
                                    <i class="far fa-heart"></i> <?php echo $d->article[0]->likes; ?>
                                </button>
                            </li>
                        </ul>
                    </div> 
                </div> <hr>
                <div class="row">
                    <div class="col-auto me-auto article">
                        <button class="btn-left" id="prev-page">
                            <i class="fas fa-long-arrow-alt-left"></i> Anterior
                        </button>
                    </div>
                    <div class="col-auto article">
                        <button class="btn-right" id="next-page">
                            Siguiente <i class="fas fa-long-arrow-alt-right"></i> 
                        </button> 
                    </div>
                </div> <br>
            </div>

            <div class="row">
                <div class="col-12">
                    <?php require MODULES.'article.php'; ?>
                </div>
            </div>

            <br><br><br>


            <div class="container">
                <div class="row row-cols-auto ">
                    <div class="col">
                        <h3>Comentarios</h3>
                    </div>                    
                </div> <hr> <br>
                <?php if($d->comments): ?>
                    <?php foreach ($d->comments as $comment): ?>
                        <div class="row justify-content-center">
                            <div class="col-6"> 
                                <div class="card">
                                    <div class="card-body">
                                        <p>
                                            <strong>
                                                <?php if(isset($_SESSION['user']) && ($_SESSION['id'] == $comment->id_user)): ?>
                                                    <small class="text-muted"> <i class="fas fa-star"></i> </small> 
                                                <?php endif; ?>
                                                <?php echo $comment->username; ?>
                                            </strong>
                                            <small class="text-muted">(<?php echo getDateFilter($comment->created_at); ?>)</small>
                                            <small class="text-muted"> dice: </small>

                                        </p>
                                        <p><?php echo $comment->comment; ?></p>
                                    </div>
                                    
                                    <?php if(isset($_SESSION['user']) && ($_SESSION['id'] == $comment->id_user)): ?>
                                        <div class="card-footer">
                                            <a href="single?article=<?php echo $_GET['article']; ?>&delete=<?php echo $comment->id; ?>" style="color: #dc3545;">Eliminar</a>
                                        </div>
                                    <?php endif; ?>
                                    
                                </div> <br>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="row justify-content-center">
                        <div class="col-6"> 
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-center">Sin comentarios</h5>
                                </div>
                            </div> 
                            <br> 
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(isset($_SESSION['user'])): ?>
                    <?php if($d->active == 0): ?>
                        <div class="row justify-content-center">
                            <div class="col-6"> <hr>
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Cuenta no verificada!</h5>
                                        <p class="card-text">Ve al apartado de Mi Cuenta para enviar el correo de verficacion 
                                        para poder comentar. </p>
                                        <a onclick="toastAccount();" href="account" class="btn btn-secondary">Ir a Mi cuenta</a>
                                </div>
                            <div class="b-example-divider"></div>
                        </div>
                    <?php else: ?>
                        <div class="row justify-content-center"> 
                            <div class="col-6"><hr>
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="mb-3 row">
                                                <label for="user" class="col-sm-2 col-form-label">Usuario: </label>
                                                <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" name="user" id="user" value="<?php echo $_SESSION['user']; ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="comments" class="form-label">Comentario:</label>
                                                <textarea required class="form-control" name="comment" id="comments" rows="3"></textarea>
                                            </div>
                                            <button type="submit" name="submitComment" class="btn btn-success">Enviar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="row justify-content-center">
                    <div class="col-6"> 
                        <div class="card">
                            <div class="card-body text-center">
                                <h5>Inicia sesion para poder escribir comentarios</h5>
                                <a class="btn btn-success" href="#">Iniciar Sesion</a>
                            </div>
                        </div> 
                        <br> <hr>
                    </div>
                </div>
                <?php endif;?>
            
            </div>

    </section>
</main>
<!------------------------------------------------------------------->
<?php if(!isset($_SESSION['user'])): ?>
    <?php require_once MODULES.'login.php'; ?>
    <?php require_once MODULES.'register.php'; ?>
<?php endif; ?>
<script>
    const url = "<?php echo UPLOADS.$d->article[0]->id_user.'/'.$d->article[0]->file; ?>";
</script>
<!------------------------------------------------------------------->
<script src="http://mozilla.github.io/pdf.js/build/pdf.js"></script>
<script src="<?php echo JS.'turn.js'; ?>"></script>
<script src="<?php echo JS.'article.js'; ?>"></script>

<?php require_once INCLUDES.'footer.php'; ?>