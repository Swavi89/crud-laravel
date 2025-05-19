$(function () {
    var start = moment().subtract(29, "days");
    var end = moment();

    function cb(start, end) {
        $("#reportrange span").html(
            start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
        );
    }
    $("#reportrange").daterangepicker(
        {
            startDate: start,
            endDate: end,
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [
                    moment().subtract(1, "days"),
                    moment().subtract(1, "days"),
                ],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [
                    moment().startOf("month"),
                    moment().endOf("month"),
                ],
                "Last Month": [
                    moment().subtract(1, "month").startOf("month"),
                    moment().subtract(1, "month").endOf("month"),
                ],
            },
        },
        function (start, end) {
            $("#reportrange").html(
                start.format("MMMM D, YYYY") +
                    " - " +
                    end.format("MMMM D, YYYY")
            );
            if (document.location.href.includes("?")) {
                var url =
                    document.location.href +
                    "&start_date=" +
                    start.format("YYYY-MM-DD") +
                    "&end_date=" +
                    end.format("YYYY-MM-DD");
            } else {
                var url =
                    document.location.href +
                    "?start_date=" +
                    start.format("YYYY-MM-DD") +
                    "&end_date=" +
                    end.format("YYYY-MM-DD");
            }
            document.location = url;
            // let url = new URL("http://localhost/carrybell/interior/expenses");
            // let params = new URLSearchParams(url.search);
            // params.append('start_date', start.format('YYYY-MM-DD'));
            // params.append('end_date', end.format('YYYY-MM-DD'));
            // window.location.href = "{{ url('/expenses') }}?" + params.toString();
        }
    );
});
