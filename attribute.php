<?php

#[Attribute]
class Author {
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

#[Attribute]
class Description extends Author{

}

#[Attribute]
class Required {
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

#[Author("hirano"), Description("説明hogehoge")]
class User {
    #[Required]
    public ?int $age;
    #[Required]
    public ?string $name;
    public ?int $gender;

    function __construct(?int $age, ?string $name, ?int $gender)
    {
       $this->age = $age; 
       $this->name = $name; 
       $this->gender = $gender; 
    }

    /**
     * 必須項目が入っているかチェックする
     * @param void
     * @return array $errors エラーテキストの配列
     */
    public function validate() {
        $errors = [];
        $reflection = new ReflectionClass($this);
        $props = $reflection->getProperties();
        foreach ($props as $prop) {
            $attribute = $prop->getAttributes() ? $prop->getAttributes()[0] : null;

            if ($attribute && $attribute->getName() === 'Required') {
                $value = $prop->getValue($this);
                if (!$value) {
                    array_push($errors, $prop->getName() . 'には値を入れてください。');
                }
            }
        }

        return $errors;
    }
}

/**
 * メインロジック実行
 * @return void
 */
function main() {
    echo "----- class属性の取得開始 -----\n";
    $reflection = new ReflectionClass(User::class);
    foreach ($reflection->getAttributes() as $attribute) {
        if ($attribute) {
            echo $attribute->getName() . ":" . $attribute->getArguments()[0]."\n";
        }
    }
    echo "----- class属性の取得終了 -----\n\n";

    echo "空チェック属性を使ったテスト\n";
    echo "----- test1 start -----\n";
    $user = new User(19, 'yamada', 1);
    $errors = $user->validate();
    if ($errors) {
        var_dump($errors);
    }
    echo "----- test1 end -----\n\n";

    echo "----- test2 start -----\n";
    $user = new User(30, null, null);
    $errors = $user->validate();
    if ($errors) {
        var_dump($errors);
    }
    echo "----- test2 end -----\n\n";

    echo "----- test3 start -----\n";
    $user = new User(null, null, 1);
    $errors = $user->validate();
    if ($errors) {
        var_dump($errors);
    }
    echo "----- test3 end -----\n";
}
main();