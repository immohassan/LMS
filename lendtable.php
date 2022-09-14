
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin Panel- Sample library</title>
</head>
<body class="bg-slate-400">
    <h1 class="text-center mt-44 text-4xl font-semibold">My Books</h1>
    <br>
    <button class= "bg-blue-600 text-white p-2.5 flex mx-auto rounded mt-3" ><a href="home.php">Go back</a></button>
    <br>
<form method="post" action="lendings.php" class="w-1/2 mx-auto mb-44 shadow-2xl bg-slate-600 p-12 rounded-xl">
<table class="w-full text-sm text-left text-white ">
        <thead class="text-xs text-white uppercase bg-zinc-900">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Username
                </th>
                <th scope="col" class="py-3 px-6">
                    Bookname
                </th>
                <th scope="col" class="py-3 px-6">
                    Return date
                </th>
            </tr>
        </thead>
        <?php
        session_start();
    include 'parts/_dbconnect.php';
    $username = $_SESSION['username'];
    
     $sql = "SELECT * FROM lendings WHERE `username`= '$username'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){ 
            $username = $row["username"];
            $bookname = $row["bookname"];
            $returndate = $row["return_date"];
        echo '
        <tbody>
         <tr class="bg-zinc-700 border-2 border-slate-100">
                <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap">'.$username.'</th>
                <td class="py-4 px-6 text-white ">'.$bookname. '</td>
                <td class="py-4 px-6 text-white ">'.$returndate.' </td>
            </tr>
        </tbody>';}
        ?>
</form>
</body>
</html>