<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Shipment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Tracking Shipment</h2>
        <form id="tracking-form">
            <div class="mb-3">
                <label for="tracking_number" class="form-label">Tracking Number</label>
                <input type="text" class="form-control" id="tracking_number" name="tracking_number" placeholder="Enter Tracking Number" required>
            </div>
            <button type="submit" class="btn btn-primary">Track</button>
        </form>
    </div>

    <div id="tracking-result"></div>

    <script>
        $("#tracking-form").submit(function(e) {
            e.preventDefault();
            
            let trackingNumber = $("#tracking_number").val();
            $("#tracking-result").html("<div class='text-center'><i class='fa fa-spinner fa-spin'></i> Loading...</div>");

            $.ajax({
                url: "<?= base_url('tracking/track') ?>",
                type: "POST",
                data: { tracking_number: trackingNumber },
                dataType: "json",
                success: function(response) {
                    if (response.error) {
                        $("#tracking-result").html("<p style='color:red;'>" + response.error + "</p>");
                    } else {
                        $("#tracking-result").html(response.tracking_result);
                    }
                },
                error: function() {
                    $("#tracking-result").html("<p style='color:red;'>Error fetching tracking data.</p>");
                }
            });
        });
    </script>
</body>
</html>
