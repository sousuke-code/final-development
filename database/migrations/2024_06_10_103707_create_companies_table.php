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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('company_img')->nullable();
            $table->string('introduction_text')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table  ->string('image')->nullable();
            $table ->string('employees')->nullable();
            $table ->string('age')->nullable();
            $table ->string('year')->nullable();
            $table ->string('capital')->nullable();
            $table ->string('salary')->nullable();
            $table ->string('holiday')->nullable();
            $table ->string('welfare')->nullable();
            $table ->string('company')->nullable();
            $table ->string('access')->nullable();
            $table ->string('body')->nullable();
            $table ->string('address')->nullable();
            $table ->string('working')->nullable();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};


