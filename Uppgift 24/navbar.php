<?php
    if(!isset($navpage)) {
        $navpage = null;
    }
?>

<ul class="navbar">
    <li class="nav-item">
        <a class="nav-link <?php if($navpage == "start") { echo "nav-active"; } ?>" href="/Uppgift%2024/">Start</a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php if($navpage == "projects") { echo "nav-active"; } ?>" href="/Uppgift%2024/projects.php">Projekt</a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php if($navpage == "links") { echo "nav-active"; } ?>" href="/Uppgift%2024/links.php">Länkar</a>
    </li>
</ul>