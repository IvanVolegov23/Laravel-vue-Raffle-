<?php
  
namespace App\Http\Controllers;
  
use App\Models\User;
use App\Models\Raffle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
  
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(1000);
        $raffles = Raffle::latest()->paginate(1000);
  
        return view('user/index',compact('users', 'raffles'))
            ->with('i', (request()->input('page', 1) - 1) * 1000);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('user/create',compact('user'));
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
            'rafflename' => 'required',
            'raffleprice' => 'required',
            'rafflenumber' => 'required',
            'pincode' => 'required'
        ]);
  
        Raffle::create($request->all());
   
        return redirect()->route('user.index')
                        ->with('success','Data created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Models\User  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $raffle = Raffle::where('user_id', $user->id)->first();
        return view('user/edit',compact('raffle'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raffle $raffle)
    {
        $request->validate([
            'rafflename' => 'required',
            'raffleprice' => 'required',
            'rafflenumber' => 'required',
            'pincode' => 'required'
        ]);
        
        // $user->password = password_hash($user->password, PASSWORD_DEFAULT);
 
        DB::table('raffles')
            ->where('id', $raffle->id)
            ->update(['rafflename' => $request->rafflename,
                    'raffleprice' => $request->raffleprice,
                    'rafflenumber' => $request->rafflenumber,
                    'pincode' => $request->pincode
            ]);
        
        return redirect()->route('user.index')
                        ->with('success','Data updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Host  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        DB::table('raffles')
            ->where('user_id', $user->id)
            ->delete();
  
        return redirect()->route('user.index')
                        ->with('success','Data deleted successfully');
    }
}