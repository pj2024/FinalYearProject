<!-- <?php
require('connection.php');
session_start();
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products_template page</title>
    <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>  
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

            <?php
                 if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                    echo"
                    <div class='user'>
                        $_SESSION[username] - <a href='logout.php'>LOGOUT</a>
                    </div> 
                    ";
                }
            ?>

        <div class="icons">
            <div class="search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                <div class="search-input-form">
                    <form action="" class="search-form">
                        <input type="search" id="search-input-bar" placeholder="search here..">
                        <button id="search">search</button>
                    </form>
                </div>
            </div>

            <div class="cart-logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                <span>0</span>
            </div>
        </div>
    </header>

    <div id="contentTab">
        <!-- <div class="item">
            <div class="product-image">
                <img src="img/banana.png" alt="">
            </div>
            <div class="text-content">
                <div class="product-name">Banana</div>
                <div class="product-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos, eum?</div>
                <span id="price">$255</span>
            </div>
            <button class="add-to-cart">Add To Cart</button>
        </div> -->
    </div>

    
    <div class="cartTab">
        <h1>Shopping Cart</h1>
        <div class="listCart">
            <div class="item">
                <div class="image">
                    <img src="img/banana.png" alt="">
                </div>
                <div class="name">
                    Name
                </div>
                <div class="totalPrice">
                    $200
                </div>

                <div class="quantity">
                    <span class="minus"><</span>
                    <span>1</span>
                    <span class="plus">></span>
                </div>
            </div>
            
        </div>
        <div class="btns">
            <button class="close">CLOSE</button>
            <button class="checkOut">CHECK OUT</button>
        </div>
    </div>


    <script src="js/products_tmp.js" type="module"></script>
</body>
</html>