<header>
    <h1>Title</h1>
    <div class="menu" id="horizontal-menu">
        <?php include("menu.html"); ?>
    </div>
    <div class="menu closed" id="admin-horizontal-menu">
        <?php include("admin_menu.html"); ?>
    </div>
    <div onclick="toggle()">
        <?php include("burger.html"); ?>
    </div>
</header>
<div class="menu closed" id="vertical-menu" class="closed">
    <?php include("menu.html"); ?>
</div>
<div class="menu closed" id="admin-vertical-menu">
    <?php include("admin_menu.html"); ?>
</div>
