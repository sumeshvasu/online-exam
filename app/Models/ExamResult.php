<?php
/**
 * Model : ExtamResult.
 *
 * This file used to handle extam_results table
 *
 * @author Sumesh K V <sumeshvasu@gmail.com>
 *
 * @version 1.0
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'question_answer',
        'score',
        'total_score',
    ];
}
