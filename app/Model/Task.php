<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\User;

/**
 * App\Model\Task
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Task selecta($columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Task whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Task whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ModelTask whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Task select($columns = ['*'])
 * @mixin \Eloquent
 */
class Task extends Model {

    /**
     * 複数代入する属性
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * アプリケーションにマップするポリシー
     *
     * @var array
     */
    protected $policies = [
        Task::class => TaskPolicy::class,
    ];

    /**
     * タスク所有ユーザーの取得
     */
    public function user() {
        
        return $this->belongsTo(User::class);
    }

}
