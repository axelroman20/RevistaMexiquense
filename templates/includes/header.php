<!DOCTYPE html>
<html lang="es">
<head>
    <base href="">
    <meta charset="UTF-8">
    
    <title><?php echo isset($d->title) ? $d->title.' - '.get_sitename() : get_sitename(); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php require_once INCLUDES.'links.php'; ?>
    <?php require_once INCLUDES.'scripts.php'; ?>
</head>
<body>
    <?php echo isset($d->toast) ? "$d->toast" : ''; ?>
    <!--------------------------------HEADER----------------------------------->

    <?php if(CONTROLLER == 'home'): ?>
    <header>
    <?php else: ?> 
    <header class="short">
    <?php endif; ?> 
        <div class="container">
            <?php require_once INCLUDES.'nav.php'; ?>
        </div>  
        <?php //require_once MODULES.'search.php'; ?>
        
        <div class="wave" style= "height: 150px; overflow: hidden;" >
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C262.97,126.80 130.92,54.77 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #f2f2f2; "></path>
            </svg>
        </div>  

        <?php if(CONTROLLER == 'home'): ?>
        <!-- TITLE -->
        <section class="textos-header">
            <div class="container">
                <h1> Grupo Colegio Mexiquense </h1>
                <h2>Revista Digital</h2>
            </div>    
        </section>
        <?php endif; ?> 
        
    </header>