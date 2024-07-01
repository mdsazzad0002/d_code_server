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
        Schema::create('contribute_summaryes', function (Blueprint $table) {

            $table->id();
            $table->text('user_id')->nullable();
            $table->text('post')->nullable();
            $table->text('comment')->nullable();
           $table->bigInteger('upvote')->nullable();
           $table->bigInteger('downvote')->nullable();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('contribute_summaryes');
    }
};
