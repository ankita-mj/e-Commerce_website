<?php
  session_start();
?>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky" style="border:0px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php"><img src="assets/images/logo1.png" height="100px"/></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="index.php#men">Men</a></li>
                            <li class="scroll-to-section"><a href="index.php#women">Women</a></li>
                            <li class="scroll-to-section"><a href="index.php#kids">Kid</a></li>
                            <li class="submenu">
                                <a>Pages</a>
                                <ul>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="products.php">Products</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    
                                </ul>
                            </li>
                            <li class="submenu">
                                <a>Account</a>
                                <ul>
                                    <li><a href="account.php">My Account</a></li>
                                    <li><a href="cart.php">Cart</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="index.php#explore">Explore</a></li>
                            <li class="submenu">
                                <a>More</a>
                                <ul>
                                    <li><a href="register.php">Create a New Account</a></li>
                                    <li><a href="login.php">Login</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                    <?php
                                        if(isset($_SESSION['password']) && $_SESSION['password']=="1138dd6fdda5d617dfe218898ee02077"){
                                            // echo $_SESSION['password'];
                                            echo "<li><a href='admin.php'>Admin Page</a></li>";
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="login.php">Login</a></li>
                            <li>
                                <a href="cart.php">
                                    <img src="assets/images/cart.png" height="20px" width="20px"/>
                                    <?php
                                    if(isset($_SESSION['id'])){ 
                                       $conn5 = mysqli_connect("localhost","root","","shop_db");
                                       $sql5 = "SELECT sum(quantity) from user_account where user_id = {$_SESSION['id']}";
                                       $result5 = mysqli_query($conn5, $sql5);
                                       $row5 = mysqli_fetch_assoc($result5);
                                       echo "&nbsp; {$row5['sum(quantity)']}";
                                    }else{
                                        echo "&nbsp; 0";

                                    }
                                    ?>
                                </a>
                            </li>
                        </ul>        
                        <!-- <a class='menu-trigger'>
                            <span>Menu</span>
                        </a> -->

                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->