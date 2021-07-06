@extends('layouts.master')

@section('title',__('View3d model items'))

@section('content')

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Vie3d items</h1>
        </div>
    </section>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Items</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>@lang('date')</th>
                    <th>@lang('playerid')</th>
                    <th>@lang('agentid')</th>
                    <th>@lang('currency')</th>
                    <th>@lang('bet')</th>
                    <th>@lang('win')</th>
                    <th>@lang('tournament')</th>
                    <th>@lang('net')</th>
                    <th>@lang('fin')</th>
                    <th>@lang('aams_ticket')</th>
                    <th>@lang('aams_table')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->formatted_date }}</td>
                        <td>{{ $item->playerid }}</td>
                        <td>{{ $item->agentid }}</td>
                        <td>{{ $item->currency }}</td>
                        <td>{{ $item->bet }}</td>
                        <td>{{ $item->win }}</td>
                        <td>{{ $item->tournament }}</td>
                        <td>{{ $item->net }}</td>
                        <td>{{ $item->fin }}</td>
                        <td>{{ $item->aams_ticket }}</td>
                        <td>{{ $item->aams_table }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer clearfix">
        {{ $items->links() }}
    </div>



@endsection
