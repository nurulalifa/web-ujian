namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Score;

class ScoreController extends Controller
{
    public function index() {
        // Mengambil semua nilai beserta data siswa dan jenis ujiannya
        $scores = Score::with(['student.school', 'examType'])->orderBy('total_score', 'desc')->get();
        return view('admin.scores.index', compact('scores'));
    }
}