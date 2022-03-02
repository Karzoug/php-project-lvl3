@extends('layouts.app')

@section('content')
<h1 class="display-3">Анализатор страниц</h1>
<p>Бесплатно проверяйте сайты на SEO пригодность</p>
{{ Form::model($url, ['route' => 'urls.store']) }}
    {{ Form::text('name') }}<br>
    {{ Form::submit('Проверить') }}
{{ Form::close() }}
@endsection
