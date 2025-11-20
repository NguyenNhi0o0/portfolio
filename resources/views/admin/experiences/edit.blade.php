@extends('admin.layoutsAdmin.app')

@section('content')
    <form action="/experiences/{{ $experience->id }}" method="post"enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="">Experience</label>
        <input type="text" name="name_exp" value="{{ old('name_exp', $experience->name_exp) }}">

        <label> Start:</label>
        <input type="text" name="start_date" class="datepicker startDate" placeholder="MM-YYYY"
            value="{{ $experience->sta_month }}-{{ $experience->sta_year }}" value="{{ old('start_date') }}">
        <label> End:</label>
        <input type="text" name="end_date" class="datepicker endDate" placeholder="MM-YYYY"
            value="{{ $experience->end_month }}-{{ $experience->end_year }}" value="{{ old('end_date') }}">

        <div id="skillsContainer">
            <label>Skill:</label>
            @if (old('skills'))
                @foreach (old('skills', ['']) as $skill)
                    <input type="text" name="skills[]" value="{{ $skill }}">
                @endforeach
            @elseif($experience->skills && $experience->skills->count())
                @foreach ($experience->skills as $skill)
                    <input type="text" name="skills[]" value="{{ $skill->name }}">
                @endforeach
            @else
                <input type="text" name="skills[]">
            @endif
        </div>
        <button type="button" onclick="addSkillInput()">Add Another Skill</button><br>
        <label for="">description</label>
        <textarea type="text" name="description" style="width: 100%; height: 200px; font-size: 14px; padding: 10px;">
            {{ $experience->description }}
        </textarea>

        <input type="submit" value="Submit">
    </form>

    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: "mm-yyyy",
                startView: "months",
                minViewMode: "months",
            });
        });

        $(document).ready(function() {
            $('.startDate').on('input', function() {
                var value = $(this).val();

                // Xóa tất cả các ký tự không phải là số
                value = value.replace(/[^0-9]/g, '');

                // Kiểm tra nếu đã có 2 số và thêm dấu "-"
                if (value.length == 2) {
                    value = value + '-';
                }


            });
        });

        $(document).ready(function() {
            $('.endDate').on('input', function() {
                var value = $(this).val();

                value = value.replace(/[^0-9]/g, '');

                if (value.length == 2) {
                    value = value + '-';
                }
            });
        });

        function addSkillInput() {
            const container = document.getElementById('skillsContainer');
            // add cartes html need to ajd
            const inputHTML = '<label>Skill:</label><input type="text" name="skills[]"><br>';
            //show cartes html before the end of this container
            container.insertAdjacentHTML('beforeend', inputHTML);
        }
    </script>
@endsection
