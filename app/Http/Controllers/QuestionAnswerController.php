<?php
/**
 * Controller : QuestionAnswerController.
 *
 * This file used to handle QuestionAnswer
 *
 * @author Sumesh K V <sumeshvasu@gmail.com>
 *
 * @version 1.0
 */
namespace App\Http\Controllers;

use App\Models\QuestionAnswer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class QuestionAnswerController extends Controller
{
    /**
     * List.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $list = QuestionAnswer::with('user')->get();

        return view('question_answer.list', ['list' => $list]);
    }

    /**
     * Create question & answer.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('question_answer.create');
    }

    /**
     * Store question & answer.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'question' => 'required|unique:question_answers|max:1000',
            'option_a' => 'required|max:500',
            'option_b' => 'required|max:500',
            'option_c' => 'required|max:500',
            'option_d' => 'required|max:500',
            'answer' => 'required|max:10',
        ]);

        QuestionAnswer::create([
            'user_id' => Auth::id(),
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'answer' => $request->answer,
        ]);

        return redirect()->back()->with('message', "Question and answers stored successfully!");
    }
}
