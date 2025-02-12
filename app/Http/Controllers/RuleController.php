<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRuleRequest;
use App\Http\Requests\UpdateRuleRequest;
use App\Models\Models\VideoRolling\Rule;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreRuleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRuleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\VideoRolling\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function show(Rule $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\VideoRolling\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function edit(Rule $rule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRuleRequest  $request
     * @param  \App\Models\Models\VideoRolling\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRuleRequest $request, Rule $rule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\VideoRolling\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rule $rule)
    {
        //
    }
}
