<?php

use App\Models\User;
use App\Models\UserRole;
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

        Schema::create('users', function (Blueprint $table) {
            $table->id();  // Primary key 'id'
            $table->unsignedBigInteger('role_id')->nullable();  

            $table->text('image')->default(asset('/image/default/user.png'));
            $table->string('displayName')->default('Anonymous');
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            

            $table->string('provider')->nullable();// Google / Facebook / none
            $table->string('providerId')->nullable();// unique id by provider
            $table->string('email')->unique();
            $table->string('password')->nullable();//nullable for social provider login e.g fb or goolge
            
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('role_id')
                  ->references('id')
                  ->on('user_roles')
                  ->onDelete('cascade'); // Define behavior on delete
        });
        UserRole::create([
            'name'=>'user'
        ]);
        UserRole::create([
            'name'=>'admin'
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'admin',
            'email' => 'admin@pustok.com',
            'password' => bcrypt('admin@pustok'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
