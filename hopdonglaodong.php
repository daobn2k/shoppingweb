<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php');

			
if(isset($_POST['detailsbtnid'])){
$id =$_POST['detailsbtnid'];
$sql = "SELECT * FROM user WHERE id = '$id'";
$run = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($run);


foreach($run as $row ){	


?>
<div style="margin-left: 30px; "><a type="submit" class="btn btn-primary" href="showinfoadmin2.php">Back</a></div>

<input type="hidden" name = "detailsbtnid" value = "<?php echo $row['id']?>"> 
<div align="center">
	<h1>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h1>
	<h2>Độc lập – Tự do – Hạnh phúc</h2>	
</div>
<div align="right" style="margin-right: 50px" >
	<h6>Thành phố Hồ Chí Minh, ngày 9 tháng 6 năm 2016</h6>
</div>
<div align="center">
	<h4>HỢP ĐỒNG LAO ĐỘNG</h4>
	<h6>Số: 4234/78</h6>
</div>
<div style="margin-left: 80px; margin-right: 50px; "> 

Căn cứ Bộ luật Lao động 2019 <br>
Căn cứ nhu cầu và năng lực của hai bên <br>
Hôm nay, tại Siêu thị Co.opmart <br>
Chúng tôi gồm:<br>
<h3>BÊN A (NGƯỜI SỬ DỤNG LAO ĐỘNG): Hệ thống Siêu thị Co.opmart</h3><br>
Đại diện:Nguyễn Huy Lâm || Chức vụ: Giám đốc Siêu thị Co.opmart<br>
Quốc tịch: ………Việt Nam…….<br>
Địa chỉ: …Thành phố Hồ Chí Minh..<br>
<h3>BÊN B (NGƯỜI LAO ĐỘNG): …<?php echo $row['username'];?>....</h3><br>
Ngày tháng năm sinh: ……22/05/1970… Giới tính: …Nam.<br>
Chức vụ: <?php echo $row['usertype']; ?> Tức nhân viên thường trực<br>
Email:<?php echo $row['email'];?><br>
Địa chỉ thường trú:…số 25, đường Hoàng Thành,Tây Ninh..<br>
Số CMTND:…001321244355 Ngày cấp: …15/01/1970… Nơi cấp:  Cục QLDC…<br>
Sau khi thỏa thuận, hai bên thống nhất ký Hợp đồng lao động (HĐLĐ) với các điều khoản sau đây:<br>
Điều 1: Điều khoản chung<br>
1. Loại HĐLĐ: ……Lao động nhân viên..<br>
2. Thời hạn HĐLĐ:  ……07 năm..<br>
3. Thời điểm bắt đầu: ……05/10/2018…….<br>
4. Thời điểm kết thúc (nếu có): …05/10/2023……<br>
5. Địa điểm làm việc: ……TP Hồ Chí Minh…<br>
6. Chức danh chuyên môn (vị trí công tác): …<?php echo $row['usertype']; ?>…<br>
7. Nhiệm vụ công việc như sau:<br>
- Chịu sự điều hành trực tiếp của ông/bà: .Trình Thái Hoàng (Quản lí )..<br>
- Thực hiện công việc theo đúng chức danh chuyên môn của mình dưới sự quản lý, điều hành của người có thẩm quyền.<br>
- Phối hợp cùng với các bộ phận, phòng ban khác trong Công ty để phát huy tối đa hiệu quả công việc.<br>
- Hoàn thành những công việc khác tùy thuộc theo yêu cầu của Công ty và theo quyết định của Ban Giám đốc.<br>

</div>


<?php
 	}         
     }           ?>





<?php
include('includes/scripts.php');
include('includes/footer.php');
?>