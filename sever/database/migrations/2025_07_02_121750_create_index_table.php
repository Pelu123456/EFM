<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ORGANIZATION
        Schema::create('organizations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('level'); // 0=FIFA, 1=Confed, 2=League, 3=Club
            $table->uuid('parent_id')->nullable();
            $table->unsignedBigInteger('user_id'); 
        });

        // TEAM
        Schema::create('teams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('founded_year');
            $table->string('home_city');
            $table->uuid('organization_id');
            $table->unsignedBigInteger('user_id'); 
        });

        // PLAYER
        Schema::create('players', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('full_name');
            $table->date('birth_date');
            $table->string('nationality');
            $table->string('position'); // GK, DF, MF, FW
            $table->uuid('team_id');
            $table->unsignedBigInteger('user_id'); 
        });

        // MATCH FORMAT
        Schema::create('match_formats', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name'); 
            $table->json('rules_json')->nullable();
        });

        // TOURNAMENT
        Schema::create('tournaments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->uuid('organization_id');
            $table->uuid('match_format_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('user_id'); 
        });

        // PARTICIPATION
        Schema::create('participations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('team_id');
            $table->uuid('tournament_id');
        });

        // MATCH
        Schema::create('matches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tournament_id');
            $table->timestamp('match_date');
            $table->uuid('home_team_id');
            $table->uuid('away_team_id');
            $table->integer('home_score')->default(0);
            $table->integer('away_score')->default(0);
        });

        // MATCH EVENT
        Schema::create('match_event', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('match_id');
            $table->integer('minute');
            $table->string('type'); // goal, yellow_card, red_card, etc.
            $table->uuid('player_id');
            $table->uuid('team_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('match_event');
        Schema::dropIfExists('matches');
        Schema::dropIfExists('participations');
        Schema::dropIfExists('tournaments');
        Schema::dropIfExists('match_formats');
        Schema::dropIfExists('players');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('organizations');
    }

};

