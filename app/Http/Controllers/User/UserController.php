<?php

namespace App\Http\Controllers\User;

use App\Company;
use App\Http\Requests\User\UserUpdateRequest;
use App\Status;
use App\User;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company, User $user)
    {
        $this->authorize('user_update',User::class);
        $statutes = Status::all();
        if($user->status_id == 2){
            $end = strtotime($user->limit);
            $start = strtotime(gmdate('Y-m-d H:i:s'));
            $diff = $end - $start;
            $days = round($diff / (60*60*24));
            $user->range = $days + $user->range;
        }
        return view('user.edit', compact('company', 'user', 'statutes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest|Request $request
     * @param Company $company
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, Company $company, User $user)
    {
        $this->authorize('user_update',User::class);
        $sold = $company->sold + $user->range;
        if(!is_null($user->limit)){
            $end = strtotime($user->limit);
            $start = strtotime(gmdate('Y-m-d H:i:s'));
            $diff = $end - $start;
            $days = round($diff / (60*60*24));
            $sold = $sold + $days;
        }
        if($request->status == 2){
            $req = [
                'limit' => gmdate('Y-m-d H:i:s',strtotime("+$request->range days")),
                'range' => 0,
                'status_id' => $request->status
            ];
        }else{
            $req = [
                'limit' => null,
                'range' =>  $request->range,
                'status_id' => $request->status
            ];
        }
        $sold = $sold - $request->range;
        $user->update($req);
        if($user->category_id == 1){
            $company->update([
                'limit' => $req['limit'],
                'sold'  => $sold
            ]);
        }


        dd($request);
    }

    private function updateRange(UserUpdateRequest $request, Company $company, User $user)
    {
        $sold = $company->sold + $user->range;
        $range = $request->range;
        $sold = $sold - $range;
        $company->update(['sold' =>(int) $sold]);
        if ($user->status_id == 1 || $user->status_id == 3) {
            $user->update(['range' => $range]);
        } else {
            $date = new DateTime($user->limit);
            $date->add(new DateInterval('P' . $range . 'D'));
            $user->update(['limit' => $date]);
            if ($user->category_id == 1) {
                $company->update(['limit' => $date]);
            }
        }
    }

    private function updateStatus(UserUpdateRequest $request, Company $company, User $user)
    {
        $update = ['limit'=>$user->limit,'range'=>$user->range,'status_id'=>$user->status_id];
        if($user->status_id == 1){
            if($request->status == 2){
                $update = $this->wakeupUser($request,$user);
            }
        }
        if($user->status_id == 2){
            if($request->status == 1 || $request->status_id == 3){
                $update = $this->sleepUser($request,$user);
            }
        }
        if($user->status_id == 3){
            if($request->status == 2){
                $update = $this->wakeupUser($request,$user);
            }
        }
        $user->update($update);
    }

    private function wakeupUser($request, $user)
    {
        return  [
            'limit'     => gmdate('Y-m-d H:i:s',strtotime("+$user->range days")),
            'range'     => 0,
            'status_id' => $request->status
        ];
    }

    private function sleepUser($request, $user)
    {
        $end = strtotime($user->limit);
        $start = strtotime(gmdate('Y-m-d H:i:s'));
        $diff = $end - $start;
        $days = round($diff / (60*60*24));
        return [
            'limit'     => null,
            'range'     => $days,
            'status_id' => $request->status
        ];
    }
}
