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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("image")->nullable();
            $table->string("email");
            $table->string("phone")->nullable();
            $table->string("city")->nullable();
            $table->string("resume")->nullable();
            $table->json("languages")->nullable();
            $table->json("questions")->nullable();
            $table->json("prev_job")->nullable();
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
        Schema::dropIfExists('profiles');
    }
};
