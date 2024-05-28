<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasColumn('rooms', 'version')) {
            Schema::table('rooms', function (Blueprint $table) {
                $table->char('global_id', 36)->nullable()->unique()->after('id')->change();
                $table->integer('version')->default(1)->after('global_id')->change();
            });
        }

    }

};
