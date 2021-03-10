<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use App\Models\Transaction\Transaction;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;
    public function __construct()
    {
        $this->user = $this->getUserData();
    }
    public function index()
    {
        //

        $transaction = new Transaction();
        $get_data_transaction = $transaction->getProductTransaction();
        $data_view = [
            'page' => 'transactions.index',
            'data' => $get_data_transaction
        ];

        return $this->getView($data_view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::all();
        $data_view = [
            'page' => 'transactions.create',
            'data' => $products,
        ];
        return $this->getView($data_view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'date' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
            'price' => 'required'
        ]);
        $is_transaction_added = Transaction::create($request->all());
        if ($is_transaction_added ) {
            return redirect(route('transactions'))->with('alert', 'Transaction added succesfully')->with('status', true);
        }
        return redirect(route('transactions'))->with('alert', 'Transaction failed to add')->with('status', false);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $is_transaction_deleted = Transaction::destroy($transaction->id);
        if ($is_transaction_deleted) {
            return  json_encode(
                [
                    'icon'=>'success',
                    'title'=> 'Delete',
                    'message'=>'Transaction deleted successfully',
                ]
            );
        }
        return  json_encode(
            [
                'icon'=>'error',
                'title'=> 'Delete',
                'message'=>'Transaction failed to delete',
            ]
        );
    }
}
