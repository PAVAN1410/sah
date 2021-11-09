<?php
require('../checkActiveStatus.php')
?>
<header class='toplevel'>
    <div class="head">
        <h1>SHOP AT HOME</h1>
        <form action="searchExecution.php" method="post">
            <input type="search" name="searchQuery" class="search" required>
            <button class='searchIcon' type="submit"><i class="fa fa-search"></i></button>
        </form>
        <nav class="navbar">
            <ul>
                <li>
                    <a href="user_home_page.php">Home</a>
                </li>
                <li>
                    <a href="cart.php">Cart</a>
                </li>
                <li>
                    <a href="History.php">History</a>
                </li>
                <li>
                    <a href="../logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </div>
</header>