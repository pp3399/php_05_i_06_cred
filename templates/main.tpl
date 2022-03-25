<!DOCTYPE HTML>
<!--
        Alpha by HTML5 UP
        html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
    <head>
        <title>{$page_title|default:"Tytuł domyślny"}</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="{$page_description|default:"Opis domyślny"}">
            <link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
               <link rel="stylesheet" href="{$conf->app_url}/assets/css/style.css">

            <!-- Scripts -->
            <script src="{$conf->app_url}/js/jquery.min.js"></script>
            <script src="{$conf->app_url}/js/jquery.dropotron.min.js"></script>
            <script src="{$conf->app_url}/js/jquery.scrollex.min.js"></script>
            <script src="{$conf->app_url}/js/browser.min.js"></script>
            <script src="{$conf->app_url}/js/breakpoints.min.js"></script>
            <script src="{$conf->app_url}/js/util.js"></script>
            <script src="{$conf->app_url}/js/main.js"></script>

    </head>

    <body class="is-preload">
        <div id="page-wrapper">

            <!-- Main -->
            <section id="main" class="container">

                {block name=content} Domyślna treść zawartości .... {/block}

            </section>

            <!-- Footer -->
            <footer id="footer">

                <ul class="copyright">
                    <p>
                        {block name=footer} Domyślna treść stopki .... {/block}
                    </p>
                </ul>
            </footer>

        </div>


    </body>
</html>