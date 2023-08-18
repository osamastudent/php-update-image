
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
//POLYMORPHISM DEF: same operation but different behaviours
// over loading: 
class s1{
function camera($china,$original){
echo "s1".$china ;
echo "<br>";
echo "s1 $original";
echo "<br>";
}
}

class s2{
    function camera($china,$originall){
    echo "s2 $china ";
    echo "<br>";
    echo "s2 $originall";
    echo "<br>";
    }
    }

$objs1=new s1();
$objs2=new s2();


$objs1->camera("china","orignal");
$objs2->camera("china","orignalll");
?>

<h1>Encapsulation:</h1>
<?php
class one{
public $name=" osama ";

private $email="osama@gmail.com";

function __get($email)
{
    echo " by default show hota hay no variable find ";
}



 function getEmail(){
return $this->email;
}
}


class two extends one{

}

$one=new one();
$two=new two();
echo $one->name;
echo $one->email;
 echo $two->name="  khan ";

//  echo $one->email="changedmail@.com";
echo $two->getEmail();
?>

</body>
</html>