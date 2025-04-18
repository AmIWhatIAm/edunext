<?

namespace App\Http\Controllers;

use Illumminate\Http\Request;
use App\Models\Subject;
use App\Models\Topic;

class TeacherController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('teacher.main', compact('subjects'));
    }

    public function getTopics($id)
    {
        $topics = Topic::where('subject_id', $id)->get();
        return response()->json($topics);
    }

    public function getTopicContent($id)
    {
        $topic = Topic::find($id);
        return response()->json($topic);
    }
}