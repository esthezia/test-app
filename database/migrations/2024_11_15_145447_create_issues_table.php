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
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_opener');
            $table->unsignedBigInteger('id_assignee');
            $table->unsignedTinyInteger('id_department');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->enum('status', ['open', 'assigned', 'resolved', 'closed'])->default('open');
            $table->timestamps(); // 'created_at' and 'updated_at'
            $table->timestamp('resolved_at')->nullable();
            $table->softDeletes('deleted_at');

            $table->foreign('id_department')
                  ->references('id')
                  ->on('departments')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
