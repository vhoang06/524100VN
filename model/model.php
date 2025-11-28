<?php
    include ('connect.php');
  class data_contact
  {
     public function insert_tmsp($tensp,$soluong,$dongia)
     {
        global $conn;
        $sql="insert into tmsp(tensp,soluong,dongia)
              values('$tensp','$soluong','$dongia')";
        $run=mysqli_query($conn,$sql);
        return $run;
     }

     public function select_sp()
     {
        global $conn;
        $sql = "SELECT * FROM tmsp";
        $run = mysqli_query($conn, $sql);
        return $run;
     }

     public function select_sp_by_id($id)
     {
        global $conn;
        $sql = "SELECT * FROM tmsp WHERE ID_SP = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
     }


     public function update_sp_id($tensp,$soluong,$dongia,$id)
     {
      global $conn;        
      $sql = "Update tmsp set tensp='$tensp',soluong='$soluong',dongia='$dongia' WHERE ID_SP='$id'";
      $run = mysqli_query($conn, $sql);
      return $run;
     }

     public function delete_sp_id($id)
     {
      global $conn;
      $sql = "DELETE FROM tmsp where ID_SP=$id";
      $run = mysqli_query($conn, $sql);
      return $run;
     }

     public function update_sp_quantity($id, $new_quantity)
     {
        global $conn;
        $sql = "UPDATE tmsp SET soluong = '$new_quantity' WHERE ID_SP = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
     }

     public function insert_order($id_nd, $id_sp, $soluong, $tongtien, $trangthai)
     {
        global $conn;
        $sql = "INSERT INTO muahang (id_nd, id_sp, soluong, tongtien, trangthai) 
                VALUES ('$id_nd', '$id_sp', '$soluong', '$tongtien', '$trangthai')";
        $run = mysqli_query($conn, $sql);
        return $run;
     }

     public function login($email,$phone)
     {
      global $conn;  
      $sql="select * from tmnd where email='$email' and sodienthoai='$phone'";
      $run=mysqli_query($conn,$sql);
      return $run;
     }

     public function insert_tmnd($ten,$diachi,$email,$sodienthoai)
     {
        global $conn;
        $sql="insert into tmnd(ten,diachi,email,sodienthoai)
              values('$ten','$diachi','$email','$sodienthoai')";
        $run=mysqli_query($conn,$sql);
        return $run;
     }

     public function select_all()
     {
        global $conn;
        $sql = "SELECT * FROM tmnd inner join muahang on tmnd.ID_ND=muahang.ID_ND inner join tmsp on muahang.ID_SP=tmsp.ID_SP";
        $run = mysqli_query($conn, $sql);
        return $run;
     }

     public function select_order($order_id)
     {
        global $conn;
        $sql = "SELECT tmnd.ten AS ten, tmsp.tensp AS tensp, muahang.soluong, muahang.tongtien 
                FROM muahang 
                INNER JOIN tmnd ON muahang.id_nd = tmnd.ID_ND 
                INNER JOIN tmsp ON muahang.id_sp = tmsp.ID_SP 
                WHERE muahang.ID_MH = '$order_id'";
        $run = mysqli_query($conn, $sql);
        return $run;
     }
   }
?>