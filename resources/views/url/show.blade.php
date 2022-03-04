@extends('layouts.app')

@section('content')
    <h1>Сайт: {{$url->name}}</h1>

    <h2>Проверки</h2>
{{ Form::model($url, ['route' => ['url_checks.store', $url->id]]) }}
{{ Form::submit('Запустить проверку') }}
{{ Form::close() }}

<table>
    <tr>
        <th>ID</th>
        <th>Код ответа</th>
        <th>h1</th>
        <th>title</th>
        <th>description</th>
        <th>Дата создания</th>
    </tr>
    @foreach ($url->checks as $check)
    <tr>
        <td>{{$check->id}}</td>
        <td>{{$check->status_code}}</td>
        <td>{{$check->h1}}</td>
        <td>{{$check->title}}</td>
        <td>{{Str::limit($check->description, 35)}}</td>
        <td>{{$check->created_at}}</td>
    </tr>
    @endforeach
</table>
@endsection