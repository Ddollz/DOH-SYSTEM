<!-- SideBar -->
<div class="side-bar d-flex flex-column justify-content-center align-items-center">
    <ul class="side-bar-nav">
        <li class="nav-item mb-5 <?php echo (basename($_SERVER['PHP_SELF'], ".php") == "system-ocr") ? "active" : "" ?>">
            <a href="system-ocr.php" class="nav-link">
                <i class='bx bx-file'></i>
            </a>
            <span class="tooltiptext">Document Parser</span>
        </li>
        <li class="nav-item mb-5 <?php echo (basename($_SERVER['PHP_SELF'], ".php") == "system-discussion") ? "active" : "" ?>">
            <a href="system-discussion.php" class="nav-link">
                <i class='bx bx-book-content'></i>
            </a>
            <span class="tooltiptext">Discussion</span>
        </li>
        <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF'], ".php") == "system-user") ? "active" : "" ?>">
            <a href="system-user.php" class="nav-link">
                <i class='bx bx-data'></i>
            </a>
            <span class="tooltiptext">User Management</span>
        </li>
    </ul>
</div>
<!-- SideBar -->