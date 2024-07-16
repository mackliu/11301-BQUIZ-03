<style>
    .movie {
        background-color: white;
        margin: 3px;
        color: black;
        display: flex;
        padding: 3px;
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

<button>新增電影</button>
<hr>
<div class='movie'>
    <div class="img">
        <img src="" style="width:70px;height:90px">
    </div>
    <div class="level">
        分級:<img src="./icon/" style="width:20px;">
    </div>
    <div class="info">
        <div class="base">
            <div>片名：</div>
            <div>片長：</div>
            <div>上映時間</div>
        </div>
        <div class="btns">
            <button>顯示</button>
            <button>往上</button>
            <button>往下</button>
            <button>編輯電影</button>
            <button>刪除電影</button>
        </div>
        <div class="intro">
            劇情介紹：
        </div>
    </div>
</div>