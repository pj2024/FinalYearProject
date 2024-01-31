<?php

// // Now you can process the data as needed (e.g., save to a database, send an email, etc.)
    
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "farm_products";

// // Example: Save to a database (You need to set up your database connection)
// $conn = mysqli_connect($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

require('connection.php');

if (isset($_POST['submit'])) {
    // Collect form data
    $farmername = $_POST["farmername"];
    $contactno = $_POST["contactno"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $producttype = $_POST["producttype"];
    $productname = $_POST["productname"];
    $productdescription = $_POST["productdescription"];
    $productprice = $_POST["productprice"];

    if($_FILES["productimage"]["error"] === 4){
        echo "<script> alert('Image Does Not Exist.'); </script>";
        
    }else{
            $fileName = $_FILES["productimage"]["name"];
            $fileSize = $_FILES["productimage"]["size"];
            $tmpName = $_FILES["productimage"]["tmp_name"];

            // $validImageExtension = ['jpg', 'jpeg', 'png'];
            // $imageExtension = explode('.', $fileName);
            // $imageExtension = strtolower(end($imageExtension));

            // if(!in_array($imageExtension, $validImageExtension)){
            //     echo "<script> alert('Invalid Image extention.'); </script>";  
            // }else if($fileSize > 1000000){
            //     echo "<script> alert('Image Size is too large.'); </script>";  
            // }else{
            //     $newImageName = uniqid();
            //     $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, 'uplode/'. $fileName);
            // $query = "INSERT INTO tb_uplode VALUES('', '$name', '$newImageName')";
            $query = "INSERT INTO products_info (farmername, contactno, email, password, producttype, productname, productdescription, productprice, productimage)
            VALUES ('$farmername', '$contactno', '$email', '$password', '$producttype', '$productname', '$productdescription', $productprice, '$fileName');
            ";
            
            $result = mysqli_query($conn, $query);

            if($result){
                echo
                    "<script>
                    alert('New record created successfully.');
                    //document.location.href = 'data.php';
                    </script>"; 
            }else{
                echo
                "<script>
                alert('data not Added.');
                //document.location.href = 'data.php';
                </script>";  
            }

            // if ($conn->query($query) === TRUE) {
            //     echo
            //     "<script>
            //     alert('New record created successfully.');
            //     document.location.href = 'data.php';
            //     </script>"; 
            // } else {
            //     echo "Error: " . $query . "<br>" . $conn->error;
            // }
        
        }
}


    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Product Form</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

<h2>Farm Product Form</h2>

<form action="form.php" method="post" enctype="multipart/form-data">
    <!-- Farmer Name -->
    <label for="farmername">Farmer Name:</label>
    <input type="text" id="farmername" name="farmername" required>

    <br>

    <!-- Contact Number -->
    <label for="contactno">Contact Number:</label>
    <input type="tel" id="contactno" name="contactno" required>

    <br>

    <!-- Email -->
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <br>

    <!-- Password -->
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <br>

    <!-- Product Type -->
    <label for="producttype">Product Type:</label>
    <select id="producttype" name="producttype" required>
        <option value="vegetables">Vegetables</option>
        <option value="fruits">Fruits</option>
        <option value="grains">Grains</option>
        <!-- Add more options as needed -->
    </select>

    <br>

    <!-- Product Name -->
    <label for="productname">Product Name:</label>
    <input type="text" id="productname" name="productname" required>

    <br>

    <!-- Product Image -->
    <label for="productimage">Product Image:</label>
    <input type="file" id="productimage" name="productimage" accept="image/*" required>

    <br>

    <!-- Product Description -->
    <label for="productdescription">Product Description:</label>
    <textarea id="productdescription" name="productdescription" rows="4" required></textarea>

    <br>

    <!-- Product Price -->
    <label for="productprice">Product Price:</label>
    <input type="number" id="productprice" name="productprice" step="0.01" required>

    <br>

    <!-- Submit Button -->
    <input type="submit" name='submit' value="Submit">
</form>

</body>
</html>
