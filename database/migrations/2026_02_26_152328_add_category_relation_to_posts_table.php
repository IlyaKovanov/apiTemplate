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
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')
                ->nullable()
                ->after('is_published');

            $table->index('category_id', 'posts_category_id_idx');

            $table->foreign('category_id', 'posts_category_id_fk')
                ->on('categories')
                ->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('fk_posts_category');
            $table->dropIndex('fk_posts_category_id');
            $table->dropColumn('category_id');
        });
    }
};
