<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpensesRequest;
use App\Http\Requests\UpdateExpensesRequest;
use App\Http\Resources\ExpensesResource;
use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $expenses = $request->user()->expenses()->get();
        return ExpensesResource::collection($expenses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpensesRequest $request)
    {
        //
        $this->authorize('create', Expenses::class); 

        $expense = $request->user()
            ->expenses()
            ->create($request->validated());
        return new ExpensesResource($expense); 

    }

    /**
     * Display the specified resource.
     */
    public function show(Expenses $expense)
    {
        //
        $this->authorize('view', $expense);
        return new ExpensesResource($expense);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpensesRequest $request, Expenses $expense)
    {
        //
        $this->authorize('update', $expense);
        $expense->update($request->validated());
        return new ExpensesResource($expense);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expenses $expense)
    {
        //
        $this->authorize('delete', $expense);
        $expense->delete();
        return response()->noContent();
    }
}
