@extends('admin.layoutsAdmin.app')
@section('content')
    @foreach ($contacts as $contact)
        <dl class="row">
            <dt class="col-sm-3"> Name : </dt>
            <dd class="col-sm-9">{{ $contact->name }}</dd>
            <dt class="col-sm-3"> Email : </dt>
            <dd class="col-sm-9">{{ $contact->email }}</dd>
            <dt class="col-sm-3"> Number : </dt>
            <dd class="col-sm-9">{{ $contact->phone }}</dd>
            <dt class="col-sm-3"> Message : </dt>
            <dd class="col-sm-9">{{ $contact->yourMessages }}</dd>
        </dl>
        @if ($contact->id)
            <form action="/contact/{{$contact->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button  class="btn btn-outline-primary" type="submit">Delete this message</button>
            </form>
        @endif
    @endforeach
@endsection
