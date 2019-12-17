$(function() {
    $.getJSON('server_status.php', function(data) {
        for(let i = 0; i < data.length; i++) {
            let server = data[i];
            console.log(server);

            let server_status = $(".server-status-template").clone();
            server_status.removeClass("server-status-template");
            server_status.find(".server-icon-img").attr("src", "./img/" + server.icon);
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