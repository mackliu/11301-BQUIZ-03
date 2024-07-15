<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="posters">
            <div class="lists">
                <?php
                $posters = $Poster->all(['sh' => 1], " Order By rank");
                foreach ($posters as $poster) {
                ?>
                    <div class='poster'>
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
                    <div class="btn">A</div>
                    <div class="btn">B</div>
                    <div class="btn">C</div>
                    <div class="btn">D</div>
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
    let start = 0;
    let slide = setInterval(() => {
        ani()
    }, 3000)

    function ani() {
        $(".poster").eq(start).fadeOut(1000, () => {
            if (start < $(".poster").length - 1) {
                start++;
            } else {
                start = 0;
            }
            $(".poster").eq(start).fadeIn(1000)
        })
    }
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