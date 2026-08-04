<?php

namespace App\Controllers;

use App\Models\DonationModel;
use App\Models\ExpenseModel;
use App\Models\ProgramModel;


class Dashboard extends BaseController
{

    protected $donationModel;
    protected $expenseModel;
    protected $programModel;


    public function __construct()
    {
        $this->donationModel = new DonationModel();
        $this->expenseModel = new ExpenseModel();
        $this->programModel = new ProgramModel();
    }



    public function laporan()
    {


        // TOTAL DONASI

        $income = $this->donationModel
            ->where('status','paid')
            ->selectSum('amount')
            ->first();


        $totalIncome = $income['amount'] ?? 0;



        // TOTAL PENGELUARAN

        $expense = $this->expenseModel
            ->where('status','paid')
            ->selectSum('amount')
            ->first();


        $totalExpense = $expense['amount'] ?? 0;



        // SALDO

        $saldo = $totalIncome - $totalExpense;



        // TOTAL DONATUR

        $donorCount = $this->donationModel
            ->where('status','paid')
            ->countAllResults();



        // PROGRAM AKTIF

        $totalPrograms = $this->programModel
            ->where('is_active',1)
            ->countAllResults();



        // TARGET PROGRAM

        $target = $this->programModel
            ->selectSum('target_amount')
            ->first();


        $totalTarget = $target['target_amount'] ?? 0;



        // DATA GRAFIK

        $months = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        ];


        $chartData=[];


        foreach($months as $m)
        {
            $chartData[$m]=0;
        }



        $donations = $this->donationModel
            ->where('status','paid')
            ->findAll();



        foreach($donations as $d)
        {

            $month=date(
                'M',
                strtotime($d['created_at'])
            );


            if(isset($chartData[$month]))
            {
                $chartData[$month]+=$d['amount'];
            }

        }



        return view(
            'dashboard/laporan',
            [

                'title'=>'Laporan Donasi',

                'totalIncome'=>$totalIncome,

                'totalExpense'=>$totalExpense,

                'saldo'=>$saldo,

                'donorCount'=>$donorCount,

                'totalPrograms'=>$totalPrograms,

                'totalTarget'=>$totalTarget,

                'chartData'=>$chartData

            ]
        );


    }


}