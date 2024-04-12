<?php
    function print_header(){?>
        <header>
        <div class="search">
            <h1>Sigma Sell</h1>
            <form action="mainpage.php" method="GET">
                <input type="text" name="q" >
                <button type="submit">Search</button>
            </form>
        </div>
    <header>
    <?php }
?>