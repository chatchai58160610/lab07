<?php 
include("db.php");

$query ="SELECT * FROM provinces";
$result = $conn->query($query);
?>
<html lang="en">
<head>
<meta charset="utf-8">
<title>register_form</title>
</head>
<body>
<h3>แบบฟอร์มลงทะเบียน</h3>
<form action="dopost.php" method="post" class="a">
ชื่อ-นามสกุล: <br/>
<input type="text" class="text" name="name" id="name" /> <br/>
อีเมล์: <br/>
<input type="email" class="email" name="email" id="email" /> <br/>

<br />
เพศ: <br />
<input type="radio" class="radio" name="sex" id="sex" value="ชาย" /> ชาย
<input type="radio" class="radio" name="sex" id="sex" value="หญิง" /> หญิง 
<br/>
ความสนใจ: <br/>
<input type="checkbox" class="checkbox" name="intr1" id="intr1" value="เรียน" /> เรียน
<input type="checkbox" class="checkbox" name="intr2" id="intr2"  value="เกมส์"/> เกมส์
<br />
ที่อยู่: <br/>
<textarea class="text" name="address" id="address" row="4" cols="50" ></textarea>
<br />
จังหวัด: <br />
<select name="provinces" id="provinces">
<option value="">---เลือกจังหวัด---</option>
<?php while($row = $result->fetch_array()) { ?>
 <option value="<?php echo $row['PROVINCE_ID']; ?>"> <?php echo $row['PROVINCE_NAME']; ?></option>
<?php } ?>
</select><br />
<br/>
<input type="submit" id="submit" value="Submit" name="submit" />
</form>
 
   <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
$('#submit').on('click', function ( event ) {
    var valid = true,
    errorMessage ="";
    if ($('#name').val() == '') {
        errorMessage = "โปรดป้อนชื่อ-นามสกุล \n";
        valid = false;
}
   if($('#address').val() == ''){
       errorMessage += "โปรดป้อนที่อยู่\n";
       valid = false;
   }
   if($('#email').val() ==''){
       errorMessage += "โปรดป้อน email\n";
       valid = false;
   }
   if($('#provinces').val()==''){
        errorMessage += "โปรดเลือกจังหวัด \n";
       valid = false;
   }
    if($('#intr1').prop('checked')==false && $('#intr2').prop('checked')==false) {
        errorMessage += "โปรดเลือกความสนใจ \n";
       valid = false;
   }
   if($('#sex').prop('checked')==false && $('#sex').prop('checked')){
        errorMessage += "โปรดเลือกเพศ \n";
       valid = false;
   }
   if( !valid && errorMessage.length > 0){
       alert(errorMessage);
       event.preventDefault();
   }
});
</script>
<a href=”ER Diagram”><img src=”http://angsila.cs.buu.ac.th/~58160610/887371/lab07/17455045_1463613347034879_572812742_o.png”></a>

</body>
</html>