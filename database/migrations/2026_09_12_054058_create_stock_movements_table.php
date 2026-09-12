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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('part_id')->index()->constrained()->restrictOnDelete();
            $table->string('movement_type', 16);
            $table->integer('quantity');
            $table->string('reason', 32)->nullable();
            $table->timestampTz('created_at')->index();
        });
        DB::statement('ALTER TABLE stock_movements ADD CONSTRAINT stock_movements_quantity_check CHECK(quantity >= 1);');
        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT stock_movements_movement_type_check CHECK(movement_type IN('in', 'out'));");
        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT stock_movements_reason_not_blank_check CHECK(reason IS NULL OR btrim(reason, ' 　')  <>'');");
        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT stock_movements_reason_no_control_check CHECK(reason IS NULL OR reason !~ '[[:cntrl:]]');");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
