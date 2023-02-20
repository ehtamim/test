<?php 
include ('../control/adminDashboardControl.php');
include('layout/adminHeader.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>

<body> 
    <div class="center">
<h2>ADMIN DASHBOARD</h2>
<?php
$result_per_page=8;
$number_of_page=ceil(sizeof($data)/$result_per_page);
if(!isset($_GET["page"]))
{
    $page=1;
}
else
{
    $page=$_GET["page"];
}
$page_result=($page-1)*$result_per_page;
$data=array_slice($data,$page_result,$result_per_page);
?>
<table id="users">
    <th>NAME</th>
    <th>DESCRIPTION</th>
    <th>PRICE</th>
    <th>QUANTITY</th>
    <th>CATEGORY</th>
    <th>STATUS</th>
    <th>IMAGE</th>
    <th>ACTION</th>
    <?php
    foreach($data as $d)
    {
        echo "<tr>";
        //echo "<td>$d[id]</td>";
        echo "<td>$d[name]</td>";
        echo "<td>$d[description]</td>";
        echo "<td>$d[price]</td>";
        echo "<td>$d[quantity]</td>";
        echo "<td>";
        $conn=mysqli_connect('localhost','root','','photo_galary');
        $query="SELECT category_id FROM photo_category WHERE photo_id='$d[id]'";
        $selectedCategory=mysqli_query($conobj,$query);
        while($row=mysqli_fetch_array($selectedCategory))
        {
            $query1="SELECT * FROM category WHERE id='$row[category_id]'";
            $cateName=mysqli_query($conobj,$query1);
            while($row1=mysqli_fetch_array($cateName))
            {
                echo $row1['name']."; ";
            }
        }
        echo "</td>";
        if($d['status']==1)
        {
          echo "<td>Active</td>";
        }
        else
        {
          echo "<td>Inctive</td>";
        }
        echo "<form method=post>";
        echo "<input type=hidden name=imgid value=$d[id]>";
        echo "<td><img src=./images/$d[location] width=50 height=50></td>";
        echo "<td><input name=edit type=submit value=Edit>";
        echo "<input name=delete type=submit value=Delete></td>";
        echo "</tr>";
        echo "</form>";
    }
    ?>
</table>
<div class="pagination">
<?php
for($page = 1; $page<= $number_of_page; $page++)
{  
    echo '<a href = "adminDashboard.php?page='.$page.'">' .$page.'</a>';  
}  
?>
</div>
</div>
</body>
</html>