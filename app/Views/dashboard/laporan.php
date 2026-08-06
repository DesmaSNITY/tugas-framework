<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>

.report-page {
    min-height: 650px;
    padding: 42px 48px 75px;
    background:
        linear-gradient(
            180deg,
            #e0407a 0%,
            #f299bc 43%,
            #ffffff 100%
        );
}

.report-wrap {
    max-width: 1200px;
    margin: 0 auto;
}

.report-header {
    margin-bottom: 26px;
}

.report-header h1 {
    margin-bottom: 6px;
    color: #ffffff;
    font-size: 27px;
    font-weight: 850;
}

.report-header p {
    color: rgba(255, 255, 255, 0.9);
    font-size: 13px;
    line-height: 1.6;
}

.report-alert {
    margin-bottom: 22px;
    padding: 14px 17px;
    border: 1px solid #f3bcc7;
    border-radius: 12px;
    color: #97283a;
    background: #fff0f3;
    font-size: 13px;
    line-height: 1.6;
}

.report-summary-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 18px;
    margin-bottom: 24px;
}

.report-summary-card {
    display: flex;
    align-items: center;
    gap: 15px;
    min-width: 0;
    padding: 21px;
    border-radius: 16px;
    background: #ffffff;
    box-shadow: 0 16px 34px rgba(120, 10, 55, 0.18);
}

.report-summary-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    flex-shrink: 0;
    border-radius: 14px;
    font-size: 20px;
}

.report-summary-card.income .report-summary-icon {
    color: #247845;
    background: #e6f7ec;
}

.report-summary-card.expense .report-summary-icon {
    color: #b12f3f;
    background: #fde8eb;
}

.report-summary-card.balance .report-summary-icon {
    color: #6750b7;
    background: #eee9fb;
}

.report-summary-card.donors .report-summary-icon {
    color: #15749b;
    background: #e6f5fb;
}

.report-summary-card.programs .report-summary-icon {
    color: #a66c12;
    background: #fff3db;
}

.report-summary-card.target .report-summary-icon {
    color: #d53373;
    background: #ffe7f0;
}

.report-summary-content {
    min-width: 0;
}

.report-summary-label {
    margin-bottom: 4px;
    color: #836f79;
    font-size: 11.5px;
    font-weight: 650;
}

.report-summary-value {
    overflow: hidden;
    color: #35232e;
    font-size: 18px;
    font-weight: 850;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.report-panel {
    margin-bottom: 24px;
    padding: 25px;
    border-radius: 17px;
    background: #ffffff;
    box-shadow: 0 16px 34px rgba(120, 10, 55, 0.18);
}

.report-panel-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 23px;
}

.report-panel-header h2 {
    color: #34212d;
    font-size: 17px;
    font-weight: 820;
}

.report-panel-header span {
    color: #907985;
    font-size: 11px;
}

.report-chart {
    display: grid;
    grid-template-columns: repeat(12, minmax(42px, 1fr));
    align-items: end;
    gap: 11px;
    min-height: 285px;
    padding: 18px 8px 0;
    overflow-x: auto;
    border-bottom: 1px solid #eee4e9;
}

.report-chart-item {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: flex-end;
    min-width: 42px;
    height: 250px;
}

.report-chart-value {
    min-height: 28px;
    margin-bottom: 7px;
    color: #806b76;
    font-size: 9.5px;
    font-weight: 700;
    text-align: center;
    white-space: nowrap;
}

.report-chart-bar-wrap {
    display: flex;
    align-items: flex-end;
    width: 100%;
    height: 190px;
}

.report-chart-bar {
    width: 100%;
    min-height: 4px;
    border-radius: 8px 8px 0 0;
    background:
        linear-gradient(
            180deg,
            #a493e2,
            #df4a83
        );
}

.report-chart-month {
    margin-top: 9px;
    color: #715f69;
    font-size: 10px;
    font-weight: 750;
}

.report-table-wrap {
    overflow-x: auto;
}

.report-table {
    width: 100%;
    min-width: 1050px;
    border-collapse: collapse;
}

.report-table th {
    padding: 14px 12px;
    border-bottom: 1px solid #eee4e9;
    color: #8a7580;
    font-size: 10.5px;
    font-weight: 750;
    letter-spacing: 0.4px;
    text-align: left;
    text-transform: uppercase;
}

.report-table td {
    padding: 15px 12px;
    border-bottom: 1px solid #f4ebef;
    color: #3c2b34;
    font-size: 12px;
    vertical-align: middle;
}

.report-table tbody tr:last-child td {
    border-bottom: 0;
}

.report-table tbody tr:hover {
    background: #fff8fb;
}

.report-type {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 800;
    white-space: nowrap;
}

.report-type.donation {
    color: #247044;
    background: #e6f7ec;
}

.report-type.expense {
    color: #a92d3b;
    background: #fde7e9;
}

.report-actor {
    display: flex;
    flex-direction: column;
    gap: 3px;
    min-width: 130px;
}

.report-actor strong {
    color: #34212d;
    font-size: 12px;
}

.report-actor span {
    color: #917b86;
    font-size: 10px;
}

.report-anonymous {
    color: #8d7481 !important;
    font-style: italic;
}

.report-program {
    display: flex;
    flex-direction: column;
    gap: 3px;
    max-width: 250px;
}

.report-program strong {
    color: #34212d;
    font-size: 12px;
}

.report-program span {
    color: #917b86;
    font-size: 10px;
}

.report-amount {
    color: #df3977;
    font-weight: 820;
    white-space: nowrap;
}

.report-detail {
    max-width: 190px;
    color: #725f69;
    line-height: 1.5;
}

.report-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 800;
    white-space: nowrap;
}

.report-status.success {
    color: #247044;
    background: #e6f7ec;
}

.report-status.pending {
    color: #946411;
    background: #fff2d7;
}

.report-status.failed {
    color: #a92d3b;
    background: #fde7e9;
}

.report-empty {
    padding: 45px 20px;
    color: #89747f;
    font-size: 13px;
    text-align: center;
}

.report-empty i {
    display: block;
    margin-bottom: 12px;
    color: #df3977;
    font-size: 34px;
}

@media (max-width: 950px) {
    .report-summary-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 620px) {
    .report-page {
        padding: 30px 18px 60px;
    }

    .report-summary-grid {
        grid-template-columns: 1fr;
    }

    .report-panel {
        padding: 20px 16px;
    }

    .report-panel-header {
        align-items: flex-start;
        flex-direction: column;
    }
}

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<?php

$totalIncome = max(
    0,
    (int) ($totalIncome ?? 0)
);

$totalExpense = max(
    0,
    (int) ($totalExpense ?? 0)
);

$saldo = (int) (
    $saldo
    ?? ($totalIncome - $totalExpense)
);

$donorCount = max(
    0,
    (int) ($donorCount ?? 0)
);

$totalPrograms = max(
    0,
    (int) ($totalPrograms ?? 0)
);

$totalTarget = max(
    0,
    (int) ($totalTarget ?? 0)
);

$chartData = is_array($chartData ?? null)
    ? $chartData
    : [];

$recentActivities = is_array(
    $recentActivities ?? null
)
    ? $recentActivities
    : [];

$databaseError = trim(
    (string) ($databaseError ?? '')
);

$maximumChartValue = 0;

foreach ($chartData as $chartValue) {
    $maximumChartValue = max(
        $maximumChartValue,
        (int) $chartValue
    );
}

if ($maximumChartValue <= 0) {
    $maximumChartValue = 1;
}

?>

<section class="report-page">

    <div class="report-wrap">

        <header class="report-header">
            <h1>Laporan Donasi</h1>

            <p>
                Ringkasan pemasukan, pengeluaran, saldo,
                program, donatur, dan aktivitas yayasan.
            </p>
        </header>

        <?php if ($databaseError !== ''): ?>
            <div class="report-alert">
                <strong>Kesalahan database:</strong>
                <?= esc($databaseError) ?>
            </div>
        <?php endif; ?>

        <div class="report-summary-grid">

            <article class="report-summary-card income">
                <div class="report-summary-icon">
                    <i class="fa-solid fa-circle-arrow-down"></i>
                </div>

                <div class="report-summary-content">
                    <div class="report-summary-label">
                        Total Donasi Berhasil
                    </div>

                    <div class="report-summary-value">
                        Rp<?= number_format(
                            $totalIncome,
                            0,
                            ',',
                            '.'
                        ) ?>
                    </div>
                </div>
            </article>

            <article class="report-summary-card expense">
                <div class="report-summary-icon">
                    <i class="fa-solid fa-circle-arrow-up"></i>
                </div>

                <div class="report-summary-content">
                    <div class="report-summary-label">
                        Pengeluaran Disalurkan
                    </div>

                    <div class="report-summary-value">
                        Rp<?= number_format(
                            $totalExpense,
                            0,
                            ',',
                            '.'
                        ) ?>
                    </div>
                </div>
            </article>

            <article class="report-summary-card balance">
                <div class="report-summary-icon">
                    <i class="fa-solid fa-wallet"></i>
                </div>

                <div class="report-summary-content">
                    <div class="report-summary-label">
                        Saldo Tersedia
                    </div>

                    <div class="report-summary-value">
                        Rp<?= number_format(
                            $saldo,
                            0,
                            ',',
                            '.'
                        ) ?>
                    </div>
                </div>
            </article>

            <article class="report-summary-card donors">
                <div class="report-summary-icon">
                    <i class="fa-solid fa-users"></i>
                </div>

                <div class="report-summary-content">
                    <div class="report-summary-label">
                        Total Donatur
                    </div>

                    <div class="report-summary-value">
                        <?= number_format(
                            $donorCount,
                            0,
                            ',',
                            '.'
                        ) ?>
                    </div>
                </div>
            </article>

            <article class="report-summary-card programs">
                <div class="report-summary-icon">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                </div>

                <div class="report-summary-content">
                    <div class="report-summary-label">
                        Program Aktif
                    </div>

                    <div class="report-summary-value">
                        <?= number_format(
                            $totalPrograms,
                            0,
                            ',',
                            '.'
                        ) ?>
                    </div>
                </div>
            </article>

            <article class="report-summary-card target">
                <div class="report-summary-icon">
                    <i class="fa-solid fa-bullseye"></i>
                </div>

                <div class="report-summary-content">
                    <div class="report-summary-label">
                        Total Target Program
                    </div>

                    <div class="report-summary-value">
                        Rp<?= number_format(
                            $totalTarget,
                            0,
                            ',',
                            '.'
                        ) ?>
                    </div>
                </div>
            </article>

        </div>

        <section class="report-panel">

            <div class="report-panel-header">
                <h2>Grafik Donasi Bulanan</h2>

                <span>
                    Tahun <?= date('Y') ?> · transaksi berhasil
                </span>
            </div>

            <div class="report-chart">

                <?php foreach ($chartData as $month => $value): ?>

                    <?php

                    $value = max(0, (int) $value);

                    $height = $value > 0
                        ? max(
                            4,
                            (int) round(
                                ($value / $maximumChartValue)
                                * 100
                            )
                        )
                        : 2;

                    ?>

                    <div class="report-chart-item">

                        <div class="report-chart-value">
                            Rp<?= number_format(
                                $value,
                                0,
                                ',',
                                '.'
                            ) ?>
                        </div>

                        <div class="report-chart-bar-wrap">
                            <div
                                class="report-chart-bar"
                                style="height:<?= $height ?>%"
                                title="<?= esc(
                                    $month,
                                    'attr'
                                ) ?>: Rp<?= number_format(
                                    $value,
                                    0,
                                    ',',
                                    '.'
                                ) ?>"
                            ></div>
                        </div>

                        <div class="report-chart-month">
                            <?= esc($month) ?>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>

        <section class="report-panel">

            <div class="report-panel-header">
                <h2>Aktivitas Keuangan Terbaru</h2>

                <span>
                    Donasi dan pengeluaran terbaru
                </span>
            </div>

            <?php if ($recentActivities === []): ?>

                <div class="report-empty">
                    <i class="fa-solid fa-receipt"></i>
                    Belum ada aktivitas donasi atau pengeluaran.
                </div>

            <?php else: ?>

                <div class="report-table-wrap">

                    <table class="report-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis</th>
                                <th>Nama</th>
                                <th>Program</th>
                                <th>Nominal</th>
                                <th>Detail</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach (
                                $recentActivities as $activity
                            ): ?>

                                <?php

                                $activityId = max(
                                    0,
                                    (int) (
                                        $activity['id'] ?? 0
                                    )
                                );

                                $type = strtolower(
                                    trim(
                                        (string) (
                                            $activity['type']
                                            ?? 'donation'
                                        )
                                    )
                                );

                                $isExpense = $type === 'expense';

                                $actorName = trim(
                                    (string) (
                                        $activity['actor_name']
                                        ?? '-'
                                    )
                                );

                                $actorLabel = trim(
                                    (string) (
                                        $activity['actor_label']
                                        ?? (
                                            $isExpense
                                                ? 'Yayasan'
                                                : 'Donatur'
                                        )
                                    )
                                );

                                $programTitle = trim(
                                    (string) (
                                        $activity['program_title']
                                        ?? 'Program donasi'
                                    )
                                );

                                $foundationName = trim(
                                    (string) (
                                        $activity['foundation_name']
                                        ?? ''
                                    )
                                );

                                $amount = max(
                                    0,
                                    (int) (
                                        $activity['amount'] ?? 0
                                    )
                                );

                                $detail = trim(
                                    (string) (
                                        $activity['detail'] ?? '-'
                                    )
                                );

                                $status = strtolower(
                                    trim(
                                        (string) (
                                            $activity['status']
                                            ?? 'pending'
                                        )
                                    )
                                );

                                $createdAt = trim(
                                    (string) (
                                        $activity['created_at']
                                        ?? ''
                                    )
                                );

                                $dateLabel = '-';

                                if ($createdAt !== '') {
                                    $timestamp = strtotime(
                                        $createdAt
                                    );

                                    if ($timestamp !== false) {
                                        $dateLabel = date(
                                            'd M Y, H:i',
                                            $timestamp
                                        );
                                    }
                                }

                                $statusClass = 'pending';
                                $statusLabel = 'Menunggu';

                                if ($isExpense) {
                                    if (
                                        in_array(
                                            $status,
                                            [
                                                'paid',
                                                'success',
                                                'completed',
                                            ],
                                            true
                                        )
                                    ) {
                                        $statusClass = 'success';
                                        $statusLabel = 'Sudah Disalurkan';
                                    } elseif ($status === 'failed') {
                                        $statusClass = 'failed';
                                        $statusLabel = 'Gagal';
                                    } else {
                                        $statusClass = 'pending';
                                        $statusLabel = 'Belum Disalurkan';
                                    }
                                } else {
                                    if (
                                        in_array(
                                            $status,
                                            [
                                                'paid',
                                                'success',
                                            ],
                                            true
                                        )
                                    ) {
                                        $statusClass = 'success';
                                        $statusLabel = 'Berhasil';
                                    } elseif ($status === 'failed') {
                                        $statusClass = 'failed';
                                        $statusLabel = 'Gagal';
                                    }
                                }

                                ?>

                                <tr>
                                    <td>
                                        <?= $isExpense ? 'EXP' : 'DON' ?>-<?= str_pad(
                                            (string) $activityId,
                                            5,
                                            '0',
                                            STR_PAD_LEFT
                                        ) ?>
                                    </td>

                                    <td>
                                        <span
                                            class="report-type <?= $isExpense
                                                ? 'expense'
                                                : 'donation' ?>"
                                        >
                                            <i class="fa-solid <?= $isExpense
                                                ? 'fa-money-bill-transfer'
                                                : 'fa-hand-holding-heart' ?>"></i>

                                            <?= $isExpense
                                                ? 'Pengeluaran'
                                                : 'Donasi' ?>
                                        </span>
                                    </td>

                                    <td>
                                        <div class="report-actor">
                                            <strong
                                                class="<?= $actorName === 'Anonim'
                                                    ? 'report-anonymous'
                                                    : '' ?>"
                                            >
                                                <?= esc($actorName) ?>
                                            </strong>

                                            <span>
                                                <?= esc($actorLabel) ?>
                                            </span>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="report-program">
                                            <strong>
                                                <?= esc($programTitle) ?>
                                            </strong>

                                            <?php if ($foundationName !== ''): ?>
                                                <span>
                                                    <?= esc(
                                                        $foundationName
                                                    ) ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </td>

                                    <td class="report-amount">
                                        Rp<?= number_format(
                                            $amount,
                                            0,
                                            ',',
                                            '.'
                                        ) ?>
                                    </td>

                                    <td class="report-detail">
                                        <?= esc($detail) ?>
                                    </td>

                                    <td>
                                        <span
                                            class="report-status <?= esc(
                                                $statusClass,
                                                'attr'
                                            ) ?>"
                                        >
                                            <?= esc($statusLabel) ?>
                                        </span>
                                    </td>

                                    <td>
                                        <?= esc($dateLabel) ?>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>

            <?php endif; ?>

        </section>

    </div>

</section>
<?= $this->endSection() ?>