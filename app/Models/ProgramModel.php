<?php

namespace App\Models;

use CodeIgniter\Model;


class ProgramModel extends Model
{

    protected $table = 'programs';


    protected $primaryKey = 'id';


    protected $returnType = 'array';



    protected $allowedFields = [

        'title',
        'category',
        'description',
        'organizer',
        'target_amount',
        'collected_amount',
        'donor_count',
        'days_left',
        'is_active',
        'image'

    ];



    protected $useTimestamps = true;


    protected $createdField='created_at';


    protected $updatedField='updated_at';



    // ==========================
    // UNTUK HALAMAN DONATE
    // ==========================


    public function getActivePrograms()
    {

        return $this
            ->where('is_active',1)
            ->findAll();

    }



    public function progressPercentage($program)
    {

        if(
            empty($program['target_amount']) ||
            $program['target_amount'] <= 0
        ){

            return 0;

        }


        return round(

            (
                $program['collected_amount']
                /
                $program['target_amount']
            )
            *100

        );

    }


}