<?php

namespace App\Http\Controllers;

use App\Userlist;
use App\Temp;
use Illuminate\Http\Request;
use App\Imports\UserlistImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;


class UserlistController extends Controller
{

    public function index()
    {
        $userlist = Userlist::all();
        if (!empty($userlist)) {
        $getuser = Userlist::get()->toArray();
        DB::table('temp')->truncate();
            foreach ($getuser as $q) 
            {
                Temp::insert($q);
            }
        }
        return view('userlist.index', ['userlist' => $userlist]);
    }

    public function upload()
    {
        return view ('userlist.upload');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
            ]);
     
            if ($file = file($request->file->getRealPath())) {
                try {
                    DB::table('userlisting')->truncate();
                    Excel::import(new UserlistImport,request()->file('file'));

                } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                    $failures = $e->failures();
                    // dd($e);
                } catch (\Illuminate\Validation\ValidationException $e) {
                    // dd($e);
                    $failures = $e->validator->messages();
                    // dd($failures);
                    return view('userlist.upload', compact('failures'));
                } 
                catch (\Exception $e) {
                    $error = $e->getMessage();
                    $getuser = Temp::get()->toArray(); // Cek User
                        foreach ($getuser as $q) 
                        {
                            Userlist::insert($q);
                        }
                    return redirect()->back()->with(['error' => $error]);
                }
                return redirect()->back()->with(['success' => 'File successfully uploaded']);
            } 
            return redirect()->back()->with(['error' => 'Failed to upload file']);
    }

    public function show(Userlist $userlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Userlist  $userlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Userlist $userlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Userlist  $userlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userlist $userlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Userlist  $userlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userlist $userlist)
    {
        //
    }
}
