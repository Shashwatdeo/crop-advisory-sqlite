<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageUrlToCropSuggestionsTable extends Migration
{
    public function up()
    {
        Schema::table('crop_suggestions', function (Blueprint $table) {
            $table->string('image_url')->nullable(); // Add nullable so it's optional
        });
    }

    public function down()
    {
        Schema::table('crop_suggestions', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });
    }
}
