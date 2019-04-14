<?php
include '../header.php';
include '../includes/db.php';
 ?>

<h2>Admin Area</h2>

<table border="1">
  <?php
$w = $db->query('SELECT * FROM clients ');
?>
<thead>
  <th>No</th>
<th>name</th>
<th>lname</th>
<th>email</th>
<th>Application Status</th>
<th>Action</th>
</thead>
<?php
for ($i=1; $i <= $r=$w->fetch(); $i++){
echo " <tr>
<td>".$i."</td>
<td>".$r['fname']."</td>
<td>".$r['lname']."</td>
<td>".$r['email']."</td>
<td>".$r['app_status']."</td>
<td><a href='view_applicant.php?id=".$r['id']."'> View </a></td>
</tr>";
}

   ?>
</table>

 <?php
 include '../footer.php'; ?>
