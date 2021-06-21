<x-app-layout>

    <div class="relative w-screen h-screen bg-no-repeat bg-cover bg-top" style="background-image: url({{ Storage::disk('public')->url('bluehpatenschaft/hero.jpg')  }});">

        <div class="absolute w-screen bottom-0 top-0" style="background-image: linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.6) 100%);"></div>

        <div class="absolute flex items-center justify-center w-screen inset-0 text-white">
            <div class="max-w-xl mx-auto px-4 text-center sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="font-bold my-3 md:text-7xl text-4xl">Meissen blüht auf</h2>
                <p class="my-3 text-xl">Wir legen eine Blühwiese an und Sie können uns dabei unterstützen.</p>
                @if ($has_available_quantities)
                    <a href="#form" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-600 bg-white hover:bg-gray-50 sm:w-auto">
                        Jetzt Blühpate werden
                    </a>
                @endif
            </div>
        </div>

    </div>

    @include('bluehpatenschaft.reasons')

    <div class="py-20 bg-gray-800 text-white">

        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="mb-6 text-3xl sm:text-5xl sm:leading-none sm:tracking-tight lg:text-6xl mt-3 lg:mt-0">Die Blühwiese</h2>
            <div class="lg:flex">

                <div class="lg:w-1/2 mr-3">
                    <a href="https://goo.gl/maps/CuYLrKWmA458WAou6" target="_blank">
                        <img class="rounded-md" src="{{ Storage::disk('public')->url('bluehpatenschaft/am_hof.png') }}">
                    </a>
                </div>
                <div class="lg:w-1/2">

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

                    <p class="mt-3 text-center prose prose-indigo prose-lg mx-auto">Blühwiese vor dem eigenen Garten?</p>

                    <div class="flex justify-center">
                        <a href="{{ route('legal.impressum.index') }}" class="mt-6 inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Blühwiese auf einer anderen Ackerfläche vorschlagen
                        </a>
                    </div>

                </div>

            </div>
        </div>

        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 mt-6">
            <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($images as $directory => $image)
                    <li class="relative">
                        <a href="{{ Storage::disk('public')->url($image['biggest_path']) }}" target="_blank" class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                            <picture class="object-cover pointer-events-none group-hover:opacity-75">
                                <img
                                    sizes="(max-width: 1400px) 100vw, 1400px"
                                    srcset="
                                        @foreach ($image['files'] as $width => $file)
                                            {{ Storage::disk('public')->url($file) }} {{ $width }}w,
                                        @endforeach
                                        "
                                    src="{{ Storage::disk('public')->url($image['biggest_path']) }}"
                                    alt="">
                            </picture>
                        </a>
                        <p class="mt-2 block text-sm font-medium truncate pointer-events-none">{{ $image['name'] }}</p>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>

    @if (count($bluehpaten))
        <div class="py-20 bg-green-600">
            <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="mb-6 text-3xl font-extrabold text-white sm:text-5xl sm:leading-none sm:tracking-tight lg:text-6xl">Vielen Dank an die Blühpaten</h2>

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
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            Alle Patenschaften für dieses Jahr wurden verteilt. Vielen Dank an alle Blühpaten!
        </div>
    @endif

</x-app-layout>
<script type="text/javascript">
    // var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

    // copyTextareaBtn.addEventListener('click', function(event) {
    //     var copyTextarea = document.querySelector('.js-copytextarea');

    //     copyTextarea.focus();
    //     copyTextarea.select();

    //     try {
    //         var successful = document.execCommand('copy');
    //         var msg = successful ? 'successful' : 'unsuccessful';
    //         console.log('Copying text command was ' + msg);
    //     } catch (err) {
    //         console.log('Oops, unable to copy');
    //     }
    // });
</script>