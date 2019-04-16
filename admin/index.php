<?php
include '../header.php';
include '../includes/db.php';
if(isset($_GET['c'])){

          $stmt = $db->prepare('UPDATE clients set app_status = :app_status WHERE id = :id') ;
          $stmt->execute(array(':id' => $_GET['c'], ":app_status" => $_GET['d'] ));

          header('Location: ?action=done');
          exit;}?>

 <script language="JavaScript" type="text/javascript">
 function application(id, body)
 {
   if (confirm("Are you sure you want to " + body + " this Applicant"))
   {
     window.location.href = '?c=' + id + '&d='+ body;
   }
 }
 </script>
<div class="container">

<h2>Admin Area</h2>

<table border="1">
  <?php
$w = $db->query('SELECT * FROM clients where app_status ="waiting"');
?>
<thead>
  <th>No</th>
<th>name</th>
<th>lname</th>
<th>email</th>
<th>Application Status</th>
<th>View Applicant</th>
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
<td><a href='view_applicant.php?id=".$r['id']."'> View </a></td>"?>
<td><a href="javascript:application(<?php echo $r['id'] ?>, 'approve')">Approve</a> | <a href="javascript:application(<?php echo $r['id'] ?>, 'reject')">Reject</a> </td>
<?php  echo "
</tr>";
}

   ?>
</table>

<h2>Aproved Applicants</h2>

<table border="1">
  <?php
$w = $db->query('SELECT * FROM clients where app_status = "approve"');
?>
<thead>
  <th>No</th>
<th>name</th>
<th>lname</th>
<th>email</th>
<th>Application Status</th>
<th>View Applicant</th>
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

<h2>Rejected Applicants</h2>

<table border="1">
  <?php
$w = $db->query('SELECT * FROM clients where app_status = "reject"');
?>
<thead>
  <th>No</th>
<th>name</th>
<th>lname</th>
<th>email</th>
<th>Application Status</th>
<th>View Applicant</th>
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
</div>

 <?php
 include '../footer.php'; ?>
