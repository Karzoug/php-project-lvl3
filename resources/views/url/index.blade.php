@extends('layouts.app')

@section('content')
<div class="container-lg">
    <h1 class="mt-5 mb-3">Сайты</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap">
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Последняя проверка</th>
                <th>Код ответа</th>
            </tr>
@foreach ($urls as $url)
@php
$check = $url->latestCheck;
@endphp
            <tr>
                <td>{{$url->id}}</td>
                <td><a href="{{route('urls.show', $url->id)}}">{{$url->name}}</a></td>
                <td>{{ $check->created_at  ?? ""}}</td>
                <td>{{ $check->status_code ?? "" }}</td>
            </tr>
@endforeach
        </table>
        <nav>
            <div class="d-flex">
                {!! $urls->links() !!}
            </div>
    </nav>
    </div>
</div>
@endsection