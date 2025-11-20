@extends('layouts.app')

@section('content')
    @php
        $activePage = request()->is('/admin') ? 'home' : '';
    @endphp
    @if(!empty($imagesByCategory['Profile']))
        @foreach ($imagesByCategory['Profile'] as $image)
            <main>
                <section class="home"
                    style="background-image:
        linear-gradient(to right, rgba(39, 39, 39, 0.8), rgba(39, 39, 39, 0.3)), 
        url('{{ asset('storage/' . str_replace('public/', '', $image->src)) }}');">
                    <div class="centered__box">
                        <div class="home__greeting">
                            <h2>
                                @content('iAm')
                            </h2>
                            <h1 class="home__name">
                                @content('homeName')
                                <span class="home__name--last"> @content('homeNameLast')</span>
                            </h1>
                            <h2>
                                @content('sousTitle')
                            </h2>

                        </div>
                    </div>
                </section>
            </main>
        @endforeach
    @else
        <main>
            <section class="home">
                <div class="centered__box">
                    <div class="home__greeting">
                        <h2>
                            @content('iAm')
                        </h2>
                        <h1 class="home__name">
                            @content('homeName')
                            <span class="home__name--last"> @content('homeNameLast')</span>
                        </h1>
                        <h2>
                            @content('sousTitle')
                        </h2>
                    </div>
                </div>
            </section>
        </main>
    @endif
@endsection
