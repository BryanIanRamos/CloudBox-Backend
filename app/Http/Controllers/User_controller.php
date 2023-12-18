<?php

namespace App\Http\Controllers;

use App\Http\Requests\User_request;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User_request $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return $user;
    }


    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function name(User_request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->name = $validated['name'];

        $user->save();

        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function email(User_request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->email = $validated['email'];

        $user->save();

        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function password(User_request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->password = Hash::make($validated['password']);

        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return $user;
    }

    // TO BE FIX 
    // public function userTrans()
    // {
    //     $leftJoin = DB::table('users')
    //         ->leftJoin('transactions as t', 'users.id', '=', 't.account_id')
    //         ->select('users.*', 't.*')
    //         ->get();

    //     return $leftJoin;
    // }

    // public function userTrans()
    // {
    //     $join = DB::table('users')
    //         ->join('transactions as t', 'users.id', '=', 't.account_id')
    //         ->select('users.name', 'users.email', 't.trans_id', 't.trans_type', 't.income', 't.description', 't.update_balance', 't.location')
    //         ->get();

    //     return $join;
    // }

    // public function userTrans()
    // {
    //     $join = DB::table('users')
    //         ->join('transactions as t', 'users.id', '=', 't.account_id')
    //         ->select(
    //             'users.name',
    //             'users.email',
    //             't.trans_id',
    //             't.trans_type',
    //             't.income',
    //             't.description',
    //             't.update_balance',
    //             't.location'
    //         )
    //         ->get();

    //     return $join;
    // }

    // public function userTrans()
    // {
    //     $response = DB::table('users')
    //         ->select(
    //             'users.name',
    //             'users.email',
    //             't.trans_id',
    //             't.trans_type',
    //             't.income',
    //             't.description',
    //             't.update_balance',
    //             't.location'
    //         )
    //         ->join('transactions as t', 'users.id', '=', 't.account_id')
    //         ->get();
    //     if ($response->isEmpty()) {
    //         [
    //             'status'    => 'error',
    //             'message'   => "No data set"
    //         ];
    //     } else {
    //         return $response;
    //     }
    // }


    // public function userTrans()
    // {
    //     $usersWithTransactions = User::with('transactions')->get();

    //     return $usersWithTransactions;
    // }


    // public function userStocks(string $id)
    // {
    //     $leftJoin = DB::table('users')
    //         ->leftJoin('stock', 'users.id', '=', 'stock.account_id')
    //         ->select('users.*', 'stock.*')
    //         ->get();

    //     return $leftJoin;
    // }
}
