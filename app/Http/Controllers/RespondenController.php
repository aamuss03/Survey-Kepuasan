<?php

namespace App\Http\Controllers;

use App\Models\responden;
use Illuminate\Http\Request;


class RespondenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->has('current_user_id')){
            return redirect()->route('survey.page')->with('error, session sudah ada');
        }

        return view('responden');
    }

    public function store(Request $request)
    {

        
        $request->validate([
            'Nama' => 'required',
            'Satker' => 'required',
            'userid' => 'required'
        ]);


        $data = [
            'Nama' => $request->input('Nama'),
            'Satker' => $request->input('Satker'),
            'User_id' => $request->input('userid')
        ];

        $responden = responden::where('User_id', $request->userid)->first();

        if ($responden) {
            session(['current_user_id' => $responden->User_id]);
            return redirect()->route('survey.page');
        } else {
            $newResponden = responden::create($data);
            session(['current_user_id' => $newResponden->User_id]);
            return redirect()->route('survey.page');
        }
    }
}
