<?php require_once INCLUDES.'header.php'; ?>

<!-------------------------------MAIN------------------------------------>
<main>
    <section class="publications">
        
            <div class="row">
                <div class="col-12">
                    <?php require MODULES.'article.php'; ?>
                </div>
            </div>
        
    </section>
</main>
<!------------------------------------------------------------------->
<?php if(!isset($_SESSION['user'])): ?>
    <?php require_once MODULES.'login.php'; ?>
    <?php require_once MODULES.'register.php'; ?>
<?php endif; ?>
<script>
    const url = "<?php echo UPLOADS.$_GET['user'].'/'.$_GET['file']; ?>";
</script>
<!------------------------------------------------------------------->
<script src="http://mozilla.github.io/pdf.js/build/pdf.js"></script>
<script src="<?php echo JS.'turn.js'; ?>"></script>
<script src="<?php echo JS.'article.js'; ?>"></script>

<?php require_once INCLUDES.'footer.php'; ?>