<div class="p-6 lg:p-8 bg-orange border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto"/>

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome {{ Auth::user()->email }}!
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        This software aims to create a elegant way to keep track of your bee needs.
    </p>
</div>
<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <p class="mt-6 text-gray-500 leading-relaxed">
        🐝 {{$totalHives}} bikuber
    </p>
    <div class="flex items-center">
        <p class="mt-6 text-gray-500 leading-relaxed text-xl"> <!-- Adjust text-lg for larger font size -->
            {{ $totalApiaries }}
        </p>
        <img src="{{ asset('storage/img/beehive.png') }}" class="ml-2" style="width: 50px; height: 50px;"> <!-- Adjust width and height for larger image -->
    </div>

    <div class="mt-6">
        <a href="{{ route('apiaries') }}"
           class="bg-orange-500 hover:border-4 hover:text-black hover:border-opacity-100 text-white py-2 px-4 rounded-md transition-all duration-100">
            {{ __('Adminstrer dine bigårder') }}
        </a></div>

</div>
