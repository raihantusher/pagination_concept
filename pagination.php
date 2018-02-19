<?php


$arr=[
	["id"=>1,"name"=>"raihan"],
	["id"=>2,"name"=>"tusher1"],
	["id"=>2,"name"=>"tusher2"],
	["id"=>2,"name"=>"tusher3"],
	["id"=>2,"name"=>"tusher4"]


];

$per_page=2;

$total_data=count($arr);

$page_numbers=ceil($total_data/$per_page);

$offset=0;


if(isset($_GET["page"]))
	$current_page=$_GET["page"];
else
	$current_page=1;

if($current_page!=0 && $current_page!=1)
	$offset=$per_page*($current_page-1);


echo "Page".$current_page." "."offset:".$offset."<br/>";

$count=0;
for($i=$offset;$i<$total_data;$i++)
{
	if($count==$per_page)
		break;
	echo "<br/>".$arr[$i]["name"];
	$count++;
	
}

$vue=array();




$vue["current_page"]=$current_page;
$vue["last_page"]=$page_numbers;

$vue["previous_page_url"]=$current_page-1;
 $vue["next_page_url"]=$current_page+1;
 
 if($current_page==1 || $current_page==null || $current_page==0)
 	$vue["previous_page_url"]=null;

 if($current_page==$page_numbers)
 	$vue["next_page_url"]=null;



echo "<br/><pre>";
echo json_encode($vue);
