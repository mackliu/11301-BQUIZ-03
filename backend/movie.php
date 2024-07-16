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
    $movies = $Movie->all(" order by rank");
    foreach ($movies as $movie) {
    ?>
        <div class='movie'>
            <div class="img">
                <img src="./images/<?= $movie['poster']; ?>" style="width:70px;height:90px">
            </div>
            <div class="level">
                分級:<img src="./icon/03C0<?= $movie['level']; ?>.png" style="width:30px;">
            </div>
            <div class="info">
                <div class="base">
                    <div>片名：<?= $movie['name']; ?></div>
                    <div>片長：<?= $movie['length']; ?>分鐘</div>
                    <div>上映時間：<?= $movie['ondate']; ?></div>
                </div>
                <div class="btns">
                    <button>顯示</button>
                    <button>往上</button>
                    <button>往下</button>
                    <button onclick="location.href='?do=edit_movie&id=<?= $movie['id']; ?>'">編輯電影</button>
                    <button onclick="del('Movie',<?= $movie['id']; ?>)">刪除電影</button>
                </div>
                <div class="intro">
                    劇情介紹：<?= $movie['intro']; ?>
                </div>
            </div>
        </div>
    <?php
    }

    ?>
</div>