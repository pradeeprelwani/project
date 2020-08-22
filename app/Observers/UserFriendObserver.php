<?php

namespace App\Observers;

use App\UserAction;
use Illuminate\Support\Facades\Auth;

class UserFriendObserver {

//    public function created($model) {
//        echo 1;die;
//        if (Auth::check()) {
//            UserAction::create([
//                'user_id' => Auth::user()->id,
//                'action' => request()->segment(1),
//                'action_model' => $model->getTable(),
//                'action_id' => $model->id
//            ]);
//        }
//    }

    public function saved($model) {
        
        if (Auth::check()) {
            UserAction::create([
                'user_id' => Auth::user()->id,
                'action' => request()->segment(1),
                'action_model' => $model->getTable(),
                'action_id' => $model->id
            ]);
        }
    }

    public function deleted($model) {
        if (Auth::check()) {
            UserAction::create([
                'user_id' => Auth::user()->id,
                'action' => request()->segment(1),
                'action_model' => $model->getTable(),
                'action_id' => $model->id
            ]);
        }
    }

}
