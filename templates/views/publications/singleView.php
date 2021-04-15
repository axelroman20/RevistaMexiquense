<?php require_once INCLUDES.'header.php'; ?>

<!-------------------------------MAIN------------------------------------>
<main>
    <section class="publications">
            <div class="container">
                <div class="row">
                    <div class="col ">
                        <h3><i class="fas fa-eye"></i><?php echo $d->article[0]->views; ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
            </div>
            

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
    const url = "<?php echo UPLOADS.$d->article[0]->user.'/'.$d->article[0]->file; ?>";
</script>
<!------------------------------------------------------------------->
<script src="http://mozilla.github.io/pdf.js/build/pdf.js"></script>
<script src="<?php echo JS.'turn.js'; ?>"></script>
<script src="<?php echo JS.'article.js'; ?>"></script>

<?php require_once INCLUDES.'footer.php'; ?>