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
     $sql = "SELECT * FROM userreqs";
        $result1 = mysqli_query($conn,$sql);
        $userreqs = mysqli_num_rows($result1);
        while($row = mysqli_fetch_assoc($result1)){ 
            $username = $row["username"];
            $password = $row["password"];
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $email = $row["email"];
            $department = $row["department"];
    
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if($_POST['checkbox'])
           { $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `username`, `password`, `firstname`, `lastname`, `email`, `department`,`dt`) VALUES ( '$username', '$hash', '$firstname','$lastname','$email','$department',current_timestamp())";
            $result = mysqli_query($conn,$sql);
            if($result){
                $showalert = true;
                if ($showalert == true )
                {
                    echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Sucess!</strong>
                    <span class="block sm:inline">User added succesfully!</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    </span>
                    </div>';
                }
            }
            $sql = "DELETE FROM `userreqs` WHERE `userreqs`.`username` = '$username'";
    $result = mysqli_query($conn, $sql);
       
       
       
       
       
        }

    }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Login- Sample library</title>
</head>
<body class="bg-slate-400">
    <h1 class="text-center mt-44 text-4xl font-semibold">User Account Requests</h1>
    <br>
    <button class= "bg-blue-600 text-white p-2.5 flex mx-auto rounded mt-3" ><a href="../dashboard.php">Go back</a></button>
    <br>
<form method="post" action="user_request.php" class="w-1/2 mx-auto mb-44 shadow-2xl bg-slate-600 p-12 rounded-xl">
<table class="w-full text-sm text-left text-white ">
        <thead class="text-xs text-white uppercase bg-zinc-900">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Username
                </th>
                <th scope="col" class="py-3 px-6">
                    Password
                </th>
                <th scope="col" class="py-3 px-6">
                    Firstname
                </th>
                <th scope="col" class="py-3 px-6">
                    Lastname
                </th>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
            </tr>
        </thead>
        <?php
    include '../parts/_dbconnect.php';
     $sql = "SELECT * FROM userreqs";
        $result = mysqli_query($conn,$sql);
        $userreqs = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result)){ 
            $username = $row["username"];
            $password = $row["password"];
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $email = $row["email"];
            $department = $row["department"];
        echo '
        <tbody>
         <tr class="bg-zinc-700 border-2 border-slate-100">
                <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap"> <input type="checkbox" name="checkbox" class="mr-8">'.$username.'</th>
                <td class="py-4 px-6 text-white ">'.$password. '</td>
                <td class="py-4 px-6 text-white ">'.$firstname.' </td>
                <td class="py-4 px-6 text-white ">'.$lastname.'</td>
                <td class="py-4 px-6 text-white ">'.$email.'</td>
            </tr>
        </tbody>';}
        ?>
  <div class="relative z-0 mb-6 w-1/2 group">
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Allow</button>
</div>
</form>
</body>
</html>