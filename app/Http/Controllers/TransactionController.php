<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetInformationRequest;
use App\Http\Requests\PerformTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TransactionController extends Controller
{
    public function performTransaction(PerformTransactionRequest $request)
    {
        $from_user = User::where('username', $request->username)->first();

        if (!Hash::check($request->password, $from_user->password)) {
            return "Неверный пароль!";
        }

        $amount = $request->amount;

        if ($request->amount > $from_user->balance){
            return "Недостаточно средств у вас на балансе для перевода!";
        }

        $to_user = User::where('phone', $request->phone)->first();

        $from_user->balance = $from_user->balance - $amount;
        $to_user->balance = $to_user->balance + $amount;
        $from_user->save();
        $to_user->save();

        $transaction = Transaction::create([
            'from_id' => $from_user->id,
            'to_id' => $to_user->id,
            'amount' => $request->amount,
            'status' => 1,
            'service_id' => $request->service_id,
        ]);

        return new TransactionResource($transaction);
    }

    public function getInformation(GetInformationRequest $request){
        $from_user = User::where('username', $request->username)->first();

        if (!Hash::check($request->password, $from_user->password)) {
            return "неверный пароль!";
        }

        $transactions = DB::select('select * from transactions where from_id = ? and to_id = ? and service_id = ?', [$from_user->id, $from_user->id, $request->service_id]);

        return TransactionResource::collection($transactions);
    }
}
