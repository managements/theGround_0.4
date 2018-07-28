<?php

namespace App\Http\Controllers\Company;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoldController extends Controller
{
    public function edit(int $id)
    {
        $company = Company::find($id);
        return view('company.edit_sold',compact('company'));
    }

    public function update(Request $request, int $id)
    {
        $company = Company::find($id);
        $sold = $company->sold + $request->sold;
        $company->update(['sold' => $sold]);
        return redirect()->route('companies.index');
    }
}
