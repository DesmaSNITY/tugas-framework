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

        $year            = (int) date('Y');
        $monthlyIncome   = $transactionModel->monthlyIncome($year);
        $monthlyExpense  = $expenseModel->monthlyExpense($year);

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

        return view('dashboard/laporan', [
            'title'         => 'Mirae — Laporan Donasi',
            'totalIncome'   => $totalIncome,
            'totalExpense'  => $totalExpense,
            'saldoBersih'   => $saldoBersih,
            'totalPrograms' => $totalPrograms,
            'totalTarget'   => $totalTarget,
            'donorCount'    => $donorCount,
            'chartData'     => $chartData,
        ]);
    }
}
