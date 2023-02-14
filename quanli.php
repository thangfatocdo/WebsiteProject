<?php
require_once('dbhelp.php')
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/quanli1.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="./css/index1.css">

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header-img">
        <img src="./img/Trangbia.jpg" alt="">
    </div>
    
    <div id="header">
         
        <ul id="nav">
            <li><a href="quanli.php">Quản lí sinh viên</a></li>
            <li><a href="news.php">Giải Trí</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="daotao.php">Đào tạo</a></li>
            


            <li style="float:right"><a class="active" href="#about">About</a></li>
        </ul>
        
        </div>
    <div class="container">
        <div class="panel  panel-primary"> 
            <div class="panel-heading">
                <h2>Quản lí thông tin sinh viên</h2>
                
                <!-- form tim kiem sinh vien -->

                <!-- <div class="search"> 
                    <label for="test">Enroll with us:</label>
                    <form action="" method="get" class="search-box" >                
                        <input type="text" name="s"  class="form-control form-search" >
                    </form>
                </div> -->
            <div class="search">
                <label for="test" class="text-search">Tìm kiếm sinh viên:</label>
                <form action="" method="get">
                    <input name="s" id="test" type="text" class="form-control form-search" placeholder="Nhập tên sinh viên cần tìm"/>
                </form>
            </div>
            </div>
            <div class="panel-body ">
                <table class="table  table-sm">
                    <thead class="header-table">
                        <tr>
                            <th >STT</th>
                            <th>Họ & Tên</th>
                            <th>Tuổi</th>
                            <th >Địa chỉ</th>
                            <th width="60px"></th>
                            <th width="60px"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php
                        if (isset($_GET['s']) && $_GET['s']!=''){
                            $sql ='select * from student where fullname like "% '.$_GET['s'].'%"';
                        }else{
                            $sql ='select * from student';
                        };

                       
                        $studentList = executeResult($sql);
                        $index =1;

                        foreach($studentList as $std ){
                            echo'
                            <tr>
                            <td style="text-align: right;"> '.($index++).'</td>
                            <td>' .$std['fullname']. '</td>
                            <td style="text-align: right;">' .$std['age']. '</td>
                            <td>' .$std['address']. '</td>
                            <td><button class="btn btn-outline-primary" onclick=\'window.open("addstudent.php?id='.$std['id'].'","_self")\'>Edit</button></td>
                            <td><button class="btn btn-outline-danger" onclick="deleteStudent('.$std['id'].')">Delete</button></td>
                        </tr>
                        ';
                        }
                        ?>
                        
                    </tbody>
                </table>
                <button class="btn btn-success" onclick="window.open('addstudent.php', '_self')">Add Student</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
		function deleteStudent(id) {
			option = confirm('Bạn có muốn xoá sinh viên này không ?')
			if(!option) {
				return;
			}

			console.log(id)
			$.post('xoasv.php', {
				'id': id
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>

   
</body>
</html>