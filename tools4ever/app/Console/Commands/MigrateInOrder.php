<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateInOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate_in_order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the migrations in the order specified in the file.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
public function handle()
{
    // Drop all tables first
    $this->call('db:wipe');

    // Migrations in order
    $migrations = [
        '0001_01_01_000000_create_users_table.php',
        '0001_01_01_000001_create_cache_table.php',
        '0001_01_01_000002_create_jobs_table.php',
        '2026_03_29_105206_create_product_table.php',
        '2026_03_29_105233_create_location_table.php',
        '2026_03_29_105222_create_storage_table.php',
    ];

    foreach ($migrations as $migration) {
        $path = 'database/migrations/' . $migration;

        $this->call('migrate', [
            '--path' => $path,
        ]);
    }

    $this->info('Migrations executed in specified order!');
}
} 
