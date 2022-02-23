<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $groups = Group::whereAdminId(Auth::id())->get();

         return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'title'             => 'required',
            'image'             => 'mimes:jpg,jpeg,png,bmp',
        ]);

        $group = new Group();
        $group->title     =   $request->get("title");

        if ($request->hasFile('image')) {
            $photo              =   $request->file('image');
            $fileExtension      =   $photo->getClientOriginalExtension();
            $fileName           =   time() . '.' . $fileExtension;
            $filePath           =   $request->file('image')->storeAs('group-icons', $fileName, 'public');

            $group->image       =   $fileName;
        }
        $group->admin_id        =   Auth::id();
        $group->save();

        return redirect()->back()->with('success', 'Group created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groups = Group::whereAdminId(Auth::id())->get();

        $selectedGroup = Group::findOrFail($id);

        return view('groups.show', compact('groups','selectedGroup'));
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
    }

    public function addFriends(Request $request){
        return 1;
    }
}
