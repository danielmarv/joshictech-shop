<?php

namespace App\Http\Controllers\Api\V2\Transaction;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json(['transactions' => $transactions], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'shop_id' => 'required|integer|exists:shops,id',
            'user_id' => 'required|integer|exists:users,id',
            'amount' => 'required|numeric',
            'description' => 'string',
            'type' => 'required|in:income,expense',
            'date' => 'date',
        ]);

        $transaction = Transaction::create($request->all());

        return response()->json(['transaction' => $transaction], 201);
    }

    public function show($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        return response()->json(['transaction' => $transaction], 200);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $this->validate($request, [
            'shop_id' => 'integer|exists:shops,id',
            'user_id' => 'integer|exists:users,id',
            'amount' => 'numeric',
            'description' => 'string',
            'type' => 'in:income,expense',
            'date' => 'date',
        ]);

        $transaction->update($request->all());

        return response()->json(['transaction' => $transaction], 200);
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transaction->delete();

        return response()->json(['message' => 'Transaction deleted'], 204);
    }
}

