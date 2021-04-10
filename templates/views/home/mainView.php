<?php require_once INCLUDES.'header.php'; ?>

<!-------------------------------MAIN------------------------------------>
<main>
    <!-- CARD-SLIDER -->
    <section class="card-slider">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php require INCLUDES.'card.php'; ?>
                        </div>
                        <div class="carousel-item">
                            <?php require INCLUDES.'card.php'; ?>
                        </div>
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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Lorem ipsum</h2>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                        Harum velit labore quae inventore corporis ex rem fuga dicta obcaecati, 
                        voluptatem ipsa reprehenderit ullam, fugiat iure doloremque facilis quia 
                        veritatis pariatur repellendus excepturi minus minima sunt reiciendis. 
                        Culpa unde modi reiciendis iusto sed explicabo deserunt quisquam magnam 
                        adipisci hic, eum animi laboriosam aliquam sit, doloremque voluptatibus 
                        dolores aut sequi consequatur! Aliquam excepturi ut quod nam, sint quasi? 
                        Suscipit nesciunt ut magni facilis hic iure ipsa ratione sunt distinctio 
                        omnis, velit, quas vel. Quo blanditiis inventore sapiente! Autem natus 
                        neque officiis ipsa at quia architecto nihil tempore molestiae aliquam, 
                        facere nesciunt minima.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- HOVERS -->
        <section class="hovers">
            <div class="container">
                <figure id="hover-robotica">
                    <img src="<?php echo IMAGES.'1.jpg';?>" alt="Robotica">
                    <div class="capa">
                        <a href="#">
                            <h3>Robotica</h3>
                            <h4>Pedro Jose Sanz Valero</h4> 
                            <p>Los robots ya están teniendo una incidencia significativa en los procesos de 
                                fabricación de los sectores del automóvil y la electrónica.</p>
                        </a>
                    </div>
                </figure>
                <figure id="hover-">
                    <img src="<?php echo IMAGES.'2.jpg';?>" alt="Robotica">
                    <div class="capa">
                        <a href="#">
                            <h3>Titulo</h3>
                            <h4>Autor/Usuario</h4> 
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Ipsam asperiores rem ipsa. Velit dolor amet cum iste harum aliquam eos.</p>
                        </a>
                    </div>
                </figure>
                <figure id="hover-">
                    <img src="<?php echo IMAGES.'3.jpg';?>" alt="Robotica">
                    <div class="capa">
                        <a href="#">
                            <h3>Titulo</h3>
                            <h4>Autor/Usuario</h4> 
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Ipsam asperiores rem ipsa. Velit dolor amet cum iste harum aliquam eos.</p>
                        </a>
                    </div>
                </figure>
                <figure id="hover-">
                    <img src="<?php echo IMAGES.'4.jpg';?>" alt="Robotica">
                    <div class="capa">
                        <a href="#">
                            <h3>Titulo</h3>
                            <h4>Autor/Usuario</h4> 
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Ipsam asperiores rem ipsa. Velit dolor amet cum iste harum aliquam eos.</p>
                        </a>
                    </div>
                </figure>
                <figure id="hover-">
                    <img src="<?php echo IMAGES.'5.jpg';?>" alt="Robotica">
                    <div class="capa">
                        <a href="#">
                            <h3>Titulo</h3>
                            <h4>Autor/Usuario</h4> 
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Ipsam asperiores rem ipsa. Velit dolor amet cum iste harum aliquam eos.</p>
                        </a>
                    </div>
                </figure>
                <figure id="hover-">
                    <img src="<?php echo IMAGES.'6.jpg';?>" alt="Robotica">
                    <div class="capa">
                        <a href="#">
                            <h3>Titulo</h3>
                            <h4>Autor/Usuario</h4> 
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Ipsam asperiores rem ipsa. Velit dolor amet cum iste harum aliquam eos.</p>
                        </a>
                    </div>
                </figure>
                <figure id="hover-">
                    <img src="<?php echo IMAGES.'7.jpg';?>" alt="Robotica">
                    <div class="capa">
                        <a href="#">
                            <h3>Titulo</h3>
                            <h4>Autor/Usuario</h4> 
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Ipsam asperiores rem ipsa. Velit dolor amet cum iste harum aliquam eos.</p>
                        </a>
                    </div>
                </figure>
                <figure id="hover-">
                    <img src="<?php echo IMAGES.'8.jpg';?>" alt="Robotica">
                    <div class="capa">
                        <a href="#">
                            <h3>Titulo</h3>
                            <h4>Autor/Usuario</h4> 
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Ipsam asperiores rem ipsa. Velit dolor amet cum iste harum aliquam eos.</p>
                        </a>
                    </div>
                </figure>
            </div>
        </section>
    </main>
<!------------------------------------------------------------------->
<?php if(!isset($_SESSION['user'])): ?>
    <?php require_once INCLUDES.'login.php'; ?>
    <?php require_once INCLUDES.'register.php'; ?>
<?php endif; ?>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>