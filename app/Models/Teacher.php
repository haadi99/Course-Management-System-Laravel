<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nette\Utils\Image;

class Teacher extends Model
{
    use HasFactory;

    private static $teacher, $image, $imageName, $imageUrl, $imageExtension, $directory;

    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = rand(10000, 50000).'.'.self::$imageExtension;
        self::$directory = 'img/teacher/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newTeacher($request)
    {
        self::$teacher = new Teacher();
        self::$teacher ->name = $request->name;
        self::$teacher ->email = $request->email;
        self::$teacher ->password = bcrypt($request->password);
        self::$teacher ->mobile = $request->mobile;
        self::$teacher ->image = self::getImageUrl($request);
        self::$teacher ->save();
    }

    public static function updateTeacher($request, $id)
    {
        self::$teacher = Teacher::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$teacher->image))
            {
                unlink(self::$teacher->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$teacher->image;
        }


        self::$teacher ->name = $request->name;
        self::$teacher ->email = $request->email;
        if ($request->password)
        {
            self::$teacher ->password = bcrypt($request->password);
        }
        self::$teacher ->mobile = $request->mobile;
        self::$teacher ->image = self::$imageUrl;
        self::$teacher ->save();
    }

    public static function deleteTeacher($id)
    {
        self::$teacher = Teacher::find($id);
        if (file_exists(self::$teacher->image))
        {
            unlink(self::$teacher->image);
        }

        self::$teacher->delete();
    }
}
