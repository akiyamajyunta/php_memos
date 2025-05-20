<?  
function blue_bird_header($logout_link,$logout,$new_entry_link,$new_entry,$name){
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="header-container">
            <div class="header-logos">
                <h1 class="header-logo">Blue-Bird</h1>
                <div class="header-images">
                    <img class="blue-bird" src="../../../image/bluebird.png" alt="青い鳥">
                </div>
            </div>
            <ul class="nav">
                <li><a href="<?php echo $logout_link;?>"><?php echo $logout; ?></a></li>
                <li><a href=<?php echo $new_entry_link?>><?php echo $new_entry?></a></li>
                <li class="user-name"><a href="../../../Front/option.php"><?php echo $name?></a></li>
            </ul>
        </div>
    </header>
</body>

</html>
<style>
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    font-family: arial;
}

body {
    background: #ecf0f1;
    font-family: arial;
    margin: 0;
    color: #888
}

.banner {
    background: #00DAFC;
    line-height: 400px;
    text-align: center;
    color: #fff;
    font-size: 60px;
    height: 400px;
    width: 100%;
}



.header {
    height: 60px;
    background: #00DAFC;
    color: #fff;
    width: 100%;
}

.nav {
    position: absolute;
    right: 5%;
    list-style: none;
    float: left;
}

.nav li {
    display: inline-block;
}

.nav li a {
    display: inline-block;
    padding: 3px 15px;
    color: inherit;
    text-decoration: none;
}

.header-container {
    max-width: 1200px;
    padding: 0 15px;
    width: 100%;
}

.header-container:after {
    clear: both;
    content: "";
    display: table;
}


.header-logo {
    margin: 0;
    line-height: 50px;
    float: left;
}

.header-logs {
    position: absolute;
    left: 5%;
    list-style: none;
    float: left;
    display: flex;
    align-items: center;
    /* 垂直方向を揃える */
    gap: 10px;
    /* 要素間の余白 */



}

.header-images {
    position: absolute;
    width: 100px;
}

.blue-bird {
    position: absolute;
    z-index: 100;
    left: 200px;
    width: 50px;
    height: 50px;
}

.user-name {
    font-size: 20px;
}
</style>

<?  
}
?>
<?  ?>