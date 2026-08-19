<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $driver = DB::connection()->getDriverName();

        if (! in_array($driver, ['mysql', 'mariadb'], true) || Schema::hasTable('rs_posts')) {
            return;
        }

        $dumpPath = public_path('rstech.sql');

        if (! file_exists($dumpPath)) {
            throw new RuntimeException('WordPress dump not found at public/rstech.sql');
        }

        $pdo = DB::connection()->getPdo();
        $statement = '';

        $file = new SplFileObject($dumpPath);

        while (! $file->eof()) {
            $line = $file->fgets();
            $trimmed = trim($line);

            if ($trimmed === '' || str_starts_with($trimmed, '--')) {
                continue;
            }

            $statement .= $line;

            if (str_ends_with($trimmed, ';')) {
                try {
                    $pdo->exec($statement);
                } catch (Throwable $exception) {
                    throw new RuntimeException(
                        'WordPress SQL import failed near: '.substr($statement, 0, 500),
                        previous: $exception
                    );
                }

                $statement = '';
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('rs_postmeta');
        Schema::dropIfExists('rs_posts');
        Schema::dropIfExists('rs_options');
    }
};
