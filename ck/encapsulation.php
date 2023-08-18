<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>encapsulation</h1>
<?php

class s1{
    private $name;

public $email;
    public function __construct($n,$e)
    {
    return $this->name=$n;
    return $this->email=$e;
    }

    
  public function getName(){
        return $this->name;
        }
        static function abcc(){
        echo "abccc";
        }
}


class s2 extends s1{

}

$s1=new s2("osama khan commando","osama@gmail.com");
s1::abcc();
echo $s1->getName();

?>
</body>
</html>