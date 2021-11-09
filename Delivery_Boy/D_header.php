<?php
require('../checkActiveStatus.php')
?>

<header class='toplevel'>
    <div class="head">
        <h1><a href="delivery_home_page.php" style="text-decoration:none ;color:black"><i style="color:black; display: inline-block;font-size:33px;" class="fas fa-home home"></i>SHOP AT HOME</a></h1>
        <form action="searchExecution.php" method="post">
            <input type="search" name="searchQuery" class="search" required>
            <button class='searchIcon' type="submit"><i class="fa fa-search"></i></button>
        </form>
        <nav class="navbar">
            <ul>
                <li>
                    <a href="Accepted.php">Accepted Orders</a>
                </li>
                <li>
                    <a href="Delivered_products.php">Delivered Orders</a>
                </li>
                <li>
                    <a href="../logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </div>
</header>