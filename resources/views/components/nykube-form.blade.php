<div class="flex justify-center items-center h-1/2 w-1/2">
    <div class="border border-white p-4 w-3/4 rounded-lg mt-20 bg-menu-orange">
        <form class="w-full max-w-sm">
            <div class="flex flex-col items-start">
                <label for="hive" class="text-gray-700 text-sm font-bold mb-1">Velg hvilke bigård denne kuben tilhører:</label>
                <div class="w-full">
                    <select id="hive" class="block w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option>Velg hvilke bigård denne kuben tilhører</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                    </select>
                </div>

                <label for="identification" class="text-gray-700 text-sm font-bold mb-1 mt-4">Skriv inn identifikasjon på denne kuben</label>
                <input id="identification" class="appearance-none bg-white border border-black w-full text-gray-700 mb-3 py-1 px-2 leading-tight focus:outline-none rounded" type="text" placeholder="Identifikasjon på denne kuben" aria-label="Identifikasjon">

                <label for="size" class="text-gray-700 text-sm font-bold mb-1">Totalt skattekasser på denne kuben:</label>
                <input id="size" class="appearance-none bg-white border border-black w-full text-gray-700 py-1 px-2 mb-3 leading-tight focus:outline-none rounded" type="number" placeholder="Skattekasser" aria-label="Størrelse">
            </div>


            <button class="bg-menu-orange border border-black hover:bg-green-700 text-sm text-white py-1 px-2 rounded" type="button">Registrer ny kube</button>
            <button class="bg-menu-orange border border-black hover:bg-red-700 text-sm text-white py-1 px-2 rounded mt-2" type="button">Gå tilbake</button>
        </form>
    </div>
</div>
