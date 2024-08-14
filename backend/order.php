<h3 class="ct">訂單清單</h3>
<div>
    <span>快速刪除：</span>
    <input type="radio" name="type" value="date" checked>
    依日期
    <input type="text" name="date" id="date">
    <input type="radio" name="type" value="movie">
    依電影
    <select name="movie" id="movie">
        <?php
        $movies = $Order->all(" group by `movie`;");
        foreach ($movies as $movie) {
            echo "<option value='{$movie['movie']}'>{$movie['movie']}</option>";
        }

        ?>
    </select>
    <button onclick="qDel()">刪除</button>
</div>
<style>
    .order-header,
    .order-item {
        display: flex;
        justify-content: space-between;
        text-align: center;
        color: black;
        align-items: center;
    }

    .order-header>div {
        background: #ccc;
        padding: 3px;
        width: calc(94%/7);
    }

    .order-item>div {
        padding: 3px;
        width: calc(94%/7);
        color: #ccc;
    }
</style>

<div>
    <div class="order-header">
        <div>訂單編號</div>
        <div>電影名稱</div>
        <div>日期</div>
        <div>場次時間</div>
        <div>訂購數量</div>
        <div>訂購位置</div>
        <div>操作</div>
    </div>
    <div style="height:400px;overflow:auto">
        <?php

        $orders = $Order->all();
        foreach ($orders as $order) {
            $seats = unserialize($order['seats']);
        ?>
            <div class="order-item">
                <div><?= $order['no']; ?></div>
                <div><?= $order['movie']; ?></div>
                <div><?= $order['date']; ?></div>
                <div><?= $order['session']; ?></div>
                <div><?= $order['qt']; ?></div>
                <div>
                    <?php
                    foreach ($seats as $seat) {
                        echo (floor($seat / 5) + 1) . "排" . ($seat % 5 + 1) . "號";
                        echo "<br>";
                    }

                    ?>
                </div>
                <div>
                    <button onclick="del('Order',<?= $order['id']; ?>)">刪除</button>
                </div>
            </div>
            <hr>
        <?php
        }
        ?>
    </div>
</div>



<script>
    function del(table, id) {
        if (confirm("確定要刪除此訂單嗎?")) {
            $.post("./api/del.php", {
                table,
                id
            }, () => {
                location.reload();
            })
        }
    }

    function qDel() {
        let type = $("input[name='type']:checked").val();
        let data = $(`#${type}`).val();
        if (confirm(`確定要刪除所有${type}為${data}的訂單嗎?`)) {

            $.post("./api/qDel.php", {
                table: "order",
                type,
                data
            }, () => {
                location.reload();
            })
        }
    }
</script>