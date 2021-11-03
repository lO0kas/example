<div class="row">
<div class="wrapper w-25 p-3 col-xs-6 text-center">
    <nav class="sidebar">
        <div class="sidebar-header">
            <h3> <?php echo ' '.$_SESSION["name"]; ?></h3>
            <h5 style="color: gray;"> <?php echo ' '.$_SESSION["post"]; ?></h2>
        </div>
        <ul class="list-unstyled components">
            <?php
                $menu = array();
                $stranka = basename(dirname($_SERVER['SCRIPT_NAME']));
                $riadkysuboru = file('../../assets/menu2.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($riadkysuboru as $riadok){
                    list($k, $h) = explode('::', $riadok);
                    $menu[$k] = $h;
                }
                foreach ($menu as $odkaz => $hodnota){
                    echo '<a class="nav-item nav-link ' . ($odkaz == $stranka ? "active" : "") . ' " href="../' . $odkaz . '">' . $hodnota . '</a>';
                }
            ?>
        </ul>
    </nav>
</div>