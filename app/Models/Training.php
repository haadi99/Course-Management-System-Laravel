<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Training extends Model
{
    use HasFactory;

    private static $training, $image, $imageName, $imageUrl, $imageExtension, $directory, $message;

    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = rand(10000, 50000).'.'.self::$imageExtension;
        self::$directory = 'img/training-module/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newTraining($request)
    {
        self::$training = new Training();
        self::$training ->category_id = $request->category_id;
        self::$training ->teacher_id = Session::get('teacher_id');
        self::$training ->title = $request->title;
        self::$training ->description = $request->description;
        self::$training ->starting_date = $request->starting_date;
        self::$training ->price = $request->price;
        self::$training ->image = self::getImageUrl($request);
        self::$training ->save();
    }

    public static function updateTraining($request, $id)
    {
        self::$training = Training::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$training->image))
            {
                unlink(self::$training->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }

        else
        {
            self::$imageUrl = self::$training->image;
        }

        self::$training ->category_id = $request->category_id;
        self::$training ->teacher_id = Session::get('teacher_id');
        self::$training ->title = $request->title;
        self::$training ->description = $request->description;
        self::$training ->starting_date = $request->starting_date;
        self::$training ->price = $request->price;
        self::$training ->image = self::$imageUrl;
        self::$training ->save();
    }

    public static function deleteTraining($id)
    {
        self::$training = Training::find($id);
        if (file_exists(self::$training->image))
        {
            unlink(self::$training->image);
        }

        self::$training->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public static function updateTrainingStatus($id)
    {
        self::$training = Training::find($id);

        if (self::$training->status == 1)
        {
            self::$training->status = 0;
            self::$message = 'Training Status Unpublished Successfully';
        }

        else
        {
            self::$training->status = 1;
            self::$message = 'Training Status Published Successfully';
        }

        self::$training->save();
        return self::$message;
    }

}
