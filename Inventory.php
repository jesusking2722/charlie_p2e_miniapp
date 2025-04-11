<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="missions-section">
        <div class="mission-title">
            <h1>Inventory</h1>
        </div>
        <div class="tabs">
            <button class="tab-button active" data-tab="chrle"><span>NFTS</span></button>
            <button class="tab-button" data-tab="partners"><span>Boosters</span></button>
            <button class="tab-button" data-tab="envoys" disabled><span>Spec. cards</span></button>
        </div>
        <div class="inventory-items mission-items chrle-tab active">
            <div class="inventory-nft">
                <div class="inventory-img">
                    <img src="./assets/img/nft-img.jpg" alt="">
                </div>
                <span class="invent-title">NFT Days Better</span>
                <span class="invent-price">3029 $CHRLE / $5</span>
                <p>More than 5 attributes/boosts</p>
            </div>
            <div class="inventory-nft">
                <div class="inventory-img">
                    <img src="./assets/img/nft-img.jpg" alt="">
                </div>
                <span class="invent-title">NFT Days Better</span>
                <span class="invent-price">3029 $CHRLE / $5</span>
                <p>More than 5 attributes/boosts</p>
            </div>
            <div class="inventory-nft">
                <div class="inventory-img">
                    <img src="./assets/img/nft-img.jpg" alt="">
                </div>
                <span class="invent-title">NFT Days Better</span>
                <span class="invent-price">3029 $CHRLE / $5</span>
                <p>More than 5 attributes/boosts</p>
            </div>
            <div class="inventory-nft">
                <div class="inventory-img">
                    <img src="./assets/img/nft-img.jpg" alt="">
                </div>
                <span class="invent-title">NFT Days Better</span>
                <span class="invent-price">3029 $CHRLE / $5</span>
                <p>More than 5 attributes/boosts</p>
            </div>
        </div>
        <div class="inventory-items mission-items partners-tab">
            <div class="inventory-nft">
                <div class="inventory-img">
                    <img src="./assets/img/nft-img.jpg" alt="">
                </div>
                <span class="invent-title">BOOST Better</span>
                <span class="invent-price">3029 $CHRLE / $5</span>
                <p>More than 5 attributes/boosts</p>
            </div>
            <div class="inventory-nft">
                <div class="inventory-img">
                    <img src="./assets/img/nft-img.jpg" alt="">
                </div>
                <span class="invent-title">BOOST Days Better</span>
                <span class="invent-price">3029 $CHRLE / $5</span>
                <p>More than 5 attributes/boosts</p>
            </div>
        </div>
        <div class="inventory-items mission-items envoys-tab">
        </div>
    </div>
    <?php include 'menu_bottom.php'; ?>
    <script>
        const tabButtons = document.querySelectorAll('.tab-button');
        const missionItems = document.querySelectorAll('.mission-items');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tab = button.getAttribute('data-tab');

                // Убираем активность у всех кнопок и миссий
                tabButtons.forEach(btn => btn.classList.remove('active'));
                missionItems.forEach(item => item.classList.remove('active'));

                // Добавляем активность к выбранной кнопке и соответствующим миссиям
                button.classList.add('active');
                document.querySelectorAll(`.${tab}-tab`).forEach(item => item.classList.add('active'));
            });
        });

    </script>
</body>

</html>