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



<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <table>
            <tbody>
                <tr> </tr>
            </tbody>
        </table>
        <div class="ct"> </div>
    </div>
</div>