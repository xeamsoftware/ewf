@include('vendor/autoload.php')
@servers(['localhost' => '127.0.0.1'])

@task('deploy', ['on' => 'localhost'])
cd /var/www/html/ewf
php artisan migrate
@endtask
