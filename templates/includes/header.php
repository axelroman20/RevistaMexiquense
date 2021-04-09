<!DOCTYPE html>
<html lang="es">
<head>
    <base href="">
    <meta charset="UTF-8">
    
    <title><?php echo isset($d->title) ? $d->title.' - '.get_sitename() : get_sitename(); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo CSS.'style.css'?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <?php require_once INCLUDES.'scripts.php'; ?>
</head>
<body>
    <!--------------------------------HEADER----------------------------------->
      
    <?php if(CONTROLLER == 'home'): ?>
    <header>
    <?php else: ?> 
    <header class="short">
    <?php endif; ?> 
        <div class="container">
            <?php require_once INCLUDES.'nav.php'; ?>
        </div>  
        <div class="search-box">
            <input class="search-txt" type="text" name="search"  placeholder="Busqueda">
            <a class="search-btn" id="search">
                <box-icon name='search-alt'></box-icon>
                <i class="fas fa-search"></i>
            </a>
        </div>

        <div class="wave" style="height: 150px; overflow: hidden;" >
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