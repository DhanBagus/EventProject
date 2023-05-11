<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\Partisipans;
use Illuminate\Http\Request;

class EventController extends Controller
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


    //
    public function index()
    {
        $events = Events::latest()->get();
        // echo"hallo";
        return view('Event.index', compact('events'));
        // return view('Event.index', compact('Event'));
    }

    public function create()
    {
        return view('event.create');
    }

    public function store(Request $request)
    {

        // echo "ok berhasil ke store";
        $this->validate($request, [
            'title' => 'required|string|max:155',
            'date' => 'required',
            'jum_peserta' => 'required'
        ]);

        $event = Events::create([
            'title' => $request->title,
            'date' => $request->date,
            'jum_peserta' => $request->jum_peserta,
            'harga' => $request->harga,
            
        ]);

        if ($event) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'New post has been created successfully'
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

    public function edit($id){
        $event = Events::findOrFail($id);
        return view('event.edit', compact('event'));

    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string|max:155',
            'date' => 'required',
            'jum_peserta' => 'required',
            'harga' => 'required'
        ]);

        $event = Events::findOrFail($id);

        $event->update([
            'title' => $request->title,
            'date' => $request->date,
            'jum_peserta' => $request->jum_peserta,
            'harga' => $request->harga
        ]);

        if ($event) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Event has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function destroy($id){
        $event = Events::findOrFail($id);
        $event->delete();

        if ($event) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Event has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('home')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }

    public function show($id){
        $data['event'] = Events::findOrFail($id);
        $data['partisipan']=Partisipans::where('id_event', $id)->get();
        $data['jum_partisipan']=Partisipans::where('id_event',$id)->get()->count();

        return view('Event.show', compact('data'));
    }
}
