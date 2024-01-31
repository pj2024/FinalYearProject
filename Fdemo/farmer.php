<?php
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
    <title>Farmer Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/farmer.css">
</head>
<body>
    
    <!-- template header in all sections -->
    <header class="header">

        <a href="#" class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tractor"><path d="M3 4h9l1 7"/><path d="M4 11V4"/><path d="M8 10V4"/><path d="M18 5c-.6 0-1 .4-1 1v5.6"/><path d="m10 11 11 .9c.6 0 .9.5.8 1.1l-.8 5h-1"/><circle cx="7" cy="15" r=".5"/><circle cx="7" cy="15" r="5"/><path d="M16 18h-5"/><circle cx="18" cy="18" r="2"/></svg>
            FarmEase.
        </a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="features.html">features</a>
            <a href="products_template.php">products</a>
            <a href="categories.html">categories</a>
            <a href="review.html">review</a>
            <a href="blogs.html">blogs</a>
        </nav>
    </header>

    <div class="farmer-section">   
        <img src="img/banner.jpg" alt="banner">
    <!-- hero section of farmer page -->
        <div class="msg-container-form">
            <h2><span>Thank You! <br> </span> For being here, if you want to sell your products on our website first of all <span>click on below <br> register button</span></h2>
            <div id="register-btn-box"><a id="register-btn" class="btn">Register Now</a></div>
        </div>
    </div>


    <div class="farm-product-form">
        <h1>Uplode Your farm Products</h1>
        
        <form action="farmer.php" method="post" enctype="multipart/form-data">
            <div class="all-inputs">
                    <!-- Farmer Name -->
                <div class="sub-ele">
                    <label for="farmername">Farmer Name:</label>
                    <input type="text" id="farmername" name="farmername" required>
                </div>

                <!-- Contact Number -->
                <div class="sub-ele">
                    <label for="contactno">Contact Number:</label>
                    <input type="tel" id="contactno" name="contactno" required>
                </div>

                <!-- Email -->
                <div class="sub-ele">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <!-- Password -->
                <div class="sub-ele">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <!-- Product Type -->
                <div class="sub-ele">
                    <label for="producttype">Product Type:</label>
                    <select id="producttype" name="producttype" required>
                        <option value="vegetables">Vegetables</option>
                        <option value="fruits">Fruits</option>
                        <option value="grains">Grains</option>
                    <!-- Add more options as needed -->
                    </select>
                </div>
            
                <!-- Product Name -->
                <div class="sub-ele">
                    <label for="productname">Product Name:</label>
                    <input type="text" id="productname" name="productname" required> 
                </div>

                <!-- Product Image -->
                <div class="sub-ele">
                    <label for="productimage">Product Image:</label>
                    <input type="file" id="productimage" name="productimage" accept="image/*" required>   
                </div>
            
                <!-- Product Description -->
                <div class="sub-ele">
                    <label for="productdescription">Product Description:</label>
                    <textarea id="productdescription" name="productdescription" rows="4" required></textarea>  
                </div>
            
                <!-- Product Price -->
                <div class="sub-ele">
                    <label for="productprice">Product Price:</label>
                    <input type="number" id="productprice" name="productprice" step="0.01" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="sub-btn">
                <input type="submit" name='submit' value="Submit">
            </div>

            <div class="cancel-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </div>
        </form>
    </div>

    <script src="js/farmer.js"></script>
</body>
</html>