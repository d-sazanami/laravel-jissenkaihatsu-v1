<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory, SerializeDate;

    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer'
    ];

    public function setAllDataAttribute(Array $value)
    {
        $this->attributes['name'] = $value[0];
        $this->attributes['mail'] = $value[1];
        $this->attributes['age'] = $value[2];
    }

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