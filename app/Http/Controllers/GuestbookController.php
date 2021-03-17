<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guestbooks = \App\Guestbook::paginate(5);
        return $guestbooks->toJson();
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tujuan' => 'required',
            'nomerhp' => 'required',
        ]);

        $project = \App\Guestbook::create([
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'tujuan' => $validatedData['tujuan'],
            'nomerhp' => $validatedData['nomerhp'],
        ]);

        $msg = [
            'success' => true,
            'message' => 'New guest created successfully!'
        ];
    }

    public function getGuestbook($id)
    {
        $guestbook = \App\Guestbook::find($id);
        return $guestbook->toJson();
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tujuan' => 'required',
            'nomerhp' => 'required',
        ]);

        $guestbook = \App\Guestbook::find($id);
        $guestbook->nama = $validatedData['nama'];
        $guestbook->alamat = $validatedData['alamat'];
        $guestbook->tujuan = $validatedData['tujuan'];
        $guestbook->nomerhp = $validatedData['nomerhp'];
        $guestbook->save();

        $msg = [
            'success' => true,
            'message' => 'Guest Update successsfully!'
        ];

        return response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $guestbook = \App\Guestbook::find($id);
        if(!empty($guestbook)){
            $guestbook->delete();
            $msg = [
                'success' => true,
                'message' => 'Guest deleted successfully!',
            ];
            return response()->json($msg);
        }else{
            $msg = [
                'success' => false,
                'message' => 'Guest deleted failed!'
            ];
            return response()->json($msg);
        }
    }
}
