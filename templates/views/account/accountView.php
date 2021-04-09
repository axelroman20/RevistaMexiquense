<?php require_once INCLUDES.'header.php'; ?>
<!-------------------------------MAIN------------------------------------>
<main>
    <section class="account">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <button hidden class="input-group-text" type="button" id="basic-addon1">
                            <i class="fas fa-key"></i>
                        </button>
                        <input hidden type="password" class="form-control" value="<?php echo $d->pass; ?>" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <button class="input-group-text" type="button" id="basic-addon1">
                            <i class="fas fa-pen"></i>
                        </button>
                        <input disabled type="text" class="form-control" value="<?php echo $d->user; ?>" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <button class="input-group-text" type="button" id="basic-addon1">
                            <i class="fas fa-key"></i>
                        </button>
                        <input disabled type="password" class="form-control" value="<?php echo $d->pass; ?>" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>