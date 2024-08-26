<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartApplication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start';

    protected $description = 'Start the application by migrating and seeding';

    public function handle()
    {
        $this->call('migrate:fresh');
        $this->call('db:seed');
        $this->call('queue:work', [
                   '--stop-when-empty' => true,
         ]);
        $this->call('serve');

        $this->info('Application has been started successfully with fresh migrations and seeders.');
    }
}
