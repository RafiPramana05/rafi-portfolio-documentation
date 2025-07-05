<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('icon')->default('fas fa-graduation-cap');
            $table->string('gradient_from')->default('blue-500');
            $table->string('gradient_to')->default('purple-600');
            $table->json('tags')->nullable();
            $table->string('type')->default('project'); // project, experience, organization
            $table->string('duration')->nullable();
            $table->string('location')->nullable();
            $table->string('link')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
