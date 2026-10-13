
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINDIT — Temukan Barangmu</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --blue: #2563eb;
            --dark: #172554;
            --muted: #64748b;
            --line: #e5eaf3;
            --light: #f5f8ff;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #fff;
            color: var(--dark);
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button, input {
            font: inherit;
        }

        .container {
            width: min(1160px, 90%);
            margin: auto;
        }

        header {
            position: relative;
            z-index: 20;
            border-bottom: 1px solid var(--line);
            background: rgba(255,255,255,.98);
        }

        .nav-links, .nav-links a, .nav-links button, .nav-links form {
            pointer-events: auto;
        }

        .logout-form { margin: 0; }
        .welcome-user { color: var(--muted); font-size: 13px; white-space: nowrap; }
        .nav-links form .btn { font: inherit; }

        nav {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            background: var(--blue);
            color: white;
            border-radius: 13px;
            font-size: 23px;
        }

        .brand span:last-child {
            color: var(--blue);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
            color: #475569;
            font-size: 14px;
            font-weight: 600;
        }

        .nav-links a:hover {
            color: var(--blue);
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            border: 1px solid transparent;
            border-radius: 10px;
            padding: 12px 18px;
            cursor: pointer;
            font-weight: 700;
            transition: .2s;
        }

        .btn-primary {
            background: var(--blue);
            color: white;
            box-shadow: 0 6px 16px #2563eb24;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .btn-outline {
            border-color: #d6deeb;
            color: var(--dark);
            background: white;
        }

        .btn-outline:hover {
            background: var(--light);
        }

        .hero {
            background:
                radial-gradient(circle at 85% 25%, #dbeafe 0, transparent 28%),
                linear-gradient(120deg, #f8fbff, #eff6ff);
            padding: 82px 0 76px;
            overflow: hidden;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            align-items: center;
            gap: 60px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #dbeafe;
            color: #1d4ed8;
            border-radius: 30px;
            padding: 7px 13px;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 22px;
        }

        h1 {
            font-size: clamp(38px, 4.5vw, 58px);
            line-height: 1.13;
            letter-spacing: -2px;
            margin-bottom: 22px;
        }

        h1 span {
            color: var(--blue);
        }

        .hero-description {
            color: var(--muted);
            font-size: 16px;
            max-width: 530px;
            margin-bottom: 28px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .hero-note {
            display: flex;
            gap: 9px;
            align-items: center;
            color: #64748b;
            font-size: 12px;
            margin-top: 24px;
        }

        .illustration {
            min-height: 330px;
            display: grid;
            place-items: center;
            position: relative;
        }

        .orbit {
            width: 285px;
            height: 285px;
            background: #dbeafe;
            border-radius: 50%;
            display: grid;
            place-items: center;
            position: relative;
        }

        .search-art {
            width: 170px;
            height: 170px;
            background: white;
            border: 1px solid #dbeafe;
            border-radius: 30px;
            display: grid;
            place-items: center;
            box-shadow: 0 25px 60px #1e40af18;
            font-size: 76px;
            transform: rotate(-6deg);
        }

        .floating-card {
            position: absolute;
            background: white;
            border: 1px solid #e4ebf7;
            border-radius: 13px;
            padding: 13px 16px;
            box-shadow: 0 12px 35px #1e40af12;
            font-size: 12px;
            font-weight: 700;
        }

        .floating-card small {
            display: block;
            color: var(--muted);
            font-weight: 400;
            margin-top: 3px;
        }

        .float-one {
            top: 35px;
            right: 0;
        }

        .float-two {
            bottom: 35px;
            left: 0;
        }

        .section {
            padding: 66px 0;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 28px;
        }

        .section-heading h2 {
            font-size: 27px;
            letter-spacing: -.8px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 14px;
            margin-top: 5px;
        }

        .search-panel {
            background: white;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 14px;
            display: flex;
            gap: 12px;
            box-shadow: 0 12px 35px #0f172a08;
            margin-top: -35px;
            position: relative;
        }

        .search-input {
            flex: 1;
            min-width: 0;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 12px;
        }

        .search-input input {
            width: 100%;
            border: none;
            outline: none;
            color: var(--dark);
            padding: 12px 0;
        }

        .search-input input::placeholder {
            color: #94a3b8;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .category-card {
            border: 1px solid var(--line);
            border-radius: 15px;
            padding: 23px;
            transition: .2s;
            background: white;
        }

        .category-card:hover {
            border-color: #93b4ff;
            transform: translateY(-3px);
            box-shadow: 0 12px 25px #2563eb0c;
        }

        .category-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: #eff6ff;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .category-card h3 {
            font-size: 15px;
            margin-bottom: 4px;
        }

        .category-card p {
            color: var(--muted);
            font-size: 12px;
        }

        .recent {
            background: #f8faff;
        }

        .empty-state {
            text-align: center;
            padding: 48px 20px;
            border: 1px dashed #cbd5e1;
            border-radius: 16px;
            background: white;
        }

        .empty-icon {
            font-size: 43px;
            margin-bottom: 12px;
        }

        .empty-state h3 {
            font-size: 18px;
            margin-bottom: 6px;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 18px;
        }

        .notice-success { padding: 14px 16px; margin-bottom: 18px; border-radius: 10px; background: #e7f8ed; color: #176534; }
        .report-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px; }
        .report-card { min-width: 0; padding: 21px; border: 1px solid var(--line); border-radius: 15px; background: white; box-shadow: 0 8px 22px #0f172a08; }
        .report-card-top { display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 8px; margin-bottom: 15px; }
        .report-type, .report-status { display: inline-block; border-radius: 30px; padding: 5px 9px; font-size: 11px; font-weight: 700; }
        .type-lost { background: #fff0ed; color: #b93820; }
        .type-found { background: #e7f8ed; color: #176534; }
        .report-status { background: #fff7df; color: #8a6200; }
        .report-card h3 { font-size: 18px; margin-bottom: 4px; overflow-wrap: anywhere; }
        .report-category { font-size: 12px; color: var(--blue); font-weight: 700; margin-bottom: 12px; }
        .report-description { color: var(--muted); font-size: 13px; margin-bottom: 14px; overflow-wrap: anywhere; }
        .report-meta { color: #475569; font-size: 12px; margin-top: 7px; overflow-wrap: anywhere; }
        .report-owner { border-top: 1px solid var(--line); margin-top: 15px; padding-top: 12px; color: var(--muted); font-size: 11px; }
        .no-search-results { padding: 20px; color: var(--muted); text-align: center; }
        .report-actions { margin-top: 14px; display: grid; gap: 10px; }
        .contact-btn { display: inline-flex; justify-content: center; padding: 10px 12px; border-radius: 9px; background: #16a34a; color: white; font-size: 13px; font-weight: 700; }
        .claim-box { padding: 12px; border-radius: 10px; background: #f8fafc; border: 1px solid var(--line); font-size: 12px; }
        .claim-box textarea { width: 100%; min-height: 75px; margin: 8px 0; padding: 9px; border: 1px solid #d6deeb; border-radius: 8px; font: inherit; }
        .claim-box button, .claim-box select { padding: 8px 10px; border: 0; border-radius: 8px; cursor: pointer; font-weight: 700; margin: 3px 3px 3px 0; }
        .claim-submit { background: var(--blue); color: white; }
        .claim-approve { background: #dcfce7; color: #166534; } .claim-reject { background: #fee2e2; color: #991b1b; }
        .claim-return { background: #dbeafe; color: #1d4ed8; }
        .flash { margin: 18px auto; padding: 13px 16px; border-radius: 10px; background: #e7f8ed; color: #176534; }
        .flash-error { background: #fff0f0; color: #b42318; }
        @media (max-width: 900px) { .report-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (max-width: 560px) { .report-grid { grid-template-columns: 1fr; } .welcome-user { display: none; } }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .step {
            padding: 25px;
            border: 1px solid var(--line);
            border-radius: 15px;
        }

        .step-number {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            color: var(--blue);
            background: #dbeafe;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .step h3 {
            font-size: 16px;
            margin-bottom: 7px;
        }

        .step p {
            color: var(--muted);
            font-size: 13px;
        }

        footer {
            border-top: 1px solid var(--line);
            padding: 27px 0;
            color: var(--muted);
            font-size: 13px;
        }

        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        @media (max-width: 800px) {
            .nav-links {
                gap: 12px;
            }

            .nav-links a:not(.btn) {
                display: none;
            }

            .hero {
                padding: 55px 0 65px;
            }

            .hero-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .illustration {
                min-height: 280px;
            }

            .orbit {
                width: 235px;
                height: 235px;
            }

            .search-art {
                width: 140px;
                height: 140px;
            }

            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .steps-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .brand {
                font-size: 22px;
            }

            .nav-links .btn {
                padding: 9px 12px;
                font-size: 12px;
            }

            .hero-actions .btn {
                width: 100%;
            }

            .search-panel {
                flex-direction: column;
            }

            .search-panel .btn {
                width: 100%;
            }

            .section-heading h2 {
                font-size: 23px;
            }

            .category-card {
                padding: 16px;
            }

            .footer-inner {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="container">
        <nav>
            <a href="<?php echo e(route('home')); ?>" class="brand">
                <span class="brand-icon">⌕</span>
                <span>FIND<span>IT</span></span>
            </a>

            <div class="nav-links">
                <a href="#kategori">Kategori</a>
                <a href="#cara-kerja">Cara Kerja</a>
                <a href="#terbaru">Barang Terbaru</a>
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Masuk</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-outline">Daftar</a>
                <?php else: ?>
                    <span class="welcome-user">Hai, <?php echo e(auth()->user()->name); ?></span>
                    <a href="<?php echo e(route('reports.create')); ?>" class="btn btn-primary">+ Laporkan</a>
                    <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-outline">Keluar</button>
                    </form>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>

<main>
    <?php if(session('success')): ?><div class="container"><div class="flash"><?php echo e(session('success')); ?></div></div><?php endif; ?>
    <?php if(session('error')): ?><div class="container"><div class="flash flash-error"><?php echo e(session('error')); ?></div></div><?php endif; ?>
    <?php if($errors->any()): ?><div class="container"><div class="flash flash-error"><?php echo e($errors->first()); ?></div></div><?php endif; ?>
    <section class="hero">
        <div class="container hero-grid">
            <div>
                <div class="eyebrow">✦ LAYANAN BARANG HILANG UNIMED</div>

                <h1>
                    Temukan Barangmu,<br>
                    <span>Kembalikan yang Berharga.</span>
                </h1>

                <p class="hero-description">
                    Kehilangan sesuatu di kampus? FINDIT membantu kamu mencari
                    laporan barang hilang dan menghubungkan barang temuan
                    dengan pemiliknya.
                </p>

                <div class="hero-actions">
                    <a href="#terbaru" class="btn btn-primary">
                        Cari Barang &nbsp; →
                    </a>
                    <a href="#cara-kerja" class="btn btn-outline">
                        Pelajari Cara Kerja
                    </a>
                </div>

                <div class="hero-note">
                    <span>🔒</span>
                    <span>Dirancang untuk pencarian barang yang lebih teratur dan aman.</span>
                </div>
            </div>

            <div class="illustration">
                <div class="orbit">
                    <div class="search-art">🔎</div>
                </div>

                <div class="floating-card float-one">
                    ✓ Laporan terhubung
                    <small>Temukan kemungkinan kecocokan</small>
                </div>

                <div class="floating-card float-two">
                    📍 Lokasi kampus
                    <small>Bantu persempit pencarian</small>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <form class="search-panel" action="#terbaru" method="GET"
              onsubmit="event.preventDefault(); cariKategori();">
            <div class="search-input">
                <span>⌕</span>
                <input type="search" id="searchInput"
                       placeholder="Cari barang, misalnya dompet, kunci, atau kartu mahasiswa...">
            </div>
            <button class="btn btn-primary" type="submit">Cari Sekarang</button>
        </form>
    </div>

    <section class="section" id="kategori">
        <div class="container">
            <div class="section-heading">
                <div>
                    <h2>Jelajahi Kategori</h2>
                    <p>Pilih kategori untuk membantu mempersempit pencarian.</p>
                </div>
            </div>

            <div class="category-grid">
                <a href="#terbaru" class="category-card" onclick="pilihKategori('Dompet & Uang'); return false;">
                    <div class="category-icon">👛</div>
                    <h3>Dompet & Uang</h3>
                    <p>Dompet dan barang berharga</p>
                </a>

                <a href="#terbaru" class="category-card" onclick="pilihKategori('Kartu Identitas'); return false;">
                    <div class="category-icon">🪪</div>
                    <h3>Kartu Identitas</h3>
                    <p>KTM dan kartu lainnya</p>
                </a>

                <a href="#terbaru" class="category-card" onclick="pilihKategori('Elektronik'); return false;">
                    <div class="category-icon">🎧</div>
                    <h3>Elektronik</h3>
                    <p>HP, earphone, dan aksesori</p>
                </a>

                <a href="#terbaru" class="category-card" onclick="pilihKategori('Barang Lainnya'); return false;">
                    <div class="category-icon">🎒</div>
                    <h3>Barang Lainnya</h3>
                    <p>Buku, tas, kunci, dan lainnya</p>
                </a>
            </div>
        </div>
    </section>

    <section class="section recent" id="terbaru">
        <div class="container">
            <div class="section-heading">
                <div>
                    <h2>Laporan Barang</h2>
                    <p id="searchMessage">Lihat laporan kehilangan dan penemuan barang.</p>
                </div>
            </div>

            <?php if(session('success')): ?>
                <div class="notice-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <?php if($reports->isEmpty()): ?>
                <div class="empty-state" id="emptyState">
                    <div class="empty-icon">🔍</div>
                    <h3>Belum Ada Laporan Barang</h3>
                    <p>Jadilah yang pertama melaporkan barang hilang atau ditemukan di lingkungan kampus.</p>
                    <a href="<?php echo e(route('reports.create')); ?>" class="btn btn-primary">+ Laporkan Barang</a>
                </div>
            <?php else: ?>
                <div class="report-grid" id="reportGrid">
                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="report-card" data-search="<?php echo e(strtolower($report->item_name.' '.$report->category.' '.$report->location.' '.$report->description.' '.$report->report_type)); ?>">
                            <div class="report-card-top">
                                <span class="report-type <?php echo e($report->report_type === 'lost' ? 'type-lost' : 'type-found'); ?>">
                                    <?php echo e($report->report_type === 'lost' ? 'Barang Hilang' : 'Barang Ditemukan'); ?>

                                </span>
                                <span class="report-status"><?php echo e($report->status === 'pending' ? 'Menunggu verifikasi' : ucfirst($report->status)); ?></span>
                            </div>
                            <h3><?php echo e($report->item_name); ?></h3>
                            <p class="report-category"><?php echo e($report->category); ?></p>
                            <p class="report-description"><?php echo e($report->description); ?></p>
                            <div class="report-meta">📍 <?php echo e($report->location); ?></div>
                            <div class="report-meta">📅 <?php echo e($report->event_date->format('d M Y')); ?></div>
                            <div class="report-owner">Dilaporkan oleh <?php echo e($report->user?->name ?? 'Pengguna FINDIT'); ?></div>
                            <div class="report-actions">
                                <?php if($report->report_type === 'found' && $report->whatsapp && $report->whatsapp_consent_at): ?>
                                    <?php
                                        $waNumber = preg_replace('/\D+/', '', $report->whatsapp);
                                        if (str_starts_with($waNumber, '0')) $waNumber = '62'.substr($waNumber, 1);
                                        elseif (str_starts_with($waNumber, '8')) $waNumber = '62'.$waNumber;
                                    ?>
                                    <a class="contact-btn" href="https://wa.me/<?php echo e($waNumber); ?>" target="_blank" rel="noopener noreferrer">Hubungi Penemu via WhatsApp</a>
                                <?php endif; ?>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if($report->report_type === 'found' && $report->user_id !== auth()->id() && !in_array($report->status, ['claimed', 'returned', 'rejected'], true)): ?>
                                        <?php $myActiveClaim = $report->claims->first(fn($c) => $c->claimant_id === auth()->id() && in_array($c->status, ['pending', 'approved'], true)); ?>
                                        <?php if(!$myActiveClaim): ?>
                                            <form class="claim-box" method="POST" action="<?php echo e(route('claims.store', $report)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <strong>Merasa ini barangmu?</strong>
                                                <textarea name="message" minlength="10" maxlength="1500" required placeholder="Jelaskan ciri khusus barang atau bukti kepemilikan (jangan tulis data sensitif)."></textarea>
                                                <button class="claim-submit" type="submit">Ajukan Klaim</button>
                                            </form>
                                        <?php else: ?>
                                            <div class="claim-box">Klaimmu: <strong><?php echo e(['pending' => 'Menunggu verifikasi', 'approved' => 'Klaim disetujui', 'returned' => 'Barang dikembalikan'][$myActiveClaim->status] ?? $myActiveClaim->status); ?></strong></div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($report->user_id === auth()->id() && $report->claims->isNotEmpty()): ?>
                                        <?php $__currentLoopData = $report->claims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $claim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="claim-box">
                                                <strong>Klaim dari <?php echo e($claim->claimant?->name ?? 'Pengguna'); ?></strong><br>
                                                <span>Status: <?php echo e(['pending' => 'Menunggu verifikasi', 'approved' => 'Disetujui', 'rejected' => 'Ditolak', 'returned' => 'Dikembalikan'][$claim->status] ?? $claim->status); ?></span>
                                                <p style="margin:8px 0;white-space:pre-line"><?php echo e($claim->message); ?></p>
                                                <?php if($claim->status === 'pending'): ?>
                                                    <form method="POST" action="<?php echo e(route('claims.update', $claim)); ?>" style="display:inline"><?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?><input type="hidden" name="action" value="approve"><button class="claim-approve" type="submit">Setujui Klaim</button></form>
                                                    <form method="POST" action="<?php echo e(route('claims.update', $claim)); ?>" style="display:inline"><?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?><input type="hidden" name="action" value="reject"><button class="claim-reject" type="submit">Tolak</button></form>
                                                <?php elseif($claim->status === 'approved'): ?>
                                                    <p>Periksa identitas dan bukti kepemilikan sebelum menyerahkan barang.</p>
                                                    <form method="POST" action="<?php echo e(route('claims.update', $claim)); ?>"><?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?><input type="hidden" name="action" value="return"><button class="claim-return" type="submit">Konfirmasi Barang Dikembalikan</button></form>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if($report->report_type === 'found' && !in_array($report->status, ['claimed', 'returned', 'rejected'], true)): ?>
                                        <a class="btn btn-outline" href="<?php echo e(route('login')); ?>">Login untuk mengajukan klaim</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <p class="no-search-results" id="noSearchResults" hidden>Tidak ada laporan yang cocok dengan pencarianmu.</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="section" id="cara-kerja">
        <div class="container">
            <div class="section-heading">
                <div>
                    <h2>Bagaimana FINDIT Bekerja?</h2>
                    <p>Tiga langkah sederhana untuk memulai pencarian.</p>
                </div>
            </div>

            <div class="steps-grid">
                <div class="step">
                    <div class="step-number">01</div>
                    <h3>Buat Laporan</h3>
                    <p>Masukkan informasi barang yang hilang atau ditemukan,
                       termasuk lokasi dan tanggal.</p>
                </div>

                <div class="step">
                    <div class="step-number">02</div>
                    <h3>Cari Kecocokan</h3>
                    <p>Telusuri laporan berdasarkan kategori, deskripsi,
                       lokasi, dan waktu.</p>
                </div>

                <div class="step">
                    <div class="step-number">03</div>
                    <h3>Verifikasi & Ambil</h3>
                    <p>Ajukan klaim dan buktikan kepemilikan sebelum barang
                       dikembalikan.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container footer-inner">
        <a href="<?php echo e(route('home')); ?>" class="brand">
            <span class="brand-icon">⌕</span>
            <span>FIND<span>IT</span></span>
        </a>
        <p>© <?php echo e(date('Y')); ?> FINDIT · Konsep layanan barang hilang di UNIMED.</p>
    </div>
</footer>

<script>
    function cariKategori() {
        const input = document.getElementById('searchInput');
        const message = document.getElementById('searchMessage');
        const keyword = input.value.trim();

        const cards = document.querySelectorAll('.report-card');
        let shown = 0;
        cards.forEach(card => {
            const matches = !keyword || card.dataset.search.includes(keyword.toLowerCase());
            card.hidden = !matches;
            if (matches) shown++;
        });

        const noResults = document.getElementById('noSearchResults');
        if (noResults) noResults.hidden = shown !== 0;
        message.textContent = keyword
            ? 'Hasil pencarian untuk: "' + keyword + '" (' + shown + ' laporan).'
            : 'Lihat laporan kehilangan dan penemuan barang.';

        document.getElementById('terbaru').scrollIntoView({ behavior: 'smooth' });
    }

    function pilihKategori(kategori) {
        document.getElementById('searchInput').value = kategori;
        cariKategori();
    }
</script>

</body>
</html>
<?php /**PATH C:\Users\hp\Downloads\FINDIT-terbaru\findit\resources\views/home.blade.php ENDPATH**/ ?>