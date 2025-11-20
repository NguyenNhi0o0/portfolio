@extends('layouts.app')

@section('content')
    @if (!empty($imagesByCategory['BannerHome']))
        @foreach ($imagesByCategory['BannerHome'] as $image)
            <div class="about">
                <div class="about__bio-image"
                    style="background: 
        linear-gradient(to right, rgba(39, 39, 39, 0.8), rgba(39, 39, 39, 0.3)), 
        url('{{ asset('storage/' . str_replace('public/', '', $image->src)) }}');">
                    <div class="about__bio">
                        <!-- <h2 class="text-secondary">BIO</h2> -->
                    </div>
                </div>
                <div class="jobs">
                    <p>@content('salutation')</p>
                    <p>

                    </p>
                    <div class="jobs__job">
                        <h2 class="text-secondary"></h2>
                        <h3 class="job__company">
                        </h3>
                        <h5 class="job__position">@content('job__position')</h5>
                        <ul>
                            <li>
                                @content('job_des1')
                            </li>
                            <li>
                                @content('job_des2')
                            </li>
                            <li>
                                @content('job_des3')
                            </li>
                            <li>
                                @content('job_des4')
                            </li>
                            <li>
                                @content('job_des5')
                            </li>

                        </ul>
                    </div>
                    <h2>
                        Educations:
                    </h2>
                    @foreach ($educations as $education)
                        <div class="jobs__job">
                            <h2 class="text-secondary">
                                @switch($education->sta_month)
                                    @case(1)
                                        January
                                    @break

                                    @case(2)
                                        February
                                    @break

                                    @case(3)
                                        March
                                    @break

                                    @case(4)
                                        April
                                    @break

                                    @case(5)
                                        May
                                    @break

                                    @case(6)
                                        June
                                    @break

                                    @case(7)
                                        July
                                    @break

                                    @case(8)
                                        August
                                    @break

                                    @case(9)
                                        September
                                    @break

                                    @case(10)
                                        October
                                    @break

                                    @case(11)
                                        November
                                    @break

                                    @case(12)
                                        December
                                    @break
                                        Present
                                    @default
                                @endswitch
                                {{ $education->sta_year }}
                                -
                                @switch($education->end_month)
                                    @case(1)
                                        January
                                    @break

                                    @case(2)
                                        February
                                    @break

                                    @case(3)
                                        March
                                    @break

                                    @case(4)
                                        April
                                    @break

                                    @case(5)
                                        May
                                    @break

                                    @case(6)
                                        June
                                    @break

                                    @case(7)
                                        July
                                    @break

                                    @case(8)
                                        August
                                    @break

                                    @case(9)
                                        September
                                    @break

                                    @case(10)
                                        October
                                    @break

                                    @case(11)
                                        November
                                    @break

                                    @case(12)
                                        December
                                    @break
                                        Present
                                    @default
                                @endswitch
                                
                                {{ $education->end_year }}
                            </h2>
                            <h3 class="job__company">
                                {{ $education->name_edu }}
                            </h3>
                            <h5 class="job__position">
                                Description:
                            </h5>
                            <ul>
                                {{ $education->description }}
                            </ul>
                            {{-- <h5 class="job__position">
                                Skill:
                            </h5>
                            <ul>
                                @foreach ($education->skills as $skill)
                                    <li>
                                        {{ $skill->name }}
                                    </li>
                                @endforeach
                            </ul> --}}
                        </div>
                    @endforeach
                    <h2>
                        Experiences:
                    </h2>
                    @foreach ($experiences as $experience)
                        <div class="jobs__job">
                            <h2 class="text-secondary">
                                @switch($experience->sta_month)
                                    @case(1)
                                        January
                                    @break

                                    @case(2)
                                        February
                                    @break

                                    @case(3)
                                        March
                                    @break

                                    @case(4)
                                        April
                                    @break

                                    @case(5)
                                        May
                                    @break

                                    @case(6)
                                        June
                                    @break

                                    @case(7)
                                        July
                                    @break

                                    @case(8)
                                        August
                                    @break

                                    @case(9)
                                        September
                                    @break

                                    @case(10)
                                        October
                                    @break

                                    @case(11)
                                        November
                                    @break

                                    @case(12)
                                        December
                                    @break
                                        Present
                                    @default
                                @endswitch
                                {{ $experience->sta_year }}
                                -
                                @switch($experience->end_month)
                                    @case(1)
                                        January
                                    @break

                                    @case(2)
                                        February
                                    @break

                                    @case(3)
                                        March
                                    @break

                                    @case(4)
                                        April
                                    @break

                                    @case(5)
                                        May
                                    @break

                                    @case(6)
                                        June
                                    @break

                                    @case(7)
                                        July
                                    @break

                                    @case(8)
                                        August
                                    @break

                                    @case(9)
                                        September
                                    @break

                                    @case(10)
                                        October
                                    @break

                                    @case(11)
                                        November
                                    @break

                                    @case(12)
                                        December
                                    @break
                                        Present
                                    @default
                                @endswitch
                                {{ $experience->end_year }}
                            </h2>
                            <h3 class="job__company">
                                {{ $experience->name_exp }}
                            </h3>
                            <h5 class="job__position">Description:</h5>
                            <ul>
                                <li>
                                    {{ $experience->description }}
                                </li>
                            </ul>
                            {{-- <h5 class="job__position">
                                Skill:
                            </h5>
                            <ul>
                                @foreach ($experience->skills as $skill)
                                    <li>
                                        {{ $skill->name }}
                                    </li>
                                @endforeach
                            </ul> --}}
                        </div>
                    @endforeach

                </div>
            </div>
        @endforeach
    @else
        <div class="about">
            <div class="about__bio-image">
                <div class="about__bio">
                    <!-- <h2 class="text-secondary">BIO</h2> -->
                </div>
            </div>
            <div class="jobs">
                <p>@content('salutation')</p>
                <p>

                </p>
                <div class="jobs__job">
                    <h2 class="text-secondary"></h2>
                    <h3 class="job__company">
                    </h3>
                    <h5 class="job__position">@content('job__position')</h5>
                    <ul>
                        <li>
                            @content('job_des1')
                        </li>
                        <li>
                            @content('job_des2')
                        </li>
                        <li>
                            @content('job_des3')
                        </li>
                        <li>
                            @content('job_des4')
                        </li>
                        <li>
                            @content('job_des5')
                        </li>

                    </ul>
                </div>
                <h2>
                    Educations:
                </h2>
                @foreach ($educations as $education)
                    <div class="jobs__job">
                        <h2 class="text-secondary">
                            @switch($education->sta_month)
                                @case(1)
                                    January
                                @break

                                @case(2)
                                    February
                                @break

                                @case(3)
                                    March
                                @break

                                @case(4)
                                    April
                                @break

                                @case(5)
                                    May
                                @break

                                @case(6)
                                    June
                                @break

                                @case(7)
                                    July
                                @break

                                @case(8)
                                    August
                                @break

                                @case(9)
                                    September
                                @break

                                @case(10)
                                    October
                                @break

                                @case(11)
                                    November
                                @break

                                @case(12)
                                    December
                                @break

                                @default
                            @endswitch
                            {{ $education->sta_year }}
                            -
                            @switch($education->end_month)
                                @case(1)
                                    January
                                @break

                                @case(2)
                                    February
                                @break

                                @case(3)
                                    March
                                @break

                                @case(4)
                                    April
                                @break

                                @case(5)
                                    May
                                @break

                                @case(6)
                                    June
                                @break

                                @case(7)
                                    July
                                @break

                                @case(8)
                                    August
                                @break

                                @case(9)
                                    September
                                @break

                                @case(10)
                                    October
                                @break

                                @case(11)
                                    November
                                @break

                                @case(12)
                                    December
                                @break

                                @default
                            @endswitch
                            {{ $education->end_year }}
                        </h2>
                        <h3 class="job__company">
                            {{ $education->name_edu }}
                        </h3>
                        <h5 class="job__position">
                            Description:
                        </h5>
                        <ul>
                            {{ $education->description }}
                        </ul>
                        <h5 class="job__position">
                            Skill:
                        </h5>
                        <ul>
                            @foreach ($education->skills as $skill)
                                <li>
                                    {{ $skill->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                <h2>
                    Experiences:
                </h2>
                @foreach ($experiences as $experience)
                    <div class="jobs__job">
                        <h2 class="text-secondary">
                            @switch($experience->sta_month)
                                @case(1)
                                    January
                                @break

                                @case(2)
                                    February
                                @break

                                @case(3)
                                    March
                                @break

                                @case(4)
                                    April
                                @break

                                @case(5)
                                    May
                                @break

                                @case(6)
                                    June
                                @break

                                @case(7)
                                    July
                                @break

                                @case(8)
                                    August
                                @break

                                @case(9)
                                    September
                                @break

                                @case(10)
                                    October
                                @break

                                @case(11)
                                    November
                                @break

                                @case(12)
                                    December
                                @break

                                @default
                            @endswitch
                            {{ $experience->sta_year }}
                            -
                            @switch($experience->end_month)
                                @case(1)
                                    January
                                @break

                                @case(2)
                                    February
                                @break

                                @case(3)
                                    March
                                @break

                                @case(4)
                                    April
                                @break

                                @case(5)
                                    May
                                @break

                                @case(6)
                                    June
                                @break

                                @case(7)
                                    July
                                @break

                                @case(8)
                                    August
                                @break

                                @case(9)
                                    September
                                @break

                                @case(10)
                                    October
                                @break

                                @case(11)
                                    November
                                @break

                                @case(12)
                                    December
                                @break

                                @default
                            @endswitch
                            {{ $experience->end_year }}
                        </h2>
                        <h3 class="job__company">
                            {{ $experience->name_exp }}
                        </h3>
                        <h5 class="job__position">Description:</h5>
                        <ul>
                            <li>
                                {{ $experience->description }}
                            </li>
                        </ul>
                        <h5 class="job__position">
                            Skill:
                        </h5>
                        <ul>
                            @foreach ($experience->skills as $skill)
                                <li>
                                    {{ $skill->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach

            </div>
        </div>
    @endif

@endsection
