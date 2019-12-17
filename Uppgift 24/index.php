<html>
    <head>
        <link rel="stylesheet" href="./css/global.css">
        <link rel="stylesheet" href="./css/start.css">
        <script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/start.js"></script>
    </head>
    
    <body>
        <?php
            $navpage = "start";
            require "navbar.php";
        ?>

        <div class="hidden">
            <div class="server-status server-status-template">
                <div class="server-icon">
                    <img class="server-icon-img">
                </div>
                <div class="server-name"></div>    
                <div class="server-online"></div>
                <div class="server-map"></div>
                <table class="server-players">
                    <thead>
                        <tr>
                            <th>Players: <span class="player-table-count"></span></th>
                        </tr>
                    </thead>

                    <thead class="player-list-th">
                    </thead>
                </table>
            </div>
        </div>

        <div class="mx10px my5px">
            <div id="server-list">
                <h2>ARK Survival Evolved server status</h2>
                <div id="servers"></div>
            </div>
        </div>
    </body>
</html>