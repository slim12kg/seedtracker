<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('user_type')->default('seed company');
            $table->string('password');
            $table->boolean('registered')->default(0);
            $table->string('gender')->nullable();
            $table->string('profile_image')->default('storage/profile/avatar.png');
            $table->string('profession')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'firstname' => 'NST',
            'lastname' => 'DG',
            'phone' => '08100000001',
            'email' => 'aprimenexus@gmail.com',
            'user_type' => 'super admin',
            'password' => bcrypt('abcd1234'),
        ]);

        DB::table('users')->insert([
            'firstname' => 'NST',
            'lastname' => 'personnel',
            'phone' => '08100000002',
            'email' => 'nst@seedtracker.org',
            'user_type' => 'admin',
            'password' => bcrypt('abcd1234'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
