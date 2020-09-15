<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema Cred K</title>
    </head>
    <body>
        Maguila
        <div id="app">
            <router-link to="/dashboard"></router-link>

            <div class="content container">
                <router-view></router-view>
            </div>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>