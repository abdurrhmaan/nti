
<?php
mysql_connect('localhost','root','')OR die(mysql_error());
mysql_select_db('database')OR die(mysql_error());
mysql_query("SET NAMES 'utf8'");
mysql_query('SET CHARACTER SET utf8'); 
/*
$result=mysql_query("select timeslot.*,reservation.id FROM timeslot LEFT JOIN reservation ON timeslot.id=t_id");
while ($res=mysql_fetch_assoc($result)){
*/
$pid=15;
$id=8;
$date='2019-01-30';
$date1=strtotime($date);
echo $date1;
 $result=mysql_query("select timeslot.name,reservations.t_id 
 FROM timeslot 
 LEFT JOIN reservations ON
 timeslot.id=reservations.t_id
 AND reservations.p_id=$pid 
 AND reservations.id=$id 
 AND reservations.date=$date1 
 ") OR die(mysql_error());
while ($res=mysql_fetch_assoc($result)){
//$result=mysql_query("SELECT * FROM timeslot") OR die(mysql_error());
//while ($res=mysql_fetch_assoc($result)){
//}
if ($res['t_id']==Null){
echo "<h2><font color='#339966'>this time is Avaiable : ".$res['name']."</font><br /></h2>";
}
else{
echo "<h2><font color='#FF0000'>this time is Not Avaiable : ".$res['name']."</font><br /></h2>";
}

};
/*
$txt = "W3Schools.com";
echo "I love $txt!";

$x = 5; // global scope

function myTest() {

    // using x inside this function will generate an error
    echo "<p>Variable x inside function is: $x</p>";
} 
myTest();

echo "<p>Variable x outside function is: $x</p>";
function myTest() {
    static $x = 0;
    echo $x;
    $x++;
}

myTest();
myTest();
*/
?>