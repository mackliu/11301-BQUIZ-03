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
                    <select name="movie" id="movie"></select>
                </td>
            </tr>
            <tr>
                <td>日期：</td>
                <td>
                    <select name="date" id="date"></select>
                </td>
            </tr>
            <tr>
                <td>場次：</td>
                <td>
                    <select name="session" id="session"></select>
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
    let url = new URL(window.location.href);

    $("#movie").on("change", function() {
        let id = $(this).val();

        getDate(id);
    })



    function getMovies() {
        $.get("./api/get_movies.php", function(movies) {
            $("#movie").html(movies);
            if (url.searchParams.has('id')) {
                $(`#movie option[value='${url.searchParams.get('id')}']`).prop('selected', true);
            }

            getDate($("#movie").val());

        })
    }

    function getDate(id) {
        $.get("./api/get_dates.php", {
            id
        }, function(dates) {
            $("#date").html(dates);

        })
    }
</script>