@extends('admin.layoutsAdmin.app')

@section('content')
    @foreach ($experiences as $experience)
        <dl class="row">
            <dt class="col-sm-3">Experience </dt>
            <dd class="col-sm-9">{{ $experience->name_exp }} </dd>

            <dt class="col-sm-3">Skill</dt>
            <dd class="col-sm-9">
                @foreach ($experience->skills as $skill)
                    <p>
                        {{ $skill->name }}
                    </p>
                @endforeach
            </dd>

            <dt class="col-sm-3">Debut : </dt>
            <dd class="col-sm-9">
                @switch($experience->sta_month)
                    @case(1)
                        Janvier
                    @break

                    @case(2)
                        Février
                    @break

                    @case(3)
                        Mars
                    @break

                    @case(4)
                        Avril
                    @break

                    @case(5)
                        Mai
                    @break

                    @case(6)
                        Juin
                    @break

                    @case(7)
                        Juillet
                    @break

                    @case(8)
                        Août
                    @break

                    @case(9)
                        Septembre
                    @break

                    @case(10)
                        Octobre
                    @break

                    @case(11)
                        Novembre
                    @break

                    @case(12)
                        Décembre
                    @break

                    @default
                @endswitch
                /{{ $experience->sta_year }}
            </dd>

            <dt class="col-sm-3">Fin : </dt>
            <dd class="col-sm-9">
                @switch($experience->end_month)
                    @case(1)
                        Janvier
                    @break

                    @case(2)
                        Février
                    @break

                    @case(3)
                        Mars
                    @break

                    @case(4)
                        Avril
                    @break

                    @case(5)
                        Mai
                    @break

                    @case(6)
                        Juin
                    @break

                    @case(7)
                        Juillet
                    @break

                    @case(8)
                        Août
                    @break

                    @case(9)
                        Septembre
                    @break

                    @case(10)
                        Octobre
                    @break

                    @case(11)
                        Novembre
                    @break

                    @case(12)
                        Décembre
                    @break

                    @default
                @endswitch
                /{{ $experience->end_year }}
            </dd>

            <dt class="col-sm-3">Description</dt>
            <dd class="col-sm-9">
                {{ $experience->description }}

            </dd>

        </dl>
        <a class="btn btn-primary" href="/experiences/{{ $experience->id }}"> Edit</a>
        <br>
        @if ($experience->id)
            {{-- Khi form này được gửi, Laravel sẽ xử lý yêu cầu này thông qua route DELETE đã được định nghĩa và thực thi phương thức delete trong ProjectController --}}
            <form action="/experience/{{ $experience->id }}" method="POST">
                @csrf
                {{-- @method('DELETE') notion dans la route Route::delete('/project/{id}', [ProjectController::class,'delete']); --}}
                @method('DELETE')
                <button class="btn btn-outline-primary" type="submit">Delete</button>
            </form>
        @endif
    @endforeach

    <br>
    <a href="/experience/create" role="button">Create a new Edu</a>
@endsection
