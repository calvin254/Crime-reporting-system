<?php
session_start();
    if(!isset($_SESSION['x']))
        header("location:headlogin.php");
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    if(isset($_POST['s1']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $cid=$_POST['cid'];
        $_SESSION['cid']=$cid;
        header("location:head_case_details.php");
    }
    }
    
    $loc=$_SESSION['loc'];
    $query="select * from complaint where location='$loc' order by c_id desc";
    $result=mysqli_query($conn,$query);  
    $rows=mysqli_fetch_assoc($result);
?>
 <h1>Cases in <?php echo $rows['location']; ?></h1>
    <button onclick="window.print();"> Print this report</button>
 <table class="table table-bordered">
       <thead class="thead-dark" style="background-color: black; color:white;">
    <tr>
      <th scope="col">Complainant adress</th>
      <th scope="col">Type of Crime</th>
      <th scope="col">Date Of Crime</th>
      <th scope="col">Description</th>
            <th scope="col">Date of complaint</th>

      <th scope="col">Incharge Status</th>
      <th scope="col">Police Status</th>
            <th scope="col">Police Id</th>


    </tr>
       </thead>
      <?php
              while($rows=mysqli_fetch_array($result)){
             ?> 
       <tbody style="background-color: white; color: black;">
    <tr>
      <td><?php echo $rows['a_no']; ?></td>
      <td><?php echo $rows['type_crime']; ?></td>     
      <td><?php echo $rows['d_o_c']; ?></td>     
      <td><?php echo $rows['description']; ?></td>  
            <td><?php echo $rows['d_o_c']; ?></td>         
      <td><?php echo $rows['inc_status']; ?></td>         
      <td><?php echo $rows['pol_status']; ?></td>         
            <td><?php echo $rows['p_id']; ?></td>         

       
    </tr>
       </tbody>
             <?php
} 
?>
    
  
</table>