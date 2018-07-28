<?php

namespace App\Http\Controllers\Company;

use App\Company;
use App\Status;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory
     */
    public function edit(int $id)
    {
        $company = Company::find($id);
        $statutes = Status::all();
        return view('company.edit_status',compact('company','statutes'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id) :RedirectResponse
    {
        $company = Company::find($id);
        $update = ['limit'=>$company->limit,'range'=>$company->range];
        $user = User::where([['company_id',$id],['category_id',1]])->first();
        if($company->status_id == 1){
            if($request->status_id == 2){
                $update = $this->wakeupCompany($company,$request,$user);
            }
        }
        if($company->status_id == 2){
            if($request->status_id == 1 || $request->status_id == 3){
                $update = $this->sleepCompany($company,$request,$user);
            }
        }
        if($company->status_id == 3){
            if($request->status_id == 2){
                $update = $this->wakeupCompany($company,$request,$user);
            }
        }
        $request->request->add($update);
        $company->update($request->all());
        $user->update($request->all());
        return redirect()->route('companies.index');
    }

    public function sleepCompany(Company $company,$request,$user) :array
    {
        $end = strtotime($company->limit);
        $start = strtotime(gmdate('Y-m-d H:i:s'));
        $diff = $end - $start;
        $days = round($diff / (60*60*24)) + 1;
        return [
            'limit'     => null,
            'range'     => $days,
        ];
    }

    public function wakeupCompany(Company $company, Request $request, $user) :array
    {
        return  [
            'limit'     => gmdate('Y-m-d H:i:s',strtotime("+$company->range days")),
            'range'     => 0,
        ];
    }
}
