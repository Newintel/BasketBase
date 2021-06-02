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
    protected $signature = 'remigrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Executes the migrations in the right order so that there is no error';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $migrations = [
            'database/migrations/2014_10_12_000000_create_users_table.php',
            'database/migrations/2014_10_12_100000_create_password_resets_table.php',
            'database/migrations/2019_08_19_000000_create_failed_jobs_table.php',
            'database/migrations/2021_06_01_212808_create_members_table.php',
            'database/migrations/2021_05_30_071928_create_players_table.php',
            'database/migrations/2021_05_31_200659_create_coaches_table.php',
            'database/migrations/2021_06_02_133820_create_leagues_table.php',
            'database/migrations/2021_06_02_134524_create_awards_table.php',
        ];
        $this->call('db:wipe');
        foreach ($migrations as $migration){
            $this->call('migrate', [
                '--path'=>$migration
            ]);
        }
    }
}
