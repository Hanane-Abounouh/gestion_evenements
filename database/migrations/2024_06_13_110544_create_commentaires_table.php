<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the table already exists
        if (!Schema::hasTable('commentaires')) {
            Schema::create('commentaires', function (Blueprint $table) {
                $table->id();
                $table->text('texte');
                // Colonne date avec l'heure actuelle par défaut
                $table->timestamp('date')->useCurrent();
                $table->unsignedBigInteger('id_user');
                $table->unsignedBigInteger('id_event');
                // Ensure these columns and tables exist before referencing them
                $table->foreign('id_event')->references('id')->on('events')->onDelete('cascade');
                $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
                // Colonnes timestamps pour created_at et updated_at
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Supprimer la table si elle existe
        Schema::dropIfExists('commentaires');
    }
}

