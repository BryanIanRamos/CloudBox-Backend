<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaction_request;
use App\Models\Transaction_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Transaction_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Transaction_model::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Transaction_request $request)
    {
        $transaction = Transaction_model::create($request->validated());

        return $transaction;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction_model::findOrFail($id);

        return $transaction;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Transaction_request $request, string $id)
    {
        $validated = $request->validated();

        $transaction = Transaction_model::findOrFail($id)->update($validated);

        return $transaction;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction_model::findOrFail($id);
        $transaction->delete();

        return $transaction;
    }

    public function userTrans()
    {
        $response = DB::table('transactions')
            ->leftJoin('users', 'transactions.account_id', '=', 'users.account_id')
            ->select('transactions.*', 'users.*')
            ->get();

        return $response;
    }
}
