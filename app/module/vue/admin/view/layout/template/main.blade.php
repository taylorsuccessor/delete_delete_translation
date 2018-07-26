
    <html>
    <head>
        <title>my vue template</title>
        <meta name="csrf-token" >
    </head>
    <body>
    <div >
        @ yield('content')
        here blade content yield

    </div>
    <h2>This is from main template page</h2>
    <div id="app">
        <router-link to="/foo">Go to foo</router-link>
        <router-link to="/bar">---->bar</router-link>
        <router-link to="/index">---->index</router-link>
        <router-view></router-view>
        here app div @{{ message }} pody
    </div>

    <footer>
        <div >this is main template footer</div>
    </footer>
    <script src="/js/app.js"></script>
    </body>
    </html>