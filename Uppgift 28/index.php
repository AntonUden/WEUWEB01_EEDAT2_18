<?php
require "./db.php";

$dbc = new DBConnection("uppgift28", "root", "root", "127.0.0.1");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="./bootstrap.min.css">
        <script src="./jquery-3.4.1.min.js"></script>
        <script src="./bootstrap.min.js"></script>
        <meta charset="UTF-8">

        <script>
            $(function() {
                $("#btn_submit").on("click", function() {
                    $(".user_input").removeClass("is-invalid");

                    let firstname = encodeURI($("#userFirstName").val());
                    let lastname = encodeURI($("#userLastName").val());
                    let email = encodeURI($("#userEmail").val());
                    let phonenumber = encodeURI($("#userPhoneNumber").val());

                    $.post("./submit.php", {firstname: firstname, lastname: lastname, email:email, phone_number: phonenumber}).done(function(data) {
                        console.log(data);
                        if(data.success) {
                            $(".user_input").removeClass("is-invalid");
                            $("#submitMessage").removeClass("text-danger");
                            $("#submitMessage").addClass("text-success");
                            $("#submitMessage").text("Tack för din intresseanmälan " + firstname + "! Vi återkommer till dig med mer information.");
                            $("#submitMessage").addClass("text-success");
                            $(".user_input").val("");
                        } else {
                            $("#submitMessage").addClass("text-danger");
                            $("#submitMessage").removeClass("text-success");
                            if(data.error == "ERR:INVALID_FIRSTNAME") {
                                $("#userFirstName").addClass("is-invalid");
                            } else if(data.error == "ERR:INVALID_LASTNAME") {
                                $("#userLastName").addClass("is-invalid");
                            } else if(data.error == "ERR:INVALID_EMAIL") {
                                $("#userEmail").addClass("is-invalid");
                            } else if(data.error == "ERR:INVALID_PHONE_NUMBER") {
                                $("#userPhoneNumber").addClass("is-invalid");
                            } else if(data.error == "ERR:ALREADY_ENTERED") {
                                $("#submitMessage").text("Du har redan anmält dig");
                            } else {
                                $("#submitMessage").text("Ett fel uppstod försök igen senare");
                            }
                        }
                    }).fail(function(data) {
                        $("#submitMessage").addClass("text-danger");
                        $("#submitMessage").removeClass("text-success");
                        $("#submitMessage").text("Ett fel uppstod försök igen senare");
                    });
                });
            });
        </script>
    </head>
    <body>
        <div class="mx-2 mt-2">
            <div class="container-inline">
                <div class="col">
                    <div class="row">
                        <img src="./backadal.png">
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <form>
                            <div class="form-group">
                                <label for="userFirstName">Förnamn</label>
                                <input type="text" id="userFirstName" class="form-control user_input" placeholder="Förnamn" maxlength="50">
                            </div>

                            <div class="form-group">
                                <label for="userLastName">Efternamn</label>
                                <input type="text" id="userLastName" class="form-control user_input" placeholder="Efternamn" maxlength="50">
                            </div>

                            <div class="form-group">
                                <label for="userEmail">Email</label>
                                <input type="text" id="userEmail" class="form-control user_input" placeholder="Email" maxlength="255">
                            </div>

                            <div class="form-group">
                                <label for="userPhoneNumber">Mobil</label>
                                <input type="text" id="userPhoneNumber" class="form-control user_input" maxlength="15" placeholder="Mobil">
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-primary user_input" id="btn_submit">Skicka</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        <span id="submitMessage"></span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
