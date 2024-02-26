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
use Illuminate\View\View;

class QuestionAnswerController extends Controller
{
    /**
     * Display the loan details page.
     *
     * @param int $emi
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $list = QuestionAnswer::with('user')->get();

        return view('question_answer.list', ['list' => $list]);
    }

    public function create()
    {
        return view('question_answer.create');
    }

    public function store()
    {

    }
}
