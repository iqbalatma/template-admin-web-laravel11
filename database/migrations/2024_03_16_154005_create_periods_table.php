<?php

use App\Enums\Table;
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
        Schema::create(Table::PERIODS->value, function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name");
            $table->integer("quota");
            $table->timestamp("start_date");
            $table->timestamp("end_date");
            $table->boolean("is_active")->default('false');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Table::PERIODS->value);
    }
};
