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
                        <h1 class="mdl-card__title-text">Modules List</h1>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <table class="mdl-data-table mdl-js-data-table" id="users-table">
                            <thead>
                                <tr>
                                    <th class="mdl-data-table__cell--non-numeric">#</th>
                                    <th class="mdl-data-table__cell--non-numeric">Name</th>
                                    <th class="mdl-data-table__cell--non-numeric">Email</th>
                                    <th class="mdl-data-table__cell--non-numeric">Level</th>
                                    <th class="mdl-data-table__cell--non-numeric">Availability</th>
                                    <th class="mdl-data-table__cell--non-numeric">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1 ?> 
                                @foreach($data as $user_module)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$index++}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$user_module->name}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{ $user_module->email }}</td>
                                    <td class="mdl-data-table__cell--non-numeric"><span class="label label--mini color--green">{{ $user_module->level }}</span></td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <span class="label label--mini label__availability background-color--primary"></span>
                                        <span class="label label--mini label__availability background-color--primary"></span>
                                        <span class="label label--mini label__availability background-color--primary"></span>
                                        <span class="label label--mini label__availability background-color--primary"></span>
                                    </td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <a href="{{route('users/show', $user_module->id)}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-grey">Detail</a>
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal">Edit</button>
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
@section('scripts')
    @include('scripts.users-index-js')
@endsection