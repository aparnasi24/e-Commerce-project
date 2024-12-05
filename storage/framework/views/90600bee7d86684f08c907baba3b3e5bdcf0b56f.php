<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">

        <a class="navbar-brand logo-image no-underline" href="/">Mynetwork</a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <input type="checkbox" id="checkbox">
            <label for="checkbox" class="toggle">
                <div class="bars" id="bar1"></div>
                <div class="bars" id="bar2"></div>
                <div class="bars" id="bar3"></div>
            </label>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo e(Auth::check() ? '/problem' : route('login')); ?>">PROBLEMS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo e(Auth::check() ? '/mycompiler' : route('login')); ?>">COMPILER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo e(Auth::check() ? '/track' : route('login')); ?>">Progress</a>
                </li>

                <?php if(Auth::check()): ?>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing">PRICING</a>
                    </li>
                <?php endif; ?>
            </ul>
    
            <?php if(Route::has('login')): ?>
                <?php if(auth()->guard()->check()): ?>
                    <span class="nav-item">
                        <a href="/user/profile" class="btn-outline-sm"><?php echo e(Auth::user()->name); ?></a>
                    </span>
                    <span class="nav-item">
                        <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn-outline-sm">LOG OUT</button>
                        </form>
                    </span>
                <?php else: ?>
                    <span class="nav-item">
                        <a href="<?php echo e(route('login')); ?>" class="btn-outline-sm">LOG IN</a>
                    </span>
                    <span class="nav-item">
                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="btn-outline-sm">SIGN UP</a>
                        </span>
                        <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>

    </div>
</nav>
<?php /**PATH /home/tonny/Laravel/prog/assignment3/mynetwork/resources/views/home/nav.blade.php ENDPATH**/ ?>