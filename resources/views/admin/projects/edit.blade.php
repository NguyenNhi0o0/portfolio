@extends('admin.layoutsAdmin.app')

@section('content')
    <form action="/projects/{{ $project->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="">Project</label>
        <input type="text" name="title" value="{{ $project->title }}">

        <div id="skillsContainer">
            <label>Skill :</label>
            @if (old('skills'))
                {{-- old trả về giá trị cũ của skill  --}}
                {{-- 'skills', [''] đảm bảo rằng ít nhất một ô nhập liệu được hiển thị --}}
                @foreach (old('skills', ['']) as $skill)
                    {{-- skills[]  mỗi khi form được gửi đi, dữ liệu từ các trường này sẽ được gửi dưới dạng một mảng của các giá trị skills --}}
                    <input type="text" name="skills[]" value="{{ $skill }}">
                @endforeach

                {{-- skills actuel du project --}}
                {{-- $project->skills vérifie l'existence de la relation skills sur l'objet $project. --}}
                {{-- $project->skills->count() compte le nombre d'éléments (compétences)
                 cette methode retournera 0 si il n'y a pas d'elt
            --}}
            @elseif($project->skills && $project->skills->count())
                @foreach ($project->skills as $skill)
                    <input type="text" name="skills[]" value="{{ $skill->name }}">
                @endforeach
            @else
                <input type="text" name="skills[]">
            @endif

        </div>

        <button type="button" onclick="addSkillInput()">Add Another Skill</button><br>
        <label for="">description</label>
        <textarea type="text" name="description"
            style="width: 100%; height: 200px; font-size: 14px; padding: 10px;">
            {{$project->description}}
        </textarea>
        @if ($project->image)
            <img class="img-fluid img-thumbnail"
                src="{{ asset('storage/' . str_replace('public/', '', $project->image->src)) }}" alt="Image du projet"
                style="width: 400px; height: 400px; object-fit: contain;">
        @endif
        <input id="image" name="image" type="file">
        <input type="text" name="linkgitHub" placeholder="linkgitHub">
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

    <script>
        function addSkillInput() {
            const container = document.getElementById('skillsContainer');
            // add cartes html need to ajd
            const inputHTML = '<label>Skill:</label><input type="text" name="skills[]"><br>';
            //show cartes html before the end of this container
            container.insertAdjacentHTML('beforeend', inputHTML);
        }
    </script>
@endsection
