Schema::create('scores', function (Blueprint $table) {
    $table->id();
    $table->foreignId('student_id')->constrained()->onDelete('cascade');
    $table->foreignId('exam_type_id')->constrained()->onDelete('cascade');
    $table->integer('total_score');
    $table->timestamps();
});