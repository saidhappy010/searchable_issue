<div class="min-h-full">
    <nav class=" bg-green-600">
        <div x-data="{ isOpen: false }">
            {{-- max-w-[80%] --}}
            <div class="mx-auto lg:px-8" style="max-width: 95rem">
                <div class="flex items-center justify-between h-16">

                    <div class="flex justify-between items-center">
                        <div class=" xl:pe-12">

                            <a @unlessrole('local-admin|authority')  href="/" @else href="#" @endunlessrole>
                                <x-application-logo-white class="w-20 h-20 fill-current text-gray-500" />
                            </a>
                        </div>
                        <div class="hidden rm:block  xl:ps-12">
                            <div class="ms-10 flex items-baseline lg:space-s-4">
                                {{-- str_contains('/admin/SuperDashboard', 'Dashboard') --}}
                                <!-- Current: "bg-indigo-700 text-white", Default: "text-white hover:bg-green_hover hover:bg-opacity-75" -->
                                @unlessrole('local-admin|authority')
                                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.SuperDashboard') ||
                                        request()->routeIs('admin.DassDashboard') ||
                                        request()->routeIs('admin.CentralDashboard')">
                                        {{ __('Dashboard') }}
                                    </x-nav-link>
                                @endunlessrole
                                @unlessrole('local-admin')
                                    <x-nav-link :href="route('admin.establishments.index')" :active="request()->routeIs('admin.establishments*')">
                                        {{ __('Establishments') }}
                                    </x-nav-link>
                                @endunlessrole
                                @hasrole('super-admin|dass-admin')
                                    <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users*')">
                                        {{ __('Users') }}
                                    </x-nav-link>
                                @endrole

                                @hasrole('super-admin')
                                    <x-dropdown align="start" width="48">
                                        <x-slot name="trigger">
                                            <button
                                                class="flex items-center text-white hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out {{ request()->routeIs('admin.configurations*') ? 'bg-green-900' : 'hover:bg-green-800 hover:bg-opacity-75' }}">
                                                <div>{{ __('Configurations') }}</div>

                                                <div class="ms-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <div class="text-gray-700">
                                                <x-dropdown-link :href="route('admin.category.index')">
                                                    {{ __('Establishment type categories') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link :href="route('admin.type-etabissement.index')">
                                                    {{ __('Establishments types') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link :href="route('admin.populations.index')">
                                                    {{ __('Population types') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link :href="route('admin.age_ranges.index')">
                                                    {{ __('Age ranges') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link :href="route('admin.structure.index')">
                                                    {{ __('Structures') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link :href="route('admin.city.index')">
                                                    {{ __('Cities') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link :href="route('admin.authority-type.index')">
                                                    {{ __('Authority types') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link :href="route('admin.front_office.index')">
                                                    {{ __('Front office informations') }}
                                                </x-dropdown-link>
                                            </div>
                                        </x-slot>

                                    </x-dropdown>
                                @endrole
                            </div>
                        </div>



                    </div>
                    <div class="hidden rm:block">
                        <div class="ms-4 flex items-center rm:ms-6">
                            <x-nav-link href="{{ route('locale.setting', 'fr') }}">
                                {{ __('French', locale: 'fr') }}
                            </x-nav-link>
                            <p class="text-white">|</p>
                            <x-nav-link href="{{ route('locale.setting', 'ar') }}">
                                {{ __('Arabic', locale: 'ar') }}
                            </x-nav-link>
                            <x-dropdown align="right" width="64">
                                <x-slot name="trigger">
                                    <button type="button"
                                        class="bg-green p-1 rounded-full text-indigo-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-00 focus:ring-white">
                                        <span class="sr-only">View notifications</span>
                                        <span id="js-count">
                                            <?php if (
                                                auth()
                                                    ->user()
                                                    ->unreadNotifications->count() > 0
                                            ) {
                                                echo auth()
                                                    ->user()
                                                    ->unreadNotifications->count();
                                            } ?>
                                        </span>
                                        <!-- Heroicon name: outline/bell -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                    </button>

                                </x-slot>
                                <x-slot name="content">
                                    {{-- <div class="w-full hidden z-99 h-full  bg-opacity-90 top-30 overflow-y-auto overflow-x-hidden fixed sticky-0" id="chec-div">
            <div class="w-full absolute right-0 h-full overflow-x-hidden transform translate-x-0 transition ease-in-out duration-700" id="notification"> --}}
                                    <div class=" bg-white h-auto overflow-y-auto w-64">
                                        <?php $i = 0; ?>
                                        @if (!auth()->user()->Notifications->isEmpty())
                                            @foreach (auth()->user()->Notifications as $notification)
                                                @if ($i < 6)
                                                    <div
                                                        class="w-full  mt-2 p-2 rounded flex hover:bg-gray-50 {{ $notification['read_at'] == null ? 'bg-gray-100' : 'bg-white' }}">
                                                        <button class="text-start">
                                                            <div onclick="window.location.href='/admin/notifications'"
                                                                class="ps-3">
                                                                <p tabindex="0"
                                                                    class="focus:outline-none text-sm leading-none">
                                                                    <?php
                                                                    if (App::getLocale() == 'ar') {
                                                                        echo $notification['data']['message']['ar'];
                                                                    } elseif (App::getLocale() == 'fr') {
                                                                        echo $notification['data']['message']['fr'];
                                                                    }
                                                                    ?>
                                                                </p>
                                                                <p tabindex="0"
                                                                    class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">
                                                                    {{ $notification['created_at'] }}</p>
                                                            </div>
                                                        </button>
                                                    </div>
                                                    <?php $i++; ?>
                                                @else
                                                    <?php break; ?>
                                                @endif
                                            @endforeach

                                            <button onclick="window.location.href = `/admin/notifications`"
                                                class="inline-flex justify-center w-full mt-2 rounded-md border border-gray-300 text-white shadow-sm px-4 py-2 bg-green-600  text-sm font-medium hover:text-gray-700 hover:bg-gray-50 ">{{ __('see all') }}</button>
                                        @else
                                            <x-no-element-found-navBar />
                                        @endif
                                    </div>
                                    {{-- </div>
        </div> --}}
                                </x-slot>
                            </x-dropdown>



                            {{-- ml-4 sm:flex sm:items-center sm:ml-6 --}}
                            <div class="mx-3 relative ">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-green-700"
                                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                                            <span class="hidden lg:block">{{ Auth::user()->username }}</span>
                                            <!-- Heroicon name: solid/chevron-down -->
                                            <svg class="-me-1 ms-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                    </x-slot>
                                    <x-slot name="content">
                                        <div class="py-1" role="none">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </div>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center rm:hidden">
                        <x-nav-link href="{{ route('locale.setting', 'fr') }}">
                            {{ __('Fr') }}
                        </x-nav-link>
                        <p class="text-white">|</p>
                        <x-nav-link href="{{ route('locale.setting', 'ar') }}">
                            {{ __('Ar') }}
                        </x-nav-link>
                    </div>
                    <div class="-me-2 flex rm:hidden">

                        <!-- Mobile menu button -->
                        <button type="button"
                            class="bg-green inline-flex items-center justify-center p-2 rounded-md text-indigo-200 hover:text-white hover:bg-green_hover hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-600 focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false" @click="isOpen = (isOpen) ? false : true">
                            <span class="sr-only">Open main menu</span>

                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                                <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div x-show="isOpen" class="rm:hidden bg-green-600 " id=" mobile-menu" {{-- x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0 transform scale-10"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-1000"
                x-transition:leave-start="opacity-100 transform scale-10"
                x-transition:leave-end="opacity-0 transform scale-90" --}}
                x-transition:enter="transition ease-in-out duration-1000"
                x-transition:enter-start="opacity-0 transform scale-y-0 -translate-y-1/2"
                x-transition:enter-end="opacity-100 transform scale-y-100 translate-y-0"
                x-transition:leave="transition ease-in-out duration-1000"
                x-transition:leave-start="opacity-100 transform scale-y-100 translate-y-0"
                x-transition:leave-end="opacity-0 transform scale-y-0 -translate-y-1/2">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <!-- Current: "bg-indigo-700 text-white", Default: "text-white hover:bg-green_hover hover:bg-opacity-75" -->
                    <a href="#" id="test"
                        class="{{ request()->is('dashboard') ? 'bg-green_selected' : '' }}hover:bg-green_menu_hover hover:bg-opacity-75 text-white block px-3 py-2 rounded-md text-base font-medium"
                        aria-current="page">{{ __('Dashboard') }}</a>

                    <a href="{{ route('admin.establishments.index') }}"
                        class="text-white hover:bg-green_menu_hover hover:bg-opacity-75 block px-3 py-2 rounded-md text-base font-medium">
                        {{ __('Establishments') }}
                    </a>

                    <a href="{{ route('admin.users.index') }}"
                        class="{{ request()->is('admin/users') ? 'bg-green_selected' : '' }} text-white hover:bg-green_hover hover:bg-opacity-75 block px-3 py-2 rounded-md text-base font-medium">
                        {{ __('Users') }}
                    </a>
                    @hasrole('super-admin')
                        <div class="relative" x-data="{ open: false }">
                            <div>
                                <a href="#" @click="open = !open"
                                    class="{{ request()->segment(2) == 'configurations' ? 'bg-green_selected' : '' }} text-white hover:bg-green_hover hover:bg-opacity-75 block px-3 py-2 rounded-md text-base font-medium">
                                    {{ __('Configurations') }}
                                </a>
                            </div>
                            <!-- Dropdown content -->
                            <div x-show="open" x-cloak x-show="open" @click.outside="open=false" class="px-5 py-2"
                                {{-- x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass" --}} class="text-white space-y-3"
                                x-transition:enter="transition ease-in-out duration-1000"
                                x-transition:enter-start="opacity-0 transform scale-y-0 -translate-y-1/2"
                                x-transition:enter-end="opacity-100 transform scale-y-100 translate-y-0"
                                x-transition:leave="transition ease-in-out duration-1000"
                                x-transition:leave-start="opacity-100 transform scale-y-100 translate-y-0"
                                x-transition:leave-end="opacity-0 transform scale-y-0 -translate-y-1/2">
                                <ul class="flex flex-col ps-2 text-gray-100 border-s border-gray-100">
                                    <li>
                                        <x-dropdown-link :href="route('admin.type-etabissement.index')">
                                            {{ __('Establishments types') }}
                                        </x-dropdown-link>
                                    </li>
                                    <li>
                                        <x-dropdown-link :href="route('admin.populations.index')">
                                            {{ __('Population types') }}
                                        </x-dropdown-link>
                                    </li>
                                    <li>
                                        <x-dropdown-link :href="route('admin.age_ranges.index')">
                                            {{ __('Age ranges') }}
                                        </x-dropdown-link>
                                    </li>
                                    <li>
                                        <x-dropdown-link :href="route('admin.structure.index')">
                                            {{ __('Structures') }}
                                        </x-dropdown-link>
                                    </li>
                                    <li>
                                        <x-dropdown-link :href="route('admin.city.index')">
                                            {{ __('Cities') }}
                                        </x-dropdown-link>
                                    </li>
                                    <li>
                                        <x-dropdown-link :href="route('admin.authority-type.index')">
                                            {{ __('Authority types') }}
                                        </x-dropdown-link>
                                    </li>
                                    <li>
                                        <x-dropdown-link :href="route('admin.front_office.index')">
                                            {{ __('Front office informations') }}
                                        </x-dropdown-link>
                                    </li>



                                </ul>
                            </div>
                        </div>
                    @endrole
                </div>



                {{-- ============ example sun menu=============== --}}
                {{-- <div class="relative" x-data="{ open: false }">
                    <!-- Dropdown head -->
                    <div @click="open = !open" x-data="tooltip" x-on:mouseover="show = true"
                        x-on:mouseleave="show = false"
                        class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-green_hover hover:bg-opacity-75 items-center space-x-2 rounded-md p-2 cursor-pointer"
                        x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-grahover:bg-green_hover hover:bg-opacity-75':$store.sidebar.active == 'promote','text-gray-400 ':$store.sidebar.active != 'promote'}">
                        <div class="relative flex space-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 px-2 space-y-1">
                        <a href="#"
                           class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-green_hover hover:bg-opacity-75">
                           {{ __('Your Profile') }}</a>

                        <a href="#"
                           class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-green_hover hover:bg-opacity-75">{{ __('Settings') }}</a>

                {{-- ============= profile ======================= --}}
                <div class="pt-4 pb-3 border-t border-green-700">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full bg-white  border-4" src="/images/user.png"
                                alt="">
                        </div>
                        <div class="ms-3 text-white">
                            {{ Auth::user()->username }}
                            {{-- <div class="text-base font-medium text-white">Tom Cook</div>
                            <div class="text-sm font-medium text-indigo-300">tom@example.com</div> --}}
                        </div>
                         {{-- <button class="text-start">
                                                            <div onclick="window.location.href='/admin/notifications'"
                                                                class="ps-3">
                                                                <p tabindex="0"
                                                                    class="focus:outline-none text-sm leading-none">
                                                                    <?php
                                                                    if (App::getLocale() == 'ar') {
                                                                        echo $notification['data']['message']['ar'];
                                                                    } elseif (App::getLocale() == 'fr') {
                                                                        echo $notification['data']['message']['fr'];
                                                                    }
                                                                    ?>
                                                                </p>
                                                                <p tabindex="0"
                                                                    class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">
                                                                    {{ $notification['created_at'] }}</p>
                                                            </div>
                                                        </button> --}}
                        <button type="button" onclick="window.location.href='/admin/notifications'"
                            class="ms-auto bg-green-600 flex-shrink-0 p-1 border-2 border-transparent rounded-full text-indigo-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <?php if (
                                auth()
                                    ->user()
                                    ->unreadNotifications->count() > 0
                            ) {
                                echo auth()
                                    ->user()
                                    ->unreadNotifications->count();
                            } ?>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 px-2 space-y-1">
                        {{-- <a href="#"
                            class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-green_menu_hover hover:bg-opacity-75">Your
                            Profile</a>

                        <a href="#"
                            class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-green_menu_hover hover:bg-opacity-75">Settings</a> --}}

                        <div class="py-1" role="none" class="text-white text-base font-medium">
                            <form method="POST" action="{{ route('logout') }}"
                                class="text-white text-base font-bold">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- notification --}}


        {{-- <div class="w-full hidden z-99 h-full  bg-opacity-90 top-30 overflow-y-auto overflow-x-hidden fixed sticky-0" id="chec-div">
            <div class="w-full absolute right-0 h-full overflow-x-hidden transform translate-x-0 transition ease-in-out duration-700" id="notification">
                <div class="2xl:w-4/12 bg-gray-50 h-screen overflow-y-auto p-8 absolute right-0">
                <?php $i = 0; ?>
                @foreach (auth()->user()->Notifications as $notification)
                   @if ($i < 6)
                    <div class="w-full p-3 mt-4 bg-white rounded flex">
                        <button class="text-left">
                        <div onclick="window.location.href='/admin/notifications/{{$notification['id']}}'" class="pl-3">
                            <p tabindex="0" class="focus:outline-none text-sm leading-none">
                                <?php
                                if (App::getLocale() == 'ar') {
                                    echo $notification['data']['message']['ar'];
                                } elseif (App::getLocale() == 'fr') {
                                    echo $notification['data']['message']['fr'];
                                }
                                ?>
                            </p>
                            <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">{{ $notification['created_at'] }}</p>
                        </div>
                        </button>
                    </div>
                    <?php $i++; ?>
                    @else <?php break; ?>
                    @endif
                @endforeach
                <button onclick="window.location.href = `/admin/notifications`" class="inline-flex justify-center w-full rounded-md border border-gray-300 text-white shadow-sm px-4 py-2 bg-green-600 hover:bg-white text-sm font-medium hover:text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-green-700">{{ __('see all') }}</button>
                </div>
            </div>
        </div> --}}

        {{-- fin notification --}}

    </nav>
</div>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // $('.mobile-menuu a').on('click', function() {
            //     $('.mobile-menuu a').removeClass('active');
            //     $(this).addClass('active');
            // });
        })

        function redirectFunction($id) {
            window.location.href = `/admin/establishments/${$id}/edit`
        }

        let notification = document.getElementById("notification");
        let checdiv = document.getElementById("chec-div");
        let flag3 = false;
        const notificationHandler = () => {
            if (!flag3) {
                notification.classList.add("translate-y-full");
                notification.classList.remove("translate-y-0");
                setTimeout(function() {
                    checdiv.classList.add("hidden");
                }, 1000);
                flag3 = true;
            } else {
                setTimeout(function() {
                    notification.classList.remove("translate-y-full");
                    notification.classList.add("translate-y-0");
                }, 1000);
                checdiv.classList.remove("hidden");
                flag3 = false;
            }
        };
    </script> --}}
