<?php
    include 'parts/_dbconnect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
 $username = $_POST["username"];
 $password = $_POST["password"];
 $cpassword = $_POST["cpassword"];
 $firstname = $_POST["firstname"];
 $lastname = $_POST["lastname"];
 $email = $_POST["email"];
 $department = $_POST["department"];

 $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
            echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Error!</strong>
          <span class="block sm:inline">Username already exists.</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          </span>
        </div>';
    }
    else{
if($password==$cpassword){
    $sql = "INSERT INTO `userreqs` ( `username`, `password`, `firstname`, `lastname`, `email`, `department`,`dt`) VALUES ( '$username', '$password', '$firstname','$lastname','$email','$department', current_timestamp())";
    $result = mysqli_query($conn,$sql);
    if($result){
        $showalert = true;
        if ($showalert == true )
        {
            echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Data submitted successfully!</strong>
            <span class="block sm:inline">You can Login once the admin approves your account. You will get an Email once your account is approved.</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            </span>
            </div>';
            $location =true;
        }
    }
}
else{
    echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Error!</strong>
    <span class="block sm:inline">Passwords do not matches.</span>
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
    <title>Student Signup- Sample library</title>
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
        <h1 class="text-center pt-12 text-white text-4xl font-semibold">Welcome to Library portal</h1>
        <img
          src="img/draw2.webp"
          class="w-full"
          alt="Sample image"
        />
      </div>
      <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
        <form class="mt-20" method="post" action="signup.php">

       
          <!-- Email input -->
          <div class="mb-5">
            <input
              type="text"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="exampleFormControlInput2" name="username"
              placeholder="Username"
            />
          </div>

          <!-- Password input -->
          <div class="mb-5">
            <input
              type="password" name="password"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="exampleFormControlInput2"
              placeholder="Password"
            />
</div>
<div class="mb-5">
            <input
              type="password"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="exampleFormControlInput2" name="cpassword"
              placeholder="Confirm Password"
            />
          </div>
          <div class="flex gap-2">
          <div class="mb-5">
            <input
              type="text"
              class="form-control  w-80 flex flex-row px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="exampleFormControlInput2" name="firstname"
              placeholder="First Name"
            />
          </div>
          <div class="mb-5">
            <input
              type="text"
              class="form-control w-80 px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="exampleFormControlInput2" name="lastname"
              placeholder="Last Name"
            />
          </div>
          </div>
          <div class="mb-5">
            <input
              type="email"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="exampleFormControlInput2" name="email"
              placeholder="Email"
            />
          </div>
          <div class="mb-5">
            <input
              type="text"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="exampleFormControlInput2" name="department"
              placeholder="Department"
            />
          </div>

          <div class="text-center lg:text-left">
            <button
              type="submit"
              class="inline-block px-7 py-3 bg-blue-500 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            >
              Sign in
            </button>
            <p class="text-sm font-semibold mt-2 pt-1 mb-0">
              Already have an account?
              <a
                href="index.php"
                class="text-white hover:text-white focus:text-white transition duration-200 ease-in-out"
                >Login</a
              >
            </p>
            <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                Login to dashboard?
              <a
                href="adminlogin.php"
                class="text-white hover:text-white focus:text-white transition duration-200 ease-in-out"
                >Admin Dashboard</a
              ></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</form>
</body>
</html>