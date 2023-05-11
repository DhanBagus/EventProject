<?php

namespace App\Http\Controllers;
use App\Models\Partisipans;
use Illuminate\Http\Request;

class PartisipanController extends Controller
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
        //
        // $partisipan=DB::table('partisipan')->where('id', $id);
        // $partisipan = Partisipan::latest()->get();
        // echo $id;
        $data['partisipan']=Partisipans::where('id_event', $id)->get();
        $data['id_event']=$id;
        
        return view('partisipan.index', compact('data'));

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
        //
        $this->validate($request, [
            'nama' => 'required|string|max:155',
            'kontak' => 'required',
            'keterangan' => 'required',
            'id_event' => 'required'
        ]);

        $partisipan = Partisipans::create([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'keterangan' => $request->keterangan,
            'id_event' => $request->id_event,
            
        ]);
        $id=$request->id_event;
        if ($partisipan) {
            return redirect()
                ->route('partisipan',$id)
                ->with([
                    'success' => 'New partisipan has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $partisipan=Partisipans::where('id', $id)->get();

        $partisipan = Partisipans::findOrFail($id);
        $partisipan->delete();
    
        if ($partisipan) {
            return redirect()
                ->route('partisipan',$partisipan->id_event)
                ->with([
                    'success' => 'Partisipan has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('partisipan',$id_event)
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
        
    }
}
