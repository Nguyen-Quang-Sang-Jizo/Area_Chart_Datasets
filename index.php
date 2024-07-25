<?php
session_start();
require_once "MyReport.php";
$report = new MyReport;
$report->run();
?>
<?php
if (isset($_POST['command3']) && $_POST['command3'] = "propagate") {
?>
    <div id='report_render'>
        <?php
        $report->render();
        ?>
    </div>
<?php
    exit();
}
?>
<?php
if (isset($_POST['command2']) && $_POST['command2'] = "randomize") {
?>
    <div id='report_render'>
        <?php
        $report->render();
        ?>
    </div>
<?php
    exit();
}
?>
<?php
if (isset($_POST['command1']) && $_POST['command1'] = "smooth") {
?>
    <div id='report_render'>
        <?php
        $report->render();
        ?>
    </div>
<?php
    exit();
}
?>
<?php
if (!isset($_POST['command1']) && !isset($_POST['command2']) && !isset($_POST['command3'])) {
?>
    <div id='report_render'>
        <?php
        $report->render();
        ?>
    </div>
<?php
}
?>

<html>

<head>
    <title>
        area > datasets | Chart.js sample
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        body,
        html {
            color: #333538;
            font-family: 'Lato', sans-serif;
            line-height: 1.6;
            padding: 0;
            margin: 0;
        }

        .content {
            max-width: 800px;
            margin: auto;
        }

        .toolbar {
            display: flex;
        }

        .toolbar>* {
            margin: 0 8px 0 0;
        }

        canvas {
            margin: auto;
            max-height: 400px;
            min-height: 400px;
            max-width: 800px;
            padding: 32px 0px;
        }

        table {
            color: #333;
            font-size: 0.9rem;
            margin: 8px 0;
            width: 100%
        }

        th {
            background-color: #f0f0f0;
            padding: 2px;
        }

        td {
            padding: 2px;
            text-align: center;
        }
    </style>
</head>

<body>

    <script>
        $(document).ready(function() {
            $("#smooth").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    data: {
                        command1: "smooth"
                    },
                    success: function(response) {
                        $('#report_render').html(response);
                    }
                })
            })
            $("#randomize").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    data: {
                        command2: "randomize"
                    },
                    success: function(response) {
                        $('#report_render').html(response);
                    }
                })
            })
            $("#propagate").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    data: {
                        command3: "propagate"
                    },
                    success: function(response) {
                        $('#report_render').html(response);
                    }
                })
            })
        })
    </script>
    <div class="content">
        <div class="wrapper">
            <div id="report_render"></div>
        </div>
        <div class="toolbar">
            <button id="propagate">Propagate</button>
            <button id="smooth">Smooth</button>
            <button id="randomize">Randomize</button>
        </div>
        <div id="chart-analyser" class="analyser"></div>
    </div>

</body>

</html>