<?php
include('../../connection.php');
	session_start();
	if(!isset($_SESSION["email"])) 
	{
		header("Location:../../login.php");
	}

//     if(isset($_POST['query']))
//     {
//     $query = $_POST['query'];
//     // Query to search for matching records
//     $sql = "SELECT * FROM tbl_dept WHERE dept_name LIKE '%".$query."%'";
//     $result = $con->query($sql);
//     // Display search results
//     if($result->num_rows > 0)
//     {
//         while($row = $result->fetch_assoc())
//         {
//             echo "<li>".$row["dept_name"]."</li>";
//         }
//     }
//     else
//     {
//         echo "<p>No matching records found</p>";
//     }
// }
// echo'<script>
//         $(".results-item").hover(
//           function() {
//             $(this).css("background-color", "lightgray");
//           },
//           function() {
//             $(this).css("background-color", "");
//           }
//         );
//         $(".searchResults").click(function() {
//           var value=$(this).text();
//           $("#searchBox").val(value);
//         });
//   </script>';
//   echo ($output);

if(isset($_GET["search"])){
  $output = "";
  $search = $_GET["search"];
  $search = preg_replace("#[^0-9a-z]#", "", $search);
  $service_search = mysqli_query($con, "SELECT * FROM tbl_dept WHERE dept_name LIKE '%$search%'");
    
    if(mysqli_num_rows($service_search) == 0) {
        $output = 'There was no search results. ';
    }
    else {
        while($row = mysqli_fetch_assoc($service_search)) {
            $service_data = $row['dept_name'];
            $id = $row['dept_id'];
            $output .= '<div class="results-item" style="margin-bottom: 2px;">'.$service_data.'</div>';
        }
    }
    
    echo $output;
}
?>