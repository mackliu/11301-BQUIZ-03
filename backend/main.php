<?php
if (isset($_SESSION['login'])) {

?>
    <div class="ct a rb" style="position:relative; width:101.5%; left:-1%; padding:3px; top:-9px;">
        <a href="?do=tit">網站標題管理</a>|
        <a href="?do=go">動態文字管理</a>|
        <a href="?do=poster">預告片海報管理</a>|
        <a href="?do=movie">院線片管理</a>|
        <a href="?do=order">電影訂票管理</a>
    </div>
    <div class="rb tab" style="width:95%">
        <?php
        $do = $_GET['do'] ?? '';
        $file = "backend/{$do}.php";
        if (file_exists($file)) {
            include $file;
        } else {
            echo "<h2 class='ct'>請選擇所需功能</h2>";
        }
        ?>
    </div>

<?php
} else {
    if (isset($error)) {
        echo "<div style='color:red;text-align:center'>$error</div>";
    }
?>

    <form action="?" method='post' style="width:350px;margin:auto">
        <table>
            <tr>
                <td>帳號：</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>密碼：</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="登入">
            <input type="reset" value="清空">
        </div>
    </form>

<?php
}
?>