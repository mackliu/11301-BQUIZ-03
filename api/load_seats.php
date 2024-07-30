<style>
    .theater {
        width: 540px;
        height: 370px;
        margin: auto;
        box-sizing: border-box;
        padding-top: 20px;
        background: url('../icon/03D04.png') no-repeat;
        background-position: 0 0;
    }

    .seats {
        display: flex;
        flex-wrap: wrap;
        margin: auto;
        width: calc(64px * 5);
    }

    .seat {
        width: 64px;
        height: 86px;
        text-align: center;
        position: relative;

    }

    .null {
        background: url('../icon/03D02.png') center no-repeat;
    }

    .booked {
        background: url('../icon/03D03.png') center no-repeat;
    }

    .chk {
        position: absolute;
        right: 5px;
        bottom: 5px;
    }
</style>
<div class="theater">
    <div class="seats">
        <?php
        for ($i = 0; $i < 20; $i++) {
            echo "<div class='seat null'>";
            echo "<div>";
            echo (floor($i / 5) + 1) . "排" . ($i % 5 + 1) . "號";
            echo "</div>";
            echo "<input type='checkbox' class='chk' value='$i'>";
            echo "</div>";
        }
        ?>
    </div>
</div>


<button onclick="$('#booking,#menuBlock').toggle()">上一步</button>