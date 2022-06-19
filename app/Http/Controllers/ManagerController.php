<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index ()
   {
       
   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $profile = new Profile;

        $user = new User;
        $user->role = 'users';
        $user->name = $request->username; // mengambil dari requst name="nama
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        // avatar
        // untuk mengambil id dari user id

        $request->request->add(['user_id' => $user->id]);
        $profile = Profile::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
            $profile->foto = $request->file('foto')->getClientOriginalName();
            $profile->save();
        }
        Alert::success('Berhasil', 'Profile & user Berhasil di tambahkan');
        return redirect('/profile')->with('sukses','data anda berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        

        return view('user.manager', compact('user'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            
            'foto' =>  'required'
        ]);
    if ($request->hasFile('foto')) {
        $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
        Profile::where('user_id', $id)
            ->update(['nama_lengkap' => $request->nama_lengkap, 'foto' => $request->file('foto')->getClientOriginalName()]);
        // table user
        User::where('id', $id)
            ->update(['name' => $request->username, 'email' => $request->email, ]);

    }else{
            Alert::eror('gagal', 'Profile gagal di update');
            return redirect('/forum')->with('eror', 'data anda gagal di update');
    }
        Alert::success('Berhasil', 'Profile berhasil di update');
        return redirect('/forum')->with('sukses', 'data anda berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
