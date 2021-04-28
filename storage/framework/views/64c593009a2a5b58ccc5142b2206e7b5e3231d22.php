<nav class="navbar is-primary  has-text-white" >
    <div class="container">
        <div class="navbar-brand">
            <a href="/" class="navbar-item">
                <strong><i></i> Healthy Region</strong>
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">

                <a href="/files"
                   class="navbar-item <?php echo e(Request::path() === 'files' ? "is-active" : ""); ?>">
                    Bestanden
                </a>

            </div>
        </div>
    </div>
</nav>


<?php /**PATH C:\Users\31641\Documents\GitHub\HealthyRegion\resources\views/main/navbar.blade.php ENDPATH**/ ?>