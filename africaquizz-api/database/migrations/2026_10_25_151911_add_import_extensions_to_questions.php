<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        // Activer pg_trgm pour la recherche floue
        DB::statement('CREATE EXTENSION IF NOT EXISTS pg_trgm');
        // Index unique partiel sur external_id (autorise plusieurs NULL)
        DB::statement('CREATE UNIQUE INDEX IF NOT EXISTS questions_external_id_unique ON questions (external_id) WHERE external_id IS NOT NULL');
        // Index trigram sur question_translations.text (recherche floue)
        DB::statement('CREATE INDEX IF NOT EXISTS qtrans_text_trgm ON question_translations USING GIN (text gin_trgm_ops)');
    }
    public function down(): void {
        DB::statement('DROP INDEX IF EXISTS questions_external_id_unique');
        DB::statement('DROP INDEX IF EXISTS qtrans_text_trgm');
    }
};