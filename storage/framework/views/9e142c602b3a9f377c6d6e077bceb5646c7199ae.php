<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://67211654735dd822d79ac35c--tangerine-genie-222549.netlify.app/build/assets/app-c208tcty.css" rel="stylesheet">
        <link href="https://67211654735dd822d79ac35c--tangerine-genie-222549.netlify.app/build/assets/app-z-rg4txu.js" rel="stylesheet">



    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            <?php echo e($slot); ?>

        </div>
    </body>
</html>
<?php /**PATH /home/tonny/Laravel/prog/assignment3/mynetwork/resources/views/layouts/guest.blade.php ENDPATH**/ ?>