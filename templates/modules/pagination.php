<div class="b-example-divider"><br>

<div class="row">
    <div class="container">
        <div class="col">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if(pageNow() === 1 ): ?> 
                    <li class="page-item disabled">
                        <a class="page-link" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="publications?p=<?php echo pageNow() - 1; ?>">Previous</a>
                    </li>
                <?php endif; ?>

                <?php for($i = 1; $i <= $d->numPage; $i ++): ?>
                    <?php if(pageNow() == $i): ?>
                        <li class="page-item active">
                            <a class="page-link" ><?php echo $i; ?></a>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a class="page-link" href="publications?p=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if(pageNow() == $d->numPage): ?>
                    <li class="page-item disabled">
                        <a class="page-link">Next</a>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="publications?p=<?php echo pageNow() + 1;?>">Next</a>
                    </li>
                <?php endif; ?>

            </ul>
        </nav>
        </div>
    </div>
</div>

<div class="b-example-divider"><br>
