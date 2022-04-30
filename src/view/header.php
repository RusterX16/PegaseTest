<header>
    <h1>Title</h1>
    <div class="menu" id="horizontal-menu">
        <?php include("../resources/menu.html"); ?>
    </div>
    <div class="menu closed" id="admin-horizontal-menu" onclick="toggleAdminHorizontalMenu()">
        <?php include("../resources/admin_menu.html"); ?>
    </div>
    <div onclick="toggle()">
        <?php include("../resources/burger.html"); ?>
    </div>
</header>
<div class="menu closed" id="vertical-menu" class="closed">
    <?php include("../resources/menu.html"); ?>
</div>
<div class="menu closed" id="admin-vertical-menu">
    <?php include("../resources/admin_menu.html"); ?>
</div>
