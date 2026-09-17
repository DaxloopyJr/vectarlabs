<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('about:vectarlabs', function () {
    $this->info('Vectarlabs CMS — Laravel 11 + Bootstrap 5 + MySQL');
});
