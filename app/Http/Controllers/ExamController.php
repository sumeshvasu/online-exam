<?php
/**
 * Controller : ExamController.
 *
 * This file used to handle Exam
 *
 * @author Sumesh K V <sumeshvasu@gmail.com>
 *
 * @version 1.0
 */
namespace App\Http\Controllers;

use App\Models\ExamResult;
use App\Models\QuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExamController extends Controller
{
    /**
<<<<<<< HEAD
     * Exam form.
=======
     * Display the loan details page.
>>>>>>> 6ef3b9fdcc159c713462255e3d360082ac26b8e5
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $list = QuestionAnswer::select(['id', 'question', 'option_a', 'option_b', 'option_c', 'option_d'])->get();

        return view('exam.form', ['list' => $list]);
    }

    /**
     * Validate user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function validateUser(Request $request)
    {
        $user = ExamResult::select(['email'])->where('email', $request->email)->get();

        if (count($user) == 1) {
            return 'invalid';
        } else {
            return 'valid';
        }
    }

    /**
     * Validate exam.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function validateExam(Request $request)
    {
        $answers = [];
        $keyAnswers = [];

        $list = QuestionAnswer::get();

        $totalScore = $list->count();
        $score = 0;

        $answers['name'] = 'required';
        $answers['email'] = 'required|email';

        foreach ($list as $row) {
            $answers['question_' . $row->id] = 'required';
            $keyAnswers[$row->id] = $request['question_' . $row->id];

            if ($request['question_' . $row->id] == $row->answer) {
                $score++;
            }
        }

        $request->validate($answers);

        ExamResult::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'question_answer' => json_encode($keyAnswers),
            'score' => $score,
            'total_score' => $totalScore,
        ]);

        return redirect()->back()->with('message', 'Exam successfully finished & Your exam score is ' . $score . ' / ' . $totalScore);
    }

    /**
     * Score.
     *
     * @return \Illuminate\View\View
     */
    public function score()
    {
        $score = ExamResult::get();

        return view('exam.score', ['score' => $score]);
    }
}
