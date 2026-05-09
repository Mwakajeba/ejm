<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name')) — Online computer store</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[var(--store-bg)] text-zinc-900 antialiased">
    <div id="store-top-notice" class="store-notice bg-zinc-900 text-zinc-100 text-center text-xs sm:text-sm py-2 px-4">
        <span class="inline-block max-w-5xl">
            Pricing does not include VAT. Please call to confirm stock before ordering.
            <span class="text-zinc-300">Sales Support</span>
            <a href="tel:+255764999993" class="text-amber-300 hover:underline font-medium">0764 999 993</a>
        </span>
        <button type="button" data-dismiss-notice class="ml-3 text-zinc-400 hover:text-white underline-offset-2 hover:underline">Dismiss</button>
    </div>

    <header class="sticky top-0 z-40 overflow-visible border-b border-zinc-200/80 bg-white/95 backdrop-blur-md shadow-sm">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-4 px-4 py-3 sm:px-6 lg:px-8">
            <a href="{{ url('/') }}" class="flex items-center gap-2 shrink-0">
                <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-red-600 to-red-800 text-lg font-bold text-white shadow-md">E</span>
                <span class="text-lg font-semibold tracking-tight text-zinc-900">{{ config('app.name', 'Epic Style') }}</span>
            </a>

            <div class="order-3 flex flex-1 basis-full md:order-none md:basis-0 min-w-0">
                <label class="relative flex w-full max-w-xl mx-auto md:mx-0">
                    <span class="sr-only">Search products</span>
                    <input type="search" placeholder="Search laptops, desktops, printers, network…" class="w-full rounded-full border border-zinc-200 bg-zinc-50 py-2.5 pl-4 pr-28 text-sm outline-none ring-red-600/20 transition focus:border-red-500 focus:bg-white focus:ring-2">
                    <button type="button" class="absolute right-1 top-1/2 -translate-y-1/2 rounded-full bg-red-600 px-4 py-1.5 text-xs font-semibold uppercase tracking-wide text-white hover:bg-red-700">Search</button>
                </label>
            </div>

            <div class="ml-auto flex items-center gap-2 sm:gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="hidden text-sm font-medium text-zinc-700 hover:text-red-600 sm:inline">Account</a>
                    @else
                        <a href="{{ route('login') }}" class="hidden text-sm font-medium text-zinc-700 hover:text-red-600 sm:inline">Login</a>
                    @endauth
                @else
                    <a href="#" class="hidden text-sm font-medium text-zinc-700 hover:text-red-600 sm:inline">Login</a>
                @endif
                <button type="button" data-open-cart class="relative inline-flex items-center gap-1.5 rounded-full border border-zinc-200 bg-white px-3 py-2 text-sm font-medium text-zinc-800 shadow-sm hover:border-zinc-300">
                    <svg class="h-5 w-5 text-zinc-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 3.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"/></svg>
                    <span class="hidden sm:inline">Cart</span>
                    <span data-cart-count class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-red-600 px-1 text-[10px] font-bold text-white">0</span>
                </button>
                <button type="button" data-mobile-nav-toggle class="inline-flex rounded-lg border border-zinc-200 p-2 md:hidden" aria-expanded="false" aria-controls="mobile-nav">
                    <span class="sr-only">Open menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>

        <nav class="relative z-30 overflow-visible border-t border-zinc-100 bg-zinc-50/80" aria-label="Product categories">
            @include('partials.store-navigation')
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="mt-16 border-t border-zinc-200 bg-zinc-900 text-zinc-300">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-12 sm:grid-cols-2 lg:grid-cols-4 lg:px-8">
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">Customer care</h3>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a href="#" class="hover:text-amber-300">About</a></li>
                    <li><a href="#" class="hover:text-amber-300">Contact us</a></li>
                    <li><a href="#" class="hover:text-amber-300">Terms &amp; Conditions</a></li>
                    <li><a href="#" class="hover:text-amber-300">Refund policy</a></li>
                    <li><a href="#" class="hover:text-amber-300">Delivery</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">Contact</h3>
                <address class="mt-4 not-italic text-sm leading-relaxed">
                    Mtendeni Street, Opp BIMA House<br>
                    P.O. Box 4141, Dodoma, Tanzania<br>
                    <span class="mt-3 block text-zinc-400">Tel</span>
                    <a href="tel:+255262323561" class="hover:text-amber-300">+255 26 2323561</a>
                    <span class="text-zinc-500"> or </span>
                    <a href="tel:+255714264274" class="hover:text-amber-300">+255 714 264274</a><br>
                    <span class="mt-2 block text-zinc-400">E-mail</span>
                    <a href="mailto:ejminternationalltd@gmail.com" class="hover:text-amber-300">ejminternationalltd@gmail.com</a>
                </address>
            </div>
            <div class="lg:col-span-2">
                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">About us</h3>
                <p class="mt-4 max-w-xl text-sm leading-relaxed text-zinc-400">
                    Your shop for laptops, desktops, printers, network, and security products — curated selection, competitive TZS pricing, and local support. Visit us in Dodoma or order online.
                </p>
            </div>
        </div>
        <div class="border-t border-zinc-800 py-4 text-center text-xs text-zinc-500">
            © {{ date('Y') }} {{ config('app.name') }} — All rights reserved
        </div>
    </footer>

    <aside id="cart-drawer" class="pointer-events-none fixed inset-0 z-50 flex justify-end opacity-0 transition-opacity duration-200" aria-hidden="true">
        <div data-cart-backdrop class="absolute inset-0 bg-zinc-900/40 backdrop-blur-[2px]"></div>
        <div class="relative flex h-full w-full max-w-md translate-x-full flex-col bg-white shadow-2xl transition-transform duration-300 ease-out">
            <div class="flex items-center justify-between border-b border-zinc-100 px-5 py-4">
                <h2 class="text-lg font-semibold text-zinc-900">Your cart</h2>
                <button type="button" data-close-cart class="rounded-lg p-2 text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900" aria-label="Close cart">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="flex flex-1 flex-col items-center justify-center px-6 text-center">
                <p class="text-sm font-medium text-zinc-700">Your cart is empty</p>
                <p class="mt-2 text-sm text-zinc-500">Start shopping to add items.</p>
                <button type="button" data-close-cart class="mt-6 rounded-full bg-red-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-red-700">Continue shopping</button>
            </div>
            <div class="border-t border-zinc-100 p-5">
                <p class="text-sm text-zinc-600">Subtotal <span class="float-right font-semibold text-zinc-900">TZs 0</span></p>
                <p class="mt-1 text-xs text-zinc-500">Shipping, taxes, and discounts at checkout.</p>
                <button type="button" class="mt-4 w-full rounded-full border border-zinc-200 py-3 text-sm font-semibold text-zinc-800 hover:bg-zinc-50">View cart</button>
                <button type="button" class="mt-2 w-full rounded-full bg-zinc-900 py-3 text-sm font-semibold text-white hover:bg-zinc-800">Checkout</button>
            </div>
        </div>
    </aside>

    <a
        href="https://wa.me/255764999993?text=Hi%2C%20I%20need%20help%20with%20my%20order."
        target="_blank"
        rel="noopener noreferrer"
        class="fixed bottom-5 right-5 z-[60] flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-lg shadow-black/25 ring-2 ring-white/90 transition hover:scale-105 hover:bg-[#20BD5A] focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-zinc-900 sm:bottom-6 sm:right-6"
        aria-label="Chat with us on WhatsApp"
        title="WhatsApp chat"
    >
        <svg class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.881 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>
</body>
</html>
