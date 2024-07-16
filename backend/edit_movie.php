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
                    <option value="01" <?= ($month == '01') ? 'selected' : ''; ?>>01</option>
                    <option value="02" <?= ($month == '02') ? 'selected' : ''; ?>>02</option>
                    <option value="03" <?= ($month == '03') ? 'selected' : ''; ?>>03</option>
                    <option value="04" <?= ($month == '04') ? 'selected' : ''; ?>>04</option>
                    <option value="05" <?= ($month == '05') ? 'selected' : ''; ?>>05</option>
                    <option value="06" <?= ($month == '06') ? 'selected' : ''; ?>>06</option>
                    <option value="07" <?= ($month == '07') ? 'selected' : ''; ?>>07</option>
                    <option value="08" <?= ($month == '08') ? 'selected' : ''; ?>>08</option>
                    <option value="09" <?= ($month == '09') ? 'selected' : ''; ?>>09</option>
                    <option value="10" <?= ($month == '10') ? 'selected' : ''; ?>>10</option>
                    <option value="11" <?= ($month == '11') ? 'selected' : ''; ?>>11</option>
                    <option value="12" <?= ($month == '12') ? 'selected' : ''; ?>>12</option>

                </select>月
                <select name="day">
                    <option value="01" <?= ($day == '01') ? 'selected' : ''; ?>>01</option>
                    <option value="02" <?= ($day == '02') ? 'selected' : ''; ?>>02</option>
                    <option value="03" <?= ($day == '03') ? 'selected' : ''; ?>>03</option>
                    <option value="04" <?= ($day == '04') ? 'selected' : ''; ?>>04</option>
                    <option value="05" <?= ($day == '05') ? 'selected' : ''; ?>>05</option>
                    <option value="06" <?= ($day == '06') ? 'selected' : ''; ?>>06</option>
                    <option value="07" <?= ($day == '07') ? 'selected' : ''; ?>>07</option>
                    <option value="08" <?= ($day == '08') ? 'selected' : ''; ?>>08</option>
                    <option value="09" <?= ($day == '09') ? 'selected' : ''; ?>>09</option>
                    <option value="10" <?= ($day == '10') ? 'selected' : ''; ?>>10</option>
                    <option value="11" <?= ($day == '11') ? 'selected' : ''; ?>>11</option>
                    <option value="12" <?= ($day == '12') ? 'selected' : ''; ?>>12</option>
                    <option value="13" <?= ($day == '13') ? 'selected' : ''; ?>>13</option>
                    <option value="14" <?= ($day == '14') ? 'selected' : ''; ?>>14</option>
                    <option value="15" <?= ($day == '15') ? 'selected' : ''; ?>>15</option>
                    <option value="16" <?= ($day == '16') ? 'selected' : ''; ?>>16</option>
                    <option value="17" <?= ($day == '17') ? 'selected' : ''; ?>>17</option>
                    <option value="18" <?= ($day == '18') ? 'selected' : ''; ?>>18</option>
                    <option value="19" <?= ($day == '19') ? 'selected' : ''; ?>>19</option>
                    <option value="20" <?= ($day == '20') ? 'selected' : ''; ?>>20</option>
                    <option value="21" <?= ($day == '21') ? 'selected' : ''; ?>>21</option>
                    <option value="22" <?= ($day == '22') ? 'selected' : ''; ?>>22</option>
                    <option value="23" <?= ($day == '23') ? 'selected' : ''; ?>>23</option>
                    <option value="24" <?= ($day == '24') ? 'selected' : ''; ?>>24</option>
                    <option value="25" <?= ($day == '25') ? 'selected' : ''; ?>>25</option>
                    <option value="26" <?= ($day == '26') ? 'selected' : ''; ?>>26</option>
                    <option value="27" <?= ($day == '27') ? 'selected' : ''; ?>>27</option>
                    <option value="28" <?= ($day == '28') ? 'selected' : ''; ?>>28</option>
                    <option value="29" <?= ($day == '29') ? 'selected' : ''; ?>>29</option>
                    <option value="30" <?= ($day == '30') ? 'selected' : ''; ?>>30</option>
                    <option value="31" <?= ($day == '31') ? 'selected' : ''; ?>>31</option>
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