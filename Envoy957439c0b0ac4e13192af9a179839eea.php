 <?php require_once('vendor/autoload.php'); ?>
<?php $__container->import('vendor/package/Envoy.blade.php', get_defined_vars()); ?>

<?php $__container->servers(['localhost' => '127.0.0.1']); ?>

<?php $__container->startTask('deploy', ['on' => 'localhost']); ?>
cd /var/www/html/ewf
php artisan migrate
<?php $__container->endTask(); ?>
