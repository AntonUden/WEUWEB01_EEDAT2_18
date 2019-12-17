<html>
    <head>
        <link rel="stylesheet" href="./css/global.css">
        <link rel="stylesheet" href="./css/links.css">
    </head>
    
    <body>
        <?php
            $navpage = "links";
            require "navbar.php";
        ?>

        <div class="mx10px my5px">
            <div>
                <h1>Länkar</h1>
                <p>
                    Här finns länkar till några olika användbara program som kan användas för att göra hemsidor
                </p>
            </div>

            <div class="link-list">
                <div class="link-box">
                    <div class="link-icon">
                        <img class="link-img" src="./img/uwamp.jpg" alt="UwAmp">
                    </div>
                    <div class="link-info">
                        <div class="link-title">
                            <a href="https://www.uwamp.com/en/">
                                UwAmp
                            </a>
                        </div>
                        <div class="link-description">
                            wamp web server
                        </div>
                    </div>
                </div>

                <div class="link-box">
                    <div class="link-icon">
                        <img class="link-img" src="./img/PuTTY_icon_128px.png" alt="PuTTY">
                    </div>
                    <div class="link-info">
                        <div class="link-title">
                            <a href="https://www.putty.org/">
                                PuTTY
                            </a>
                        </div>
                        <div class="link-description">
                            verktyg för att bland annat fjärrstyra serverar via ssh och telnet
                        </div>
                    </div>
                </div>

                <div class="link-box">
                    <div class="link-icon">
                        <img class="link-img" src="./img/Visual_Studio_Code_0.10.1_icon.png" alt="Visual Studio Code">
                    </div>
                    <div class="link-info">
                        <div class="link-title">
                            <a href="https://code.visualstudio.com/">
                                Visual Studio Code
                            </a>
                        </div>
                        <div class="link-description">
                            editor med autocomplete som stödjer många olika programmeringsspråk
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>