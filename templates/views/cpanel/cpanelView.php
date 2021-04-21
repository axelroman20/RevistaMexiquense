<?php require_once INCLUDES.'header.php'; ?>
<!------------------------------------------------------------------->
    <main>
        <section class="cPanel">
            <div class="containerr container-fluid">
                <?php if($_SESSION['rol']==2): ?>
                    <?php require_once MODULES.'cpanel_teacher.php'; ?>
                <?php endif; ?>
                <?php if($_SESSION['rol']==3): ?>
                    <?php require_once MODULES.'cpanel_admin.php'; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>
<!------------------------------------------------------------------->
<?php if(!isset($_SESSION['user'])): ?>
    <?php require_once MODULES.'login.php'; ?>
    <?php require_once MODULES.'register.php'; ?>
<?php endif; ?>
<!------------------------------------------------------------------->
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
        })
    })()
</script>
<!------------------------------------------------------------------->
<?php require_once INCLUDES.'footer.php'; ?>