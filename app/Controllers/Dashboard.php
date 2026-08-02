<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\ExpenseModel;
use App\Models\DonationPostModel;

class Dashboard extends BaseController
{
    public function laporan(): string
    {
        $transactionModel = new TransactionModel();
        $expenseModel     = new ExpenseModel();
        $postModel        = new DonationPostModel();

        $totalIncome  = $transactionModel->totalIncome();
        $totalExpense = $expenseModel->totalExpense();
        $saldoBersih  = $totalIncome - $totalExpense;

        $totalPrograms = $postModel->where('status', 'active')->countAllResults();
        $totalTarget   = (float) ($postModel->selectSum('target_amount')->first()['target_amount'] ?? 0);
        $donorCount    = $transactionModel->donorCount();

        // ==================== GRAFIK PEMASUKAN vs PENGELUARAN ====================
        $year           = (int) date('Y');
        $monthlyIncome  = $transactionModel->monthlyIncome($year);
        $monthlyExpense = $expenseModel->monthlyExpense($year);

        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $chartData  = [];

        foreach ($monthNames as $i => $name) {
            $monthNumber = $i + 1;

            $income  = array_filter($monthlyIncome, static fn ($row) => (int) $row['month'] === $monthNumber);
            $expense = array_filter($monthlyExpense, static fn ($row) => (int) $row['month'] === $monthNumber);

            $chartData[$name] = [
                'income'  => $income ? array_sum(array_column($income, 'total')) : 0,
                'expense' => $expense ? array_sum(array_column($expense, 'total')) : 0,
            ];
        }

        // ==================== TABEL GABUNGAN: DONASI + PENGELUARAN ====================
        $transactions = $transactionModel->getAllWithDetails();
        $expenses     = $expenseModel->getAllWithDetails();

        $combined = [];

        foreach ($transactions as $trx) {
            $combined[] = [
                'date'     => $trx['created_at'],
                'type'     => 'Donasi',
                'name'     => $trx['donor_name'] ?: '-',
                'amount'   => $trx['amount'],
                'penerima' => $trx['foundation_name'] ?: '-',
                'status'   => $trx['status'],
            ];
        }

        foreach ($expenses as $exp) {
            $combined[] = [
                'date'     => $exp['created_at'],
                'type'     => 'Pengeluaran',
                'name'     => $exp['foundation_name'] ?: '-',
                'amount'   => $exp['amount'],
                'penerima' => $exp['beneficiary'] ?: '-',
                'status'   => $exp['status'],
            ];
        }

        usort($combined, static fn ($a, $b) => strtotime($b['date']) <=> strtotime($a['date']));

        // pagination sederhana lewat query string ?page=
        $perPage    = 10;
        $totalRows  = count($combined);
        $totalPages = max(1, (int) ceil($totalRows / $perPage));
        $page       = (int) ($this->request->getGet('page') ?? 1);
        $page       = max(1, min($page, $totalPages));
        $tableRows  = array_slice($combined, ($page - 1) * $perPage, $perPage);

        $showingFrom = $totalRows === 0 ? 0 : (($page - 1) * $perPage) + 1;
        $showingTo   = min($page * $perPage, $totalRows);

        return view('dashboard/laporan', [
            'title'         => 'Mirae — Laporan Donasi',
            'totalIncome'   => $totalIncome,
            'totalExpense'  => $totalExpense,
            'saldoBersih'   => $saldoBersih,
            'totalPrograms' => $totalPrograms,
            'totalTarget'   => $totalTarget,
            'donorCount'    => $donorCount,
            'chartData'     => $chartData,
            'tableRows'     => $tableRows,
            'currentPage'   => $page,
            'totalPages'    => $totalPages,
            'showingFrom'   => $showingFrom,
            'showingTo'     => $showingTo,
            'totalRows'     => $totalRows,
        ]);
    }
}
