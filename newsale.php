<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connection.php'); 
?>

<div class="container-fluid dashboard-content" style="height: 100%;">

<div class="row">

<?php 
  $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
  $sql_user =  "SELECT * FROM user";
  $result_user = Result($sql_user);
  $sql_sale =  "SELECT * FROM sale_user";
  $result_sale = Result($sql_sale);
  $data = [10,15,25,30,35];
if(isset($_GET['delete_id'])){
    $id =$_GET['delete_id'];
    $sql_delete = "DELETE FROM sale_user WHERE sale_user.sale_id =$id";
    execute($sql_delete);
    $message ='Xóa thành công rùi nhó nhó';
    header('Location: salecode.php?msg='.urlencode(serialize($message)));
}else{
    if(isset($_POST['addnewsale'])){
        $sale_user_id =$_POST['sale_user_id'];
        $sale = $_POST['sale'];
        $status = 1;    
        $sale_code = rand(0,9999).substr(str_shuffle($permitted_chars), 0, 10);
        $start_date = $_POST['start'];
        $start_end = $_POST['end'];
        if($start_date !== '' && $start_end !== '' && $sale_user_id && $sale !== ''){
        $sql_add = "INSERT INTO sale_user(sale_user_id,sale_code, sale, sale_start, sale_end,status) VALUES ('$sale_user_id','$sale_code','$sale','$start_date','$start_end','$status')"; 
        execute($sql_add);
        $message ='Thêm thành công rùi nhó';


        $sql_select = "SELECT * FROM `user` WHERE id = '$sale_user_id'";
        $rs_get = Result($sql_select);
        $name = $rs_get[0]['username'];
        $email =  $rs_get[0]['email'];
        
        $subject = "Ưu đãi siêu may mắn cho khách hàng thân thiện ";
        $content = "Khách Hàng may mắn: ".$name."<br>"."code: ". $sale_code."<br>"."<br>"."Thân gửi quý khách nhân dịp siêu ưu đãi ^^ hãy sử dụng mã code phía trên để được nhận ưu đãi ";



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
		$mail->addAddress('vvdao096@gmail.com', 'Quản Lý');
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Tin nhắn đã được gửi thành công';
		$mail->Body    = "Event giảm giá cho khách hàng";
		$mail->CharSet="UTF-8";
		if ($mail->send()) {
			$mail->addAddress($email, 'Khách hàng');
			$mail->Subject = $subject;
			$mail->Body    = $content;
			$mail->send();

		} else {
			echo 'Tin nhắn không được gửi đi';
		}   
        header('Location: salecode.php?msg='.urlencode(serialize($message)));

        }else{
        showMessage('Làm ơn kiểm tra lại đi thiếu gì rồi');
        }
    }
}




?>
    <div class="col-x1-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header" >
                <h2 style="display:flex;justify-content: center;">Thêm Mới Ưu Đãi</h2>
                <div class="card-body">
                    <form action="" method = "POST" id ="basicform">
                        <div class="form-group">
                            <label for="cat_id">Khách hàng nhận ưu đãi</label>
                            <select class="form-control" name="sale_user_id" id="cat_id">
                            <option value ="">--Xin Mời Lựa chọn--</option>
                        <?php
                        foreach ($result_user as $key => $result_user) {
                            ?>
                        <option value = "<?php echo $result_user['id'] ?>"><?php echo $result_user['username'] ?></option>
                        <?php
                           }
                        ?>
                            </select>
                        </div>
                      
                        <div class="form-group">
                            <label for="cat_id">Mức độ ưu đãi</label>
                            <select class="form-control" name="sale" id="cat_id">
                            <option value ="">--Lựa chọn mức độ ưu đãi-</option>
                        <?php
                        foreach ($data as $key => $data) {
                            ?>
                        <option value ="<?php echo $data ?>"><?php echo $data . '%' ?></option>
                        <?php
                           }
                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="sale_start">Ngày bắt đầu</label>
                          <input type="date" name="start" id="sale_start" class="form-control" placeholder="Chọn ngày bắt đầu" value="<?php echo date('DD-MM-YYYY');?>" >
                        </div>      
                        <div class="form-group">
                          <label for="sale_end">Ngày kết thúc</label>
                          <input type="date" name="end" id="sale_end" class="form-control" placeholder="Chọn ngày kết thúc" value="<?php echo date('DD-MM-YYYY');?>" >
                        </div>  
                        <div class="row">
                            <div class="col-sm-12 pb2 pb-sm-4 pb-lg-0 pr-0">
                              
                                <div class="col-sm-12 pl-0">
                                    <button type="submit" class="btn btn-primary" name ="addnewsale">Thêm Mới</button>
                                </div>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>