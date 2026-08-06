<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>

.history-bg {
    min-height: 650px;
    padding: 36px 48px 70px;
    background:
        linear-gradient(
            180deg,
            #e0407a 0%,
            #f299bc 40%,
            #ffffff 100%
        );
}

.history-header {
    max-width: 1200px;
    margin: 0 auto 26px;
}

.history-header h1 {
    margin-bottom: 4px;
    color: #ffffff;
    font-size: 24px;
    font-weight: 800;
}

.history-header .subtitle {
    color: rgba(255, 255, 255, 0.9);
    font-size: 13px;
}

.summary-strip {
    display: flex;
    align-items: center;
    gap: 16px;
    max-width: 1200px;
    margin: 0 auto 24px;
    padding: 20px 26px;
    border-radius: 14px;
    background: #ffffff;
    box-shadow: 0 16px 32px rgba(120, 10, 55, 0.2);
}

.summary-strip .icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    flex-shrink: 0;
    border-radius: 12px;
    color: var(--pink-deep);
    background: #fbe0ea;
    font-size: 18px;
}

.summary-strip .label {
    color: var(--muted);
    font-size: 12px;
    font-weight: 600;
}

.summary-strip .value {
    margin-top: 2px;
    color: var(--ink);
    font-size: 17px;
    font-weight: 800;
}

.history-table-wrap {
    max-width: 1200px;
    margin: 0 auto;
    padding: 12px 12px 20px;
    overflow-x: auto;
    border-radius: 14px;
    background: #ffffff;
    box-shadow: 0 16px 32px rgba(120, 10, 55, 0.2);
}

.history-table-wrap table {
    width: 100%;
    min-width: 760px;
    border-collapse: collapse;
}

.history-table-wrap thead th {
    padding: 16px 14px;
    border-bottom: 1px solid #f0e6ea;
    color: var(--muted);
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 0.4px;
    text-align: left;
    text-transform: uppercase;
}

.history-table-wrap tbody td {
    padding: 16px 14px;
    border-bottom: 1px solid #f5eef1;
    color: var(--ink);
    font-size: 13px;
    vertical-align: middle;
}

.history-table-wrap tbody tr:last-child td {
    border-bottom: none;
}

.history-table-wrap tbody tr:hover {
    background: #fdf6f9;
}

.program-cell {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.program-cell .name {
    color: var(--ink);
    font-weight: 700;
}

.program-cell .foundation {
    color: var(--muted);
    font-size: 11px;
}

.amount-cell {
    color: var(--pink-deep);
    font-weight: 800;
    white-space: nowrap;
}

.badge-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    white-space: nowrap;
}

.badge-success {
    color: #1e7a34;
    background: #e2f6e6;
}

.badge-pending {
    color: #a8790f;
    background: #fdf0c9;
}

.badge-failed {
    color: #b3261e;
    background: #fde2e2;
}

.payment-cell {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    white-space: nowrap;
}

.payment-dot {
    width: 8px;
    height: 8px;
    flex-shrink: 0;
    border-radius: 50%;
    background: var(--purple);
}

.history-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    min-height: 34px;
    padding: 7px 11px;
    border-radius: 9px;
    color: #ffffff;
    background: linear-gradient(90deg, #9f8de0, #7057c1);
    font-size: 11px;
    font-weight: 700;
    text-decoration: none;
    white-space: nowrap;
}

.history-action:hover {
    transform: translateY(-1px);
}

.history-action.disabled {
    color: #8e7b85;
    background: #f0e8ec;
    pointer-events: none;
}

.empty-state {
    padding: 60px 20px;
    color: var(--muted);
    font-size: 13.5px;
    text-align: center;
}

.empty-state i {
    display: block;
    margin-bottom: 14px;
    color: var(--pink-deep);
    font-size: 38px;
}

.empty-state a {
    color: var(--pink-deep);
    font-weight: 700;
    text-decoration: none;
}

.empty-state a:hover {
    text-decoration: underline;
}

@media (max-width: 700px) {
    .history-bg {
        padding: 30px 18px 60px;
    }

    .summary-strip {
        align-items: flex-start;
        flex-direction: column;
        gap: 10px;
    }
}

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<?php

/*
 * Controller Donate::history() mengirim variabel:
 *
 * 'donations' => $donations
 *
 * Karena itu, view harus menggunakan $donations,
 * bukan $history.
 */
$donations = is_array($donations ?? null)
    ? $donations
    : [];

/*
 * Hitung total donasi yang statusnya berhasil.
 * Sistem baru menggunakan status "success".
 * Status "paid" tetap didukung untuk data lama.
 */
$totalDonated = 0;

foreach ($donations as $donation) {
    $status = strtolower(
        trim((string) ($donation['status'] ?? ''))
    );

    if (in_array($status, ['success', 'paid'], true)) {
        $totalDonated += max(
            0,
            (int) ($donation['amount'] ?? 0)
        );
    }
}

?>

<section class="history-bg">

    <div class="history-header">
        <h1>Donasi Saya</h1>

        <p class="subtitle">
            Riwayat semua donasi yang pernah kamu lakukan di Mirae.
        </p>
    </div>

    <div class="summary-strip">
        <div class="icon">
            <i class="fa-solid fa-heart"></i>
        </div>

        <div>
            <div class="label">
                Total Donasi Berhasil
            </div>

            <div class="value">
                Rp<?= number_format(
                    $totalDonated,
                    0,
                    ',',
                    '.'
                ) ?>
            </div>
        </div>
    </div>

    <div class="history-table-wrap">

        <?php if ($donations === []): ?>

            <div class="empty-state">
                <i class="fa-solid fa-heart-circle-plus"></i>

                Kamu belum pernah melakukan donasi.

                <a href="<?= site_url('donate') ?>">
                    Yuk mulai donasi sekarang →
                </a>
            </div>

        <?php else: ?>

            <table>
                <thead>
                    <tr>
                        <th>Program</th>
                        <th>Nominal</th>
                        <th>Metode</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($donations as $item): ?>

                        <?php

                        $transactionId = max(
                            0,
                            (int) ($item['id'] ?? 0)
                        );

                        $programTitle = trim(
                            (string) (
                                $item['program_title']
                                ?? $item['post_title']
                                ?? 'Program donasi'
                            )
                        );

                        $foundationName = trim(
                            (string) (
                                $item['foundation_name']
                                ?? ''
                            )
                        );

                        $amount = max(
                            0,
                            (int) ($item['amount'] ?? 0)
                        );

                        $paymentMethod = trim(
                            (string) (
                                $item['payment_method']
                                ?? ''
                            )
                        );

                        if (
                            $paymentMethod === ''
                            || strtolower($paymentMethod) === 'pending'
                        ) {
                            $paymentMethod = '-';
                        }

                        $status = strtolower(
                            trim(
                                (string) (
                                    $item['status']
                                    ?? 'pending'
                                )
                            )
                        );

                        $createdAt = trim(
                            (string) (
                                $item['created_at']
                                ?? ''
                            )
                        );

                        $dateLabel = '-';

                        if ($createdAt !== '') {
                            $timestamp = strtotime($createdAt);

                            if ($timestamp !== false) {
                                $dateLabel = date(
                                    'd M Y, H:i',
                                    $timestamp
                                );
                            }
                        }

                        ?>

                        <tr>
                            <td>
                                <div class="program-cell">
                                    <span class="name">
                                        <?= esc($programTitle) ?>
                                    </span>

                                    <?php if ($foundationName !== ''): ?>
                                        <span class="foundation">
                                            <?= esc($foundationName) ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </td>

                            <td class="amount-cell">
                                Rp<?= number_format(
                                    $amount,
                                    0,
                                    ',',
                                    '.'
                                ) ?>
                            </td>

                            <td>
                                <span class="payment-cell">
                                    <span class="payment-dot"></span>
                                    <?= esc($paymentMethod) ?>
                                </span>
                            </td>

                            <td>
                                <?php if (
                                    in_array(
                                        $status,
                                        ['success', 'paid'],
                                        true
                                    )
                                ): ?>
                                    <span class="badge-status badge-success">
                                        <i class="fa-solid fa-check"></i>
                                        Berhasil
                                    </span>

                                <?php elseif ($status === 'pending'): ?>
                                    <span class="badge-status badge-pending">
                                        <i class="fa-regular fa-clock"></i>
                                        Menunggu
                                    </span>

                                <?php else: ?>
                                    <span class="badge-status badge-failed">
                                        <i class="fa-solid fa-xmark"></i>
                                        <?= esc(
                                            $status === 'failed'
                                                ? 'Gagal'
                                                : ucfirst($status)
                                        ) ?>
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?= esc($dateLabel) ?>
                            </td>

                            <td>
                                <?php if (
                                    $status === 'pending'
                                    && $transactionId > 0
                                ): ?>
                                    <a
                                        href="<?= site_url(
                                            'donate/confirm/'
                                            . $transactionId
                                        ) ?>"
                                        class="history-action"
                                    >
                                        Lanjut Bayar
                                    </a>

                                <?php elseif (
                                    in_array(
                                        $status,
                                        ['success', 'paid'],
                                        true
                                    )
                                    && $transactionId > 0
                                ): ?>
                                    <a
                                        href="<?= site_url(
                                            'donate/success/'
                                            . $transactionId
                                        ) ?>"
                                        class="history-action"
                                    >
                                        Detail
                                    </a>

                                <?php else: ?>
                                    <span class="history-action disabled">
                                        Selesai
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        <?php endif; ?>

    </div>

</section>

<?= $this->endSection() ?>