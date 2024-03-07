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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->text('desc');
            $table->text('smalldesc');
            $table->string('image')->nullable();
            $table->decimal("price",8,2);
            $table->foreignId("user_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("category_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
