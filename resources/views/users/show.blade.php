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
                    <div class="mdl-card__title">
                        <h1 class="mdl-card__title-text">User Module Access {{$data['name']}}</h1>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <table class="mdl-data-table mdl-js-data-table" id="users-management-table">
                            <thead>
                                <tr>
                                    <th class="mdl-data-table__cell--non-numeric">#</th>
                                    <th class="mdl-data-table__cell--non-numeric">Module Name</th>
                                    <th class="mdl-data-table__cell--non-numeric">Icon</th>
                                    <th class="mdl-data-table__cell--non-numeric">Path</th>
                                    <th class="mdl-data-table__cell--non-numeric">Access</th>
                                    <th class="mdl-data-table__cell--non-numeric">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1 ?> 
                                
                                @foreach($data['modules'] as $key => $module)
                       
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$index++}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$module->nama_module}}</td>
                                    <td class="mdl-data-table__cell--non-numeric"><i class="material-icons">{{$module->icon}}</i></td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$module->path}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        @if ($module->module_id)
                                            <span class="label label--mini color--green">Yes</span>
                                        @else
                                            <span class="label label--mini color--red">No</span>    
                                        @endif
                                    </td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <input type="checkbox" data-idUser="{{request()->segment(2)}}" data-idModule="{{$module->id}}" class="form-control checkbox_user_management" {{ $module->module_id ? 'checked' : ''}}>
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
    @include('scripts.users-show-js')
@endsection