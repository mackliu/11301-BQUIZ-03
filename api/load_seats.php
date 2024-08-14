<?php include_once "base.php"; ?>
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
        background: url('./icon/03D02.png') center no-repeat;
    }

    .booked {
        background: url('./icon/03D03.png') center no-repeat;
    }

    .chk {
        position: absolute;
        right: 5px;
        bottom: 5px;
    }

    .order-info {
        width: 540px;
        padding: 10px;
        background-color: #eee;
        margin: auto;
    }
</style>
<div class="theater">
    <div class="seats">
        <?php
        $seats = [];
        $movieName = $Movie->find($_GET['id'])['name'];
        $orders = $Order->all(['movie' => $movieName, 'date' => $_GET['date'], 'session' => $_GET['session']]);
        foreach ($orders as $order) {
            $seats = array_merge($seats, unserialize($order['seats']));
        }

        for ($i = 0; $i < 20; $i++) {
            if (in_array($i, $seats)) {
                echo "<div class='seat booked'>";
            } else {
                echo "<div class='seat null'>";
                echo "<input type='checkbox' class='chk' value='$i'>";
            }

            echo "<div>";
            echo (floor($i / 5) + 1) . "排" . ($i % 5 + 1) . "號";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</div>
<div class="order-info">

    <div>您選擇的電影是:<?= $Movie->find($_GET['id'])['name']; ?></div>
    <div>您選擇的時刻是：<?= $_GET['date']; ?> <?= $_GET['session']; ?></div>
    <div>您已經勾選<span id='tickets'>0</span>張票，最多可以購買四張票</div>
    <div class='ct'>
        <button onclick="$('#booking,#menuBlock').toggle();seats.length=0">上一步</button>
        <button onclick="order()">訂購</button>
    </div>
</div>

<script>
    $(".chk").on("click", function() {
        if ($(this).prop('checked')) {

            if (seats.length < 4) {
                seats.push($(this).val())

            } else {
                $(this).prop("checked", false)
                alert("最多只能選四個座位")
            }
        } else {
            seats.splice(seats.indexOf($(this).val()), 1)
        }
        $("#tickets").text(seats.length)
    })

    function order() {
        info['seats'] = seats;
        $.post("api/order.php", info, function(res) {
            $("#booking").html(res)
        })
    }
</script>