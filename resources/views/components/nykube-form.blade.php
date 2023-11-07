<div class="flex justify-center h-screen">
    <div class="bg-white p-4 w-3/4 rounded-lg" style="box-shadow: 0 0 10px rgba(192, 0, 0, 0.2);">
        <form method="POST" class="max-w-sm mx-auto space-y-4">
            <div class="text-yellow-600 text-sm font-bold">Velg hvilke bigård denne kuben tilhører:</div>
            <select id="hive" class="block w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded-lg focus:outline-none focus:border-gray-500">
                <option disabled>Velg bigård</option>
                <x-bigard-select/>
            </select>

            <div class="text-yellow-600 text-sm font-bold">Skriv inn identifikasjon på denne kuben</div>
            <input id="identification" class="bg-white border border-gray-300 w-full text-gray-700 py-2 px-3 rounded-lg focus:outline-none" type="text" placeholder="Identifikasjon på denne kuben" aria-label="Identifikasjon">

            <div class="text-yellow-600 text-sm font-bold">Totalt skattekasser på denne kuben:</div>
            <input id="size" class="bg-white border border-gray-300 w-full text-gray-700 py-2 px-3 rounded-lg focus:outline-none" type="number" placeholder="Skattekasser" aria-label="Størrelse" min="0" pattern="\d*">


            <button class="bg-menu-orange border border-gray-300 hover:bg-green-700 text-sm text-white py-2 px-4 rounded-lg" type="button">Registrer ny kube</button>
            <button class="bg-menu-orange border border-gray-300 hover:bg-red-700 text-sm text-white py-2 px-4 rounded-lg" type="button">Gå tilbake</button>
        </form>
    </div>
</div>
