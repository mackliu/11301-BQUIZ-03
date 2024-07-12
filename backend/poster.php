<div style='height:280px;'>
    <h4 class='ct'>預告片清單</h4>
    <form action="./api/edit_poster.php" method="post">
        <div style="display: flex;justify-content:space-between;">
            <div style="width:24.5%;padding:3px;text-align:center;background:#ccc;color:black">預告片海報</div>
            <div style="width:24.5%;padding:3px;text-align:center;background:#ccc;color:black">預告片片名</div>
            <div style="width:24.5%;padding:3px;text-align:center;background:#ccc;color:black">預告片排序</div>
            <div style="width:24.5%;padding:3px;text-align:center;background:#ccc;color:black">操作</div>
        </div>
        <div style="height:180px;overflow:auto">
            <div style="width:100%;height:60px;background:white"></div>

        </div>
        <div class='ct'>
            <input type="submit" value="編輯確定">
            <input type="reset" value="重置">
        </div>
    </form>
</div>
<hr>
<div style='height:150px'>
    <h4 class='ct'>新增預告片海報</h4>
    <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>預告片海報: <input type="file" name="poster"></td>
                <td>預告片片名: <input type="text" name="name"></td>
            </tr>
        </table>
        <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>

    </form>
</div>