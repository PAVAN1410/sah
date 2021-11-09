<?php
require('../checkActiveStatus.php')
?>

<div class="header">
    <div class="head">
        <h1>SHOP AT HOME</h1>
        <form action="searchExecution.php" class="h_form" method="post">
            <!-- <input type="search" name="searchQuery" class="search" required> -->
            <input type="search" name="searchQuery" id="" class="search" required>
            <button type="submit"><i class="fa fa-search "></i></button>
        </form>
        <nav>
            <ul>
                <li>
                    <a href="retailer_home_page.php">Add Item</a>
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
</div>