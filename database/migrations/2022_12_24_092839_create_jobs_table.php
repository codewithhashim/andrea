<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->boolean('open')->default(true);
            $table->string('company');
            $table->string('avatar');
            $table->string('location');
            $table->string('jobTitle');
            $table->string('description');
            $table->string('slug')->unique();
            $table->string('jobType');
            $table->string('salary');
            $table->string('employmentType');
            $table->string('experience');
            $table->string('jobLevel');
            $table->string("category");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
