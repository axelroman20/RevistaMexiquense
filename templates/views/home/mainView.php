<?php require_once INCLUDES.'header.php'; ?>
<!-------------------------------MAIN------------------------------------>
<main>
    <!-- CARD-SLIDER -->
    <section class="card-slider">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-11 col-xl-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 2"></button>
                        </div>
                    <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row justify-content-center">
                                    <div class="d-flex justify-content-center">
                                    <div class="col">
                                        <div class="card bg-dark text-white">
                                            <img src="<?php echo IMAGES.'destacados.jpg'; ?>" class="card-img" width="auto" height="400">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <?php foreach ($d->postsLikes as $post) : ?>
                            <div class="carousel-item">
                                <?php require MODULES.'card.php'; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- INFO -->
        <section class="info">
            <div class="containerr container-fluid bg-secondary">
                <div class="row justify-content-center">
                    <div class="col align-self-center"><br><br>
                        <h2>Objetivos Generales</h2>
                        <p>El objetivo de esta plataforma de revista digital es el uso de tecnologias web durante su desarrollo,
                            ademas de ser un medio de comunicacion para las diferentes carreras de licenciatura de la escuela
                            Grupo Colegio Mexiquense donde se subiran documentos pdf con informacion referente a las carreras.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- HOVERS -->
        <section class="hovers">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3>Articulos más vistos</h3>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($d->postsViews as $post) : ?>
                        <div class="col">
                        <figure id="hover-robotica">
                            <img src="<?php echo UPLOADS.$post->id_user.'/'.$post->thumb; ?>">
                            <div class="capa">
                                <a href="publications/single?article=<?php echo $post->id; ?>" style="color: #fff;"> <br>
                                    <h3><?php echo $post->title; ?></h3>
                                    <h4><i class="fas fa-eye"></i> <?php echo $post->views; ?></h4> 
                                </a>
                            </div>
                        </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
<!------------------------------------------------------------------->
<?php if(!isset($_SESSION['user'])): ?>
    <?php require_once MODULES.'login.php'; ?>
    <?php require_once MODULES.'register.php'; ?>
<?php endif; ?>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>