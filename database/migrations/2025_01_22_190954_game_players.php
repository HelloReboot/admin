<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('game_players', function (Blueprint $table) {
            $table->bigIncrements('id')->startingValue(10000)->primary();
            $table->uuid('mid')->default(DB::raw('uuid_generate_v4()'));
            $table->string('name');
            $table->string('mobile')->nullable();
            $table->char('password', 64);
            $table->string('unionid')->nullable();
            $table->string('openid')->nullable();
            $table->boolean('status')->comment("用户状态1 正常 0:冻结")
                ->default(1);
            $table->timestamps();
        });
        DB::statement("ALTER TABLE game_players
                                ADD CONSTRAINT check_unionid_mobile_not_null
                                CHECK (
                                NOT (
                                        (mobile IS NULL AND unionid IS NULL) OR
                                        (mobile = '' AND unionid = '')
                    ))");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_players');
        DB::statement('DROP EXTENSION IF EXISTS "uuid-ossp";');
    }
};
