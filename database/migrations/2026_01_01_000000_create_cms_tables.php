<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key', 120)->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 160)->unique();
            $table->string('badge')->nullable();
            $table->string('title_line1');
            $table->string('title_line2')->nullable();
            $table->text('tagline')->nullable();
            $table->string('list_title')->nullable();
            $table->text('list_items')->nullable();
            $table->string('stack_label')->nullable();
            $table->text('stack_text')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->text('overview_title')->nullable();
            $table->text('overview_body1')->nullable();
            $table->text('overview_body2')->nullable();
            $table->string('cards_section_title')->nullable();
            $table->string('cta_title1')->nullable();
            $table->string('cta_title2')->nullable();
            $table->text('cta_subtitle')->nullable();
            $table->string('cta_button_text')->nullable();
            $table->text('summary')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('published')->default(true);
            $table->timestamps();
        });

        Schema::create('service_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->string('icon', 60)->default('code');
            $table->string('title');
            $table->text('body')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->text('bio')->nullable();
            $table->text('photo_url')->nullable();
            $table->string('linkedin')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('published')->default(true);
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('excerpt')->nullable();
            $table->text('body')->nullable();
            $table->string('tag', 120)->nullable();
            $table->string('cover_style', 60)->default('gradient-a');
            $table->boolean('published')->default(true);
            $table->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->boolean('read')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('service_cards');
        Schema::dropIfExists('services');
        Schema::dropIfExists('settings');
    }
};
