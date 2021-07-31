<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->classe = Account::class;
    }

    public function index(Request $request)
    {
        return $this->classe::paginate($request->per_page);
    }

    public function store(Request $request)
    {
        return response()->json($this->classe::create($request->all(),201));
    }

    public function show(int $id)
    {
        $resource = $this->classe::find($id);

        if (is_null($resource))
            return response()->json($resource,204);
        return response()->json($resource);
    }

    public function update(int $id, Request $request)
    {
        $resource = $this->classe::find($id);
        if (is_null($resource))
            return response()->json(['Erro'=>'Recurso não encontrado'],404);
        $resource->fill($request->all());
        $resource->save();

        return $resource;
    }

    public function destroy(int $id)
    {
        $numberOfResource = $this->classe::destroy($id);
        if ($numberOfResource === 0)
            return response()->json(['Erro'=>'Recurso não encontrado'],404);
        return response()->json('',204);
    }

    public function withdraw(Request $request)
    {
        $account = new Account();
        return $account->toWithdraw($request->accountNumber, $request->amount);
    }

    public function deposit(Request $request)
    {
        $account = new Account();
        return $account->toDeposit($request->accountNumber, $request->amount);

    }

}
