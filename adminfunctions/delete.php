<?php
session_start();
if(!isset($_SESSION['loggin']) || $_SESSION['loggin']!=true)
{
    header("location: index.php");
    exit;
}
?>
<?php
    include '../parts/_dbconnect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
 $bookname = $_POST["bookname"];

 $existSql = "SELECT * FROM `books` WHERE bookname = '$bookname'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
    $sql = "DELETE FROM `books` WHERE `books`.`bookname` = '$bookname'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">Book has been deleted.</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        </span>
      </div>';
    }
    else{
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">Book didn\'t delete from the records, please try agian.</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        </span>
      </div>';
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Delete books</title>
</head>
<body class="bg-slate-400">
    <h1 class="text-center mt-44 text-4xl font-semibold">Delete Book</h1>
    <br>
    <button class= "bg-blue-600 text-white p-2.5 flex mx-auto rounded mt-3" ><a href="../dashboard.php">Go back</a></button>
    <br>
<form method="post" action="delete.php" class="w-1/2 mx-auto mb-44 shadow-2xl bg-slate-600 p-12 rounded-xl">
  <div class="relative z-0 mb-6 w-1/2 group">
      <input type="text" name="bookname" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
      <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">bookname</label>
  </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Delete</button>
</form>
</body>
</html>