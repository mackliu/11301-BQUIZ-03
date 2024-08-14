<style>
    .movie {
        background-color: white;
        margin: 3px;
        color: black;
        display: flex;
        padding: 3px;
        align-items: center;
    }

    .movie .img {
        width: 20%;
    }

    .movie .level {
        width: 20%;
    }

    .movie .info {
        width: 80%;
    }

    .movie .base {
        display: flex;
        justify-content: space-between;
    }

    .movie .info .btns {
        text-align: right;
    }

    .movie .base div {
        width: 33%;
    }
</style>

<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<div style="width:100%;height:400px;overflow:auto;">
    <?php
    $rows = $Movie->all(" order by rank");
    foreach ($rows as $idx => $row) {
        $prev = ($idx != 0) ? $rows[$idx - 1]['id'] : $row['id'];
        $next = ($idx != (count($rows) - 1)) ? $rows[$idx + 1]['id'] : $row['id'];
    ?>
        <div class='movie'>
            <div class="img">
                <img src="./images/<?= $row['poster']; ?>" style="width:70px;height:90px">
            </div>
            <div class="level">
                分級:<img src="./icon/03C0<?= $row['level']; ?>.png" style="width:30px;">
            </div>
            <div class="info">
                <div class="base">
                    <div>片名：<?= $row['name']; ?></div>
                    <div>片長：<?= $row['length']; ?>分鐘</div>
                    <div>上映時間：<?= $row['ondate']; ?></div>
                </div>
                <div class="btns">
                    <button class='show' data-id="<?= $row['id']; ?>"><?= ($row['sh'] == 1) ? '顯示' : '隱蔵'; ?></button>
                    <button class='sw' data-sw='<?= $row['id']; ?>-<?= $prev; ?>'>往上</button>
                    <button class='sw' data-sw='<?= $row['id']; ?>-<?= $next; ?>'>往下</button>
                    <button onclick=" location.href='?do=edit_movie&id=<?= $row['id']; ?>'">編輯電影</button>
                    <button onclick=" del('Movie',<?= $row['id']; ?>)">刪除電影</button>
                </div>
                <div class="intro">
                    劇情介紹：<?= $row['intro']; ?>
                </div>
            </div>
        </div>
    <?php
    }

    ?>
</div>

<script>
    $(".sw").on("click", function() {
        //console.log($(this).data('sw'))
        $.post("./api/sw.php", {
            table: 'Movie',
            sw: $(this).data('sw')
        }, (res) => {
            //console.log(res)
            location.reload();
        })
    })

    $(".show").on("click", function() {
        $.post("./api/show.php", {
            id: $(this).data("id")
        }, () => {
            //location.reload();
            console.log($(this).text())
            switch ($(this).text()) {
                case '顯示':
                    $(this).text('隱藏')
                    break;
                case '隱藏':
                    $(this).text('顯示')
                    break;
            }
        })
    })

    function del(table, id) {
        $.post("./api/del.php", {
            table,
            id
        }, () => {
            location.reload();
        })
    }
</script>