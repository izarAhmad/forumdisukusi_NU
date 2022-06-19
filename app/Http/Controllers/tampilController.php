<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class tampilController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(){
        $pertanyaan = Pertanyaan::orderBy('created_at', 'desc')->paginate(5);
        $count = Pertanyaan::all();
         $jawaban = Jawaban::all();
        $user = User::where('id','!=', Auth::user()->id)->paginate();
        return view('user.index', compact('pertanyaan','user','jawaban','count'));
    }

    public function question(Request $request)
	{
		// menangkap data pencarian
        $question = $request->question;		
        
         $pertanyaan = Pertanyaan::orderBy('created_at', 'desc')
		->where('pertanyaan.judul','like',"%".$question."%")
		->paginate();
                $count = Pertanyaan::all();
                 $jawaban = Jawaban::all();
    		// mengirim data pegawai ke view index
		return view('user.index',compact('pertanyaan', 'count','jawaban'));
 
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        // dd(Crypt::decryptString($user->password));

        return view('admin.profile.edit', compact('user'));
    }

    
}
