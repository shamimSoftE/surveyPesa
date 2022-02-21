<div class="sidebar-wrapper sidebar-theme mt-2">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <style>
                .active {
                    color: #4361ee !important;
                }
            </style>

            @php
                $prefix = Request::route()->getPrefix();
                $route = Route::current()->getName();
            @endphp

            @if(auth()->user()->type == 'admin')

                <li class="menu">
                    <a href="#app" data-toggle="collapse" aria-expanded="{{ ($prefix == '/withdraw') ? 'true' : 'false' }}" class="{{ ($prefix == '/withdraw') ? 'dropdown-toggle' : 'dropdown-toggle collapsed' }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                            <span>Withdraw</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="{{ ($route == 'withdraw_request') ? 'submenu list-unstyled collapse show' : 'collapse submenu list-unstyled' }}" id="app" data-parent="#accordionExample">
                        <li class="{{ ($route == 'withdraw_request') ? 'active' : '' }}">
                            <a href="{{ route('withdraw_request') }}"> Pending List </a>
                        </li>

                        <li class="{{ ($route == 'withdraw_completed') ? 'active' : '' }}">
                            <a href="{{ route('withdraw_completed') }}"> Complete List </a>
                        </li>
                    </ul>
                </li>

                <li class="menu">
                    <a href="#components" data-toggle="collapse" aria-expanded="{{ ($prefix == '/survey-question') ? 'true' : 'false' }}" class="{{ ($prefix == '/survey-question') ? 'dropdown-toggle' : 'dropdown-toggle collapsed' }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                            <span>Survey Question</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="{{ ($route == 'surv_questions') ? 'submenu list-unstyled collapse show' : 'collapse submenu list-unstyled' }}" id="components" data-parent="#accordionExample">
                        <li class="{{ ($route == 'surv_questions') ? 'active' : '' }}">
                            <a href="{{ route('surv_questions') }}"> Question List </a>
                        </li>
                        <li class="{{ ($route == 'surv_questions_create') ? 'active' : '' }}">
                            <a href="{{ route('surv_questions_create') }}"> Question Create </a>
                        </li>
                    </ul>
                </li>

                <li class="menu">
                    <a href="{{ route('ans_servey') }}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                            <span>Question Answer</span>
                        </div>
                    </a>
                </li>

                {{-- <li class="menu">
                    <a href="{{ route('site.index') }}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                            <span>Site Settings</span>
                        </div>
                    </a>
                </li> --}}

            @else

                <li class="menu">
                    <a target="_blank" href="{{ route('survey_question_forUser') }}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                            <span class="{{ ($route == 'survey_question_forUser') ? 'active' : '' }}">Survey Qustion</span>
                        </div>
                    </a>
                </li>
                {{-- <li class="menu">
                    <a class="{{ ($route == 'landing') ? 'active' : '' }}" href="{{ route('landing') }}" aria-expanded="false" class="dropdown-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        Home
                    </a>
                </li> --}}
            @endif

        </ul>

    </nav>

</div>
