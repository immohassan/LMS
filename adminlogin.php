<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'parts/_dbconnect.php';
$username = $_POST["username"];
$password = $_POST["password"];
    $sql = "SELECT * FROM adminuser where username = '$username' and password = '$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
         
            echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Sucess!</strong>
            <span class="block sm:inline">Account login successful.</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            </span>
            </div>';
            session_start();
            $_SESSION['loggin'] = true;
            header("location: dashboard.php"); 
    }
    else 
    {
    echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Error!</strong>
    <span class="block sm:inline">Invalid username or password.</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    </span>
    </div>';
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
    <title>Student Login- Sample library</title>
</head>
<body class="bg-cyan-800">
<section class="h-screen">
    <div class="px-6 h-full text-gray-800">
        <div
        class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6"
        >
        <div
        class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0"
        >
        <h1 class="text-center pt-12 text-white text-4xl font-semibold">Welcome to Admin portal</h1>
        <img
          src="img/draw2.webp"
          class="w-full"
          alt="Sample image"
        />
      </div>
      <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
        <form method="post" action="adminlogin.php">

       
          <!-- Email input -->
          <div class="mb-6">
            <input
              type="text"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="exampleFormControlInput2" name="username"
              placeholder="Username"
            />
          </div>

          <!-- Password input -->
          <div class="mb-6">
            <input
              type="password" name="password"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="exampleFormControlInput2"
              placeholder="Password"
            />
</div>

          <div class="text-center lg:text-left">
            <button
              type="submit"
              class="inline-block px-7 py-3 bg-blue-500 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            >
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</form>
</body>
</html>