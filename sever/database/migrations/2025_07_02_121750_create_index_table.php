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
            $table->unsignedBigInteger('user_id'); // khóa phụ

            $table->foreign('parent_id')->references('id')->on('organizations')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // TEAM
        Schema::create('teams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('founded_year');
            $table->string('home_city');
            $table->uuid('organization_id');
            $table->unsignedBigInteger('user_id'); // khóa phụ

            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // PLAYER
        Schema::create('players', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('full_name');
            $table->date('birth_date');
            $table->string('nationality');
            $table->string('position'); // GK, DF, MF, FW
            $table->uuid('team_id');
            $table->unsignedBigInteger('user_id'); // khóa phụ

            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // MATCH FORMAT
        Schema::create('match_formats', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name'); // League, Knockout, Group Stage
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
            $table->unsignedBigInteger('user_id'); // khóa phụ

            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('match_format_id')->references('id')->on('match_formats')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // PARTICIPATION
        Schema::create('participations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('team_id');
            $table->uuid('tournament_id');

            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
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

            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->foreign('home_team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('away_team_id')->references('id')->on('teams')->onDelete('cascade');
        });

        // MATCH EVENT
        Schema::create('match_event', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('match_id');
            $table->integer('minute');
            $table->string('type'); // goal, yellow_card, red_card, etc.
            $table->uuid('player_id');
            $table->uuid('team_id');

            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // MATCH EVENT
        Schema::table('match_event', function (Blueprint $table) {
            $table->dropForeign(['match_id']);
            $table->dropForeign(['player_id']);
            $table->dropForeign(['team_id']);
        });
        Schema::dropIfExists('match_event');

        // MATCH
        Schema::table('matches', function (Blueprint $table) {
            $table->dropForeign(['tournament_id']);
            $table->dropForeign(['home_team_id']);
            $table->dropForeign(['away_team_id']);
        });
        Schema::dropIfExists('matches');

        // PARTICIPATION
        Schema::table('participations', function (Blueprint $table) {
            $table->dropForeign(['team_id']);
            $table->dropForeign(['tournament_id']);
        });
        Schema::dropIfExists('participations');

        // TOURNAMENT
        Schema::table('tournaments', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->dropForeign(['match_format_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('tournaments');

        // MATCH FORMAT
        Schema::dropIfExists('match_formats');

        // PLAYER
        Schema::table('players', function (Blueprint $table) {
            $table->dropForeign(['team_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('players');

        // TEAM
        Schema::table('teams', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('teams');

        // ORGANIZATION
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('organizations');
    }

};
