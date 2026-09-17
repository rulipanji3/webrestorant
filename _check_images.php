<?php

use App\Models\MenuItem;
use Illuminate\Contracts\Console\Kernel;

$_SERVER['APP_ENV'] = 'local';
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$items = MenuItem::select('name', 'image', 'image_url')->get();
foreach ($items as $i) {
    echo $i->name.' => image: '.($i->image ?? '-').', image_url: '.($i->image_url ?? '-').PHP_EOL;
}
