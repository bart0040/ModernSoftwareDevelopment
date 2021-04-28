<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Healthy Region</title>
    <link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>"/>

</head>
<body>

<div class="wrapper">
    <div class="header">
        <h1>Healthy Region</h1>
        <p>Welkom op de site van lectoraat Healthy Region</p>
    </div>


    <!--Menu-->

    <ul>
        <li><a>Home</a></li>
        <li><a>Bestanden</a></li>
    </ul>

    <?php echo $__env->yieldContent('content'); ?>
</div>
</body>
</html>
<?php /**PATH C:\Users\31641\Documents\GitHub\HealthyRegion\resources\views/layout.blade.php ENDPATH**/ ?>