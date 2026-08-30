<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home') — Build Log</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy-deep: #0F2438;
            --navy: #16324F;
            --navy-light: #1E4066;
            --paper: #F5F3EC;
            --ink: #1B2430;
            --ink-soft: #4B5563;
            --amber: #F2A93B;
            --amber-dark: #D98F1E;
            --cyan: #6FC3C9;
            --grid-line: rgba(255,255,255,0.07);
            --grid-line-strong: rgba(255,255,255,0.14);
        }

        * { margin:0; padding:0; box-sizing:border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--paper);
            color: var(--ink);
            line-height: 1.6;
        }

        h1, h2, h3, .display {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            letter-spacing: -0.01em;
        }

        .mono {
            font-family: 'JetBrains Mono', monospace;
        }

        a { color: inherit; text-decoration: none; }

        /* ---------- Header / Ruler nav ---------- */
        header.site-header {
            background: var(--navy-deep);
            border-bottom: 1px solid var(--grid-line-strong);
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .ruler-ticks {
            height: 6px;
            background-image: repeating-linear-gradient(90deg, var(--cyan) 0 1px, transparent 1px 24px);
            opacity: 0.5;
        }
        .nav-wrap {
            max-width: 1120px;
            margin: 0 auto;
            padding: 18px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #F5F3EC;
        }
        .brand-mark {
            width: 30px; height: 30px;
            border: 2px solid var(--amber);
            border-radius: 50%;
            position: relative;
            flex-shrink: 0;
        }
        .brand-mark::before, .brand-mark::after {
            content: "";
            position: absolute;
            background: var(--amber);
        }
        .brand-mark::before { width: 2px; height: 14px; top: 6px; left: 12px; }
        .brand-mark::after { width: 14px; height: 2px; left: 6px; top: 12px; }
        .brand-text { font-family:'Space Grotesk', sans-serif; font-weight:700; font-size:17px; letter-spacing:0.01em; }
        .brand-text small { display:block; font-family:'JetBrains Mono', monospace; font-weight:400; font-size:10px; color: var(--cyan); letter-spacing:0.08em; }

        nav.main-nav { display:flex; gap: 4px; }
        nav.main-nav a {
            font-family:'JetBrains Mono', monospace;
            font-size: 13px;
            color: #C9D3DE;
            padding: 8px 14px;
            border-bottom: 2px solid transparent;
            transition: color .15s ease, border-color .15s ease;
        }
        nav.main-nav a:hover { color: #fff; border-color: var(--grid-line-strong); }
        nav.main-nav a.active { color: var(--amber); border-color: var(--amber); }

        /* ---------- Buttons ---------- */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 13px;
            font-weight: 500;
            padding: 12px 22px;
            border-radius: 3px;
            border: 1.5px solid transparent;
            cursor: pointer;
            transition: transform .12s ease, opacity .12s ease;
        }
        .btn:hover { transform: translateY(-1px); }
        .btn-primary { background: var(--amber); color: var(--navy-deep); }
        .btn-primary:hover { background: var(--amber-dark); }
        .btn-outline { border-color: rgba(255,255,255,0.35); color: #F5F3EC; }
        .btn-outline:hover { border-color: #fff; }
        .btn-outline-ink { border-color: var(--navy); color: var(--navy); }

        /* ---------- Hero (blueprint grid) ---------- */
        .hero {
            background: var(--navy-deep);
            background-image:
                repeating-linear-gradient(0deg, var(--grid-line) 0 1px, transparent 1px 32px),
                repeating-linear-gradient(90deg, var(--grid-line) 0 1px, transparent 1px 32px);
            color: #F5F3EC;
            padding: 72px 28px 56px;
        }
        .hero-inner { max-width: 1120px; margin: 0 auto; }
        .eyebrow {
            font-family:'JetBrains Mono', monospace;
            font-size: 12px;
            color: var(--cyan);
            letter-spacing: 0.12em;
            display: flex; align-items:center; gap: 10px;
            margin-bottom: 18px;
        }
        .eyebrow::before { content:""; width: 26px; height:1px; background: var(--cyan); display:inline-block; }
        .hero h1 { font-size: 44px; line-height: 1.15; max-width: 680px; }
        .hero h1 .accent { color: var(--amber); }
        .hero p.lead { margin-top: 18px; max-width: 560px; color: #B9C4D0; font-size: 16px; }
        .hero-actions { margin-top: 30px; display:flex; gap: 14px; flex-wrap: wrap; }

        .spec-row {
            margin-top: 56px;
            display: flex;
            flex-wrap: wrap;
            border-top: 1px solid var(--grid-line-strong);
            padding-top: 22px;
        }
        .spec-item {
            font-family:'JetBrains Mono', monospace;
            padding-right: 32px;
            margin-right: 32px;
            border-right: 1px solid var(--grid-line-strong);
        }
        .spec-item:last-child { border-right: none; }
        .spec-item .num { font-size: 22px; color: var(--amber); font-weight:600; }
        .spec-item .label { font-size: 11px; color: #8FA0B3; letter-spacing:0.08em; display:block; margin-top:2px; }

        /* ---------- Sections ---------- */
        section { padding: 64px 28px; }
        .section-inner { max-width: 1120px; margin: 0 auto; }
        .section-head { margin-bottom: 36px; max-width: 640px; }
        .section-head .eyebrow { color: var(--amber-dark); }
        .section-head .eyebrow::before { background: var(--amber-dark); }
        .section-head h2 { font-size: 28px; color: var(--ink); }
        .section-head p { margin-top: 10px; color: var(--ink-soft); font-size: 15px; }
        section.on-navy { background: var(--navy); color: #F5F3EC; }
        section.on-navy .section-head h2 { color: #fff; }
        section.on-navy .section-head p { color: #B9C4D0; }

        /* ---------- Cards ---------- */
        .grid { display: grid; gap: 22px; }
        .grid-3 { grid-template-columns: repeat(3, 1fr); }
        .grid-2 { grid-template-columns: repeat(2, 1fr); }

        .card {
            background: #fff;
            border: 1px solid #E4E0D4;
            border-radius: 6px;
            padding: 26px;
            position: relative;
        }
        .card::before, .card::after {
            content:"";
            position:absolute; width:10px; height:10px;
            border-top: 2px solid var(--cyan);
            border-left: 2px solid var(--cyan);
            top: -1px; left: -1px;
        }
        .card::after {
            border-top:none; border-left:none;
            border-bottom: 2px solid var(--cyan);
            border-right: 2px solid var(--cyan);
            top: auto; left: auto; bottom: -1px; right: -1px;
        }
        .card .tag {
            font-family:'JetBrains Mono', monospace;
            font-size: 11px;
            color: var(--amber-dark);
            letter-spacing: 0.08em;
            margin-bottom: 12px;
            display: inline-block;
        }
        .card h3 { font-size: 17px; margin-bottom: 8px; color: var(--ink); }
        .card p { font-size: 14px; color: var(--ink-soft); }
        .card .icon { width: 34px; height: 34px; margin-bottom: 16px; color: var(--amber-dark); }

        .chip {
            display:inline-block;
            font-family:'JetBrains Mono', monospace;
            font-size: 11px;
            background: var(--paper);
            border: 1px solid #E4E0D4;
            color: var(--ink-soft);
            padding: 4px 10px;
            border-radius: 3px;
            margin: 3px 6px 0 0;
        }

        .on-navy .card { background: var(--navy-light); border-color: var(--grid-line-strong); }
        .on-navy .card h3 { color: #fff; }
        .on-navy .card p { color: #C9D3DE; }
        .on-navy .card::before, .on-navy .card::after { border-color: var(--amber); }
        .on-navy .chip { background: var(--navy-deep); border-color: var(--grid-line-strong); color: #B9C4D0; }

        /* ---------- Forms ---------- */
        .field { margin-bottom: 20px; }
        .field label {
            display:block;
            font-family:'JetBrains Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.08em;
            color: var(--ink-soft);
            margin-bottom: 6px;
        }
        .field input, .field textarea {
            width: 100%;
            font-family:'Inter', sans-serif;
            font-size: 14px;
            padding: 12px 14px;
            border: 1.5px solid #DDD8C8;
            border-radius: 4px;
            background: #fff;
            color: var(--ink);
        }
        .field input:focus, .field textarea:focus {
            outline: none;
            border-color: var(--cyan);
        }
        .field textarea { min-height: 120px; resize: vertical; }
        .error-msg { color: #C0362C; font-size: 12px; margin-top: 5px; font-family:'JetBrains Mono', monospace; }
        .success-box {
            background: #E9F5EC;
            border: 1px solid #BFE3C8;
            color: #1E5631;
            padding: 14px 18px;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 24px;
        }
        .field.valid input, .field.valid textarea { border-color: #3FA772; }
        .field.invalid input, .field.invalid textarea { border-color: #C0362C; }
        .char-counter {
            font-family:'JetBrains Mono', monospace;
            font-size: 11px;
            color: var(--ink-soft);
            text-align: right;
            margin-top: 5px;
        }

        /* ---------- Footer / Title block ---------- */
        footer.site-footer {
            background: var(--navy-deep);
            color: #8FA0B3;
            padding: 40px 28px 28px;
        }
        .footer-inner {
            max-width: 1120px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 24px;
        }
        .footer-note { font-size: 13px; max-width: 380px; }
        .footer-note .brand-text { color: #F5F3EC; margin-bottom: 6px; }
        .title-block {
            font-family:'JetBrains Mono', monospace;
            font-size: 11px;
            border: 1px solid var(--grid-line-strong);
            min-width: 260px;
        }
        .title-block .row {
            display:flex; justify-content: space-between;
            padding: 7px 12px;
            border-top: 1px solid var(--grid-line-strong);
        }
        .title-block .row:first-child { border-top: none; background: var(--navy); color: var(--amber); font-weight:600; letter-spacing:0.06em;}
        .title-block .row span:first-child { color: #8FA0B3; }
        .title-block .row:first-child span { color: var(--amber); }

        @media (max-width: 860px) {
            .grid-3, .grid-2 { grid-template-columns: 1fr; }
            .hero h1 { font-size: 32px; }
            .nav-wrap { flex-wrap: wrap; gap: 12px; }
            .menu-toggle { display: flex; }
            nav.main-nav {
                display: none;
                width: 100%;
                flex-direction: column;
                gap: 2px;
                border-top: 1px solid var(--grid-line-strong);
                padding-top: 10px;
            }
            nav.main-nav.open { display: flex; }
            nav.main-nav a { padding: 10px 4px; font-size: 13px; }
            .brand-text small { display: none; }
            .spec-row { gap: 18px 0; }
            .spec-item { padding-right:20px; margin-right:20px; }
            .coord-readout { display: none; }
        }

        /* ---------- Interactive: hamburger ---------- */
        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px;
        }
        .menu-toggle span {
            width: 22px; height: 2px;
            background: #F5F3EC;
            transition: transform .2s ease, opacity .2s ease;
        }
        .menu-toggle.active span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .menu-toggle.active span:nth-child(2) { opacity: 0; }
        .menu-toggle.active span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

        /* ---------- Interactive: coordinate readout (hero) ---------- */
        .hero { position: relative; overflow: hidden; }
        .coord-readout {
            position: absolute;
            top: 22px;
            right: 28px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            color: var(--cyan);
            opacity: 0;
            transition: opacity .2s ease;
            letter-spacing: 0.05em;
            pointer-events: none;
        }

        /* ---------- Interactive: scroll reveal ---------- */
        .reveal {
            opacity: 0;
            transform: translateY(18px);
            transition: opacity .6s ease, transform .6s ease;
        }
        .reveal.is-visible { opacity: 1; transform: none; }

        /* ---------- Interactive: course filter tabs ---------- */
        .filter-tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 28px;
            flex-wrap: wrap;
        }
        .filter-btn {
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            background: #fff;
            border: 1.5px solid #DDD8C8;
            color: var(--ink-soft);
            padding: 8px 16px;
            border-radius: 20px;
            cursor: pointer;
            transition: all .15s ease;
        }
        .filter-btn:hover { border-color: var(--cyan); }
        .filter-btn.active { background: var(--navy-deep); border-color: var(--navy-deep); color: var(--amber); }

        /* ---------- Data table (Students CRUD) ---------- */
        .table-wrap {
            background: #fff;
            border: 1px solid #E4E0D4;
            border-radius: 6px;
            overflow: hidden;
        }
        table.data-table { width: 100%; border-collapse: collapse; }
        table.data-table th {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.06em;
            text-align: left;
            background: var(--navy-deep);
            color: var(--amber);
            padding: 12px 16px;
        }
        table.data-table td {
            padding: 14px 16px;
            font-size: 14px;
            border-top: 1px solid #EEEBE0;
            color: var(--ink);
        }
        table.data-table tr:hover td { background: #FBFAF5; }
        table.data-table .roll { font-family:'JetBrains Mono', monospace; font-size:12px; color: var(--ink-soft); }

        .action-link {
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 3px;
            border: 1px solid #DDD8C8;
            margin-right: 6px;
            display: inline-block;
            cursor: pointer;
            background: #fff;
        }
        .action-link:hover { border-color: var(--cyan); }
        .action-link.danger { color: #C0362C; border-color: #EFD3D0; }
        .action-link.danger:hover { border-color: #C0362C; background: #FCEDEC; }
        .action-link.primary { color: var(--amber-dark); border-color: #F4DCA8; }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 22px;
            flex-wrap: wrap;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--ink-soft);
        }
        .empty-state .mono { font-size: 12px; letter-spacing: 0.08em; color: var(--amber-dark); }

        @media (max-width: 640px) {
            table.data-table { display: block; overflow-x: auto; white-space: nowrap; }
        }
        .avatar-thumb {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid #DDD8C8;
            display: block;
        }
        .avatar-placeholder {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #EDEDED;
            color: #6B7280;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body>

    <header class="site-header">
        <div class="ruler-ticks"></div>
        <div class="nav-wrap">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-mark"></span>
                <span class="brand-text">BUILD LOG<small>STUDENT MANAGEMENT SYSTEM</small></span>
            </a>
            <nav class="main-nav">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                <a href="{{ route('courses') }}" class="{{ request()->routeIs('courses') ? 'active' : '' }}">Courses</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                @auth
                    <a href="{{ route('students.index') }}" class="{{ request()->routeIs('students.*') ? 'active' : '' }}">Students</a>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.*') ? 'active' : '' }}">Admin</a>
                    @endif
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="mono" style="background:none;border:none;color:#C9D3DE;font-size:13px;padding:8px 14px;cursor:pointer;">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
                    <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">Register</a>
                @endauth
            </nav>
            <button class="menu-toggle" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>

    @yield('content')

    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-note">
                <div class="brand-text mono" style="font-family:'Space Grotesk',sans-serif; font-size:15px;">Build Log</div>
                A Laravel-based system for managing students, courses, and enrollment records — with role-based access and a REST API.
            </div>
            <div class="title-block">
                <div class="row"><span>TITLE BLOCK</span><span>BL-01</span></div>
                <div class="row"><span>PROJECT</span><span>Build Log</span></div>
                <div class="row"><span>SHEET</span><span>@yield('sheet', 'HOME')</span></div>
                <div class="row"><span>REV</span><span>1.0</span></div>
                <div class="row"><span>DRAWN BY</span><span>Amna</span></div>
            </div>
        </div>
    </footer>

    <script>
    (function () {
        // Mobile hamburger menu
        var toggle = document.querySelector('.menu-toggle');
        var nav = document.querySelector('.main-nav');
        if (toggle && nav) {
            toggle.addEventListener('click', function () {
                nav.classList.toggle('open');
                toggle.classList.toggle('active');
            });
            nav.querySelectorAll('a').forEach(function (a) {
                a.addEventListener('click', function () {
                    nav.classList.remove('open');
                    toggle.classList.remove('active');
                });
            });
        }

        // Blueprint coordinate readout — mouse tracked inside hero
        var hero = document.querySelector('.hero');
        var coord = document.querySelector('.coord-readout');
        if (hero && coord && window.matchMedia('(pointer:fine)').matches) {
            hero.addEventListener('mousemove', function (e) {
                var rect = hero.getBoundingClientRect();
                var x = Math.round(e.clientX - rect.left);
                var y = Math.round(e.clientY - rect.top);
                coord.textContent = 'X:' + String(x).padStart(4, '0') + '  Y:' + String(y).padStart(4, '0');
                coord.style.opacity = '1';
            });
            hero.addEventListener('mouseleave', function () { coord.style.opacity = '0'; });
        }

        // Scroll reveal + animated counters
        var revealEls = document.querySelectorAll('.reveal');
        function animateCount(el) {
            var target = parseInt(el.getAttribute('data-count-to'), 10);
            var start = null;
            function step(ts) {
                if (!start) start = ts;
                var progress = Math.min((ts - start) / 800, 1);
                el.textContent = String(Math.floor(progress * target)).padStart(2, '0');
                if (progress < 1) requestAnimationFrame(step);
                else el.textContent = String(target).padStart(2, '0');
            }
            requestAnimationFrame(step);
        }
        if ('IntersectionObserver' in window && revealEls.length) {
            var obs = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        var counter = entry.target.querySelector('[data-count-to]');
                        if (counter && !counter.dataset.counted) {
                            counter.dataset.counted = '1';
                            animateCount(counter);
                        }
                        obs.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.2 });
            revealEls.forEach(function (el) { obs.observe(el); });
        } else {
            revealEls.forEach(function (el) {
                el.classList.add('is-visible');
                var counter = el.querySelector('[data-count-to]');
                if (counter) counter.textContent = String(counter.getAttribute('data-count-to')).padStart(2, '0');
            });
        }

        // Courses page: filter tabs
        var filterBtns = document.querySelectorAll('.filter-btn');
        var leveledCards = document.querySelectorAll('[data-level]');
        filterBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                filterBtns.forEach(function (b) { b.classList.remove('active'); });
                btn.classList.add('active');
                var f = btn.getAttribute('data-filter');
                leveledCards.forEach(function (card) {
                    var show = (f === 'all' || card.getAttribute('data-level') === f);
                    card.style.display = show ? '' : 'none';
                });
            });
        });

        // Contact page: character counter
        var msg = document.querySelector('#message-field');
        var counter = document.querySelector('#char-counter');
        if (msg && counter) {
            var max = 300;
            msg.setAttribute('maxlength', max);
            var updateCounter = function () { counter.textContent = msg.value.length + ' / ' + max; };
            updateCounter();
            msg.addEventListener('input', updateCounter);
        }

        // Contact page: inline validation state on blur
        document.querySelectorAll('.field input, .field textarea').forEach(function (input) {
            input.addEventListener('blur', function () {
                var field = input.closest('.field');
                if (input.value.trim() === '') { field.classList.remove('valid', 'invalid'); return; }
                if (input.checkValidity()) { field.classList.add('valid'); field.classList.remove('invalid'); }
                else { field.classList.add('invalid'); field.classList.remove('valid'); }
            });
        });

        // Contact page: submit button loading state
        var contactForm = document.querySelector('#contact-form');
        if (contactForm) {
            contactForm.addEventListener('submit', function () {
                var btn = contactForm.querySelector('button[type="submit"]');
                if (btn) { btn.textContent = 'Sending…'; btn.disabled = true; btn.style.opacity = '0.7'; }
            });
        }
    })();
    </script>

</body>
</html>
