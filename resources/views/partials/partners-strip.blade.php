@php
    $logos = \App\Support\PartnerAssets::logoUrls();
    $base = $logos;
    while (count($base) < 16) {
        $base = array_merge($base, $logos);
    }
    $scrollLogos = array_merge($base, $base);
@endphp
@if (count($logos) > 0)
    <section class="border-b border-zinc-200 bg-gradient-to-b from-zinc-100/90 via-white to-white" aria-labelledby="partners-heading">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-10">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:gap-8">
                <div class="flex shrink-0 flex-col justify-center border-l-[3px] border-emerald-600 pl-4 sm:pl-5 lg:max-w-[14rem]">
                    <h2 id="partners-heading" class="text-xl font-bold uppercase leading-tight tracking-wide text-zinc-900 sm:text-2xl">
                        Our partners
                    </h2>
                    <p class="mt-3 inline-flex w-fit items-center rounded-sm bg-amber-400 px-2.5 py-1 text-[11px] font-bold uppercase tracking-widest text-amber-950 shadow-sm">
                        Trusted brands
                    </p>
                </div>

                <div data-partners-strip class="relative min-w-0 flex-1">
                    <div class="pointer-events-none absolute -left-1 top-0 z-10 hidden h-full w-8 bg-gradient-to-r from-white to-transparent sm:block"></div>
                    <div class="pointer-events-none absolute -right-1 top-0 z-10 hidden h-full w-8 bg-gradient-to-l from-white to-transparent sm:block"></div>
                    <div class="flex items-center gap-2">
                        <button type="button" data-partners-prev class="hidden h-10 w-10 shrink-0 items-center justify-center rounded-full border border-zinc-200 bg-white text-zinc-700 shadow-sm hover:border-emerald-500 hover:text-emerald-700 sm:flex" aria-label="Scroll partners left">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <div data-partners-track class="flex min-w-0 flex-1 gap-4 overflow-x-auto scroll-smooth pb-2 pt-1 [-ms-overflow-style:none] [scrollbar-width:thin] [scrollbar-color:rgb(16_185_129)_transparent] [&::-webkit-scrollbar]:h-1.5 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-emerald-500/70">
                            @foreach ($scrollLogos as $logoUrl)
                                <article class="group w-36 shrink-0 snap-start sm:w-40 md:w-44">
                                    <div class="flex aspect-square items-center justify-center rounded border border-zinc-200 bg-white p-3 shadow-sm transition hover:border-emerald-500/40 hover:shadow-md sm:p-4">
                                        <img src="{{ $logoUrl }}" alt="" class="max-h-full max-w-full object-contain transition duration-300 group-hover:scale-105" width="200" height="200" loading="lazy" decoding="async">
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <button type="button" data-partners-next class="hidden h-10 w-10 shrink-0 items-center justify-center rounded-full border border-zinc-200 bg-white text-zinc-700 shadow-sm hover:border-emerald-500 hover:text-emerald-700 sm:flex" aria-label="Scroll partners right">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
