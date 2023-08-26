<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Result extends Model
{
    use HasFactory, Sortable;

    protected $fillable=[
        'user_id',
        'quiz_id',
        'quiz_score',
        'achieved_score',
        //'selected_answer'
        //'question_no'
    ];

    //public $sortable = ['id', 'name', 'quiz_score', 'created_at', 'achieved_score'];

    public function quiz(){
        $this->belongsTo(Quiz::class);
    }

    public function user(){
        $this->belongsToMany(User::class);
    }
}
