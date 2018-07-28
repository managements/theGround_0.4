<?php

namespace App\Http\Controllers\Token;

use App\Category;
use App\Company;
use App\Http\Requests\Token\TokenCreateRequest;
use App\Http\Requests\Token\TokenUpdateRequest;
use App\Token;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokenController extends Controller
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
        $this->authorize('index',Token::class);
        return view('token.index', compact('company'));
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
        $this->authorize('create',Token::class);
        $categories = Category::all();
        return view('token.create', compact('company','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TokenCreateRequest|Request $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function store(TokenCreateRequest $request,Company $company)
    {
        $this->authorize('view',$company);
        $this->authorize('create',Token::class);
        $sold = $company->sold - $request->range;
        $company->update(['sold'=>$sold]);
        $request->request->add([
            'category_id' => $request->category,
            'company_id'=>$company->id,
            'token' => md5(sha1(rand()))
            ]);
        Token::Create($request->all());
        return redirect()->route('token.index',compact('company'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Token $token
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company,Token $token)
    {
        $this->authorize('view',$company);
        $this->authorize('view',$token);
        return view('token.show',compact('company','token'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Token $token
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company,Token $token)
    {
        $this->authorize('view',$company);
        $this->authorize('update',$token);
        $categories = Category::all();
        return view('token.edit',compact('company','token','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TokenUpdateRequest|Request $request
     * @param Company $company
     * @param  \App\Token $token
     * @return \Illuminate\Http\Response
     */
    public function update(TokenUpdateRequest $request,Company $company, Token $token)
    {
        $this->authorize('view',$company);
        $this->authorize('update',$token);
        $max = $company->sold + $token->range;
        $sold = $max - $request->range;
        $company->update(['sold' => $sold]);
        $request->request->add(['category_id' => $request->category]);
        $token->update($request->all());
        return redirect()->route('token.index',compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @param  \App\Token $token
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company,Token $token)
    {
        $this->authorize('view',$company);
        $this->authorize('delete',$token);
        $sold = $token->range + $company->sold;
        $company->update(['sold' => $sold]);
        $token->delete();
        return redirect()->route('token.index',compact('company'));
    }
}
