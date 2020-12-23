<?php

// コンストラクタのプロパティ設定
// php8以前
class UserA {
    public int $age;
    public string $name;
    public int $gender;

    public function __construct(int $age = 0, string $name = 'hoge', int $gender = 1)
    {
       $this->age = $age; 
       $this->name = $name; 
       $this->gender = $gender; 
    }
}

// php8でプロパティ宣言が省略可
class UserB {
    public function __construct(public int $age = 0, public string $name = 'hoge', public int $gender = 1)
    {
    }
}

$userA = new UserA(25, 'satou', 2);

var_dump($userA);

$userB = new UserB(28, 'suzuki', 1);

var_dump($userB);