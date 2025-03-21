<div class="container mt-5 mb-5">
    <h2>Result Tracking</h2>
    <?php if (isset($result['data']['trackings'][0]) && isset($result['data']['trackings'][0]['shipment']['statusMilestone'])): ?>
        <div class="card">
            <div class="card-body">
                <p><strong>Tracking Number : <?= $trackingNumber ?></strong> </p>
                <p><strong>Status : <?= ucwords($result['data']['trackings'][0]['shipment']['statusMilestone']) ?></strong></p>
                <p><strong>Origin : <?= ucwords($result['data']['trackings'][0]['shipment']['originCountryCode']) ?></strong></p>
                <p><strong>Destination : <?= ucwords($result['data']['trackings'][0]['shipment']['destinationCountryCode']) ?></strong></p>
            </div>
        </div>

        <h3 class="mt-4">Detail</h3>
        <ul class="list-group">
            <?php foreach ($result['data']['trackings'][0]['events'] as $event): ?>
                <li class="list-group-item">
                    <strong><?= $event['status'] ?></strong><br>
                    <?= date('d-m-Y H:i:s', strtotime($event['datetime'])) ?> - <?= $event['location'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <div class="alert alert-warning">Tracking data not found.</div>
    <?php endif; ?>
</div>