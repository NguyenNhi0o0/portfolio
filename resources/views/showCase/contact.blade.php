@extends('layouts.app')

@section('content')
    @if (!empty($imagesByCategory['BannerContact']))
        @foreach ($imagesByCategory['BannerContact'] as $image)
            <div class="contact"
                style="background: linear-gradient(to right, rgba(39, 39, 39, 0.9), rgba(39, 39, 39, 0.5)), 
                url('{{ asset('storage/' . str_replace('public/', '', $image->src)) }}');">
                @if (session('success'))
                    <div class="alert alert-success" style="color:aliceblue">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="/contacts/create" method="post">
                    @csrf
                    <div class="contact__list home__name">
                        <div class="contact__name">
                            <i class="fas fa-user"></i> Name
                            <div class="text-secondary">
                                <input type="text" name="name" placeholder="name">
                            </div>
                        </div>
                        <div class="contact__email">
                            <i class="fas fa-envelope"></i> Email
                            <div class="text-secondary">
                                <input type="email" name="email" placeholder="email">
                            </div>
                        </div>
                        <div class="contact__phone">
                            <i class="fas fa-mobile-alt"></i> Phone
                            <div class="text-secondary">
                                <input type="tel" name="phone">
                            </div>
                        </div>


                    </div>
                    <div>
                        <i class=" fas fa-pen"></i>
                        <address></address>
                        <div>
                            <textarea type="text" name="yourMessages" placeholder="your messages"
                                style="width: 100%; height: 200px; font-size: 14px; padding: 10px;"></textarea>
                        </div>
                    </div>
                    <br>

                    <input class="btn btn-outline-primary" style="color:aliceblue;" type="submit" value="Submit">

                </form>



            </div>
           
        @endforeach
    @else
        <div class="contact">
            @if (session('success'))
                <div class="alert alert-success" style="color:aliceblue">
                    {{ session('success') }}
                </div>
            @endif
            <form action="/contact" method="post">
                @csrf
                <div class="contact__list home__name">
                    <div class="contact__name">
                        <i class="fas fa-user"></i> Name
                        <div class="text-secondary">
                            <input type="text" name="name" placeholder="name">
                        </div>
                    </div>
                    <div class="contact__email">
                        <i class="fas fa-envelope"></i> Email
                        <div class="text-secondary">
                            <input type="email" name="email" placeholder="email">
                        </div>
                    </div>
                    <div class="contact__phone">
                        <i class="fas fa-mobile-alt"></i> Phone
                        <div class="text-secondary">
                            <input type="tel" name="phone">
                        </div>
                    </div>


                </div>
                <div>
                    <i class=" fas fa-pen"></i>
                    <address></address>
                    <div>
                        <textarea type="text" name="yourMessages" placeholder="your messages"
                            style="width: 100%; height: 200px; font-size: 14px; padding: 10px;"></textarea>
                    </div>
                </div>
                <br>

                <input class="btn btn-outline-primary" style="color:aliceblue;" type="submit" value="Submit">

            </form>



        </div>
    @endif
    <div class="contact-info-box">
    <h2 class="contact-info-title">Mes Coordonnées</h2>

    <div class="contact-info-row">
        <i class="fas fa-phone-alt"></i>
        <span>+33 6 67 41 71 98</span>
    </div>

    <div class="contact-info-row">
        <i class="fas fa-envelope"></i>
        <span>truongnhi700@gmail.com</span>
    </div>

    <div class="contact-info-row">
        <i class="fas fa-map-marker-alt"></i>
        <span>Strasbourg, France</span>
    </div>

    <div class="contact-info-row social-icons">
        <a href="https://github.com/NguyenNhi0o0" target="_blank"><i class="fab fa-github"></i></a>
        <a href="https://www.linkedin.com/in/phuong-truong-nhi-nguyen/" target="_blank"><i class="fab fa-linkedin"></i></a>
    </div>
</div>


@endsection
