<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="posters">
            <div class="lists">
                <?php
                $posters = $Poster->all(['sh' => 1], " Order By rank");
                foreach ($posters as $poster) {
                ?>
                    <div class='poster' data-ani='<?= $poster['ani']; ?>'>
                        <img src="./images/<?= $poster['img']; ?>">
                        <div class='name'><?= $poster['name']; ?></div>
                    </div>
                <?php

                }
                ?>
            </div>
            <div class="controls">
                <div class="control">
                    <div class="btn-left"></div>
                </div>
                <div class="btns">
                    <?php
                    foreach ($posters as $poster) {
                    ?>
                        <div class="btn">
                            <img src="./images/<?= $poster['img']; ?>" alt="">
                            <div><?= $poster['name']; ?></div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="control">
                    <div class="btn-right"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".poster").eq(0).show()
    let now = 0;
    let next = 1;
    let slide = setInterval(() => {
        ani()
    }, 3000)

    function ani(idx) {

        let code = parseInt($(".poster").eq(now).data('ani'))
        if (idx != undefined) {
            next = idx;
        } else {
            if (now < $(".poster").length - 1) {
                next = now + 1;
            } else {
                next = 0
            }
        }
        //console.log(ani, now, next)
        switch (code) {
            case 1:
                //淡入淡出
                $(".poster").eq(now).fadeOut(1000, () => {
                    $(".poster").eq(next).fadeIn(1000)
                })
                break;
            case 2:
                //縮放
                $(".poster").eq(now).hide(1000, () => {
                    $(".poster").eq(next).show(1000)

                })
                break;
            case 3:
                //滑入滑出
                $(".poster").eq(now).slideUp(1000, () => {
                    $(".poster").eq(next).slideDown(1000)
                })
                break;
        }

        now = next

    }

    let page = 0;
    $(".btn-left,.btn-right").on("click", function() {

        let direction = $(this).attr('class').split("-")[1]
        switch (direction) {
            case 'left':
                if ((page - 1) >= 0) {
                    page--;
                }
                $(".btn").animate({
                    right: 80 * page
                });

                break;
            case 'right':
                if ((page + 1) <= ($(".btn").length - 4)) {
                    page++;
                }
                $(".btn").animate({
                    right: 80 * page
                });
                break;
        }
    })


    $(".btns").hover(
        function() {
            clearInterval(slide)
        },
        function() {
            slide = setInterval(() => {
                ani()
            }, 3000)
        }
    )

    $(".btn").on("click", function() {
        let idx = $(this).index();
        ani(idx)

        //console.log("next->", idx, "ani->", ani, "now->", visible)
    })
</script>


<style>
    .movie {
        width: 49%;
        border: 1px solid white;
        display: flex;
        flex-wrap: wrap;
        margin: 0.5%;
        box-sizing: border-box;
        padding: 5px;
        border-radius: 5px;
    }

    .movie-btn {
        width: 100%;
    }

    .movie-img {
        width: 35%;
    }

    .movie-info {
        width: 65%;
        font-size: 14px;
    }

    .movie * {
        box-sizing: border-box;
    }
</style>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;display:flex;flex-wrap:wrap">
        <?php
        $today = date("Y-m-d");
        $ondate = date("Y-m-d", strtotime("-2 days"));
        $all = $Movie->count(" WHERE ondate >= '$ondate' && ondate <='$today' && sh=1");
        $div = 4;
        $pages = ceil($all / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $movies = q("SELECT * FROM `movies` WHERE ondate >= '$ondate' && ondate <='$today' && sh=1 order by rank limit $start,$div");
        //$movies = q("SELECT * FROM `movies` WHERE ondate BETWEEN '2024-07-24' AND '2024-07-26' && sh=1 order by rank limit $start,$div");
        $level = [
            '1' => '普遍級',
            '2' => '保護級',
            '3' => '輔導級',
            '4' => '限制級',
        ];
        foreach ($movies as $movie) {
        ?>
            <div class="movie">
                <div class="movie-img">
                    <a href='?do=intro&id=<?= $movie['id']; ?>'>
                        <img src="./images/<?= $movie['poster']; ?>" style="width:60px;">
                    </a>
                </div>
                <div class="movie-info">
                    <div style="font-size:18px"><?= $movie['name']; ?></div>
                    <div>分級：
                        <img src="./icon/03C0<?= $movie['level']; ?>.png" style="width:20px;">
                        <?= $level[$movie['level']]; ?>
                    </div>
                    <div>上映日期：<?= $movie['ondate']; ?></div>
                </div>
                <div class="movie-btn">
                    <button onclick="location.href='?do=intro&id=<?= $movie['id']; ?>'">劇情簡介</button>
                    <button onclick="location.href='?do=order&id=<?= $movie['id']; ?>'">線上訂票</button>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="ct" style="width:100%">
            <?php
            if (($now - 1) > 0) {
                $prev = $now - 1;
                echo "<a href='?p=$prev'> < </a>";
            }

            for ($i = 1; $i <= $pages; $i++) {
                $size = ($i == $now) ? 'font-size:18px' : '';
                echo "<a href='?p=$i' style='$size'> $i </a>";
            }

            if (($now + 1) <= $pages) {
                $next = $now + 1;
                echo "<a href='?p=$next'> > </a>";
            }


            ?>
        </div>
    </div>
</div>