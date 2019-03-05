<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery.bvalidator.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
	
	$('.showsource').each(function(){
		var id = $(this).attr('id');
		var source = $('#' + id + 'v').html();
		$('#' + id).text(source); 
	});
}); 
</script>
<link href="css/bvalidator.theme.gray2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"> var optionsGray2 = { classNamePrefix: 'bvalidator_gray2_', position: {x:'right', y:'center'}, offset: {x:15, y:0}, template: '<div class="{errMsgClass}"><div class="bvalidator_gray2_arrow"></div><div class="bvalidator_gray2_cont1">{message}</div></div>' }; $(document).ready(function () { $('#form1').bValidator(optionsGray2); });
</script>

</head>
<body>
<form id="form1" method="post">
  <br />
  <br />
  <div style="display: table;">
    <div style="display: table-cell; width: 55%;">
      <p>Alphabetic characters only:<br>
        <input  type="text" name="" data-bvalidator="alpha,minlength[10],required">
      </p>
      <p>Alphanumeric characters only:<br>
        <input data-bvalidator="alphanum,required" type="text">
      </p>
      <p>Only digits:<br>
        <input data-bvalidator="digit,required" type="text">
      </p>
      <p>Number:<br>
        <input data-bvalidator="number,required" type="text">
      </p>
      <p>Email:<br>
        <input data-bvalidator="email,required" type="text">
      </p>
      <p>Url:<br>
        <input data-bvalidator="url,required" type="text">
      </p>
      <p>Date in format dd.mm.yyyy:<br>
        <input data-bvalidator="date[dd.mm.yyyy],required" type="text">
      </p>
      <p>Minimum value 10:<br>
        <input data-bvalidator="min[10],required" type="text">
      </p>
      <p>Value between 100 and 200:<br>
        <input data-bvalidator="between[100:200],required" type="text">
      </p>
      <p>IPv4 address:<br>
        <input data-bvalidator="ip4,required" type="text">
      </p>
    </div>
    <div style="display: table-cell;">
      <p>Minimum length is 10 characters:<br>
        <input data-bvalidator="minlength[10],required" type="text">
      </p>
      <p>Maximum length is 10 characters:<br>
        <input data-bvalidator="maxlength[10],required" type="text">
      </p>
      <p>Valid length is between 10 and 20 characters:<br>
        <input data-bvalidator="rangelength[10:20],required" type="text">
      </p>
      <p>Value of the inputs must be equal:<br>
        <input id="equalto1" type="text">
        <input data-bvalidator="equalto[equalto1],required" type="text">
      </p>
      <p>Value of the inputs must not be equal:<br>
        <input id="differs1" type="text">
        <input data-bvalidator="differs[differs1],required" type="text">
      </p>
      <p>Select .jpg, .png or .txt file<br>
        <input data-bvalidator="extension[jpg:png:txt],required" data-bvalidator-msg="Please select file of type .jpg, .png or .txt" type="file">
      </p>
      <p>This checkbox is required:<br>
        <input name="a" value="1" data-bvalidator="required,required" type="checkbox">
      </p>
      <p>Select at least two checkboxes:<br>
        <input name="b[]" value="1" type="checkbox">
        <input name="b[]" value="1" type="checkbox">
        <input name="b[]" value="1" data-bvalidator="min[2],required" data-bvalidator-msg="Select at least two checkboxes" type="checkbox">
      </p>
      <p>Select no more than 2 options:<br>
        <select size="5" multiple="multiple" data-bvalidator="required,max[2],required" data-bvalidator-msg="Select no more than 2 options">
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
          <option value="4">Four</option>
        </select>
      </p>
      <p>Choose one:
        <input name="e" value="1" type="radio">
        <input name="e" value="1" type="radio">
        <input name="e" value="1" data-bvalidator="required" data-bvalidator-msg="Select one radio button" type="radio">
      </p>
      <p><B>Custom Validation :</B>
      <hr size="2" color="#FF0000" />
      </p>
      <p> Enter string containing 'j4junedsir' substring:
        <input data-bvalidator="regex[j4junedsir],required" data-bvalidator-msg="Plese enter string containing 'aaa' substring." type="text">
      </p>
      <script type="text/javascript">
      function myvalidator(number, devideBy)
	  {
		  number = parseFloat(number); 
		  if(number % parseInt(devideBy) == 0) 
		  return true; 
		  return false; 
	  } 
	  </script>
      <p> Enter a number which is divisible by 3:
        <input data-bvalidator="myvalidator[3],required" data-bvalidator-msg="Enter a number which is divisible by 3." type="text">
      </p>
      <p> Enter a number which is divisible by 4:
        <input data-bvalidator="myvalidator[4],required" data-bvalidator-msg="Enter a number which is divisible by 4." type="text">
      </p>
    </div>
  </div>
  <p>
    <input value="Submit" type="submit">
    <input value="Reset" type="reset">
  </p>
</form>
<script type="text/javascript"> $(document).ready(function () { $('#form1').bValidator(); }); </script>
</body>
</html>
