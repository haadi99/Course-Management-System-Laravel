<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;

    private static $enroll;

    public static function newEnroll($trainingId, $studentId)
    {
        self::$enroll = new Enroll();
        self::$enroll->training_id = $trainingId;
        self::$enroll->student_id = $studentId;
        self::$enroll->enroll_date = date('y-m-d');
        self::$enroll->payment_amount = 0;
        self::$enroll->save();

    }
}
