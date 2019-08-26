<?php
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

        class CreateSorularTagsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                //
                Schema::create('sorular_tags', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('sorular_id')->references ('id')->on('sorular');
                    $table->integer('tags_id')->references('id')->on('tags');
                    $table->timestamps();
                });
            }

            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                //
                Schema::drop('sorular_tags');

            }
        }





