<?php
  
namespace App\Http\Controllers;
  
use Auth;
use App\Models\Host;
use App\Models\Raffle;
use Illuminate\Http\Request;
  
class HostController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $products = Host::where('user_id', $id)->latest()->paginate(1000);
  
        return view('host/index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 1000);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('host/create');
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
            'name' => 'required',
            'statu' => 'required',
            'method' => 'required'
        ]);
  
        Host::create($request->all());
   
        return redirect()->route('hosts.index', ['id' => Auth::user()->id])
                        ->with('success','Data created successfully.');
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Host  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Host $product)
    {
        return view('host/edit',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Host  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Host $product)
    {
        $request->validate([
            'name' => 'required',
            'statu' => 'required',
            'method' => 'required'
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('hosts.index', ['id' => Auth::user()->id])
                        ->with('success','Data updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Host  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Host $product)
    {
        $product->delete();
  
        return redirect()->back()
                        ->with('success','Data deleted successfully');
    }
}