<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class RefreshSingleTable extends Command
{
    protected $signature = 'migrate:refresh-table {table}';
    protected $description = 'Refresh a single database table';

    public function handle()
    {
        $table = $this->argument('table');
        
        if (!Schema::hasTable($table)) {
            $this->error("Table '{$table}' does not exist!");
            return;
        }

        // Get the migration file path
        $migrationFile = $this->findMigrationFile($table);
        
        if (!$migrationFile) {
            $this->error("Migration file for table '{$table}' not found!");
            return;
        }

        // Drop the table
        Schema::dropIfExists($table);
        
        // Reset migration for this table in migrations table
        DB::table('migrations')
            ->where('migration', 'like', "%{$table}%")
            ->delete();

        // Run the specific migration
        $this->call('migrate', [
            '--path' => "database/migrations/{$migrationFile}"
        ]);

        $this->info("Table '{$table}' has been refreshed successfully!");
    }

    private function findMigrationFile($table)
    {
        $files = glob(database_path('migrations/*create_'.$table.'_table.php'));
        return $files ? basename(end($files)) : null;
    }
}
