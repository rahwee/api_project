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
        if (!Schema::hasTable("orders"))
        {
            Schema::create('orders', function (Blueprint $table) {
                $table->id('id');
                $table->char('global_id', 36)->nullable()->unique();
                $table->integer('version')->default(1);
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('room_id');
                $table->decimal('quantity')->unsigned();
                $table->enum('status', ['CANCELLED','PENDING','DONE']);
                $table->integer('unit_price');
                $table->integer('price');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
                $table->softDeletes();
                $table->foreign(['user_id'])->references(['id'])->on('users')->onDelete('CASCADE');
                $table->foreign(['room_id'])->references(['id'])->on('rooms')->onDelete('CASCADE');
            });
        }
    }

};
