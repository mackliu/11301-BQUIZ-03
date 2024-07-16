<style>
    .movie-data,
    .movie-intro {
        width: 600px;
        margin: auto;
        display: flex;
    }

    .movie-data>div:nth-child(1),
    .movie-intro>div:nth-child(1) {
        width: 100px;
    }

    .movie-data>div:nth-child(2),
    .movie-intro>div:nth-child(2) {
        width: 500px;
    }

    .movie-info label {
        display: inline-block;
        width: 100px;
        text-align-last: justify;
    }

    .movie-info div {
        margin: 5px 0;
    }
</style>
<h3 class="ct">編輯院線片</h3>
<?php $row = $Movie->find($_GET['id']); ?>
<form action="./api/save_movie.php" method="post" enctype="multipart/form-data">
    <div class='movie-data'>
        <div>影片資料</div>
        <div class="movie-info">
            <div>
                <label for="">片名</label>：
                <input type="text" name="name" value="<?= $row['name']; ?>">
            </div>
            <div>
                <label for="">分級</label>：
                <select name="level">
                    <option value="1" <?= ($row['level'] == 1) ? 'selected' : ''; ?>>普遍級</option>
                    <option value="2" <?= ($row['level'] == 2) ? 'selected' : ''; ?>>輔導級</option>
                    <option value="3" <?= ($row['level'] == 3) ? 'selected' : ''; ?>>保護級</option>
                    <option value="4" <?= ($row['level'] == 4) ? 'selected' : ''; ?>>限制級</option>
                </select>
            </div>
            <div>
                <label for="">片長</label>：
                <input type="text" name="length" value="<?= $row['length']; ?>">
            </div>
            <div>
                <label for="">上映日期</label>：
                <?php
                $year = explode('-', $row['ondate'])[0];
                $month = explode('-', $row['ondate'])[1];
                $day = explode('-', $row['ondate'])[2];

                ?>
                <select name="year">
                    <option value="2024" <?= ($year == 2024) ? 'selected' : ''; ?>>2024</option>
                    <option value="2025" <?= ($year == 2025) ? 'selected' : ''; ?>>2025</option>
                </select>年
                <select name="month">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        $selected = ($i == $month) ? "selected" : "";
                        echo "<option value='$i' $selected>";
                        echo $i;
                        echo "</option>";
                    }
                    ?>
                </select>月
                <select name="day">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        $selected = ($i == $day) ? "selected" : "";
                        echo "<option value='$i' $selected>";
                        echo $i;
                        echo "</option>";
                    }

                    ?>
                </select>日
            </div>
            <div>
                <label for="">發行商</label>：
                <input type="text" name="publish" value="<?= $row['publish']; ?>">
            </div>
            <div>
                <label for="">導演</label>：
                <input type="text" name="director" value="<?= $row['director']; ?>">
            </div>
            <div>
                <label for="">預告影片</label>：
                <input type="file" name="trailer" value="">
            </div>
            <div>
                <label for="">電影海報</label>：
                <input type="file" name="poster" value="">
            </div>
        </div>
    </div>
    <div class='movie-intro'>
        <div>劇情簡介</div>
        <div>
            <textarea name="intro" value="" style="width:99%;height:120px"><?= $row['intro']; ?></textarea>
        </div>
    </div>
    <div class="ct">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <input type="hidden" name="sh" value="<?= $row['sh']; ?>">
        <input type="hidden" name="rank" value="<?= $row['rank']; ?>">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
</form>