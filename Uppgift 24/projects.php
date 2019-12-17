<html>
    <head>
        <link rel="stylesheet" href="./css/global.css">
        <link rel="stylesheet" href="./css/projects.css">
        <title>Projekt</title>
    </head>
    
    <body>
        <?php
            $navpage = "projects";
            require "navbar.php";

            $cInit = curl_init();
            curl_setopt($cInit, CURLOPT_URL, "https://api.github.com/users/AntonUden/repos?per_page=100");
            curl_setopt($cInit, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($cInit, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($cInit, CURLOPT_SSL_VERIFYPEER, false);
                
            $repos = json_decode(curl_exec($cInit));
        ?>

        <div class="my5px">
            <div class="mx5px">
                <h1>Projekt</h1>
                <p>
                    Länkar till alla mina projekt på <a href="https://github.com/AntonUden">github</a>
                </p>
            </div>
            <table id="project-table">
                <thead>
                    <tr>
                        <th>Namn</th>
                        <th>Beskrivning</th>
                        <th>Språk</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($repos as $repo): ?>
                    <tr>
                        <td>
                            <a href="<?php echo $repo->html_url; ?>" class="repo-link">
                                <?php echo $repo->name; ?>
                            </a>
                        </td>

                        <td>
                            <?php echo $repo->description; ?>
                        </td>

                        <td>
                            <?php echo $repo->language; ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </body>
</html>