<?php

namespace App\Http\Controllers\Company;

use App\City;
use App\Company;
use App\Http\Requests\Company\CompanyCreateRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Post;
use App\Status;
use App\Token;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use function Sodium\add;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $companies = Company::with('status')->get();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('company.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CompanyCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyCreateRequest $request)
    {
        $path = $request->brand_->store('public/brands');
        $path = str_replace('public/', '',$path);
        $slug = str_replace(' ', '', str_slug($request->name));
        $request->request->add([
            'slug'      => $slug,
            'brand'     => $path,
            'status_id' => Status::where('status','inactive')->first()->id,
            'city_id'   => $request->city
        ]);
        $company = Company::create($request->all());
        Token::create([
            'token'         => md5(sha1(rand())),
            'range'         => $request->range,
            'company_id'    => $company->id,
            'category_id'   => 1
        ]);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $cities = City::all();
        $statutes = Status::all();
        return view('company.edit', compact('company','cities','statutes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanyUpdateRequest|Request $request
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {
        // update brand
        if(isset($request->brand_)){
            $path = $request->brand_->store('public/brands');
            $path = str_replace('public/', '',$path);
            $request->request->add([
                'brand'     => $path,
                'status_id' => $request->status
            ]);
            Storage::delete('public/' . $company->brand);
        }
        $company->update($request->all());
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index');
    }

    /**
     * detect and update status
     * @param Company $company
     * @param CompanyUpdateRequest $request
     * @return array
     */
    public function updateStatus(Company $company,CompanyUpdateRequest $request) :array
    {
        if($company->status_id == 1){
            if($request->status == 2){
                return $this->wakeupCompany($request);
            }
        }
        if($company->status_id == 2){
            if($request->status == 1 || $request->status == 3){
                return $this->sleepCompany($company,$request);
            }
        }
        if($company->status_id == 3){
            if($request->status == 2){
                return $this->wakeupCompany($request);
            }
        }
        return $this->noAction($company);
    }

    /**
     * @param $request
     * @return array
     */
    public function wakeupCompany($request) :array
    {
        return [
            'limit'     => gmdate('Y-m-d H:i:s',strtotime("+$request->range days")),
            'range'     => $request->sold
        ];
    }

    /**
     * @param Company $company
     * @param $request
     * @return array
     */
    public function sleepCompany(Company $company,$request) :array
    {
        $end = strtotime($company->limit);
        $start = strtotime(gmdate('Y-m-d H:i:s'));
        $diff = $end - $start;
        $days = round($diff / (60*60*24)) + 1 + $request->sold;
        return [
            'limit'     => null,
            'range'     => $days,
        ];
    }

    /**
     * @param Company $company
     * @return array
     */
    public function noAction(Company $company) :array
    {
        return [
            'limit'     => $company->limit,
            'range'     => $company->range,
        ];
    }
}
