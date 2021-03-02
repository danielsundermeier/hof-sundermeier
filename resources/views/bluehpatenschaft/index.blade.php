<x-app-layout>
    <div class="lg:flex max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="flex-1 relative z-0 overflow-y-auto focus:outline-none pt-4" tabindex="0">
            <a href="https://goo.gl/maps/CuYLrKWmA458WAou6" target="_blank">
                <img src="{{ Storage::disk('public')->url('bluehpatenschaft/am_hof.png') }}">
            </a>
        </div>
        <aside class="pt-4 relative flex-shrink-0 lg:w-96 lg:px-8">
            <div class="h-3 relative max-w-xl overflow-hidden">
                <div class="w-full h-full bg-gray-200 absolute"></div>
                <div class="h-full bg-green-500 absolute" style="width:10%"></div>
            </div>
            <div class="mt-3 text-green-500 text-3xl font-bold">
                1.000 m2
            </div>
            <div class="text-gray-600">
                von 10.000 m2 erreicht
            </div>
            <div class="mt-3 font-bold text-3xl">
                13
            </div>
            <div class="text-gray-600">
                Unterstützer
            </div>
            <div class="mt-3 font-bold text-3xl">
                10
            </div>
            <div class="text-gray-600">
                Tage verbleibend
            </div>
            <div class="mt-3">
                <a href="#form" type="button" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Blühfläche Unterstützen
                </a>
            </div>
            <div class="mt-3 flex justify-around space-x-6">
                <a href="https://facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.hof-sundermeier.de" class="text-gray-400 hover:text-gray-500" target="_blank" rel="noopener">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                </a>

                <a href="https://twitter.com/intent/tweet/?text=Bl%C3%BChpatenschaft%20in%20Meissen&amp;url=https%3A%2F%2Fwww.hof-sundermeier.de" class="text-gray-400 hover:text-gray-500" target="_blank" rel="noopener">
                    <span class="sr-only">Twitter</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                </a>

                <a href="mailto:?subject=Bl%C3%BChpatenschaft%20in%20Meissen&amp;body=https%3A%2F%2Fwww.hof-sundermeier.de" class="text-gray-400 hover:text-gray-500" target="_blank" rel="noopener">
                    <span class="sr-only">E-Mail</span>
                    <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </a>

                <button class="js-textareacopybtn text-gray-400 hover:text-gray-500" target="_blank" rel="noopener">
                    <span class="sr-only">Link</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path>
                    </svg>
                </button>
                <textarea class="js-copytextarea" style="display: none;">https://www.hof-sundermeier.de</textarea>

            </div>
            <p class="mt-8 text-xs text-gray-600">
                Alles oder nichts. Die Blühfläche wird nur angelegt, wenn mindestens 10.000 m2 erreicht sind.
            </p>
        </aside>
    </div>
    <div class="mt-6 max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="">
            <h2 class="font-bold text-3xl">Warum du Blühpate werden solltest</h2>
            <p class="my-3">Insekten sind unverzichtbar für unser Ökosystem. Sie übernehmen nicht nur die wichtige Rolle der Bestäubung für viele Pflanzen und sorgen so dafür, dass wir als Menschen Ernten einfahren und uns davon ernähren können. Sie selbst sind ebenfalls Nahrungsmittelgrundlage für viele andere Tierarten, wie beispielsweise Vögel. Außerdem sorgen Insekten für eine verbesserte Bodenqualität und sind natürliche Schädlingsbekämpfer.</p>
            <p class="my-3">Dass Bienen und andere Insekten heute aber immer weniger Lebensraum für sich finden, hat viele verschiedene Gründe. Unter anderem zählen die Intensivierung der Landwirtschaft, die Lichtverschmutzung in und um Siedlungen oder der Einsatz von Pflanzenschutzmitteln dazu.</p>
            <p class="my-3">Höchste Zeit also, diesen kleinen Bewohnern der Erde ein neues Zuhause zu bieten! Wir würden gerne unseren Beitrag leisten und haben 2020 einen Hektar Ackerfläche zur Verfügung gestellt und zur Blühwiese gemacht.</p>
            <p class="my-3">Durch das Anlegen einer Blühwiese haben wir einen Ort geschaffen, der vom Menschen unberührt bleibt und an dem sich Insekten wohl fühlen und gerne leben. Damit können wir alle gemeinsam zum Artenschutz beitragen.</p>
            <p class="my-3">Mitmachen kann jeder, der sich für Insekten und Naturschutz engagieren möchte und sich an einer blühenden Wiese mit Gesumme erfreut.</p>

            <h2 class="font-bold text-3xl mt-4">Geschenkidee?</h2>
            <p class="my-3">Natürlich kann unsere Patenschaft auch verschenkt werden. Lass uns dafür einfach den Namen des Beschenkten zukommen und wir schreiben diesen auf die Urkunde.</p>
        </div>
    </div>
    <div class="my-6 max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8" id="form">
        <h2 class="font-bold text-3xl mb-3">Blühpate werden</h2>
        <form>
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-4">
                    <label for="flaeche" class="block text-sm font-medium text-gray-700">Blühfläche</label>
                    <select id="flaeche" name="flaeche" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md">
                        <option value="1" selected="selected">1 m2 - 1,00 €</option>
                        <option value="50">50 m2 - 18,00 €</option>
                        <option value="100">100 m2 - 34,00 €</option>
                        <option value="250">250 m2 - 62,00 €</option>
                        <option value="500">500 m2 - 155,00 €</option>
                        <option value="1000">1.000 m2 - 300,00 €</option>
                    </select>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Vorname</label>
                    <input type="text" name="first_name" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Nachname</label>
                    <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="email_address" class="block text-sm font-medium text-gray-700">E-Mail</label>
                    <input type="text" name="email_address" id="email_address" autocomplete="email" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="email_address" class="block text-sm font-medium text-gray-700">Name für Plakat</label>
                    <input type="text" name="email_address" id="email_address" autocomplete="email" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <p class="mt-2 text-sm text-gray-500" id="email-description">Leer lassen, wenn nicht gewünscht</p>
                </div>

            </div>
            <button type="submit" class="mt-6 inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Blühfläche kostenpflichtig Unterstützen
            </button>
        </form>
        <p class="mt-3 text-sm text-gray-600">
            Wir verschicken eine Rechnung, wenn das Ziel erreicht wurde. Sonst passiert nichts.
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