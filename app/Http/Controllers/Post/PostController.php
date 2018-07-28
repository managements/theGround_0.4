<?php

namespace App\Http\Controllers\Post;

use App\Company;
use App\Http\Requests\Post\PostUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        $this->authorize('view',$company);
        $this->authorize('index',User::class);
        $posts = $company->users;
        return view('post.index',compact('company','posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company,User $user)
    {
        $this->authorize('view',$company);
        $this->authorize('view',User::class);
        return view('post.show',compact('company','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @param Company $company
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,Company $company, $id)
    {
        $user = $user::find($id);
        $this->authorize('view',$company);
        $this->authorize('update',$user);
        return view('post.edit',compact('company','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest|Request $request
     * @param Company $company
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, User $user,Company $company,$id)
    {
        $this->authorize('view',$company);
        $user = $user::find($id);
        $this->authorize('update',$user);
        if(!is_null($request->password)){
            $req = [
                'password' => bcrypt($request->password),
                'name'      => $request->name,
                'first_name'=> $request->first_name,
                'last_name' => $request->last_name,
                'tel'       => $request->tel,
                'email'     => $request->email,
            ];
        }else{
            $req = [
                'name'      => $request->name,
                'first_name'=> $request->first_name,
                'last_name' => $request->last_name,
                'tel'       => $request->tel,
                'email'     => $request->email,
            ];
        }
        $user->update($req);
        return redirect()->route('post.show',compact('company','user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company,User $user,$id)
    {
        $this->authorize('view',$company);
        $user = $user::find($id);
        $this->authorize('delete',$user);
        $range = 0;
        if(!is_null($user->limit)){
            $end = strtotime($company->limit);
            $start = strtotime(gmdate('Y-m-d H:i:s'));
            $diff = $end - $start;
            $range = round($diff / (60*60*24)) + 1;
        }
        $sold = $company->sold + $range + $user->range;
        $company->update(['sold' => $sold]);
        $user->delete();
        return redirect()->route('post.index',compact('company'));
    }
}
