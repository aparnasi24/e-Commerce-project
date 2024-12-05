<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mynetwork - Networking Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.png">
    <?php echo $__env->make("home.css", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="bg-gray-100">

    <?php echo $__env->make("home.preloader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("home.nav", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div style = "height:80px;background-color:#5f4dee"></div>

    <div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold text-center text-indigo-600 mb-8">Data Science Coding Questions</h1>

 

        <?php $__currentLoopData = $problems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $problem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white shadow-md rounded-lg p-4 transition-transform transform hover:scale-105">
        <h2 class="text-lg font-semibold text-indigo-600">Question: <?php echo e($problem->title); ?></h2>
        <p><?php echo e($problem->description); ?></p>
        <form action="<?php echo e(route('probsolve')); ?>" method="POST">
            <?php echo csrf_field(); ?> <!-- Include CSRF token for security -->
            <input type="hidden" name="problem_id" value="<?php echo e($problem->id); ?>">
            <input type="hidden" name="problem_solution" value="<?php echo e($problem->solution); ?>">
            <button type="submit" class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Solve</button>
        </form>
    </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

    <?php echo $__env->make("home.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("home.copyright", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("home.script", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /home/tonny/Laravel/prog/assignment3/mynetwork/resources/views/home/problem.blade.php ENDPATH**/ ?>