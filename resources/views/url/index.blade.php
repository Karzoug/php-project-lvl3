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
    <tr>
        <td>{{$url->id}}</td>
        <td><a href="{{route('urls.show', $url->id)}}">{{$url->name}}</a></td>
        <td>{{$url->updated_at}}</td>
        <td>200</td>
    </tr>
    @endforeach
</table>
@endsection