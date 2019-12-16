<html>
    <head>
        <link rel="stylesheet" href="./global.css">
        <script src="./jquery-3.4.1.min.js"></script>
        <script>
            $(function() {
                $.getJSON('server_status.php', function(data) {
                    for(let i = 0; i < data.length; i++) {
                        let server = data[i];
                        console.log(server);

                        let server_status = $(".server-status-template").clone();
                        server_status.removeClass("server-status-template");
                        server_status.find(".server-name").text(server.name);
                        server_status.find(".server-online").text(server.online ? "Online" : "Offline");
                        
                        if(server.online) {
                            server_status.find(".server-map").text("Map: " + server.info.Map);
                            server_status.find(".player-table-count").text(server.players.length);
                            for(let j = 0; j < server.players.length; j++) {
                                let item = $("<tr><td></td></tr>");
                                item.find("td").text(server.players[j].Name);
                                server_status.find(".player-list-th").append(item);
                            }
                        } else {
                            server_status.remove(".server-players");
                            server_status.remove(".server-map");
                        }
                        
                        $("#servers").append(server_status);
                    }
                });
            });
        </script>

        <style>
            .hidden {
                display: none !important;
            }

            #servers {
                border: 1px solid #000000;
            }

            .server-status {
                margin-left: 5px;
                padding-right: 5px;
                display: inline-block;
                border-right: 1px solid #000000;
            }

            table {
                border-collapse: collapse;
            }

            table, th, td {
                border: 1px solid black;
            }

            .server-online {
                display: inline-block;
            }

            .server-map {
                display: inline-block;
            }
        </style>
    </head>
    
    <body>
        <?php
            $navpage = "start";
            require "navbar.php";
        ?>

        <div class="hidden">
            <div class="server-status server-status-template">
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