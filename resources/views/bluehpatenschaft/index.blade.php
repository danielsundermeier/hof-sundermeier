<x-app-layout>

    <div class="relative w-screen h-screen bg-no-repeat bg-cover bg-top" style="background-image: url({{ Storage::disk('public')->url('bluehpatenschaft/hero.jpg')  }});">

        <div class="absolute w-screen bottom-0 top-0" style="background-image: linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.6) 100%);"></div>

        <div class="absolute flex items-center justify-center w-screen inset-0 text-white">
            <div class="max-w-xl mx-auto px-4 text-center sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="font-bold my-3 md:text-7xl text-4xl">Meissen blüht auf</h2>
                <p class="my-3 text-xl">Wir legen eine Blühwiese an und Sie können uns dabei unterstützen.</p>
            </div>
        </div>

    </div>

    <div class="py-20 bg-gray-800 text-white">

        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-3xl font-bold mb-6">Grüne Gründe für eine Blühwiese</h2>
            <p class="my-3">Insekten sind unverzichtbar für unser Ökosystem. Sie übernehmen nicht nur die wichtige Rolle der Bestäubung für viele Pflanzen und sorgen so dafür, dass wir als Menschen Ernten einfahren und uns davon ernähren können. Sie selbst sind ebenfalls Nahrungsmittelgrundlage für viele andere Tierarten, wie beispielsweise Vögel. Außerdem sorgen Insekten für eine verbesserte Bodenqualität und sind natürliche Schädlingsbekämpfer.</p>
            <p class="my-3">Bienen und andere Insekten finden aber immer weniger Lebensraum.</p>
            <p class="my-3">Höchste Zeit also, diesen kleinen Bewohnern der Erde ein neues Zuhause zu bieten! Wir würden gerne unseren Beitrag leisten und haben eine Ackerfläche zur Verfügung gestellt und zur Blühwiese gemacht.</p>
            <p class="my-3">Durch das Anlegen einer Blühwiese haben wir einen Ort geschaffen, der vom Menschen unberührt bleibt und an dem sich Insekten wohl fühlen und gerne leben. Damit können wir alle gemeinsam zum Artenschutz beitragen.</p>
            <p class="my-3">Mitmachen kann jeder, der sich für Insekten und Naturschutz engagieren möchte und sich an einer blühenden Wiese mit Gesumme erfreut.</p>
            <p class="my-3">Eine Blühpatenschaft gilt immer für ein Jahr.</p>
        </div>

    </div>

    <div class="py-20">

        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="lg:flex">

                <div class="lg:w-1/2 mr-3">
                    <a href="https://goo.gl/maps/CuYLrKWmA458WAou6" target="_blank">
                        <img class="rounded-md" src="{{ Storage::disk('public')->url('bluehpatenschaft/am_hof.png') }}">
                    </a>
                </div>
                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-bold mt-3 lg:mt-0">Die Blühwiese</h2>

                    <p class="mt-3 prose prose-indigo prose-lg mx-auto">Die Blühwiese befindet sich neben unserem Hof direkt an der Forststraße.</p>

                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold">
                                Adresse
                            </dt>
                            <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                                Forststraße 31, 32423 Minden
                            </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold">
                                Größe
                            </dt>
                            <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                                750m2
                            </dd>
                        </div>
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-bold">
                                Pflanzen
                            </dt>
                            <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                                Sonnenblumen, Phacelia und viele mehr
                            </dd>
                        </div>
                    </dl>

                </div>

            </div>
        </div>

        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 mt-6">
            <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($images as $directory => $image)
                    <li class="relative">
                        <a href="{{ Storage::disk('public')->url($image['files'][1400]) }}" target="_blank" class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                            <picture class="object-cover pointer-events-none group-hover:opacity-75">
                                <img
                                    sizes="(max-width: 1400px) 100vw, 1400px"
                                    srcset="
                                        @foreach ($image['files'] as $width => $file)
                                            {{ Storage::disk('public')->url($file) }} {{ $width }}w,
                                        @endforeach
                                        "
                                    src="{{ Storage::disk('public')->url($image['files'][1400]) }}"
                                    alt="">
                            </picture>
                        </a>
                        <p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">{{ $image['name'] }}</p>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>

    @if (count($bluehpaten))
        <div class="py-20 bg-gray-800">
            <div class="my-6 max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="font-bold text-3xl mb-3 text-white">Vielen Dank an die Blühpaten</h2>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    @foreach($bluehpaten as $bluehpate)
                        <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            {{ $bluehpate }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if ($has_available_quantities)
        @include('bluehpatenschaft.create')
    @else
        <div class="my-6 max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            Alle Patenschaften für dieses Jahr wurden verteilt. Vielen Dank an alle Blühpaten!
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