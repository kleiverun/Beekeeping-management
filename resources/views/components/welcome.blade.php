<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto"/>

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome {{ Auth::user()->email }}!
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        This software aims to create a elegant way to keep track of your bee hives, queens and apiaries.
    </p>
</div>
<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <p class="mt-6 text-gray-500 leading-relaxed">
        🐝 {{$totalHives}} .
    </p>
    <p class="mt-6 text-gray-500 leading-relaxed">
        Du har registrert {{ $totalApiaries }} bigårder.
    </p>
    <div class="mt-6">
        <a href="{{ route('apiaries') }}"
           class="bg-orange-500 hover:bg-green-500 text-white py-2 px-4 rounded-md transition-all duration-300">
            {{ __('View apiaries') }}
        </a>
    </div>

</div>
