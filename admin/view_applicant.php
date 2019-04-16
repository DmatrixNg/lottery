<?php

include '../header.php';
include '../includes/db.php';
// remove all session variables
$id = $_GET['id'];
$w = $db->query("SELECT * FROM clients where id = ".$id."");
//print_r ($w);
$r=$w->fetch();
// destroy the session
?>
 <div class="container">



  <div class="form-group">
    <div class="row">
    <div class="col">



                  <div class="form-label-group">
                    <label for="lname">Lastname</label>
                    <input type="text" id="lname" name="lname" class="form-control" readonly placeholder="Lastname" required="" value="<?php if (isset($_GET['id'])) {echo $r['lname'];} ?>" autofocus="">
                  </div>

              </div>
<div class="col">


                      <div class="form-label-group">
                        <label for="Mname">Middle name</label>
                        <input type="text" id="Mname" name="Mname" class="form-control" readonly placeholder="Middlename" required="" value="<?php if (isset($_GET['id'])) {echo $r['Mname'];} ?>" autofocus="">

                    </div>
      </div>
                      <div class="col">
                        <div class="form-label-group">
                          <label for="fname">Firstname</label>
                          <input type="text" id="fname" name="fname" class="form-control" readonly placeholder="Firstname" required="" value="<?php if (isset($_GET['id'])) {echo $r['fname'];} ?>" autofocus="">
                        </div>

                      </div>
              </div></div>
              <div class="form-group">
                <div class="form-label-group">
                  <label for="date_of_birth">Age</label>
                  <input type="number" class="form-control" readonly name="age" min="5" value="<?php if (isset($_GET['id'])) {echo $r['age'];} ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <label for="date_of_birth">Date of birth</label>
                  <input type="date" class="form-control" readonly name="date_of_birth" value="<?php if (isset($_GET['id'])) {echo $r['date_of_birth'];} ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <label for="date_of_birth">Address For Communication:</label>
                  <input type="text" class="form-control" readonly name="address" value="<?php if (isset($_GET['id'])) {echo $r['address'];} ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <label for="contact">Phone / Moblie </label>
                  <input type="tel" id="contact" name="contact" class="form-control" readonly placeholder="contact" required="" value="<?php if (isset($_GET['id'])) {echo $r['contact'];} ?>" autofocus="">
                </div>
              </div>

              <div class="form-group">
                      <div class="form-label-group">
                        <label for="email">Email</label>

                        <input type="email" id="email" name="email" class="form-control" readonly placeholder="Email" required="" value="<?php if (isset($_GET['id'])) {echo $r['email'];} ?>" autofocus="">
                        </div>
              </div>

              <div class="form-group">
                      <div class="form-label-group">
                        <label for="univ">What University did you attend:</label>

                        <input type="text" id="univ" name="univ" class="form-control" readonly placeholder="" required="" value="<?php if (isset($_GET['id'])) {echo $r['address'];} ?>" autofocus="">
                        </div>
              </div>
              <div class="form-group">
                      <div class="form-label-group">
                        <label for="hsch">What year did you attend high school:</label>

                        <input type="number" id="hsch" name="hsch" class="form-control" readonly min="1919" max="<?php echo date(y); ?>" placeholder="" required="" value="<?php if (isset($_GET['id'])) {echo $r['hsch'];} ?>"  autofocus="">
                        </div>
              </div>
              <div class="form-group">
                      <div class="form-label-group">
                        <label for="degree">What degree did you graduate with:</label>

                        <input type="text" id="degree" name="degree" class="form-control" readonly placeholder="" required="" value="<?php if (isset($_GET['id'])) {echo $r['degree'];} ?>" autofocus="">
                        </div>
              </div>
              <div class="form-group">
                      <div class="form-label-group">
                        <label for="adskill">What additional skill do you have:</label>

                        <input type="text" id="adskill" name="adskill" class="form-control" readonly placeholder="" required="" value="<?php if (isset($_GET['id'])) {echo $r['adskill'];} ?>" autofocus="">
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
                  <td><input type="text" class="form-control" readonly name="r11" value="<?php if (isset($_GET['id'])) {echo $r['r11'];} ?>"> </td>
                  <td>SSC / 10th / </td>
                  <td><input type="text" class="form-control" readonly name="r13" value="<?php if (isset($_GET['id'])) {echo $r['r13'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r14" value="<?php if (isset($_GET['id'])) {echo $r['r14'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r15" value="<?php if (isset($_GET['id'])) {echo $r['r15'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r16" value="<?php if (isset($_GET['id'])) {echo $r['r16'];} ?>"></td>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" readonly name="r21" value="<?php if (isset($_GET['id'])) {echo $r['r21'];} ?>"></td>
                  <td>HSC / 12th / </td>
                  <td><input type="text" class="form-control" readonly name="r23" value="<?php if (isset($_GET['id'])) {echo $r['r23'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r24" value="<?php if (isset($_GET['id'])) {echo $r['r24'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r25" value="<?php if (isset($_GET['id'])) {echo $r['r25'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r26" value="<?php if (isset($_GET['id'])) {echo $r['r26'];} ?>"></td>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" readonly name="r31" value="<?php if (isset($_GET['id'])) {echo $r['r31'];} ?>"></td>
                  <td>Graduation</td>
                  <td><input type="text" class="form-control" readonly name="r33" value="<?php if (isset($_GET['id'])) {echo $r['r33'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r34" value="<?php if (isset($_GET['id'])) {echo $r['r34'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r35" value="<?php if (isset($_GET['id'])) {echo $r['r35'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r36" value="<?php if (isset($_GET['id'])) {echo $r['r36'];} ?>"></td>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" readonly name="r41" value="<?php if (isset($_GET['id'])) {echo $r['r41'];} ?>"></td>
                  <td>Post graduation</td>
                  <td><input type="text" class="form-control" readonly name="r43" value="<?php if (isset($_GET['id'])) {echo $r['r43'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r44" value="<?php if (isset($_GET['id'])) {echo $r['r44'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r45" value="<?php if (isset($_GET['id'])) {echo $r['r45'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r46" value="<?php if (isset($_GET['id'])) {echo $r['r46'];} ?>"></td>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" readonly name="r51" value="<?php if (isset($_GET['id'])) {echo $r['r51'];} ?>"></td>
                  <td>Any other </td>
                  <td><input type="text" class="form-control" readonly name="r53" value="<?php if (isset($_GET['id'])) {echo $r['r53'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r54" value="<?php if (isset($_GET['id'])) {echo $r['r54'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r55" value="<?php if (isset($_GET['id'])) {echo $r['r55'];} ?>"></td>
                  <td><input type="text" class="form-control" readonly name="r56" value="<?php if (isset($_GET['id'])) {echo $r['r56'];} ?>"></td>

                </tr>
              </tbody>
            </table>
            <div class="form-group">
                    <div class="form-label-group">
                      <label for="explain"><i>Please explain gaps, if any</i> </label>

                      <textarea  id="explain" name="explain" class="form-control" readonly placeholder="" autofocus="" ><?php if (isset($_GET['id'])) {echo $r['explain_text'];} ?></textarea>
                      </div>
            </div>
            <label for=""> Passport photograph </label>
            <img src="<?php if (isset($_GET['id'])) {echo $r['image_path'];} ?>" width="100px" height="auto" alt="">


                <div class="form-group">
                        <div class="form-label-group">
                          <label for="vas">Have you been vaccine befor:</label>

                          <input type="text" id="vas" name="vas" class="form-control" readonly placeholder="" required="" value="<?php if (isset($_GET['id'])) {echo $r['vas'];} ?>" autofocus="">
                          </div>
                </div>

                <label for="picture">medical examination </label>
                            <img src="<?php if (isset($_GET['id'])) {echo $r['medic'];} ?>" width="100px" height="auto" alt="">


                <div class="form-group">
                  <div class="form-label-group">
                    <label for="disabled">Are you disabled?  </label>

                  <span>Yes </span> <input type="radio" id="disabled" name="disabled" value="yes" required="" <?php if (isset($_GET['id']) && $r['disabled'] =="yes" ) {echo "checked" ;} ?>  autofocus="">
                  <span>No </span> <input type="radio" id="disabled" name="disabled" value="no" required="" <?php if (isset($_GET['id']) && $r['disabled'] =="no" ) {echo "checked" ;}  ?> autofocus="">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="dis">if yes enter disability :</label>
                    <input type="text" class="form-control" readonly name="dis" value="<?php if (isset($_GET['id'])) {echo $r['dis'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="hobs">What are your hobbies :</label>
                    <input type="text" class="form-control" readonly name="hob" value="<?php if (isset($_GET['id'])) {echo $r['hob'];} ?>">
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-label-group">
                    <label for="marital_status">Marital Status</label>

                    <input type="radio" name="marital_status" value="yes" <?php if (isset($_GET['id']) && $r['marital_status'] =="yes" ) {echo "checked" ;} ?>> <span>Yes</span>
                    <input type="radio" name="marital_status" value="no" <?php if (isset($_GET['id']) && $r['marital_status'] =="no" ) {echo "checked" ;} ?>> <span>No</span>

                  </div>
                </div>

                <label for="marriage"> marriage certificate </label>
                                            <img src="<?php if (isset($_GET['id'])) {echo $r['marriage_cert'];} ?>" width="100px" height="auto" alt="">


                <div class="form-group">
                  <div class="form-label-group">
                    <label for="spouse_name">What is the name of your spouse? </label>
                    <input type="text" class="form-control" readonly name="spouse_name" value="<?php if (isset($_GET['id'])) {echo $r['spouse_name'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="langkwn">Languages Known: </label>
                    <input type="text" class="form-control" readonly name="langkwn" value="<?php if (isset($_GET['id'])) {echo $r['langkwn'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="langflu">What Languages do you speak fluently? </label>
                    <input type="text" class="form-control" readonly name="langflu" value="<?php if (isset($_GET['id'])) {echo $r['langflu'];} ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="res_addrs">Your residential address? </label>
                    <input type="text" class="form-control" readonly name="res_addrs" value="<?php if (isset($_GET['id'])) {echo $r['res_addrs'];} ?>">
                  </div>
                </div>


</div>
<?php include '../footer.php'; ?>
