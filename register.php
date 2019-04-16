<?php
include 'header.php';
include 'includes/db.php';
// remove all session variables

// destroy the session
session_start();
//session_destroy();
if (!isset($_SESSION["reg1"])) {
  $_SESSION["reg1"]  = "ready";
$_SESSION["reg2"]  = "wait";
$_SESSION["reg3"]  = "wait";
}
if (!isset($_SESSION['id'])) {
  $_SESSION['id'] = 0;

}

 ?>
<?php
?>

<?php
if (isset($_GET['back'])) {

  $w = $db->query('SELECT * FROM clients where id = '.$_SESSION['id'].'');

  $r=$w->fetch();
  //return $r;
if ($_GET['back']==1) {
  $_SESSION["reg1"]  = "ready";
  $_SESSION["reg2"]  = "wait";
  $_SESSION["reg3"]  = "wait";
    //header("location: ?back=1");
}
if ($_GET['back']==2) {
  $_SESSION["reg1"]  = "wait";
  $_SESSION["reg2"]  = "ready";
  $_SESSION["reg3"]  = "wait";
  //  header("location: ?back=2");
}
if ($_GET['back']==3) {
  $_SESSION["reg1"]  = "wait";
  $_SESSION["reg2"]  = "wait";
  $_SESSION["reg3"]  = "ready";
    //header("location: ?back=3");
}
}
//print_r($_SESSION);
//$_GET['back'] ="";
if (!isset($_GET['back'])) {

if (isset($_POST['Next']) && $_SESSION['reg1'] == "ready") {
  extract($_POST);
 //print_r($_POST);

 //function generatePassword($length = 8) {
     $chars = 'bcdfghjkmnpqrstvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ123456789';
   //  $chars =
     $count = mb_strlen($chars);
     $length = 8;

     for ($i = 0, $result = ''; $i < $length; $i++) {
         $index = rand(0, $count - 1);
         $result .= mb_substr($chars, $index, 1);
     }

     //return $result;
 //}


  $stmt=$db->prepare('INSERT into clients (fname,lname,email,Mname,password,age,contact,date_of_birth,address)
  VALUES (:fname,:lname,:email,:Mname,:password,:age,:contact,:date_of_birth,:address) ');
  $stmt->execute(
  array(
    ':fname' => $fname,
    ':lname' =>$lname ,
    ':email' => $email ,
    ':Mname' => $Mname,
    ':password' => $result,
    ':age' => $age,
    ':contact' => $contact,
    ':date_of_birth' => $date_of_birth,
    ':address' => $address)
  );

  $w = $db->query("SELECT id FROM clients where fname = '$fname' and lname = '$lname' and Mname = '$Mname'");
//print_r ($w);
  $r=$w->fetch();
  //print_r ($r);
  $_SESSION["reg1"]  = "done";
  $_SESSION["reg2"]  = "ready";
  $_SESSION["reg3"]  = "wait";
  $_SESSION['id']    = $r['id'];
$GLOBALS['id'] = $r['id'];
  //  exit();
}
}
if (isset( $_GET['back'])) {
if (isset($_POST['Next']) && $_GET['back'] == 1) {
  extract($_POST);
 //print_r($_POST);

  $stmt=$db->prepare('UPDATE clients set fname = :fname,lname = :lname,email = :email ,Mname =:Mname ,age =:age ,
    contact = :contact,date_of_birth = :date_of_birth,address = :address
where id = "'.$_SESSION['id'].'"  ');
  $stmt->execute(
  array(
    ':fname' => $fname,
    ':lname' =>$lname ,
    ':email' => $email ,
    ':Mname' => $Mname,
    ':age' => $age,
    ':contact' => $contact,
    ':date_of_birth' => $date_of_birth,
    ':address' => $address)
  );
  $w = $db->query("SELECT id FROM clients where fname = '$fname' and lname = '$lname' and Mname = '$Mname'");
//print_r ($w);
  $r=$w->fetch();
//  print_r ($r);
  $_SESSION["reg1"]  = "done";
  $_SESSION["reg2"]  = "ready";
  $_SESSION["reg3"]  = "wait";
  $_SESSION['id']    = $r['id'];
$GLOBALS['id'] = $r['id'];
  header("location: ?back=2");
}
}
//if ($_SESSION['id'] ==0) {
//$GLOBALS['ifk'] = "er";
//}

//$w = $db->query("SELECT id FROM clients where id=id;");
//print_r ($w);
//$r=$w->fetch();
//print_r ($GLOBALS['ifk']);

if (isset($_POST['next1']) && $_SESSION['id'] !=="") {
  extract($_POST);
 //print_r($_POST);
if (isset($_FILES['picture']) && $_FILES['picture']['name'] !=="") {
  //print_r($_FILES);
  $data = $_FILES["picture"]['tmp_name'];
  $name = $_FILES["picture"]['name'];
  $filePath = ''.dir.'uploads/'.$name;
  if (!file_exists("uploads/")) {
  mkdir("uploads/");
}
$fileDestination = 'uploads/'.$name;
move_uploaded_file($data, $fileDestination);
}else {
  $filePath = $r['image_path'];
}
echo $filePath;
$stmt=$db->prepare('UPDATE clients SET univ = :univ,hsch =:hsch,degree=:degree,adskill=:adskill,
r11 =:r11,r13 =:r13,r14 =:r14,r15 =:r15,r16 =:r16,r21 =:r21,r23 =:r23,r24 =:r24,r25 =:r25,
r26 =:r26,r31 =:r31,r33 =:r33,r34 =:r34,r35 =:r35,r36 =:r36,r41 =:r41,r43 =:r43,
r44 =:r44,r45 =:r45,r46 =:r46,
r51 =:r51,r53 =:r53,r54 =:r54,r55 =:r55,r56 =:r56,explain_text =:explain_text,image_path =:image_path
 where id = "'.$_SESSION['id'].'" ');
$stmt->execute(
  array(
    ':univ' => $univ,
    ':hsch' =>$hsch ,
    ':degree' => $degree ,
    ':adskill' => $adskill,
    ':r11' => $r11,
    ':r13' => $r13 ,
    ':r14' => $r14,
    ':r15' => $r15,
    ':r16' => $r16,
    ':r21' =>$r21 ,
    ':r23' => $r23 ,
    ':r24' => $r24,
    ':r25' => $r25,
    ':r26' => $r26,
    ':r31' => $r31,
    ':r33' => $r33,
    ':r34' => $r34,
    ':r35' =>$r35 ,
    ':r36' => $r36 ,
    ':r41' => $r41,
    ':r43' => $r43,
    ':r44' => $r44,
    ':r45' => $r45,
    ':r46' => $r46,
    ':r51' => $r51,
    ':r53' =>$r53 ,
    ':r54' => $r54 ,
    ':r55' => $r55,
    ':r56' => $r56,
    ':explain_text' => $explain,
    ':image_path' => $filePath)
);
  $_SESSION["reg1"]  = "done";
  $_SESSION["reg2"]  = "done";
  $_SESSION["reg3"]  = "ready";
    header("location: ?back=3");
  //exit();
}
if (isset($_POST['submit']) && $_SESSION['id'] !=="") {
  extract($_POST);
 //print_r($_POST);
if (isset($_FILES['picture']) && $_FILES["picture"]['name'] !=="" ) {
  //print_r($_FILES);
  $data = $_FILES["picture"]['tmp_name'];
  $name = $_FILES["picture"]['name'];
  $data2 = $_FILES["marriage"]['tmp_name'];
  $name2 = $_FILES["marriage"]['name'];
  $filePath = ''.dir.'uploads/'.$name;
  $filePath2 = ''.dir.'uploads/'.$name2;
  if (!file_exists("uploads/")) {
    mkdir("uploads/");
  }
  $fileDestination = 'uploads/'.$name;
  $fileDestination2 = 'uploads/'.$name2;
  move_uploaded_file($data, $fileDestination);
  move_uploaded_file($data2, $fileDestination2);
}else {
  $filePath = $r['medic'];
  $filePath2 = $r['marriage_cert'];
}

  $stmt=$db->prepare('UPDATE clients SET vas = :vas,disabled = :disabled,dis =:dis ,hob = :hob,
  marital_status = :marital_status,spouse_name = :spouse_name ,langkwn =:langkwn ,
  langflu = :langflu ,res_addrs =:res_addrs , medic = :medic,marriage_cert =:marriage_cert
  where id = "'.$_SESSION['id'].'" ');
  $stmt->execute(
  array(
    ':vas' => $vas,
    ':disabled' =>$disabled ,
    ':dis' => $dis ,
    ':hob' => $hob,
    ':marital_status' => $marital_status,
    ':spouse_name' => $spouse_name ,
    ':langkwn' => $langkwn,
    ':langflu' => $langflu,
    ':res_addrs' => $res_addrs,
    ':medic' =>$filePath ,
    ':marriage_cert' => $filePath2)
  );
  $_SESSION["reg1"]  = "done";
  $_SESSION["reg2"]  = "done";
  $_SESSION["reg3"]  = "done";
    //header("location:congratulation.php");
    //exit();
}
if (isset($_POST['Done'])) {
  function sendMail($to, $subject, $message, $from)
  {


    $from_header = "From: $from";

    if (mail($to, $subject, $message, $from_header))
    {
      return true;
    } else
    {
      return false;
    }
    return false;
  }
$to = $r['email'];
$subject = "Your VISA LOTTERY login password ";
$domain = "VISAlottery.com";
$message = "
Thank you for registering on http://www.$domain/,

Your account login information:

username:  ".$r['fname']."
password:  ".$r['password']."

Please click on the link below to login and check your application Status.

http://www.$domain/login.php

Regards
$domain Administration
";
$from = "no-reply@$domain";
sendMail($to, $subject, $message, $from);

  session_destroy();
  unset($_GLOBAL);

  header("location:congratulation.php");
  exit();
}
//print_r();
 ?>
 <div class="container">

<form class="" action="" method="post" enctype="multipart/form-data">
  <?php if ($_SESSION["reg1"]  == "ready") {
    $w = $db->query('SELECT * FROM clients where id = '.$_SESSION['id'].'');

    $r=$w->fetch();
    registration1($r);
  }
  if ($_SESSION["reg2"]  == "ready") {
    $w = $db->query('SELECT * FROM clients where id = '.$_SESSION['id'].'');

    $r=$w->fetch();
  //  print_r($r);
    registration2($r);
  }
  if ($_SESSION["reg3"]  == "ready") {
    $w = $db->query('SELECT * FROM clients where id = '.$_SESSION['id'].'');

    $r=$w->fetch();
    registration3($r);
  }
if ($_SESSION["reg1"]  == "done" && $_SESSION["reg2"]  == "done" &&  $_SESSION["reg3"]  == "done") {
  check_page();
}
  ?>
  <?php

  function registration1($r)
  {

    ?>

  <div class="form-group">
    <div class="row">
    <div class="col">



                  <div class="form-label-group">
                    <label for="lname">Lastname</label>
                    <input type="text" id="lname" name="lname" class="form-control" placeholder="Lastname" required="" value="<?php if (isset($_GET['back']) && $_GET['back'] == 1 && $_SESSION['reg1']=="ready") {echo $r['lname'];} ?>" autofocus="">
                  </div>

              </div>
<div class="col">


                      <div class="form-label-group">
                        <label for="Mname">Middle name</label>
                        <input type="text" id="Mname" name="Mname" class="form-control" placeholder="Middlename" required="" value="<?php if (isset($_GET['back']) && $_GET['back'] == 1 && $_SESSION['reg1']=="ready") {echo $r['Mname'];} ?>" autofocus="">

                    </div>
      </div>
                      <div class="col">
                        <div class="form-label-group">
                          <label for="fname">Firstname</label>
                          <input type="text" id="fname" name="fname" class="form-control" placeholder="Firstname" required="" value="<?php if (isset($_GET['back']) && $_GET['back'] == 1 && $_SESSION['reg1']=="ready") {echo $r['fname'];} ?>" autofocus="">
                        </div>

                      </div>
              </div></div>
              <div class="form-group">
                <div class="form-label-group">
                  <label for="date_of_birth">Age</label>
                  <input type="number" class="form-control" name="age" min="5" value="<?php if (isset($_GET['back']) && $_GET['back'] == 1 && $_SESSION['reg1']=="ready") {echo $r['age'];} ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <label for="date_of_birth">Date of birth</label>
                  <input type="date" class="form-control" name="date_of_birth" value="<?php if (isset($_GET['back']) && $_GET['back'] == 1 && $_SESSION['reg1']=="ready") {echo $r['date_of_birth'];} ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <label for="date_of_birth">Address For Communication:</label>
                  <input type="text" class="form-control" name="address" value="<?php if (isset($_GET['back']) && $_GET['back'] == 1 && $_SESSION['reg1']=="ready") {echo $r['address'];} ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <label for="contact">Phone / Moblie </label>
                  <input type="tel" id="contact" name="contact" class="form-control" placeholder="contact" required="" value="<?php if (isset($_GET['back']) && $_GET['back'] == 1 && $_SESSION['reg1']=="ready") {echo $r['contact'];} ?>" autofocus="">
                </div>
              </div>

              <div class="form-group">
                      <div class="form-label-group">
                        <label for="email">Email</label>

                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="" value="<?php if (isset($_GET['back']) && $_GET['back'] == 1 && $_SESSION['reg1']=="ready") {echo $r['email'];} ?>" autofocus="">
                        </div>
              </div>

              <input type="submit" class="form-control" name="Next" value="Next">

            <?php  } ?>
            <?php function registration2($r)
            {?>
              <div class="form-group">
                      <div class="form-label-group">
                        <label for="univ">What University did you attend:</label>

                        <input type="text" id="univ" name="univ" class="form-control" placeholder="" required="" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['address'];} ?>" autofocus="">
                        </div>
              </div>
              <div class="form-group">
                      <div class="form-label-group">
                        <label for="hsch">What year did you attend high school:</label>

                        <input type="number" id="hsch" name="hsch" class="form-control" min="1919" max="<?php echo date(y); ?>" placeholder="" required="" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['hsch'];} ?>"  autofocus="">
                        </div>
              </div>
              <div class="form-group">
                      <div class="form-label-group">
                        <label for="degree">What degree did you graduate with:</label>

                        <input type="text" id="degree" name="degree" class="form-control" placeholder="" required="" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['degree'];} ?>" autofocus="">
                        </div>
              </div>
              <div class="form-group">
                      <div class="form-label-group">
                        <label for="adskill">What additional skill do you have:</label>

                        <input type="text" id="adskill" name="adskill" class="form-control" placeholder="" required="" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['adskill'];} ?>" autofocus="">
                        </div>
              </div>
              <style media="screen">
                table input.form-control {border-radius: 0px !important;}
              </style>
            <table border="1">
              <thead>
                <th>Year of passing</th>
                <th>Qualification</th>
                <th>Specialisation or Subjects</th>
                <th>School / College / University / Institute</th>
                <th>Total marks %/ CGPA</th>
                <th>Any other relevant information</th>
              </thead>
              <tbody>
                <tr>
                  <td><input type="text" class="form-control" name="r11" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r11'];} ?>"> </td>
                  <td>SSC / 10th / </td>
                  <td><input type="text" class="form-control" name="r13" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r13'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r14" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r14'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r15" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r15'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r16" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r16'];} ?>"></td>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" name="r21" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r21'];} ?>"></td>
                  <td>HSC / 12th / </td>
                  <td><input type="text" class="form-control" name="r23" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r23'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r24" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r24'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r25" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r25'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r26" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r26'];} ?>"></td>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" name="r31" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r31'];} ?>"></td>
                  <td>Graduation</td>
                  <td><input type="text" class="form-control" name="r33" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r33'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r34" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r34'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r35" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r35'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r36" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r36'];} ?>"></td>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" name="r41" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r41'];} ?>"></td>
                  <td>Post graduation</td>
                  <td><input type="text" class="form-control" name="r43" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r43'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r44" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r44'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r45" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r45'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r46" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r46'];} ?>"></td>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" name="r51" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r51'];} ?>"></td>
                  <td>Any other </td>
                  <td><input type="text" class="form-control" name="r53" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r53'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r54" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r54'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r55" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r55'];} ?>"></td>
                  <td><input type="text" class="form-control" name="r56" value="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['r56'];} ?>"></td>

                </tr>
              </tbody>
            </table>
            <div class="form-group">
                    <div class="form-label-group">
                      <label for="explain"><i>Please explain gaps, if any</i> </label>

                      <textarea  id="explain" name="explain" class="form-control" placeholder="" autofocus="" ><?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['explain_text'];} ?></textarea>
                      </div>
            </div>

            <img src="<?php if (isset($_GET['back']) && $_GET['back'] ==2 && $_SESSION['reg2']=="ready") {echo $r['image_path'];} ?>" width="100px" height="auto" alt="">

            <div class="form-group">
              <div class="form-label-group">
                <label for="picture">Upload a photograph 100kb </label>
                <input type="file" id="picture" name="picture" class="form-control" placeholder="picture" <?php if (isset($_GET['back'])){ if (!$_GET['back'] ==2 && !$_SESSION['reg2']=="ready") {echo 'required';}} ?> autofocus="">
              </div>
            </div>
            <div class="form-group">
              <div class="row">

                  <div class="col">
                    <a type="button" class="form-control" href="?back=1" name="back" value="Back">Back</a>
                  </div>
                <div class="col">
                  <input type="submit" class="form-control" name="next1" value="Next">
                </div>
              </div></div>
              <?php  } ?>
              <?php function registration3($r)
              {?>
                <div class="form-group">
                        <div class="form-label-group">
                          <label for="vas">Have you been vaccine befor:</label>

                          <input type="text" id="vas" name="vas" class="form-control" placeholder="" required="" value="<?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready") {echo $r['vas'];} ?>" autofocus="">
                          </div>
                </div>

                            <img src="<?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready") {echo $r['medic'];} ?>" width="100px" height="auto" alt="">

                <div class="form-group">
                  <div class="form-label-group">
                    <label for="picture">Upload your medical examination </label>
                    <input type="file" id="picture" name="picture" class="form-control" placeholder="picture" value="<?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready") {echo $r['medic'];} ?>" autofocus="">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="disabled">Are you disabled?  </label>

                  <span>Yes </span> <input type="radio" id="disabled" name="disabled" value="yes" required="" <?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready" && $r['disabled'] =="yes" ) {echo "checked" ;} ?>  autofocus="">
                  <span>No </span> <input type="radio" id="disabled" name="disabled" value="no" required="" <?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready" && $r['disabled'] =="no" ) {echo "checked" ;}  ?> autofocus="">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="dis">if yes enter disability :</label>
                    <input type="text" class="form-control" name="dis" value="<?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready") {echo $r['dis'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="hobs">What are your hobbies :</label>
                    <input type="text" class="form-control" name="hob" value="<?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready") {echo $r['hob'];} ?>">
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-label-group">
                    <label for="marital_status">Marital Status</label>

                    <input type="radio" name="marital_status" value="yes" <?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready" && $r['marital_status'] =="yes" ) {echo "checked" ;} ?>> <span>Yes</span>
                    <input type="radio" name="marital_status" value="no" <?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready" && $r['marital_status'] =="no" ) {echo "checked" ;} ?>> <span>No</span>

                  </div>
                </div>

                                            <img src="<?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready") {echo $r['marriage_cert'];} ?>" width="100px" height="auto" alt="">

                <div class="form-group">
                  <div class="form-label-group">
                    <label for="marriage">Upload your marriage certificate </label>
                    <input type="file" id="marriage" name="marriage" class="form-control" autofocus="" value="<?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready") {echo $r['marriage_cert'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="spouse_name">What is the name of your spouse? </label>
                    <input type="text" class="form-control" name="spouse_name" value="<?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready") {echo $r['spouse_name'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="langkwn">Languages Known: </label>
                    <input type="text" class="form-control" name="langkwn" value="<?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready") {echo $r['langkwn'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="langflu">What Languages do you speak fluently? </label>
                    <input type="text" class="form-control" name="langflu" value="<?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready") {echo $r['langflu'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="res_addrs">Your residential address? </label>
                    <input type="text" class="form-control" name="res_addrs" value="<?php if (isset($_GET['back']) && $_GET['back'] ==3 && $_SESSION['reg3']=="ready") {echo $r['res_addrs'];} ?>">
                  </div>
                </div>
              <h4>Custody documentation</h4>
              <p>For adopted children, the adoptive parent must provide:</p>

              <p>A certified copy of the adoption decree;</p>
              <p>The legal custody decree, if custody occurred before the adoption;</p>
              <p>A statement showing dates and places where child resided with the parents; </p>
              <p>and</p>
              <p>If the child was adopted while aged 16 or 17 years, evidence that the child was adopted together with, or subsequent to the adoption of, a natural sibling under age 16 by the same adoptive parent(s).
              </p>
              <h4>Marriage Termination Documentation:</h4>


              <p>Applicants who have been previously married must submit evidence of the termination
                of EACH prior marriage. Evidence submitted to the U.S. Embassy or Consulate must be in the
                form of original documents issued by a competent authority, or certified copies bearing
                the appropriate seal or stamp of the issuing authority, such as:</p>

              <p>Final divorce decree<br />
              <p>Death certificate<br />
              <p>Annulment papers</p>

              <div class="form-group">
                <div class="row">

                    <div class="col">
                      <a type="button" class="form-control" href="?back=2" name="back" value="Back">Back</a>
                    </div>
                  <div class="col">

              <input type="submit" class="form-control" name="submit" value="Submit">
            </div></div></div>
              <?php  } ?>
              <?php function check_page()
              {?>
                <div class="form-group">
                  <div class="row">

                      <div class="col">
                        <a type="button" class="form-control" href="?back=3" name="back" value="Back">Back</a>
                      </div>
                    <div class="col">

                <input type="submit" class="form-control" name="Done" value="All Done">
              </div></div></div>
              <?php  } ?>
</form>
</div>
<?php include 'footer.php'; ?>
