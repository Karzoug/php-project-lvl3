@extends('layouts.app')

@section('content')
<div class="container-lg">
    <h1 class="mt-5 mb-3">Сайт: {{$url->name}}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap">
            <tr>
                <td>ID</td>
                <td>{{$url->id}}</td>
            </tr>
            <tr>
                <td>Имя</td>
                <td>{{$url->name}}</td>
            </tr>
            <tr>
                <td>Дата создания</td>
                <td>{{$url->created_at}}</td>
            </tr>
        </table>
    </div>
    <h2 class="mt-5 mb-3">Проверки</h2>
    {{ Form::model($url, ['route' => ['url_checks.store', $url->id]])}}
    {{ Form::submit('Запустить проверку', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
    <table class="table table-bordered table-hover text-nowrap">
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
</div>
@endsection