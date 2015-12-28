<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $tables = [
        'users',
        'categories'
    ];

    protected $seeders = [
        'UsersTableSeeder',
        'CategoriesTableSeeder'
    ];

    public function run()
    {
        Model::unguard();
        $this->disableForeignKeyCkecks();
        $this->cleanDatabase();
        $this->seedTables();
        $this->enableForeignKeyChecks();
        Model::reguard();
    }

    public function cleanDatabase()
    {
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }
    }

    public function seedTables()
    {
        foreach ($this->seeders as $seeder) {
            $this->call($seeder);
        }
    }

    private function disableForeignKeyCkecks()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    }

    private function enableForeignKeyChecks()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
