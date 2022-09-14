<?php
session_start();
if(!isset($_SESSION['loggin']) || $_SESSION['loggin']!=true)
{
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sample Library</title>
</head>

<body>
    <?php include 'parts/_adminnavbar.php';?>

    <!-- searchbar-->
    

<div class="overflow-x-auto mx-52 my-40 relative">
        <form action="adminsearch.php" method="get">
            <div class="flex flex-row">
                <div class="relative ml-auto mb-3">
                    <input type="search" name="search" id="search" class="bg-slate-300 rounded-lg p-2.5 w-96 text-white"
                        placeholder="Search books or author ">
                    <button type="submit"
                        class=" py-2.5 px-3.5 text-sm font-medium text-white bg-blue-700 border-2 border-blue-700 rounded-lg ">
                        Search
                    </button>
                </div>
        </form>
    </div>

    </form>


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
        include 'parts/_dbconnect.php';
        $sql = "SELECT * FROM books";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){ 
            $bookname = $row['bookname'];
            $author = $row['author'];
            $isbn = $row['ISBN'];
            $price = $row['price'];
       echo '<tbody>
         <tr class="bg-zinc-700 border-2 border-slate-100">
                <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap">'.$bookname.'</th>
                <td class="py-4 px-6 text-white ">'.$author. '</td>
                <td class="py-4 px-6 text-white ">'.$isbn.' </td>
                <td class="py-4 px-6 text-white ">'.$price.'</td>
            </tr>
            </tbody>';}
            ?>
    </table>
    </div>

    <?php include 'parts/footer.php';?>
</body>

</html>