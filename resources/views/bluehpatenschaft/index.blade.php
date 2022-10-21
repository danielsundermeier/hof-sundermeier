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
                                Kulturmalve, Rotklee, Phacelia, Sonnenblumen, Ölrettich, Sommerwicken, Buchweizen, Ringelblume, Leindotter, Öllein, Borretsch, Dill, Koriander, Ramtillkraut, Inkarnatklee und Schmuckkörbchen.
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
                        <div class="mt-2 flex items-center justify-between">
                            <p class="block text-sm font-medium truncate pointer-events-none">{{ $image['name'] }}</p>
                            <div class="flex space-x-2">
                                <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Facebook</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                    </svg>
                                </a>

                                  <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Instagram</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                      <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                    </svg>
                                  </a>

                                  <a href="{{ $image['social_media_links']['twitter'] }}" target="_blank" rel="noopener">
                                    <span class="sr-only">Twitter</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                      <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                    </svg>
                                  </a>

                            </div>
                        </div>
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