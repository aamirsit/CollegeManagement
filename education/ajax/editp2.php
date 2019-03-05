<div class="row" style="padding: 20px 20px 20px 20px;border: 3px solid #f1f1f1;text-align: left;">
    <div class="col-md-8">
<div class="wm-contact-form">
    <?php   include("DatabaseFiles/cn.php");
            $y=mysql_fetch_object(mysql_query("select * from student_tbl where studid=".$_SESSION["studid"]));
        ?>
    <form id="formedit" enctype="multipart/form-data">
        <ul>
            <li>
                <i class="wmicon-symbol3"></i>
                <input type="text" value="<?= $y->username?>" name="email" onblur="if(this.value == '') { this.value ='<?= $y->username?>'; }" onfocus="if(this.value =='<?= $y->usename?>') { this.value = ''; }">
            </li>
            <li style="">
                <label style="background: #f7f7f7;" for="photo">Update image</label>
                <input style="position:relative;visibility: hidden;cursor:pointer;" type="file" id="photo" name="file" class="form-control" placeholder="Photo"/>
            </li>
            <li> <input id="ue" type="submit" value="Update" style="width: 100%;margin-top:-50px;"> </li>
        </ul>
    </form>
</div>
</div>
<div class="col-md-4">
    <img id="pphoto" src="../faculty/uploadimage/<?=$y->photo?>" style="border-radius: 50%;" width="200" height="200" alt="">
    <img style="position: absolute;margin: 90px 0 0 -110px;filter: invert(1);display: none" id="loader" src="./images/loader.gif" style="border-radius: 50%;" alt="">
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $('#photo').change(function() {
            readImageData(this,"#pphoto");
        });

        $("#formedit").on('submit', function(e){
        e.preventDefault();
            $.ajax({
                type: 'POST',
                url: './ajax/updatepro.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $("#loader").css("display","");
                },
                success: function(data){
                    $("#loader").css("display","none");
                    $('#formedit')[0].reset();
                    pops("Change Successfull","success");
                }
            });
        });
    });
</script>