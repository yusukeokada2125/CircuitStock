<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->foreignId('storage_id')->constrained()->restrictOnDelete();
            $table->string('part_name', 32);
            $table->string('model_number', 64);
            $table->integer('stock_quantity')->default(0);
            $table->timestampTz('created_at');
            $table->timestampTz('updated_at');
            $table->softDeletesTz('deleted_at');
        });
        DB::statement('ALTER TABLE parts ADD CONSTRAINT parts_stock_quantity_check CHECK(stock_quantity >= 0 AND stock_quantity <= 1000);');
        DB::statement('CREATE UNIQUE INDEX parts_user_name_model_unique ON parts(user_id,LOWER(part_name),LOWER(model_number))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parts');
    }
};
