<?php
$data = $_POST['data'];
$x = str_split($data,strlen($data)-1);
$arr = str_split($x[0]);
$n1 =0;
$n2=0;
$op=0;
$i = 0;
while($i<count($arr) == true)
{
    if((strpos('z+-/*',$arr[$i],0)))
    {
        $n1 = substr($x[0],0,$i);
        $op = $arr[$i];
        $n2 = substr($x[0],($i+1),(strlen($x[0])-1));
    }
    $i++;
}
$n1 = (float)$n1;
$n2 = (float)$n2;
$result = 0;
switch($op)
{
    case'+':
        $result = $n1 + $n2;
        break;
    case'-':
        $result = $n1 - $n2;
        break;  
    case'/':
        try{
            $result = $n1 / $n2;
        }
        catch(Exception $e){
            echo 'ggg'.$e->getMessage();
        }
        break;
    case'*':
        $result = $n1 * $n2;
        break;
}
if($x[1] == '=')
{
    echo $result;
}
else{
    echo $result;

    echo $x[1];

}