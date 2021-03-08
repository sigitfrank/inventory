@extends('layouts.dashboard')

@section('content')
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">

    @include('layouts.header')

    @include('layouts.sidebar')

    {{-- content --}}
    <main class="mdl-layout__content ">
        <div class="mdl-grid ui-tables">
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    @if (session('alert'))
                        <div class="alert {{session('status') ? 'alert-success' : 'alert-danger'}} p-3 text-dark font-weight-bold">
                            {{ session('alert') }}
                        </div>
                    @endif 
                    <div class="mdl-card__title">
                        <h1 class="mdl-card__title-text">Transaction List</h1>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <table class="mdl-data-table mdl-js-data-table" id="transactions-table">
                            <thead>
                                <tr>
                                    <th class="mdl-data-table__cell--non-numeric">#</th>
                                    <th class="mdl-data-table__cell--non-numeric">Product Name</th>
                                    <th class="mdl-data-table__cell--non-numeric">Date</th>
                                    <th class="mdl-data-table__cell--non-numeric">Type</th>
                                    <th class="mdl-data-table__cell--non-numeric">Quantity</th>
                                    <th class="mdl-data-table__cell--non-numeric">Unit</th>
                                    <th class="mdl-data-table__cell--non-numeric">Price</th>
                                    <th class="mdl-data-table__cell--non-numeric">Created At</th>
                                    <th class="mdl-data-table__cell--non-numeric">Updated At</th>
                                    <th class="mdl-data-table__cell--non-numeric">Availability</th>
                                    <th class="mdl-data-table__cell--non-numeric">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1 ?> 
                                @foreach($data as $transaction)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$index++}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$transaction->product_name}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{ $transaction->date }}</td>
                                    <td class="mdl-data-table__cell--non-numeric"><span class="label label--mini color--green">{{ $transaction->type }}</span></td>
                                    <td class="mdl-data-table__cell--non-numeric">{{ $transaction->quantity }}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{ $transaction->unit }}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{ $transaction->price }}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{ $transaction->created_at }}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{ $transaction->updated_at }}</td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <span class="label label--mini label__availability background-color--primary"></span>
                                        <span class="label label--mini label__availability background-color--primary"></span>
                                        <span class="label label--mini label__availability background-color--primary"></span>
                                        <span class="label label--mini label__availability background-color--primary"></span>
                                    </td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal">Edit</button>
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red btn_delete_modal" data-id="{{$transaction->id}}" 
                                            data-name="{{$transaction->product_name}}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>
@stop

@section('modal')
    @include('components.modal_delete')
@endsection

@section('scripts')
    @include('scripts.transactions-js')
@endsection