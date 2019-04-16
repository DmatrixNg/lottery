    <?php include 'header.php';
    include 'includes/db.php';
    extract($_SESSION);
    ?>
    <?php
    $w = $db->query('SELECT * FROM clients where id = '.$id.'');
    $r=$w->fetch();

    ?>
    <div class="disapproved-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <h1 class="page-title"></h1>
                    <p class="page-description">
                    </p>
                </div>
            </div>
        </div>
    </div>
    <section class="letter-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                    <div class="letter-title">
                        <h3 class="">Visa Rejected</h3>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-6 col-sm-3 col-12">
                    <h6 class="">Dear <?php echo $r['fname']; ?>, </h6><br/>
                    <p>In regard to your letter on <?php echo date('jS M Y', strtotime($r['Date_ap'])); ?>, numbered <?php echo $r['id']; ?>, requesting permission for a person enter and exit for the purpose of tourism, the Immigration Department responds as follows:</p>

                    <?php if ($r['gender'] == "f"): ?>
                      <p>(Mrs) : <?php echo $r['fname']." ".$r['lname'] ; ?></p>
                    <?php else: ?>
                      <p>(Mr) : <?php echo $r['fname']." ".$r['lname'] ; ?></p>
                    <?php endif; ?>
                                        <?php  ?>
                      <p>(Date of birth) : <?php echo date('jS M Y', strtotime($r['date_of_birth'])); ?></p>

                </div>

            </div>
        </div>
    </section>

  <?php include 'footer.php'; ?>
