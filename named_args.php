<?php

function hello(string $name) {
    echo "hello, {$name}"."<br>";
}

hello(name: "user1");

function fruitsText(string $fruits = 'りんご', string $color = "紫", string $taste = "甘い") {
    echo "{$fruits}の色は{$color}色で、{$taste}"."<br>";
}

fruitsText(color: "赤");

class User {
    public function whoAmI(int $age = 30, string $name = 'yamada', string $tel = '080-XXXX-XXXX') {
        echo "私は{$name}です。年齢は{$age}で電話番号は{$tel}..."."<br>";
    }
}

$user = new User();
$user->whoAmI();
$user->whoAmI(name: "太郎", age:18);