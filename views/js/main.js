const baseUrl = 'http://localhost/tcc-etecno-master/';

$(function () {
    $("form").submit(function (e) {
        var form = $(this);
        var alert = $(".alert");

        if(form.attr("method") == "POST") {
            e.preventDefault();
        }

        $.ajax({
            url: form.attr("action"),
            data: form.serialize(),
            type: form.attr("method"),
            dataType: "json",
            success: function (callback) {
                if (callback.message) {
                    alert.html(callback.message.message).fadeIn();
                } else {
                    alert.fadeOut();
                }

                if (callback.redirect) {
                    window.location.href = callback.redirect.url;
                }
            }
        });
    });

    $(".status-event").click(function () {
        var btn = $(this);

        $.ajax({
            url: baseUrl + "api/event_status",
            type: "POST",
            dataType: "json",
            data: {
                idEvent: btn.data("id"),
                type: btn.data("type")
            },
            success: function (callback) {
                alert(callback.message.message);
                window.location.reload();
            }
        });

        return false
    });

    var ctx = document.getElementById("chartLinePurple").getContext("2d");

    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
    gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors

    var dataChart = {
        labels: ['JAN', 'FEV', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AUG', 'SET', 'OUT', 'NOV', 'DEZ'],
        datasets: [{
            label: "Data",
            fill: true,
            backgroundColor: gradientStroke,
            borderColor: '#d048b6',
            borderWidth: 2,
            borderDash: [],
            borderDashOffset: 0.0,
            pointBackgroundColor: '#d048b6',
            pointBorderColor: 'rgba(255,255,255,0)',
            pointHoverBackgroundColor: '#d048b6',
            pointBorderWidth: 20,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 15,
            pointRadius: 4,
            data: [1, 2, 3, 4, 5, 10, 20],
        }]
    };

    var myChart = new Chart(ctx, {
        type: 'line',
        data: dataChart,
        options: gradientChartOptionsConfigurationWithTooltipPurple
    });

    var ctxGreen = document.getElementById("chartLineGreen").getContext("2d");

    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgba(66,134,121,0.15)');
    gradientStroke.addColorStop(0.4, 'rgba(66,134,121,0.0)'); //green colors
    gradientStroke.addColorStop(0, 'rgba(66,134,121,0)'); //green colors

    var data = {
        labels: ['JAN', 'FEV', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AUG', 'SET', 'OUT', 'NOV', 'DEZ'],
        datasets: [{
            label: "My First dataset",
            fill: true,
            backgroundColor: gradientStroke,
            borderColor: '#00d6b4',
            borderWidth: 2,
            borderDash: [],
            borderDashOffset: 0.0,
            pointBackgroundColor: '#00d6b4',
            pointBorderColor: 'rgba(255,255,255,0)',
            pointHoverBackgroundColor: '#00d6b4',
            pointBorderWidth: 20,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 15,
            pointRadius: 4,
            data: [90, 27, 60, 12, 80],
        }]
    };

    var myChart = new Chart(ctxGreen, {
        type: 'line',
        data: data,
        options: gradientChartOptionsConfigurationWithTooltipGreen
    });
});
