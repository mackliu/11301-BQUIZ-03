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
<div class="movie-list" style="width:100%;height:400px;overflow:auto;">
</div>

<script>
    getMovieList();

    function del(table, id) {
        $.post("./api/del.php", {
            table,
            id
        }, () => {
            //  location.reload();
            getMovieList();
        })
    }

    function getMovieList() {
        $(".movie-list").load("./backend/movie_list.php")
    }
</script>