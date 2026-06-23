<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\ExamType;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index() {
        $questions = Question::with('examType')->get();
        $examTypes = ExamType::all();
        return view('admin.questions.index', compact('questions', 'examTypes'));
    }

    public function store(Request $request) {
        Question::create($request->all());
        return redirect()->back()->with('success', 'Soal sukses dibuat.');
    }

    public function import(Request $request) {
        $request->validate(['file' => 'required|mimes:csv,txt']);

        $file = fopen($request->file('file')->getRealPath(), 'r');
        fgetcsv($file); // Lewati header

        while (($row = fgetcsv($file, 1000, ",")) !== FALSE) {
            Question::create([
                'exam_type_id'    => $row[0],
                'question_text'   => $row[1],
                'option_a'        => $row[2],
                'option_b'        => $row[3],
                'option_c'        => $row[4],
                'option_d'        => $row[5],
                'correct_answer'  => $row[6], // A/B/C/D
            ]);
        }
        fclose($file);
        return redirect()->back()->with('success', 'Soal sukses diimport.');
    }

    public function destroy(Question $question) {
        $question->delete();
        return redirect()->back()->with('success', 'Soal berhasil dihapus.');
    }
}
