<?php
/**
 * Model : QuestionAnswer.
 *
 * This file used to handle question_answers table
 *
 * @author Sumesh K V <sumeshvasu@gmail.com>
 *
 * @version 1.0
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'answer',
    ];

    /**
     * Get the user that owns the job.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
