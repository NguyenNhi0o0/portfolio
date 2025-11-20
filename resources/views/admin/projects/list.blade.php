@extends('admin.layoutsAdmin.app')

@section('content')
    @foreach ($projects as $project)
        <dl class="row">
            <dt class="col-sm-3">Project </dt>
            <dd class="col-sm-9">{{ $project->title }} </dd>

            <dt class="col-sm-3">Skill</dt>
            <dd class="col-sm-9">
                @foreach ($project->skills as $skill)
                    <p>
                        {{ $skill->name }}
                    </p>
                @endforeach
            </dd>

            <dt class="col-sm-3">Description</dt>
            <dd class="col-sm-9">
                {{ $project->description }}

            </dd>

        </dl>
        @if ($project->image)
            <img class="rounded mx-auto d-block"
                src="{{ asset('storage/' . str_replace('public/', '', $project->image->src)) }}" alt="Image du projet"
                style="width: 400px; height: 400px; object-fit: contain;">
        @endif
        <a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">edit</a>
        @if ($project->id)
            {{-- Khi form này được gửi, Laravel sẽ xử lý yêu cầu này thông qua route DELETE đã được định nghĩa và thực thi phương thức delete trong ProjectController --}}
            <form action="/project/{{ $project->id }}" method="POST">
                @csrf
                {{-- @method('DELETE') notion dans la route Route::delete('/project/{id}', [ProjectController::class,'delete']); --}}
                @method('DELETE')
                <button  class="btn btn-outline-primary" type="submit">Delete Project</button>
            </form>
        @endif
    @endforeach
    <br>
    <a href="/project/create" role="button"> Create a new project</a>
@endsection
