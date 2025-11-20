@extends('admin.layoutsAdmin.app')

@section('content')
    <form action="/content/{{ $content->id }}"method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2>
            {{$content->title}}
        </h2>
        <label for="">Description</label>
        <input type="text" name="description" value="{{$content->description}}">
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection
