@extends('admin.layoutsAdmin.app')
@section('content')
    @foreach ($contents as $content)
    <dl class="row">
        <dt class="col-sm-3">Content title : {{ $content->title }} </dt>
        <dd class="col-sm-9">{{ $content->description }}</dd>

    </dl>
    <a class="btn btn-primary" href="/content/{{ $content->id }}" role="button">edit</a>
    @endforeach
@endsection