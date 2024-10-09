<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('institusi__pendidikans', function (Blueprint $table) {
            $table->id("institution_id")->autoIncrement();
            $table->string("institution_name");
            $table->string("phone_number");
            $table->string("institution_email");
            $table->string("password");
            $table->string("confirm_pass");
            $table->string("institution_image");
            $table->foreignIdFor(Role::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institusi__pendidikans');
    }
};
