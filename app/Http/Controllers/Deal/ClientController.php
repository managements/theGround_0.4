<?php

namespace App\Http\Controllers\Deal;

use App\City;
use App\Company;
use App\Deal;
use App\Http\Requests\Deal\ProviderCreateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
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
        $this->authorize('index',Deal::class);
        $clients = $company->deals->where('client',true);
        return view('deal.client.index',compact('clients','company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        $this->authorize('view',$company);
        $this->authorize('create',Deal::class);
        $cities = City::all();
        return view('deal.client.create',compact('company','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProviderCreateRequest|Request $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderCreateRequest $request,Company $company)
    {
        $this->authorize('view',$company);
        $this->authorize('create',Deal::class);
        $request->request->add(['company_id' => $company->id, 'city_id' => $request->city, 'client' => true]);
        Deal::create($request->all());
        return redirect()->route('client.index',compact('company'));
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @param  \App\Deal $deal
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company,Deal $deal,int $id)
    {
        $this->authorize('view',$company);
        $this->authorize('view',Deal::class);
        $deal = $deal::with('city')->find($id);
        return view('deal.client.show',compact('company','deal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @param  \App\Deal $deal
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company,Deal $deal,int $id)
    {
        $this->authorize('view',$company);
        $this->authorize('update',Deal::class);
        $cities = City::all();
        $deal = $deal::find($id);
        return view('deal.client.edit',compact('company','deal','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProviderCreateRequest|Request $request
     * @param Company $company
     * @param  \App\Deal $deal
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderCreateRequest $request,Company $company, Deal $deal,$id)
    {
        $this->authorize('view',$company);
        $this->authorize('update',Deal::class);
        $deal = $deal::find($id);
        $deal->update($request->all());
        return redirect()->route('client.show',compact('company','deal'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @param  \App\Deal $deal
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company,Deal $deal,$id)
    {
        $this->authorize('view',$company);
        $this->authorize('delete',Deal::class);
        $deal::find($id)->delete();
        return redirect()->route('client.index',compact('company'));
    }
}
