{{-- Product categories — electronics catalog --}}
@php
    $laptopBrands = ['HP', 'Dell', 'Lenovo', 'Microsoft', 'Huawei'];
    $desktopOem = ['HP', 'Dell', 'Lenovo'];
    $printerBrands = ['HP', 'Epson', 'Canon'];
    $photocopyBrands = ['HP', 'Canon'];
    $scannerBrands = ['HP', 'Epson', 'Fujitsu'];
    $networkItems = ['SWITCH', 'ROUTER', 'CAT 6 CABLE', 'RACK CABINET', 'RJ 45', 'FACEPLATE'];
@endphp

{{-- Desktop nav --}}
<div class="mx-auto hidden max-w-7xl items-center gap-0.5 overflow-visible px-4 py-0 text-sm font-medium text-zinc-800 md:flex lg:px-8">
    <a href="{{ url('/') }}" class="shrink-0 px-2 py-3 hover:text-red-600 lg:px-3">Home</a>
    <div class="group relative shrink-0">
        <button type="button" class="flex items-center gap-0.5 px-2 py-3 hover:text-red-600 lg:px-3">Shop <svg class="h-3.5 w-3.5 opacity-60" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"/></svg></button>
        <div class="invisible absolute left-0 top-full z-50 pt-1 opacity-0 transition group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100">
            <div class="w-48 rounded-lg border border-zinc-200 bg-white py-2 shadow-lg">
                <a href="{{ route('products.index') }}" class="block px-4 py-2 text-left hover:bg-zinc-50">All products</a>
                <a href="#" class="block px-4 py-2 text-left hover:bg-zinc-50">Cart</a>
                <a href="#" class="block px-4 py-2 text-left hover:bg-zinc-50">Checkout</a>
            </div>
        </div>
    </div>

    <div class="group relative shrink-0">
        <button type="button" class="flex items-center gap-0.5 px-2 py-3 hover:text-red-600 lg:px-3">Laptop <svg class="h-3.5 w-3.5 opacity-60" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"/></svg></button>
        <div class="invisible absolute left-0 top-full z-50 pt-1 opacity-0 transition group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100">
            <div class="w-52 rounded-lg border border-zinc-200 bg-white py-2 shadow-lg">
                <p class="px-4 py-1 text-[10px] font-bold uppercase tracking-wider text-zinc-400">Brands</p>
                @foreach ($laptopBrands as $b)
                    <a href="#" class="block px-4 py-2 text-left hover:bg-zinc-50">{{ $b }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="group relative shrink-0">
        <button type="button" class="flex items-center gap-0.5 px-2 py-3 hover:text-red-600 lg:px-3">Desktop <svg class="h-3.5 w-3.5 opacity-60" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"/></svg></button>
        <div class="invisible absolute left-0 top-full z-50 pt-1 opacity-0 transition group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100">
            <div class="flex w-[22rem] gap-0 rounded-lg border border-zinc-200 bg-white p-3 shadow-lg">
                <div class="min-w-0 flex-1 border-r border-zinc-100 pr-3">
                    <p class="mb-1 text-[10px] font-bold uppercase tracking-wider text-zinc-400">All in One</p>
                    @foreach ($desktopOem as $b)
                        <a href="#" class="block rounded px-2 py-1.5 text-left text-sm hover:bg-zinc-50">{{ $b }}</a>
                    @endforeach
                </div>
                <div class="min-w-0 flex-1 pl-1">
                    <p class="mb-1 text-[10px] font-bold uppercase tracking-wider text-zinc-400">Tower desktop</p>
                    @foreach ($desktopOem as $b)
                        <a href="#" class="block rounded px-2 py-1.5 text-left text-sm hover:bg-zinc-50">{{ $b }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="group relative shrink-0">
        <button type="button" class="flex items-center gap-0.5 px-2 py-3 hover:text-red-600 lg:px-3">Printer <svg class="h-3.5 w-3.5 opacity-60" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"/></svg></button>
        <div class="invisible absolute left-0 top-full z-50 pt-1 opacity-0 transition group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100">
            <div class="w-44 rounded-lg border border-zinc-200 bg-white py-2 shadow-lg">
                @foreach ($printerBrands as $b)
                    <a href="#" class="block px-4 py-2 text-left hover:bg-zinc-50">{{ $b }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="group relative shrink-0">
        <button type="button" class="flex items-center gap-0.5 px-2 py-3 hover:text-red-600 lg:px-3">Photocopy <svg class="h-3.5 w-3.5 opacity-60" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"/></svg></button>
        <div class="invisible absolute left-0 top-full z-50 pt-1 opacity-0 transition group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100">
            <div class="w-44 rounded-lg border border-zinc-200 bg-white py-2 shadow-lg">
                @foreach ($photocopyBrands as $b)
                    <a href="#" class="block px-4 py-2 text-left hover:bg-zinc-50">{{ $b }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="group relative shrink-0">
        <button type="button" class="flex items-center gap-0.5 px-2 py-3 hover:text-red-600 lg:px-3">Scanner <svg class="h-3.5 w-3.5 opacity-60" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"/></svg></button>
        <div class="invisible absolute left-0 top-full z-50 pt-1 opacity-0 transition group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100">
            <div class="w-44 rounded-lg border border-zinc-200 bg-white py-2 shadow-lg">
                @foreach ($scannerBrands as $b)
                    <a href="#" class="block px-4 py-2 text-left hover:bg-zinc-50">{{ $b }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="group relative shrink-0">
        <button type="button" class="flex items-center gap-0.5 px-2 py-3 hover:text-red-600 lg:px-3">Network <svg class="h-3.5 w-3.5 opacity-60" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"/></svg></button>
        <div class="invisible absolute left-0 top-full z-50 pt-1 opacity-0 transition group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100">
            <div class="w-52 rounded-lg border border-zinc-200 bg-white py-2 shadow-lg">
                @foreach ($networkItems as $item)
                    <a href="#" class="block px-4 py-2 text-left hover:bg-zinc-50">{{ $item }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="group relative shrink-0">
        <button type="button" class="flex items-center gap-0.5 px-2 py-3 hover:text-red-600 lg:px-3">Security <svg class="h-3.5 w-3.5 opacity-60" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"/></svg></button>
        <div class="invisible absolute right-0 top-full z-50 pt-1 opacity-0 transition group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100">
            <div class="w-56 rounded-lg border border-zinc-200 bg-white py-2 shadow-lg">
                <a href="#" class="block px-4 py-2 text-left hover:bg-zinc-50">SOPHOS</a>
                <a href="#" class="block px-4 py-2 text-left hover:bg-zinc-50">CCTV cameras</a>
                <p class="px-4 py-1 text-[10px] font-bold uppercase tracking-wider text-zinc-400">Antivirus</p>
                <a href="#" class="block px-4 py-2 pl-6 text-left text-sm hover:bg-zinc-50">Kaspersky</a>
                <a href="#" class="block px-4 py-2 pl-6 text-left text-sm hover:bg-zinc-50">ESET</a>
            </div>
        </div>
    </div>

    <div class="group relative ml-auto shrink-0">
        <button type="button" class="flex items-center gap-0.5 px-2 py-3 text-zinc-600 hover:text-red-600 lg:px-3">More <svg class="h-3.5 w-3.5 opacity-60" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"/></svg></button>
        <div class="invisible absolute right-0 top-full z-50 pt-1 opacity-0 transition group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100">
            <div class="w-52 rounded-lg border border-zinc-200 bg-white py-2 shadow-lg">
                <a href="#" class="block px-4 py-2 text-left hover:bg-zinc-50">About us</a>
                <a href="{{ route('contact') }}" class="block px-4 py-2 text-left hover:bg-zinc-50">Contact</a>
                <a href="#" class="block px-4 py-2 text-left hover:bg-zinc-50">Delivery</a>
            </div>
        </div>
    </div>
</div>

{{-- Mobile nav --}}
<div id="mobile-nav" class="hidden border-t border-zinc-200 md:hidden">
    <div class="mx-auto max-h-[70vh] space-y-0 overflow-y-auto px-4 py-3 text-sm">
        <a href="{{ url('/') }}" class="block rounded-lg px-3 py-2.5 font-medium hover:bg-zinc-100">Home</a>
        <a href="{{ route('products.index') }}" class="block rounded-lg px-3 py-2.5 font-medium hover:bg-zinc-100">All products</a>

        <details class="rounded-lg border border-transparent open:border-zinc-200 open:bg-zinc-50">
            <summary class="cursor-pointer list-none px-3 py-2.5 font-medium marker:hidden hover:bg-zinc-100 [&::-webkit-details-marker]:hidden">Laptop</summary>
            <div class="border-t border-zinc-100 px-3 pb-2 pt-1">
                @foreach ($laptopBrands as $b)
                    <a href="#" class="block rounded-md py-2 pl-3 text-zinc-700 hover:bg-white">{{ $b }}</a>
                @endforeach
            </div>
        </details>

        <details class="rounded-lg border border-transparent open:border-zinc-200 open:bg-zinc-50">
            <summary class="cursor-pointer list-none px-3 py-2.5 font-medium hover:bg-zinc-100">Desktop</summary>
            <div class="border-t border-zinc-100 px-3 pb-2 pt-1">
                <p class="py-1 text-xs font-bold uppercase text-zinc-500">All in One</p>
                @foreach ($desktopOem as $b)
                    <a href="#" class="block rounded-md py-2 pl-3 text-zinc-700 hover:bg-white">{{ $b }}</a>
                @endforeach
                <p class="py-1 pt-2 text-xs font-bold uppercase text-zinc-500">Tower desktop</p>
                @foreach ($desktopOem as $b)
                    <a href="#" class="block rounded-md py-2 pl-3 text-zinc-700 hover:bg-white">{{ $b }}</a>
                @endforeach
            </div>
        </details>

        <details class="rounded-lg border border-transparent open:border-zinc-200 open:bg-zinc-50">
            <summary class="cursor-pointer list-none px-3 py-2.5 font-medium hover:bg-zinc-100">Printer</summary>
            <div class="border-t border-zinc-100 px-3 pb-2 pt-1">
                @foreach ($printerBrands as $b)
                    <a href="#" class="block rounded-md py-2 pl-3 text-zinc-700 hover:bg-white">{{ $b }}</a>
                @endforeach
            </div>
        </details>

        <details class="rounded-lg border border-transparent open:border-zinc-200 open:bg-zinc-50">
            <summary class="cursor-pointer list-none px-3 py-2.5 font-medium hover:bg-zinc-100">Photocopy</summary>
            <div class="border-t border-zinc-100 px-3 pb-2 pt-1">
                @foreach ($photocopyBrands as $b)
                    <a href="#" class="block rounded-md py-2 pl-3 text-zinc-700 hover:bg-white">{{ $b }}</a>
                @endforeach
            </div>
        </details>

        <details class="rounded-lg border border-transparent open:border-zinc-200 open:bg-zinc-50">
            <summary class="cursor-pointer list-none px-3 py-2.5 font-medium hover:bg-zinc-100">Scanner</summary>
            <div class="border-t border-zinc-100 px-3 pb-2 pt-1">
                @foreach ($scannerBrands as $b)
                    <a href="#" class="block rounded-md py-2 pl-3 text-zinc-700 hover:bg-white">{{ $b }}</a>
                @endforeach
            </div>
        </details>

        <details class="rounded-lg border border-transparent open:border-zinc-200 open:bg-zinc-50">
            <summary class="cursor-pointer list-none px-3 py-2.5 font-medium hover:bg-zinc-100">Network</summary>
            <div class="border-t border-zinc-100 px-3 pb-2 pt-1">
                @foreach ($networkItems as $item)
                    <a href="#" class="block rounded-md py-2 pl-3 text-zinc-700 hover:bg-white">{{ $item }}</a>
                @endforeach
            </div>
        </details>

        <details class="rounded-lg border border-transparent open:border-zinc-200 open:bg-zinc-50">
            <summary class="cursor-pointer list-none px-3 py-2.5 font-medium hover:bg-zinc-100">Security</summary>
            <div class="border-t border-zinc-100 px-3 pb-2 pt-1">
                <a href="#" class="block rounded-md py-2 pl-3 text-zinc-700 hover:bg-white">SOPHOS</a>
                <a href="#" class="block rounded-md py-2 pl-3 text-zinc-700 hover:bg-white">CCTV cameras</a>
                <p class="py-1 pt-2 text-xs font-bold uppercase text-zinc-500">Antivirus</p>
                <a href="#" class="block rounded-md py-2 pl-3 text-zinc-700 hover:bg-white">Kaspersky</a>
                <a href="#" class="block rounded-md py-2 pl-3 text-zinc-700 hover:bg-white">ESET</a>
            </div>
        </details>

        <div class="mt-4 border-t border-zinc-200 pt-4">
            @auth
                @if (auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="block rounded-lg px-3 py-2.5 font-medium hover:bg-zinc-100">Admin</a>
                @endif
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full rounded-lg px-3 py-2.5 text-left font-medium hover:bg-zinc-100">Log out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block rounded-lg px-3 py-2.5 font-medium hover:bg-zinc-100">Login</a>
                <a href="{{ route('register') }}" class="block rounded-lg px-3 py-2.5 font-medium hover:bg-zinc-100">Register</a>
            @endauth
        </div>
    </div>
</div>
