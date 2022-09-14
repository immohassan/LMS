<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search results</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php include 'parts/_navbar.php';?>
    <div class="overflow-x-auto mx-52 my-40 relative">
        <button class= "bg-blue-600 text-white p-2.5 rounded mb-3" ><a href="home.php">Go back</a></button>
        <table class="w-full text-sm text-left text-white ">
<thead class="text-xs text-white uppercase bg-zinc-900">
    <tr>
        <th scope="col" class="py-3 px-6">
            Book Name
        </th>
        <th scope="col" class="py-3 px-6">
            Author
        </th>
        <th scope="col" class="py-3 px-6">
            ISBN
        </th>
        <th scope="col" class="py-3 px-6">
            Price
        </th>
    </tr>
</thead>
<?php
if($_SERVER["REQUEST_METHOD"]=="GET"){
    include 'parts/_dbconnect.php';
$search = $_GET["search"];
$sql = "SELECT * FROM books Where Match (bookname,author) against ('$search')";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){ 
    $bookname = $row['bookname'];
    $author = $row['author'];
    $isbn = $row['ISBN'];
    $price = $row['price'];
echo '
<tbody>
 <tr class="bg-zinc-700 border-2 border-slate-100">
        <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap">'.$bookname.'</th>
        <td class="py-4 px-6 text-white ">'.$author. '</td>
        <td class="py-4 px-6 text-white ">'.$isbn.' </td>
        <td class="py-4 px-6 text-white ">'.$price.'</td>
    </tr>
    </tbody>
    </div>';}}
    ?>
    
</table>
    </body>
    </html>