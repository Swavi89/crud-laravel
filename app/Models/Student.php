<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    private static $rows = 15;

    public static function getStudentById($id)
    {
        return self::find($id);
    }

    public static function getStudentList($params = null)
    {
        $query = self::orderBy('students.id', 'desc');
        if (!empty($params['q']))
            $query->where('students.name', 'LIKE', "%" . $params['q'] . "%");
        return $query->paginate(self::$rows);
    }
}
