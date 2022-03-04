@extends('layouts.app')

@section('content')
    <h1>{{$url->name}}</h1>
{{ Form::model($url, ['route' => ['url_checks.store', $url->id]]) }}
{{ Form::submit('Запустить проверку') }}
{{ Form::close() }}

<table>
    <tr>
        <th>ID</th>
        <th>Дата проверки</th>
    </tr>
    @foreach ($url->checks as $check)
    <tr>
        <td>{{$check->id}}</td>
        <td>{{$check->created_at}}</td>
    </tr>
    @endforeach
</table>
@endsection