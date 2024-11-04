<?php

// app/Http/Controllers/TransactionController.php
namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return Transaction::with('type')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_id' => 'required|exists:transaction_types,id',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        return Transaction::create($validated);
    }

    public function show($id)
    {
        return Transaction::with('type')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $validated = $request->validate([
            'type_id' => 'required|exists:transaction_types,id',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        $transaction->update($validated);
        return $transaction;
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return response()->noContent();
    }
}

