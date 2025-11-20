@extends('admin.layoutsAdmin.app')
@section('content')
    @foreach ($images as $image)
        @if ($image->category != "Project")
            <dl class="row">
                <dt class="col-sm-3">Category : {{ $image->category }} </dt>
                <dd class="col-sm-9">
                    <img class="rounded mx-auto d-block"
                        src="{{ asset('storage/' . str_replace('public/', '', $image->src)) }}" 
                        style="width: 400px; height: 400px; object-fit: contain;">
                </dd>
                <form action="/image/{{$image->category}}" method="post" enctype="multipart/form-data" style="z-index: 3 ">
                    @csrf
                    @method('PUT')
                    <label for="image-{{ $image->category }}">Change Image:</label>
                    <input id="image-{{ $image->category }}" name="image" type="file" required>
                    <button type="submit">Upload</button>
                </form>
            </dl>
        @endif
    @endforeach
@endsection
