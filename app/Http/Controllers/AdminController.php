<?php

namespace App\Http\Controllers;
use App\Models\admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index () {
        return view('admin.administradores.index' , ['allAdministrador'=>admin::all ()]);
    }

    public function create(){
        return view('admin.administradores.create');
    }

    public function store (Request $request){
        admin::create($request->all());
        return redirect('/admin/administradores');

    }

    public function destroy (admin $admin) {
        $admin ->delete();
        return redirect('/admin/administradores');

    }

    public function edit(admin $admin) {
        return view('admin.administradores.edit', ['admin' => $admin]);
    }

    public function update(admin $admin, Request $request) {
        $admin->update($request->all());
        return redirect('/admin/administradores');
    }
}
