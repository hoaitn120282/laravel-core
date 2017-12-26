<?php

namespace App\Modules\ContentManager\Controllers;

use App\Entities\Roles;
use Illuminate\Http\Request;
use App\User;
use Admin;
use Auth;
use App\Modules\ContentManager\Models\UserMeta;
use App\Http\Controllers\Controller;
use App\Modules\ContentManager\Models\Articles;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLogin = Auth::guard('admin')->user();
        $model = User::where("id","!=",1)->with('roles')->orderby("id","desc")->paginate(10);
        return view("ContentManager::user.index",['model' => $model, 'userLogin' => $userLogin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all(['id','name']);
        return view("ContentManager::user.create",['model' => "", 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $model = new User();
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'role' =>'required'
        ]);

        $model->name = $request->name;
        $model->email = $request->email;
        $model->password = bcrypt($request->password);
        $model->role_id = $request->role;
        $model->is_admin = false;
        if ($request->description != '') {
            $model->description = $request->description;
        } else {
            $model->description = '';
        }

        if ($request->photo != '') {
            $model->photo = $request->photo;
        } else {
            $model->photo = '';
        }

        $model->save();
        Admin::userLog(\Auth::guard('admin')->user()->id, 'Create user ' . $request->name);
        return redirect(Admin::StrURL('contentManager/user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = User::find($id);
        $post = Articles::where('post_author',$id)->where('post_type','post')->orderby('id','desc')->get();
        return view('ContentManager::user.profile',['model'=>$model,'post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::find($id);

        $roles = Roles::all(['id','name']);

        return view("ContentManager::user.create",['model' => $model, 'roles' => $roles]);
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
        $model = User::find($id);
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        $model->name = $request->name;
        $model->email = $request->email;
        $model->description = $request->description;
        $model->photo = $request->photo;
        $model->save();
        Admin::userLog(\Auth::guard('admin')->user()->id, 'Update user ' . $request->name);
        return redirect(Admin::StrURL('contentManager/user'));
    }

    /**
     * Get user log detail.
     *
     * @param  int  $id
     */
    public function getUserLog($id, $userName) {
        $userLog = UserMeta::where('user_id', $id)->orderBy('meta_id', 'desc')->paginate(10);

        return view('ContentManager::user.user-log', [
            'userLog' => $userLog,
            'userName' => $userName,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tmp = explode(",", $id);
        if(is_array($tmp)){
            User::destroy($tmp);   
        }else{
            User::destroy($id);  
        }

        Admin::userLog(\Auth::guard('admin')->user()->id, 'Delete user id :' . $id);
    }
}
