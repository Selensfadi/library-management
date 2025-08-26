<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('author')->index();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->text('description')->nullable();
            $table->date('release_date')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->unsignedInteger('stock')->default(0);
            $table->string('cover_path')->nullable(); // صورة الكتاب
            $table->string('file_path')->nullable();  // ملف الكتاب (pdf/epub)
            $table->timestamps();
            $table->softDeletes();

            $table->index(['title']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('books');
    }
};

