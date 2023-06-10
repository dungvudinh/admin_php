<div class="record-container">
    <h3 class='record-container_title'>
        Thông báo mới
    </h3>
    <form class="record-content"  enctype="multipart/form-data"  method="POST">
        <div class="form-group">
            <label for="title">Tiêu đề</label>
            <input type="text" placeholder="Nhập tiêu  đề..." name="title">
        </div>
        <div class="form-group">
            <label for="content">Nội dung</label>
            <textarea name="content" id="" cols="63" rows="10"></textarea>
        </div>
        <div class="form-group">
            <p>Thời gian diễn ra</p>
            <div class='form-group_child'>
                <div class='form-group_child__2'>
                    <label for="start_time">Từ </label>
                    <input type="datetime-local"  name="start_time">
                </div>
                <div class='form-group_child__2'>
                    <label for="end_time">Đến</label>
                    <input type="datetime-local" name="end_time">
                </div>
            </div>
         
        </div>
        <div class="form-group">
            <label for="file">Thêm hình ảnh</label>
            <input type="file" name="file" value=""/>
        </div>
        <div id="uploadStatus"></div>
        <button type="submit" name="upload">Tạo</button>
    </form>
</div>
<?php
$message = "";
    if(isset($_POST['upload']))
    {
        $title= $_POST['title'];
        $content =$_POST['content'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $filename = $_FILES["choosefile"]["name"];
        $tempname = $_FILES["choosefile"]["tmp_name"];  
        $folder = "./avatar_users/".$filename;   
        // echo $filename;
        // echo $tempname;
        // $sql = "INSERT INTO image VALUES('".$filename."')";
        // mysqli_query($connection, $sql);    
        // if(move_uploaded_file($tempname, $folder))
        //     $message ="Image uploaded successfully";
        // else 
        // $message = "Failed to upload image";
        // echo "<script> alert('".$message."')</script>";
    }
?>
<script>
  $(document).ready(function() {
  $('.record-content').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    var formData = new FormData(this); // Create a new form data object
    $.ajax({
      url: './components/get_data.php', // PHP script to handle the file upload
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: function() {
        $('#uploadStatus').html('Uploading file...'); // Display a loading message
      },
      success: function(response) {
        $('#uploadStatus').html(response); // Display the response from the server
      }
    });
  });
});

</script>