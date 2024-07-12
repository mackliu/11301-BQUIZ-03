<style>
    .row {
        background-color: white;
        height: 80px;
        padding: 2px;
        display: flex;
        align-items: center;
        margin: 2px 0;
    }

    .row>div {
        text-align: center;
        width: 25%;
        color: black;
    }

    .row img {
        height: 80px;
    }
</style>
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
            <?php
            $rows = $Poster->all(" order by rank");
            foreach ($rows as $row) {
            ?>
                <div class="row">
                    <div>
                        <img src="./images/<?= $row['img']; ?>" alt="">
                    </div>
                    <div>
                        <input type="text" name="name" value="<?= $row['name']; ?>">
                    </div>
                    <div>
                        <button type="button">往上</button>
                        <button type="button">往下</button>
                    </div>
                    <div>
                        <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>顯示
                        <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">刪除
                        <select name="ani[]">
                            <option value="1">淡入淡出</option>
                            <option value="2">縮放</option>
                            <option value="3">滑入滑出</option>
                        </select>
                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                    </div>
                </div>
            <?php
            }
            ?>
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