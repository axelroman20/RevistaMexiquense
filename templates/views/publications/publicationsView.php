<?php require_once INCLUDES.'header.php'; ?>

<!-------------------------------MAIN------------------------------------>
<main>
    <section class="slider">
    </section>
</main>
<!------------------------------------------------------------------->
<?php if(!isset($_SESSION['user'])): ?>
    <?php require_once INCLUDES.'login.php'; ?>
    <?php require_once INCLUDES.'register.php'; ?>
<?php endif; ?>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>