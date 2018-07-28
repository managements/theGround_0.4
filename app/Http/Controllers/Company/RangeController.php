<?php

namespace App\Http\Controllers\Company;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RangeController extends Controller
{
    public function edit(int $id)
    {
        // seulement si la company est en sleep
        $company = Company::find($id);
        if($company->status_id == 2){
            return view('company.edit_range',compact('company'));
        }
        abort(404);
    }

    public function update(Request $request, int $id)
    {
        $company = Company::find($id);
        if($company->status_id == 2){
            $user = User::where([['company_id',$id],['category_id',1]])->first();
            $range = $company->range + $request->range;
            $company->update(['range' => $range]);
            $user->update(['range' => $range]);
        }
        return redirect()->route('companies.index');
    }
}
