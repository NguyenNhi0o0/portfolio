@extends('admin.layoutsAdmin.app')

@section('content')
    <form action="/project" method="post" enctype="multipart/form-data">
        @csrf
        <label>Project</label>
        <input type="text" name="title" placeholder="project name" value="{{ old('title') }}">
        @error('title')
            <div>{{ $message }}</div>
        @enderror
        
        <div id="skillsContainer">
            <label>Skill:</label>
            @if (old('skills'))
                {{-- old trả về giá trị cũ của skill  --}}
                {{-- 'skills', [''] đảm bảo rằng ít nhất một ô nhập liệu được hiển thị --}}
                @foreach (old('skills', ['']) as $skill)
                    {{-- skills[]  mỗi khi form được gửi đi, dữ liệu từ các trường này sẽ được gửi dưới dạng một mảng của các giá trị skills --}}
                    <input type="text" name="skills[]" value="{{ $skill }}">
                @endforeach
            @else
                <input type="text" name="skills[]">
            @endif
        </div>
        <label for="">description</label>
        <textarea type="text" name="description" placeholder="description"
            style="width: 100%; height: 200px; font-size: 14px; padding: 10px;"></textarea>


        <input id="image" name="image" type="file">
        <input type="text" name="linkgitHub" placeholder="linkgitHub">

        <button type="button" onclick="addSkillInput()">Add Another Skill</button><br>
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
