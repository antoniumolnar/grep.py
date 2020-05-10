<?php

namespace App\Http\Controllers;

use App\UserDetails;
use App\User;
use Illuminate\Http\Request;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = UserDetails::all();

        return view('details.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $allUsers = User::all();
        return view('details.create', ['users' => $allUsers]);
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
            'nickname'=>'required',
            'description'=>'required',
            'gender'=>'required',
            'uploaded_file'=>'required'
        ]);

        $detail = new UserDetails([
            'user_id' => $request->get('user_id'),
            'nickname' => $request->get('nickname'),
            'description' => $request->get('description'),
            'uploaded_file' => $request->get('uploaded_file'),
            'gender' => $request->get('gender'),
        ]);
        $detail->save();
        return redirect('/details')->with('success', 'UserDetails saved!');
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
        $detail = UserDetails::find($id);
        return view('details.edit', compact('detail'));
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
            'nickname'=>'required',
            'description'=>'required',
            'gender'=>'required',
            'uploaded_file'=>'required'
        ]);

        $detail = UserDetails::find($id);
        $detail->user_id =  $request->get('user_id');
        $detail->nickname = $request->get('nickname');
        $detail->description = $request->get('description');
        $detail->uploaded_file = $request->get('uploaded_file');
        $detail->gender = $request->get('gender');
        $detail->save();

        return redirect('/details')->with('success', 'Details updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = UserDetails::find($id);
        $detail->delete();

        return redirect('/details')->with('success', 'User details deleted!');

    }
}
