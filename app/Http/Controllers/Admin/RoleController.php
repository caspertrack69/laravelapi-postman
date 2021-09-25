<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware(['role:admin']);
    }


    public function index()
    {
        $pagename = 'Role';
        $role_permission = Role::with('permissions')-> get();
        return view('admin.role.index', compact('pagename', 'role_permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagename = 'Tambah Role';
        $allPermission=Permission::all();
        return view('admin.role.create', compact('pagename', 'allPermission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this-> validate($request,[
            'txtnama_role'=>'required',
            'optionid_permission'=>'required|array',
            'permission.*'=>'required|string'
        ]);[
            'txtnama_role.required' => "Nama Role Harus Diisi",
            'permission.required' => "Anda Harus Memilih Role Permission",
            'permission.*.required' => "Anda Harus Memilih Permission",

        ];

        $role=Role::create(['name'=> $request->input('txtnama_role')]);
        $role-> syncPermissions($request->input('optionid_permission'));

        return redirect()-> action('Admin\RoleController@index')->with('Sukses', 'Role Berhasil Dibuat');
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
        $pagename='Edit Role';
        $role=Role::find($id);
        $allPermission=Permission::all();
        $rolePermission=DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('admin.role.edit', compact('pagename', 'allPermission','role','rolePermission'));

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
        $this-> validate($request,[
            'txtnama_role'=>'required',
            'optionid_permission'=>'required|array',
            'permission.*'=>'required|string'
        ]);[
            'txtnama_role.required' => "Nama Role Harus Diisi",
            'permission.required' => "Anda Harus Memilih Role Permission",
            'permission.*.required' => "Anda Harus Memilih Permission",

        ];

        $role=Role::find($id);
        $role->name=$request->input('txtnama_role');
        $role->update();
        $role-> syncPermissions($request->input('optionid_permission'));

        return redirect()-> action('Admin\RoleController@index')->with('Sukses', 'Role Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=Role::find($id);
        $role->delete();
        return redirect()-> action('Admin\RoleController@index')->with('Sukses', 'Role Berhasil DiHapus');
    }
}
