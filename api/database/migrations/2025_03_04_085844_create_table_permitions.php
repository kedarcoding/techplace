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
        Schema::create('permitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles'); // Role ID (admin, hr, etc.)
            $table->foreignId('screen_id')->constrained('screens'); // Screen ID
            $table->morphs('permissionable'); // Polymorphic relation (could be Recruiter or SiteOwner)
            $table->enum('permission_type', ['view', 'edit', 'create', 'delete']); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permitions');
    }
};
