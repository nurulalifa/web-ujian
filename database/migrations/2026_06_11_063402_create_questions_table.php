Schema::create('questions', function (Blueprint $table) {
    $table->id();
    $table->foreignId('exam_type_id')->constrained()->onDelete('cascade');
    $table->text('question_text');
    $table->text('option_a');
    $table->text('option_b');
    $table->text('option_c');
    $table->text('option_d');
    $table->char('correct_answer', 1); // A, B, C, atau D
    $table->timestamps();
});