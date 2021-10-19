<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connection.php');

?>


<!-- Send Mail Php Basic -->

<?php 
   if (isset($_POST['add_contact'])) {
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	if($name != ''){
		$sql_select = "SELECT * FROM `user` WHERE username = '$name'";
			$rs_get = Result($sql_select);

			$email =  $rs_get[0]['email'];
		$content = "Họ tên: ".$name."<br>"."email: ".$email."<br>"."<br>"."Thân gửi: ".$message;
			
		include 'PHPMailer/PHPMailer.php';
		include 'PHPMailer/SMTP.php';
		include 'PHPMailer/Exception.php';
		
		$mail = new PHPMailer\PHPMailer\PHPMailer;       
		 //Server settings
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'vvdao096@gmail.com';                 // SMTP username
		$mail->Password = 'vandao2k'; 
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		//Recipients
		$mail->setFrom('vvdao096@gmail.com', 'Cửa Hàng Phân Nhánh EcoMart');
		$mail->addAddress('tovantiep2604@gmail.com', 'Quản Lý');
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Tin nhắn đã được gửi thành công';
		$mail->Body    = $content;
		$mail->CharSet="UTF-8";
		if ($mail->send()) {
			$mail->addAddress($email, 'Khách hàng');
			$mail->Subject = $subject;
			$mail->Body    = $message;
			$mail->send();
		} else {
			echo 'Tin nhắn không được gửi đi';
		}               
	}
	}

?>
<div style="height:100%">
    <div style="    display: flex;
    justify-content: center;">
    <div class="col-md-7 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4" style="text-align: center;"> Chăm Sóc Khách Hàng</h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<div id="form-message-success" class="mb-4">
										</div>
									<form method="POST" id="contactForm" name="contactForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<select class="form-control"  name="name" id="cat_id">
														<option value ="">--Chọn Tên Khách Hàng--</option>
														 <?php
													$sql = 'SELECT * FROM user ';
													$result = Result($sql);
													foreach($result as $key => $rs){
														if($rs['usertype'] == "user"){
													?>
													<option value = "<?php echo $rs['username'] ?>"><?php echo $rs['username'] ?></option>
													<?php
													}
												}
													?>
														</select>
											
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Tiêu Đề">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="message" class="form-control" id="message" cols="30" rows="7" placeholder="Nội dung"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group" style="text-align: center;">
													<button type="submit"  name="add_contact" class="btn btn-primary">Send Message </button>
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
    </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>