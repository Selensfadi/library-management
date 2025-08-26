<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('book_id')->constrained()->cascadeOnDelete();
            $table->decimal('price', 10, 2);
            $table->timestamp('ordered_at')->nullable();
            $table->string('status')->default('paid'); // paid|refunded ...
            $table->boolean('emailed')->default(false);
            $table->timestamps();

            $table->index(['user_id', 'book_id']);
            // لمنع تكرار شراء نفس الكتاب لنفس المستخدم:
            // $table->unique(['user_id', 'book_id']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('orders');
    }
};
