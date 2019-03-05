
    <?php   include("DatabaseFiles/cn.php");
            $y=mysql_fetch_object(mysql_query("select * from student_tbl where studid=".$_SESSION["studid"]));
        ?>

    <div class="row" style="padding: 20px;border: 3px solid #f1f1f1;text-align: left;">
        <div class="col-md-8">
            <div class="col-md-12">
            <span style="float:left;font-size: 18px;margin: 8px auto;"><bdi style="color:#222845">Student name : </bdi> <?= $y->fname." ".$y->lname?></span>
        </div>
        <div class="col-md-12">
            <span style="float:left;font-size: 18px;margin: 8px auto;"><bdi style="color:#222845">Gender : </bdi> <?= $y->gender?></span>
        </div>
        <div class="col-md-12">
            <span style="float:left;font-size: 18px;margin: 8px auto;"><bdi style="color:#222845">Date of Birth : </bdi> <?= $y->dob?></span>
        </div>
        <div class="col-md-12">
            <span style="float:left;font-size: 18px;margin: 8px auto;"><bdi style="color:#222845">Enrollment id : </bdi> <?= $y->enrollid?></span>
        </div>
        <div class="col-md-12">
            <span style="float:left;font-size: 18px;margin: 8px auto;"><bdi style="color:#222845">Admission year : </bdi> <?= $y->admissionyear?></span>
        </div>
        </div>
        <div class="col-md-4">
            <img src="../faculty/uploadimage/<?=$y->photo?>" style="border-radius: 50%;" width="200" height="200" alt="">
        </div>
    </div>
