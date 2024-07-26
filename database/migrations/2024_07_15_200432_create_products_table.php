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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('features')->nullable()->after('description');
            $table->text('updates')->nullable()->after('features');
            $table->text('frameworks')->nullable()->after('updates');
            $table->double('price');
            $table->foreignId('platform_id')->constrained()->onDelete('cascade');
            $table->foreignId('temp_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('temp_types_related_to_id')->constrained()->onDelete('cascade');
            $table->integer('status')->default(1);
            $table->enum('is_featured', ['Yes','No'])->default('No');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
