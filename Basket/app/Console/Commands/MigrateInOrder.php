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
    protected $signature = 'Migrate in order';

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
            '2021_06_01_212808_create_members_table',
            '2021_05_30_071928_create_players_table',
            '2021_05_31_200659_create_coaches_table'
        ];
        foreach ($migrations as $migration){
            $basepath = 'database/migrations';
            $migration_name = trim($migration);
            $path = $basepath.$migration_name.'.php';
            $this->call('migrate:refresh', [
                '--path'=>$path
            ]);
        }
    }
}
