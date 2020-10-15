<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submission', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('academic_year_id');
            $table->tinyInteger('faculty_id');
            $table->tinyInteger('user_id');
            $table->string('article');
            $table->string('image');
            $table->text('comment')->nullable();
            $table->date('submission_date');
            $table->date('add_date');
            $table->date('update_date')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submission');
    }
}
