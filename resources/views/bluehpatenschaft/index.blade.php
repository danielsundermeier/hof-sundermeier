<x-app-layout>
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="font-bold my-3 text-3xl">Meissen blüht auf</h2>
        <p class="my-3">Wir legen in Meissen eine Blühfläche an und suchen dafür Unterstützung.</p>
    </div>
    <div class="lg:flex mt-6 max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:w-1/2">
            <p class="my-3">Insekten sind unverzichtbar für unser Ökosystem. Sie übernehmen nicht nur die wichtige Rolle der Bestäubung für viele Pflanzen und sorgen so dafür, dass wir als Menschen Ernten einfahren und uns davon ernähren können. Sie selbst sind ebenfalls Nahrungsmittelgrundlage für viele andere Tierarten, wie beispielsweise Vögel. Außerdem sorgen Insekten für eine verbesserte Bodenqualität und sind natürliche Schädlingsbekämpfer.</p>
            <p class="my-3">Dass Bienen und andere Insekten heute aber immer weniger Lebensraum für sich finden, hat viele verschiedene Gründe. Unter anderem zählen die Intensivierung der Landwirtschaft, die Lichtverschmutzung in und um Siedlungen oder der Einsatz von Pflanzenschutzmitteln dazu.</p>
            <p class="my-3">Höchste Zeit also, diesen kleinen Bewohnern der Erde ein neues Zuhause zu bieten! Wir würden gerne unseren Beitrag leisten und haben 2020 einen Hektar Ackerfläche zur Verfügung gestellt und zur Blühwiese gemacht.</p>
            <p class="my-3">Durch das Anlegen einer Blühwiese haben wir einen Ort geschaffen, der vom Menschen unberührt bleibt und an dem sich Insekten wohl fühlen und gerne leben. Damit können wir alle gemeinsam zum Artenschutz beitragen.</p>
            <p class="my-3">Mitmachen kann jeder, der sich für Insekten und Naturschutz engagieren möchte und sich an einer blühenden Wiese mit Gesumme erfreut.</p>
        </div>
        <div class="lg:w-1/2">
            <a href="https://goo.gl/maps/CuYLrKWmA458WAou6" target="_blank">
                <img src="{{ Storage::disk('public')->url('bluehpatenschaft/am_hof.png') }}">
            </a>
        </div>
    </div>

    @if (count($bluehpaten))
        <div class="my-6 max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8" id="form">
            <h2 class="font-bold text-3xl mb-3">Vielen Dank an unsere Unterstützer:</h2>
            <ul class="divide-y divide-gray-200">
                @foreach($bluehpaten as $bluehpate)
                    <li class="py-4">
                        <p class="text-sm font-medium text-gray-900">{{ $bluehpate }}</p>
                    </li>
                @endforeach
            </ul>

        </div>
    @endif

    <div class="my-6 max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8" id="form">
        <h2 class="font-bold text-3xl mb-3">Blühpate werden</h2>
        <form action="{{ route('bluehpatenschaft.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Blühfläche</label>
                    <select id="quantity" name="quantity" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md">
                        @foreach ($quantites as $quantity => $gross)
                            <option value="{{ $quantity }}">{{ $quantity }} m2 - {{ number_format($gross, 2, ',', '.') }} €</option>
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
                    <label for="description" class="block text-sm font-medium text-gray-700">Name für Plakat</label>
                    <input type="text" name="description" id="description" autocomplete="description" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <p class="mt-2 text-sm text-gray-500" id="description">Leer lassen, wenn nicht gewünscht</p>
                </div>

            </div>
            <button type="submit" class="mt-6 inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Blühfläche kostenpflichtig Unterstützen
            </button>
        </form>
        <p class="mt-3 text-sm text-gray-600">
            Zahlung per Rechnung
        </p>
    </div>
</x-app-layout>
<script type="text/javascript">
    var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

    copyTextareaBtn.addEventListener('click', function(event) {
        var copyTextarea = document.querySelector('.js-copytextarea');

        copyTextarea.focus();
        copyTextarea.select();

        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Copying text command was ' + msg);
        } catch (err) {
            console.log('Oops, unable to copy');
        }
    });
</script>