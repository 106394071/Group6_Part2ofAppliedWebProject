<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="main-nav" aria-label="Main navigation">
    <ul>
        <li>
            <a href="index.php"
                <?php if ($current_page === "index.php") echo 'aria-current="page"'; ?>>
                Home
            </a>
        </li>
        <li>
            <a href="jobs.php"
                <?php if ($current_page === "jobs.php") echo 'aria-current="page"'; ?>>
                Jobs
            </a>
        </li>
        <li>
            <a href="apply.php"
                <?php if ($current_page === "apply.php") echo 'aria-current="page"'; ?>>
                Apply
            </a>
        </li>
        <li>
            <a href="about.php"
                <?php if ($current_page === "about.php") echo 'aria-current="page"'; ?>>
                About Us
            </a>
        </li>
    </ul>
</nav>