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
                        <table class="mdl-data-table mdl-js-data-table" id="modules-table">
                            <thead>
                                <tr>
                                    <th class="mdl-data-table__cell--non-numeric">#</th>
                                    <th class="mdl-data-table__cell--non-numeric">Module Name</th>
                                    <th class="mdl-data-table__cell--non-numeric">Module Parent</th>
                                    <th class="mdl-data-table__cell--non-numeric">Has Child</th>
                                    <th class="mdl-data-table__cell--non-numeric">Icon</th>
                                    <th class="mdl-data-table__cell--non-numeric">Path</th>
                                    <th class="mdl-data-table__cell--non-numeric">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1 ?> 
                                @foreach($data as $module)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{ $index++ }}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$module->nama_module}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        @if ($module->parent_module != 0)
                                            <span class="label label--mini color--light-blue">{{$module->parent_name}}</span>
                                        @else
                                            <span class="label label--mini color--light-smooth-gray">No Parent</span>
                                        @endif 
                                    </td>
                                    <td class="mdl-data-table__cell--non-numeric"><span class="label label--mini color--{{$module->has_child ? 'green' : 'red'}}">{{$module->has_child}}</span></td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        @if ($module->icon)
                                            <i class="material-icons">{{$module->icon}}</i>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$module->path}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal">EDIT</button>
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red btn_delete_modal" data-id="{{$module->id}}" 
                                            data-name="{{$module->nama_module}}">DELETE</button>
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
    @include('scripts.modules-js')
@endsection