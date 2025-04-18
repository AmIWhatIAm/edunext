<?

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Topic;

class StudentController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('student.main', compact('subjects'));
    }
}