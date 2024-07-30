<style>
    table#menu {
        width: 50%;
        margin: 10px auto;
        padding: 20px;
        border: 1px solid black;
        background: #ddd;
    }

    #menu td {
        border: 1px solid #999;
        text-align: center;
    }

    #menu td:nth-child(1) {
        width: 80px;
    }

    #menu tr:nth-child(even) {
        background: #999;
    }

    #menu td:nth-child(2) select {
        width: 100%;
    }
</style>

<h2 class="ct">線上訂票</h2>
<div id="menuBlock">
    <form action="#">
        <table id="menu">
            <tr>
                <td>電影：</td>
                <td>
                    <select name="" id="movie"></select>
                </td>
            </tr>
            <tr>
                <td>日期：</td>
                <td>
                    <select name="" id="date"></select>
                </td>
            </tr>
            <tr>
                <td>場次：</td>
                <td>
                    <select name="" id="session"></select>
                </td>
            </tr>
            <tr>
                <td colspan=2 class='ct'>
                    <input type="button" value="確定" onclick="$('#booking,#menuBlock').toggle()">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="booking" style="display:none" onclick="$('#booking,#menuBlock').toggle()">

    <button>上一步</button>
</div>


<script>
    getMovies();

    function getMovies() {
        $.get("./api/get_movies.php", function(movies) {
            $("#movie").html(movies);
        })
    }
</script>