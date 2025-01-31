<?php

namespace App\Http\Controllers;

use App\Models\answer;
use App\Models\question;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        if (!session()->has('current_user_id')){
            return redirect()->route('home')->with('error, session tidak ditemukan');
        }

        $questions = question::orderBy('Order_Question')->get();
        return view('survey', compact('questions'));
    }

    public function store(Request $request)
    {
        $answers = implode(',', $request->answers);
        $userId = session('current_user_id');

        answer::create([
            'ID_RESPONDEN' => $userId,
            'ANSWER_QUESTION' => $answers,
            'FEEDBACK' => $request->input('feedback'),
            'ANSWERED_AT' => now(),
        ]);

        $request->session()->forget('current_user_id');

        return redirect('/')->with('success', 'Terima kasih sudah mengisi kuisioner!');
    }
}
