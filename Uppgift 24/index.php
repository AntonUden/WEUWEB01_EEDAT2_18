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
                <div class="server-host">
                    IP: <span class="server-ip"></span>
                </div>
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
                <div>
                    <h1>ARK Survival Evolved server status</h1>
                    <p>
                        Status för mina <a href="https://store.steampowered.com/app/346110/ARK_Survival_Evolved/" target="_blank">ARK: Survival Evolved</a> servrar
                    </p>
                </div>
                <div id="servers"></div>
                <div id="update-button-div">
                    <button type="button" id="btn_update">Uppdatera</button>
                </div>
            </div>
        </div>
    </body>
</html>