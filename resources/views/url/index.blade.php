@extends('layouts.app')

@section('content')
<h1>Сайты</h1>
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
@endsection