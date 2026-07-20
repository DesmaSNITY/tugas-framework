<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class TestController extends BaseController
{
    public function userFields()
    {
        $model = new UserModel();

        $user = new User([
            'username'   => 'testuser_' . time(),
            'first_name' => 'Test',
            'last_name'  => 'User',
            'phone'      => '08123456789',
        ]);

        $model->save($user);

        // re-fetch — this one definitely has a real id
        $saved = $model->find($model->getInsertID());

        // call createEmailIdentity on $saved, NOT $user
        $saved->createEmailIdentity([
            'email'    => 'test' . time() . '@example.com',
            'password' => 'password123',
        ]);

        // re-fetch again after the identity is attached, just to be safe
        $final = $model->find($saved->id);

        return $this->response->setJSON([
            'first_name' => $final->first_name,
            'last_name'  => $final->last_name,
            'phone'      => $final->phone,
            'raw_dump'   => $final->toArray(),
        ]);
    }
}