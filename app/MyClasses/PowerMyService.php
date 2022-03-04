<?php
namespace App\MyClasses;

class PowerMyservice implements MyServiceInterface
{
    private $id = -1;
    private $msg = 'no id...';
    private $data = ['いちご', 'リンゴ', 'バナナ', 'ぶどう'];

    function __construct()
    {
        $this->setId(rand(0, count($this->data)));
    }

    public function setId($id)
    {
        if ($id >= 0 && $id < count($this->data)) {
            $this->id = $id;
            $this->msg = "あなたが好きなのは、" . $id . '番目' . $this->data[$id] . 'ですね';
        }
    }

    public function say()
    {
        return $this->msg;
    }

    public function data(int $id)
    {
        return $this->data[$id];
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function alldata()
    {
        return $this->data;
    }
}