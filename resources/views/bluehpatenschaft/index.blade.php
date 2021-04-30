<x-app-layout>
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="font-bold my-3 text-3xl">Meissen blüht auf</h2>
        <p class="my-3">Wir legen in Meissen eine Blühfläche an und Sie können uns dabei unterstützen.</p>
    </div>
    <div class="lg:flex mt-6 max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:w-1/2">
            <p class="my-3">Insekten sind unverzichtbar für unser Ökosystem. Sie übernehmen nicht nur die wichtige Rolle der Bestäubung für viele Pflanzen und sorgen so dafür, dass wir als Menschen Ernten einfahren und uns davon ernähren können. Sie selbst sind ebenfalls Nahrungsmittelgrundlage für viele andere Tierarten, wie beispielsweise Vögel. Außerdem sorgen Insekten für eine verbesserte Bodenqualität und sind natürliche Schädlingsbekämpfer.</p>
            <p class="my-3">Dass Bienen und andere Insekten heute aber immer weniger Lebensraum für sich finden, hat viele verschiedene Gründe. Unter anderem zählen die Intensivierung der Landwirtschaft, die Lichtverschmutzung in und um Siedlungen oder der Einsatz von Pflanzenschutzmitteln dazu.</p>
            <p class="my-3">Höchste Zeit also, diesen kleinen Bewohnern der Erde ein neues Zuhause zu bieten! Wir würden gerne unseren Beitrag leisten und haben eine Ackerfläche zur Verfügung gestellt und zur Blühwiese gemacht.</p>
            <p class="my-3">Durch das Anlegen einer Blühwiese haben wir einen Ort geschaffen, der vom Menschen unberührt bleibt und an dem sich Insekten wohl fühlen und gerne leben. Damit können wir alle gemeinsam zum Artenschutz beitragen.</p>
            <p class="my-3">Mitmachen kann jeder, der sich für Insekten und Naturschutz engagieren möchte und sich an einer blühenden Wiese mit Gesumme erfreut.</p>
            <p class="my-3">Eine Blühpatenschaft gilt immer für ein Jahr.</p>
        </div>
        <div class="lg:w-1/2">
            <a href="https://goo.gl/maps/CuYLrKWmA458WAou6" target="_blank">
                <img src="{{ Storage::disk('public')->url('bluehpatenschaft/am_hof.png') }}">
            </a>
        </div>
    </div>

    @if (count($bluehpaten))
        <div class="my-6 max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="font-bold text-3xl mb-3">Vielen Dank an unsere Unterstützer:</h2>
            <ul class="">
                @foreach($bluehpaten as $bluehpate)
                    <li class="">
                        <p class="text-gray-900">{{ $bluehpate }}</p>
                    </li>
                @endforeach
            </ul>

        </div>
    @endif

    @if ($has_available_quantities)
        @include('bluehpatenschaft.create')
    @else
        <div class="my-6 max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            Alle Patenschaften für dieses Jahr wurden verteilt. Vielen Dank an alle Unterstützer!
        </div>
    @endif

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