<?php
session_start();
if(!isset($_SESSION['loggin']) || $_SESSION['loggin']!=true)
{
    header("location: index.php");
    exit;
}
        include 'parts/_dbconnect.php';
        $sql = "SELECT * FROM books";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result)){ 
            $bookname = $row['bookname'];
            $author = $row['author'];
            $isbn = $row['ISBN'];
            $price = $row['price'];
        }
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn,$sql);
        $user = mysqli_num_rows($result);

        $sql = "SELECT * FROM userreqs";
        $result = mysqli_query($conn,$sql);
        $userreqs = mysqli_num_rows($result);

        $sql = "SELECT * FROM adminuser";
        $result = mysqli_query($conn,$sql);
        $admin = mysqli_num_rows($result);

        $sql = "SELECT * FROM lendings";
        $result = mysqli_query($conn,$sql);
        $lend = mysqli_num_rows($result);
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body class="bg-slate-300">
<!-- sidebar -->
<?php include 'parts/_adminnavbar.php';?>
<div class="flex gap-16">
<aside class="w-64" aria-label="Sidebar">
   <div class="overflow-y-auto py-5 px-3 bg-gray-50  dark:bg-gray-900">
      <a class="flex items-center pl-2.5 mb-5">
         <img src="img/logo.svg" class="mr-3 h-6 sm:h-7" alt="Flowbite Logo" />
         <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Dashboard</span>
      </a>
      <ul class="space-y-2">
         <li>
            <a href="adminfunctions/insert.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
               <span class="ml-3">Insert Book</span>
            </a>
         </li>
         <li>
            <a href="adminfunctions/update.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Update Book</span>
            </a>
         </li>
         <li>
            <a href="adminfunctions/delete.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Delete Book</span>
            </a>
         </li>
         <li>
            <a href="adminfunctions/user_request.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">User Account Requests</span>
            </a>
         </li>
         <li>
            <a href="adminfunctions/adduser.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Add User Accounts</span>
            </a>
         </li>
          <li>
            <a href="adminfunctions/addadminuser.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Add Admin Users</span>
            </a>
         </li>
         <li>
            <a href="adminfunctions/lendings.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
               <span class="ml-3">Update lendings</span>
            </a>
         </li>
      </ul>
   </div>
</aside>
<!-- content -->
<div class="flex flex-row flex-wrap pt-7">
  
<a href="adminhome.php" class="block p-6 mx-3 rounded-lg border border-teal-800 hover:scale-110 shadow-md w-96 h-56 hover:bg-gray-100 bg-teal-800 dark:border-teal-800  dark:hover:bg-teal-900">
    <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Total Books Listed</h5>
    <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-black"><?php echo $num;?></h5>
    <p class="text-white pt-16">See All</p>
</a>

<a href="users.php" class="block p-6 mx-3  rounded-lg border border-teal-800  hover:scale-110 shadow-md w-96 h-56  hover:bg-gray-100 bg-teal-800 dark:border-teal-800  dark:hover:bg-teal-900 ">
    <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Total Users</h5>
    <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-black"><?php echo $user;?></h5>
    <p class="text-white pt-16">See All</p>
</a>

<a href="adminfunctions/user_request.php" class="block p-6 mx-3  rounded-lg hover:scale-110 border border-teal-800  shadow-md w-96  h-56 hover:bg-gray-100 bg-teal-800 dark:border-teal-800  dark:hover:bg-teal-900 ">
    <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Pending User Requests</h5>
    <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-black"><?php echo $userreqs;?></h5>
    <p class="text-white pt-16">See All</p>
</a>
<a href="adminfunctions/adminusers.php" class="p-6 mx-3 mt-7 rounded-lg hover:scale-110 border border-teal-800  shadow-md w-96  h-56 hover:bg-gray-100 bg-teal-800 dark:border-teal-800  dark:hover:bg-teal-900 ">
    <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Total Admins</h5>
    <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-black"><?php echo $admin;?></h5>
    <p class="text-white pt-16">See All</p>
</a>
<a href="adminfunctions/lendings.php" class="p-6 mx-3 mt-7 rounded-lg hover:scale-110 border border-teal-800  shadow-md w-96  h-56 hover:bg-gray-100 bg-teal-800 dark:border-teal-800  dark:hover:bg-teal-900 ">
    <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Total Books Lent </h5>
    <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-black"><?php echo $lend;?></h5>
    <p class="text-white pt-16">See All</p>
</a>

</div>
</div>
</body>
</html>