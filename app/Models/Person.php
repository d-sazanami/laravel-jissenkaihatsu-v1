<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Person extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer'
    ];


    public function newCollection(array $models = [])
    {
        return new MyCollection($models);
    }

    public function getNameAndIdAttribute()
    {
        return $this->name . '[id=' . $this->id . ']';
    }

    public function getNameAndMailAttribute()
    {
        return $this->name . ' (' . $this->mail . ')';
    }

    public function getNameAndAgeAttribute()
    {
        return $this->name . ' (' . $this->age . ')';
    }

    public function getAllDataAttribute()
    {
        return $this->name . '(' . $this->age . ')' . '[' . $this->mail . ']';
    }
}

class MyCollection extends Collection
{
    public function fields()
    {
        $item = $this->first();
        return array_keys($item->toArray());
    }
}