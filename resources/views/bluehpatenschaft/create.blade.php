<div class="py-20 bg-white" id="form">

    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="text-3xl sm:text-5xl sm:leading-none sm:tracking-tight lg:text-6xl mb-6">Blühpate für Blühsaison 2020 werden</h2>
        <form action="{{ route('bluehpatenschaft.store') }}" method="POST">
            @csrf

            <x-honey/>

            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Blühfläche</label>
                    <select id="quantity" name="quantity" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md">
                        @foreach ($quantities as $quantity => $gross)
                            <option value="{{ $quantity }}">{{ $quantity }} m2 - {{ number_format($gross, 2, ',', '.') }} € für 1 Blühsaison</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="firstname" class="block text-sm font-medium text-gray-700">Vorname</label>
                    <input type="text" name="firstname" id="firstname" autocomplete="firstname" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="lastname" class="block text-sm font-medium text-gray-700">Nachname</label>
                    <input type="text" name="lastname" id="lastname" autocomplete="lastname" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <label for="address" class="block text-sm font-medium text-gray-700">Straße</label>
                    <input type="text" name="address" id="address" autocomplete="address" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="postcode" class="block text-sm font-medium text-gray-700">PLZ</label>
                    <input type="text" name="postcode" id="postcode" autocomplete="postcode" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="city" class="block text-sm font-medium text-gray-700">Ort</label>
                    <input type="text" name="city" id="city" autocomplete="city" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">E-Mail</label>
                    <input type="text" name="email" id="email" autocomplete="email" autocomplete="email" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <label for="description" class="block text-sm font-medium text-gray-700">Bezeichnung als Blühpate auf Homepage</label>
                    <input type="text" name="description" id="description" autocomplete="description" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <p class="mt-2 text-sm text-gray-500" id="description">Die Bezeichnug, die auf der Homepage unter "Blühpate" angezeigt wird. Wenn Sie nicht namentlich auf der Homepage genannt werden wollen, lassen Sie das Feld leer.</p>
                </div>

            </div>
            <button type="submit" class="mt-6 inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Kostenpflichtig Blühpate werden
            </button>
        </form>
        <p class="mt-3 text-sm text-gray-600">
            Zahlung per Rechnung
        </p>
    </div>
</div>