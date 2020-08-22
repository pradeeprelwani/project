<?php

namespace App\Observers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\UserAction;

class UserObserver {

    public function saved($model) {


        UserAction::create([
            'user_id' => null,
            'action' => "regitser",
            'action_model' => $model->getTable(),
            'action_id' => null
        ]);
    }

}
