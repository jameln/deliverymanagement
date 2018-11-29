<?php

namespace App\Http\Controllers;

use App\Permission_object;
use App\Role;
use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Settings $Settings)
    {
        $settingsbyname = $Settings::all(['name','value'])->keyBy('name')->toArray();

        return view('settings/manage',array('settings'=> $settingsbyname) );
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $Settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings)
    {
        if(!has_permission_slug('parametres-generaux_edit')){
            return redirect('404');
        }
        $settings_data = $request->input('settings');
        foreach($settings_data as $name => $value){
            $settings::where('name',$name)->update(['value'=>$value]);
        }
        return redirect()->route('settings.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }


    public function roles(){
        $roles = Role::all();
        return view('settings/role/manage',array('roles'=> $roles) );
    }

    public function roles_add( Request $request){
        if(!has_permission_slug('parametres-roles_add')){
            return redirect('404');
        }
        $role = new \App\Role;
        $role->name = $request->input('roles_add_name');
        $role->description = $request->input('roles_add_description');
        $role->save();
        //flash(__('global.creation_success'))->success();
        return redirect(route('settings.roles'));
    }

    public function roles_edit($id){

        $role = \App\Role::find($id)->permissions();
        $objects = \App\Permission_object::all();

        return view('settings/role/edit',array(
            'role'=> $role,
            'objects'=> $objects
        ) );
    }

    public function roles_update(Request $request, $id){

        if(!has_permission_slug('parametres-roles_edit')){
            return redirect('404');
        }
        $role = \App\Role::find($id);

        if($request->roles_edit_name){
            $role->update(['name'=>$request->roles_edit_name]);
        }
        if($request->roles_edit_description){
            $role->update(['description'=>$request->roles_edit_description]);
        }
        if($role->id != 1 && $request->permissions){ //is non superadmin
            foreach ($request->permissions as $slug => $permission){
                if($permission['id'] == 0){
                    $permissionE = new \App\Role_permissions;
                    $permissionE->role_id = $id;
                    $permissionE->permission_id = $permission['permission_id'];
                    $permissionE->slug = $slug;
                    $permissionE->status = $permission['status'];
                    $permissionE->save();
                }else{
                    $permissionE = \App\Role_permissions::find($permission['id']);
                    $permissionE->slug = $slug;
                    $permissionE->status = $permission['status'];
                    $permissionE->update();
                }

            }
        }



        //flash(__('global.updated_success'))->success();
        return redirect(route('settings.roles_edit',['id'=>$id]));
    }

    public function objects(){
        $objects = Permission_object::all();
        return view('settings/role/objects_manage',array('objects'=> $objects) );
    }

    public function objects_add( Request $request){
        if(!has_permission_slug('parametres-roles_add')){
            return redirect('404');
        }
        $object = new \App\Permission_object;
        $object->name = $request->input('objects_add_name');
        $object->slug = $request->input('objects_add_slug');
        $object->save();
        //flash(__('global.creation_success'))->success();
        return redirect(route('settings.objects'));
    }

    public function objects_edit($id){

        $object = \App\Permission_object::find($id)->permissions();

        return view('settings/role/objects_edit',array(
            'object'=> $object
        ) );
    }

    public function permissions_add( Request $request, $object_id){
        if(!has_permission_slug('parametres-roles_add')){
            return redirect('404');
        }
        $permission= new \App\Permission;
        $permission->name = $request->input('permissions_add_name');
        $permission->slug = $request->input('permissions_add_slug');
        $permission->object_id = $object_id;
        $permission->save();
        //flash(__('global.creation_success'))->success();
        return redirect(route('settings.objects_edit',['id'=>$object_id]));
    }


    public function api_roles_delete(Request $request, $id,$nextid) {
        if(!has_permission_slug('parametres-roles_delete')){
            return redirect('404');
        }
        if($id == 1)//is superadmin
            return 0;

        //Commenter cet instruction si on veut supprimer Administrateur ou Editeur
        if($id == 2 || $id == 3)
            return 200;
        //------------------------------------------------------------------------

        $users = \App\User::where('role_id',$id);
        $users->update(['role_id'=>$nextid]);
        \App\Role::find($id)->delete();
        return 204;
    }

    public function api_permissions_delete(Request $request, $id) {
        if(!has_permission_slug('parametres-roles_delete')){
            return redirect('404');
        }
        \App\Role_permissions::where('permission_id',$id)->delete();
        \App\Permission::find($id)->delete();
        return 204;
    }


}
