<?php require_once INCLUDES.'header.php'; ?>

<!-------------------------------MAIN------------------------------------>
<main>
        <!-- SLIDER -->
        <section class="slider">
            <div class="container">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img src="<?php echo IMAGES.'1.jpg'; ?>" alt="">
                            <section class="flex-caption">
                                <p>LOREM IPSUM 1</p>
                            </section>
                        </li>
                        <li>
                            <img src="<?php echo IMAGES.'2.jpg'; ?>" alt="">
                            <section class="flex-caption">
                                <p>LOREM IPSUM 2</p>
                            </section>
                        </li>
                        <li>
                            <img src="<?php echo IMAGES.'3.jpg'; ?>" alt="">
                            <section class="flex-caption">
                                <p>LOREM IPSUM 3</p>
                            </section>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- INFO -->
        <section class="info">
            <div class="container">
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