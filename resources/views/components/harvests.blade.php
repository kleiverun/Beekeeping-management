@props(['harvests'])
<div class="pt-5 flex justify-center ">


        @foreach($harvests as $harvest)
            <div class="bg-gray-100 p-4 mb-4 rounded-md">
                <div class="bg-white shadow-md rounded-md p-4">
                    <h2 class="text-lg font-semibold mb-2 text-orange-500">Dette er bikube {{$harvest -> hiveID}}</h2>
                <p class="text-md font-semibold mb-2">Vekt for denne innhøstingen: {{ $harvest->harvestWeight }}</p>
                <p class="text-md font-semibold mb-2">Antall skattekasser innhøstet: {{ $harvest->supersHarvested }}</p>
                <p class="text-md font-semibold mb-2">Dato for innhøsting: {{ $harvest->created_at}}</p>
            </div>
        @endforeach
    </div>
</div>
