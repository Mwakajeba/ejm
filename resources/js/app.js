document.addEventListener('DOMContentLoaded', () => {
    const notice = document.getElementById('store-top-notice');
    document.querySelectorAll('[data-dismiss-notice]').forEach((btn) => {
        btn.addEventListener('click', () => notice?.classList.add('hidden'));
    });

    const mobileNav = document.getElementById('mobile-nav');
    const mobileToggle = document.querySelector('[data-mobile-nav-toggle]');
    mobileToggle?.addEventListener('click', () => {
        const open = mobileNav?.classList.toggle('hidden') === false;
        mobileToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    const drawer = document.getElementById('cart-drawer');
    const drawerPanel = drawer?.querySelector('.relative.flex.h-full');
    const openCart = () => {
        if (!drawer || !drawerPanel) return;
        drawer.classList.remove('pointer-events-none', 'opacity-0');
        drawer.classList.add('pointer-events-auto', 'opacity-100');
        drawerPanel.classList.remove('translate-x-full');
        drawerPanel.classList.add('translate-x-0');
        drawer.setAttribute('aria-hidden', 'false');
    };
    const closeCart = () => {
        if (!drawer || !drawerPanel) return;
        drawer.classList.add('pointer-events-none', 'opacity-0');
        drawer.classList.remove('pointer-events-auto', 'opacity-100');
        drawerPanel.classList.add('translate-x-full');
        drawerPanel.classList.remove('translate-x-0');
        drawer.setAttribute('aria-hidden', 'true');
    };
    document.querySelector('[data-open-cart]')?.addEventListener('click', openCart);
    document.querySelectorAll('[data-close-cart]').forEach((el) => el.addEventListener('click', closeCart));
    document.querySelector('[data-cart-backdrop]')?.addEventListener('click', closeCart);

    const tabs = document.querySelectorAll('[data-bestseller-tab]');
    const panels = document.querySelectorAll('[data-bestseller-panel]');
    tabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            const i = tab.getAttribute('data-bestseller-tab');
            tabs.forEach((t) => {
                t.classList.remove('border-red-600', 'bg-red-50', 'text-red-700');
                t.classList.add('border-zinc-200', 'bg-white', 'text-zinc-700');
            });
            tab.classList.add('border-red-600', 'bg-red-50', 'text-red-700');
            tab.classList.remove('border-zinc-200', 'bg-white', 'text-zinc-700');
            panels.forEach((p) => {
                p.classList.toggle('hidden', p.getAttribute('data-bestseller-panel') !== i);
            });
        });
    });

    const hotsaleTrack = document.querySelector('[data-hotsale-track]');
    const hotsaleStep = () => {
        const card = hotsaleTrack?.querySelector('article');
        if (!card) return 300;
        const styles = hotsaleTrack ? getComputedStyle(hotsaleTrack) : null;
        const gap = styles ? parseFloat(styles.gap || '16') || 16 : 16;
        return card.offsetWidth + gap;
    };
    const hotsaleScroll = (delta) => hotsaleTrack?.scrollBy({ left: delta, behavior: 'smooth' });
    document.querySelector('[data-hotsale-prev]')?.addEventListener('click', () => hotsaleScroll(-hotsaleStep()));
    document.querySelector('[data-hotsale-next]')?.addEventListener('click', () => hotsaleScroll(hotsaleStep()));

    let hotsaleAutoId = null;
    const hotsaleAutoTick = () => {
        if (!hotsaleTrack) return;
        const { scrollLeft, scrollWidth, clientWidth } = hotsaleTrack;
        const max = scrollWidth - clientWidth;
        const step = hotsaleStep();
        if (max <= 0) return;
        if (scrollLeft >= max - 2) {
            hotsaleTrack.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            hotsaleTrack.scrollBy({ left: step, behavior: 'smooth' });
        }
    };
    const hotsaleAutoStart = () => {
        if (!hotsaleTrack || hotsaleAutoId) return;
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        hotsaleAutoId = window.setInterval(hotsaleAutoTick, 3500);
    };
    const hotsaleAutoStop = () => {
        if (hotsaleAutoId !== null) {
            window.clearInterval(hotsaleAutoId);
            hotsaleAutoId = null;
        }
    };
    hotsaleTrack?.addEventListener('mouseenter', hotsaleAutoStop);
    hotsaleTrack?.addEventListener('mouseleave', hotsaleAutoStart);
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) hotsaleAutoStop();
        else hotsaleAutoStart();
    });
    hotsaleAutoStart();

    const countEl = document.querySelector('[data-cart-count]');
    let count = 0;
    document.querySelectorAll('.add-to-cart-btn').forEach((btn) => {
        btn.addEventListener('click', () => {
            count += 1;
            if (countEl) countEl.textContent = String(count);
            openCart();
        });
    });
});
