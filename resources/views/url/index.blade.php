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
        <ul class="pagination">
            <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
            <li class="page-item"><a class="page-link" href="https://php-l3-page-analyzer.herokuapp.com/urls?page=2">2</a></li>
            <li class="page-item"><a class="page-link" href="https://php-l3-page-analyzer.herokuapp.com/urls?page=3">3</a></li>
            <li class="page-item"><a class="page-link" href="https://php-l3-page-analyzer.herokuapp.com/urls?page=4">4</a></li>
            <li class="page-item"><a class="page-link" href="https://php-l3-page-analyzer.herokuapp.com/urls?page=5">5</a></li>
            <li class="page-item">
                <a class="page-link" href="https://php-l3-page-analyzer.herokuapp.com/urls?page=2" rel="next" aria-label="Next &raquo;">&rsaquo;</a>
            </li>
        </ul>
    </nav>
    </div>
</div>
@endsection