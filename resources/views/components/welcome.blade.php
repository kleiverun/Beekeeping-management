<div class="p-6 lg:p-8 bg-orange border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto"/>

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome {{ Auth::user()->email }}!
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        This software aims to create an elegant way to keep track of your bee needs.
    </p>
</div>

<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <!-- Navigation Links -->
    <div class="flex items-center space-x-4">
        @foreach([
            'dashboard' => 'Dashboard',
            'newHive' => 'Registrer et nytt bifolk',
            'newApiary' => 'Registrer en ny bigård',
            'apiaries' => 'Se dine bigårder og bikuber',
            'newQueen' => 'Registrer dronning',
            'newHarvest' => 'Registrer innhøsting',
        ] as $route => $label)
            <a href="{{ route($route) }}" class="text-orange-500 hover:text-orange-700 transition duration-100 ease-in-out">
                {{ __($label) }}
            </a>
        @endforeach
    </div>

    <!-- Other Content -->
    <p class="mt-6 text-gray-500 leading-relaxed text-xl">
        {{$totalHives}} 🐝
    </p>
    <div class="flex items-center">
        <p class="mt-6 text-gray-500 leading-relaxed text-xl">
            {{ $totalApiaries }}
        </p>
        <img src="{{ asset('storage/img/beehive.png') }}" class="ml-1" style="width: 50px; height: 50px;">
    </div>

    <div class="mt-6">
        <a href="{{ route('apiaries') }}"
           class="bg-orange-500 hover:border-4 hover:text-black hover:border-opacity-100 text-white py-2 px-4 rounded-md transition-all duration-100">
            {{ __('Adminstrer dine bigårder') }}
        </a>
    </div>
</div>
