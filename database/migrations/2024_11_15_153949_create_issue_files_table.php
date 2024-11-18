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
        Schema::create('issue_files', function (Blueprint $table) {
            $table->unsignedBigInteger('id_issue');
            $table->string('file_name', 100);

            $table->primary(['id_issue', 'file_name']);

            $table->foreign('id_issue')
                  ->references('id')
                  ->on('issues')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_files');
    }
};
