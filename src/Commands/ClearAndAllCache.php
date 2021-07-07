<?php
/**
 * Created by PhpStorm.
 * User: htinlynn
 * Date: 11/28/18
 * Time: 4:12 PM.
 */

namespace Genius\Commands;

use Arcanedev\Support\Bases\Command;
use Illuminate\Support\Facades\Artisan;

class ClearAndAllCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'all:clearandcache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ClearAll Cache And Cache All';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        $this->frame('All caches of config, route, view and cache are cleared.');
        $this->frame('And config cache');

        return 'Success';
    }
}
