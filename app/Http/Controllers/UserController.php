<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('layouts.Users.index');
    }


    public function list()
    {
        $users = User::whereUserType(2)->get();
        return DataTables::of($users)
            ->editColumn('created_at',function ($row){
                return   Carbon::create($row->created_at)->format('Y-m-d');
            })
            ->addColumn('action',function ($users){
                $button='';
                $button.=' <a class="btn  btn-sm" href="'. url("user/edit".$users->id) .'"><i class="fas fa-edit"></i></a>';
                $button.='<a class="btn  delete btn-sm" onclick="delete_btn('.$users->id .')"><i class="fas fa-trash-alt"></i></a>';

                return $button;
            })->rawColumns(['action'])->make(true);
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
    }
}
