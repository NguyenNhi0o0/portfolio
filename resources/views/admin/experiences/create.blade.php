@extends('admin.layoutsAdmin.app')

@section('content')
    <form action="/experience" method="post" enctype="multipart/form-data">

        @csrf
        <label>Experience</label>
        <input type="text" name="name_exp" placeholder="Experience" value="{{ old('name_edu') }}">

        <label> Start:</label>
        <input type="text" name="start_date" class="datepicker startDate" placeholder="MM-YYYY"
            value="{{ old('start_date') }}">
        <label> End:</label>
        <input type="text" name="end_date" class="datepicker endDate" placeholder="MM-YYYY"
            value="{{ old('end_date') }}">


        {{-- <label for="start">Start :</label>
        <input type="month" id="start" name="start_date" class="startDate" min="2018-03" value="2018-05" />
        <label for="end">End:</label>
        <input type="month" id="start" name="end_date" class="endDate" min="2018-03" value="2018-05" />
        <div id="skillsContainer"> --}}

        <div id="skillsContainer">
            <label>Skill:</label>
            @if (old('skills'))
                @foreach (old('skills', ['']) as $skill)
                    <input type="text" name="skills[]" value="{{ $skill }}">
                @endforeach
            @else
                <input type="text" name="skills[]">
            @endif
        </div>
        <button type="button" onclick="addSkillInput()">Add Another Skill</button><br>
        <label for="">description</label>
        <textarea type="text" name="description" placeholder="description"
            style="width: 100%; height: 200px; font-size: 14px; padding: 10px;"></textarea>

        <input type="submit" value="Submit">

    </form>

    <script>
        $(document).ready(function() {
            // Khởi tạo Datepicker
            $('.datepicker').datepicker({
                format: "mm-yyyy",
                startView: "months",
                minViewMode: "months",
                autoclose: true // Tự động đóng datepicker sau khi chọn
            });

            // Xử lý nhập liệu cho ngày bắt đầu và kết thúc
            $('.startDate, .endDate').on('input', function() {
                var value = $(this).val().replace(/[^0-9]/g, ''); // Loại bỏ ký tự không phải số

                if (value.length <= 2) {
                    $(this).val(value);
                } else if (value.length > 2 && value.length <= 6) {
                    $(this).val(value.slice(0, 2) + '-' + value.slice(2));
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
