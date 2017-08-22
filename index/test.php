<style>
.mytable{width:100%;}
.mytable th,td{
  font-size: 15px;
  line-height: 25px;
  padding-left: 8px;
  text-align: center;
}
.mytable tr:nth-child(odd){background: #ccc;}/*隔行显色*/
.mytable tr:last-child{background:white;}/*最后一行加上样式：*/
.mytable tr:nth-of-type(1){background: #76D3EA;}/*第一行背景颜色*/
.active{background: red;}
</style>
<?php
$year=@$_GET['y']?$_GET['y']:date('Y');
$mon=@$_GET['m']?$_GET['m']:date('m');
$today=date('d',time());
$days=date('t',mktime(0,0,0,$mon,1,$year));
$w=date('w',mktime(0,0,0,$mon,1,$year));
$prem=$nexm=$mon;
$prey=$nexy=$year;
if($mon==1){
	$prem=12;
	$prey--;
}else{
	$prem--;
}
if($mon==12){
	$next=1;
	$nexy++;
}else{
	$nexm++;
}
?>

<table class="mytable" >
<tr><td><a href='<?php echo $_SERVER["PHP_SELF"]."?y={$prey}&m={$prem}";?>'><</a></td><td colspan="5"><center><?php echo "{$year}年{$mon}月"; ?></center></td><td><a href='<?php echo $_SERVER["PHP_SELF"]."?y={$nexy}&m={$nexm}";?>'>></a></td></tr>
<tr>
<td>日</td>
<td>一</td>
<td>二</td>
<td>三</td>
<td>四</td>
<td>五</td>
<td>六</td>
</tr>

<?php
$d=1;
// echo $days;die();
while($d<=$days){
	echo "<tr>";
	for($i=0;$i<7;$i++){
		if($i<$w&&$d==1||$d>$days){
			echo "<td>&nbsp;</td>";
		}elseif($d==$today){
			echo "<td class='active'>{$i}</td>";
			$d++;
		}else{
			echo "<td>{$d}</td>";
			$d++;
		}
	}
	echo "</tr>";
}
echo "</table>";

