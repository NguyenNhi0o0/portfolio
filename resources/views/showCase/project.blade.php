@extends('layouts.app')

@section('content')
    @if (!empty($imagesByCategory['BannerProject']))
        @foreach ($imagesByCategory['BannerProject'] as $image)
            <div class="projects">
                <div class="projects__bio-image"
                    style="background: linear-gradient(to right, rgba(39, 39, 39, 0.8), rgba(39, 39, 39, 0.3)), 
                    url('{{ asset('storage/' . str_replace('public/', '', $image->src)) }}')">
                    <h1 class="text-secondary">Projects</h1>
                </div>

                <div class="projects__items myBtn" id="myBtn">
                    @foreach ($projects as $index => $project)
                        <div class="projects__item">
                            @if ($project->image)
                                <img class="rounded mx-auto d-block"
                                    src="{{ asset('storage/' . str_replace('public/', '', $project->image->src)) }}"
                                    alt="Image du projet" style="height:250px">
                            @endif
                            {{-- <img style="height:250px" src="" alt=""> --}}
                            <!-- The Modal -->
                            <div id="myModal-{{ $index }}" class="modal" style="z-index: 2">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <h2>
                                        {{ $project->title }}
                                    </h2>
                                    <h5>
                                        Link Github: {{ $project->linkgitHub }}
                                    </h5>
                                    <p>
                                        {{ $project->description }}
                                    </p>
                                    <h5>
                                        Skills:
                                    </h5>
                                    <p>
                                        @foreach ($project->skills as $skill)
                                            {{ $skill->name }}
                                        @endforeach
                                    </p>

                                </div>
                            </div>
                            <div class="projects__btns">
                                <a class="projects__btn" target="_blank" onclick="openModal({{ $index }})">
                                    <i class="fas fa-eye"></i> preview
                                </a>
                                <a class="projects__btn" target="_blank">
                                    <i class="fab fa-github"></i> Github
                                </a>
                            </div>
                            <div class="projects__item__name">
                                <h2>
                                    {{ $project->title }}
                                </h2>

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach
    @else
        <div class="projects">
            <div class="projects__bio-image">
                <h1 class="text-secondary">Projects</h1>
            </div>

            <div class="projects__items" id="myBtn">
                @foreach ($projects as $project)
                    <div class="projects__item">
                        {{-- @if ($project->image)
                            <img class="rounded mx-auto d-block"
                                src="{{ asset('storage/' . str_replace('public/', '', $project->image->src)) }}"
                                alt="Image du projet" style="height:250px">
                        @endif --}}
                        <img style="height:250px" src="" alt="">
                        <!-- The Modal -->
                        {{-- <div id="myModal" class="modal">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <h2>
                                    {{ $project->title }}
                                </h2>
                                <p>
                                    {{ $project->description }}
                                </p>
                            </div>
                        </div> --}}
                        <div class="projects__btns">
                            <a class="projects__btn" target="_blank">
                                <i class="fas fa-eye"></i> preview
                            </a>
                            <a class="projects__btn" target="_blank">
                                <i class="fab fa-github"></i> Github
                            </a>
                        </div>
                        <div class="projects__item__name">
                            <h2>
                                {{ $project->title }}
                            </h2>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    @endif



    <script>
        function openModal(index) {
            var modal = document.getElementById("myModal-" + index);
            modal.style.display = "block";


            var span = modal.getElementsByClassName("close")[0];


            span.onclick = function() {
                modal.style.display = "none";
            }
        }


        window.onclick = function(event) {
            for (let i = 0; i < {{ count($projects) }}; i++) {
                var modal = document.getElementById("myModal-" + i);
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
    </script>
@endsection
