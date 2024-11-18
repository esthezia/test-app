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
        Schema::create('issue_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_issue');
            $table->unsignedBigInteger('id_commenter');
            $table->text('comment');
            $table->timestamp('created_at')->default(\DB::raw('NOW()'));

            $table->foreign('id_issue')
                  ->references('id')
                  ->on('issues')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('id_commenter')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_comments');
    }
};
