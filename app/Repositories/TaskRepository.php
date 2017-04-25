<?php

namespace App\Repositories;

use App\User;

use App\Task;

class TaskRepository{
    
    /**
     * @param User $user
     * @return type
     */
    public function forUser(User $user){
        
        $userId = $user->id;
        
        return Task::where('user_id',$userId)
                ->orderBy('created_at','asc')
                ->get();
    }
}

