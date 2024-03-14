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
        Schema::create(Table::MENUS->value, function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("label");
            $table->string("url")->default("#");
            $table->string("route_name")->nullable();
            $table->string("icon")->nullable();
            $table->uuid("parent_id")->nullable();
            $table->string("permission_name")->nullable();
            $table->integer("level")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Table::MENUS->value);
    }
};
