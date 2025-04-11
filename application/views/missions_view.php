<?php
    $user_data=Model::get_user_info();
?>
<script src="https://sad.adsgram.ai/js/sad.min.js"></script>
<div class="missions-section">
        <div class="mission-title">
            <h1>Missions</h1>
        </div>
        <div class="tabs">
            <button class="tab-button active" data-tab="chrle"><span>Main</span></button>
            <button class="tab-button" data-tab="partners"><span>Chrle tasks</span></button>
            <button class="tab-button" data-tab="envoys"><span>Boost</span></button>
        </div>
        <div class="mission-items chrle-tab active">
            <div class="mission-item">
                <div class="mission-subtitle">
                    <h2>Main</h2>
                </div>
                <div class="mission-line">
                    <div class="icon">
                        <img src="/assets/img/task.svg" alt="">
                    </div>
                    <div class="mission-txt">
                        <span>Buy your today's pNFT</span>
                        <p>1000 $CHRLEP</p>
                    </div>
                    <?php
                        $mysqli = new init_db;
                        $select_user_data = $mysqli->select("users_nfts" , "user_id='".$_SESSION['user']."'"," ORDER by id DESC LIMIT 1") or die('Error DB');
                        $result_mysqli = $select_user_data->fetch_object();  
                        if($result_mysqli->date!=date("d/m/Y",time())){
                    ?>
                    <a href="#" onclick='$("body").before("<meta http-equiv=\"refresh\" content=\"0; url=/marketplace/\">");location.href="/marketplace/";' class="gradient-whiteoutline"><span>DO</span></a>
                    <?php
                        }
                    ?>
                </div>
                <div class="mission-line">
                    <div class="icon">
                        <img src="/assets/img/yt.svg" alt="">
                    </div>
                    <div class="mission-txt">
                        <span>Watch ADS and earn CHRLEP</span>
                        <p>1000 $CHRLEP</p>
                    </div>
                        <a href="# "id="ads" class="gradient-whiteoutline"><span>DO</span></a>
                </div>
                <div class="mission-line">
                    <div class="icon">
                        <img src="/assets/img/yt.svg" alt="">
                    </div>
                    <div class="mission-txt">
                        <span>Watch ADS and earn CHRLEP 2</span>
                        <p>1000 $CHRLEP</p>
                    </div>
                        <a href="# "id="ads2" class="gradient-whiteoutline"><span>DO</span></a>
                </div>


                <div class="mission-line">
                    <div class="icon">
                        <img src="/assets/img/tg.svg" alt="">
                    </div>
                    <div class="mission-txt">
                        <span>Visit our official TG Chat</span>
                        <p>1000 $CHRLEP</p>
                    </div>
                    <?php
                        if(date("d/m/Y", $user_data->task1) != date("d/m/Y", time())){
                    ?>
                        <a href="#" onclick='$("body").before("<meta http-equiv=\"refresh\" content=\"0; url=/missions/\">");location.href="/task1.php";' class="gradient-whiteoutline"><span>DO</span></a>
                    <?php
                        }
                    ?>
                </div>
                <div class="mission-line">
                    <div class="icon">
                        <img src="/assets/img/tg.svg" alt="">
                    </div>
                    <div class="mission-txt">
                        <span>Visit our Annoucements Channel</span>
                        <p>1000 $CHRLEP</p>
                    </div>
                     <?php
                        if(date("d/m/Y", $user_data->task2) != date("d/m/Y", time())){
                    ?>
                        <a href="#" onclick='task2()' class="gradient-whiteoutline"><span>DO</span></a>
                    <?php
                        }
                    ?>
                </div>
                <div class="mission-line">
                    <div class="icon">
                        <img src="/assets/img/x.svg" alt="">
                    </div>
                    <div class="mission-txt">
                        <span>Retweet post</span>
                        <p>1000 $CHRLEP</p>
                    </div>
                    <?php
                        if(date("d/m/Y", $user_data->task3) != date("d/m/Y", time())){
                    ?>
                        <a href="#" onclick='task3()' class="gradient-whiteoutline"><span>DO</span></a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="mission-items partners-tab">
            <div class="mission-item">
                <div class="mission-subtitle">
                    <h2>Chrle tasks</h2>
                </div>
                <div class="mission-line">
                    <div class="icon">
                        <img src="/assets/img/task.svg" alt="">
                    </div>
                    <div class="mission-txt">
                        <span>Visit presale</span>
                        <p>10000 $CHRLEP</p>
                    </div>
                    <?php
                        // if(date("d/m/Y", $user_data->task5) != date("d/m/Y", time())){
                    ?>
                    <a href="#" onclick='task5()' class="gradient-whiteoutline"><span>DO</span></a>
                    <?php
                        // }
                    ?>
                </div>
                <div class="mission-line">
                    <div class="icon">
                        <img src="/assets/img/task.svg" alt="">
                    </div>
                    <div class="mission-txt">
                        <span>Visit NTF mint</span>
                        <p>2000 $CHRLEP</p>
                    </div>
                    <?php
                        // if(date("d/m/Y", $user_data->task6) != date("d/m/Y", time())){
                    ?>
                    <a href="#" onclick='task6()' class="gradient-whiteoutline"><span>DO</span></a>
                    <?php
                        // }
                    ?>
                </div>
            </div>
        </div>
        <div class="mission-items envoys-tab">
            <div class="mission-item">
                <div class="mission-subtitle">
                    <h2>Boost</h2>
                </div>
                <div class="mission-line">
                    <div class="icon">
                        <img src="/assets/img/boost.svg" alt="">
                    </div>
                    <div class="mission-txt">
                        <span>Buy Booster card</span>
                        <p>50000 $CHRLEP</p>
                    </div>
                    <?php
                        if($user_data->task7==0){
                    ?>
                    <a href="#" onclick='$("body").before("<meta http-equiv=\"refresh\" content=\"0; url=/missions/\">");location.href="/task7.php";' class="gradient-whiteoutline"><span>DO</span></a>
                    <?php
                        }
                    ?>
                </div>
                <div class="mission-line">
                    <div class="icon">
                        <img src="/assets/img/boost.svg" alt="">
                    </div>
                    <div class="mission-txt">
                        <span>Buy pNFT card</span>
                        <p>50000 $CHRLEP</p>
                    </div>
                    <?php
                        if($user_data->task8==0){
                    ?>
                    <a href="#" onclick='$("body").before("<meta http-equiv=\"refresh\" content=\"0; url=/missions/\">");location.href="/task8.php";' class="gradient-whiteoutline"><span>DO</span></a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
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


<script>
    // insert your block id
    const AdController = window.Adsgram.init({ blockId: "6142" });
    const button1 = document.getElementById('ads');
    button1.addEventListener('click', () => {
        AdController.show().then((result) => {
            location.href='/task_ads.php';
        }).catch((result) => {
            console.log(JSON.stringify(result, null, 4));
        })
    })
    const button2 = document.getElementById('ads2');
    button2.addEventListener('click', () => {
        AdController.show().then((result) => {
            location.href='/task_ads.php';
        }).catch((result) => {
            console.log(JSON.stringify(result, null, 4));
        })
    })

    function task2() {
        $.ajax({
            type: "POST",
            url: '/task2.php',
            data: {},
            success: function (result) {
                Telegram.WebApp.openLink("https://t.me/CharlieTheUnicoinAnnouncements/")
                // window.open("https://t.me/CharlieTheUnicoinAnnouncements/", "_blank");
            }
        });
    }
    function task3() {
        $.ajax({
            type: "POST",
            url: '/task3.php',
            data: {},
            success: function (result) {
                Telegram.WebApp.openLink("https://x.com/Charlie_Unicoin/status/1862737033564684489?t=4VQGR9CKVqvgAcoqqcLf-Q&s=19")
                // window.open("http://charlieunicornaimarketplace.eu/", "_blank");
            }
        });
    }
    function task4() {
        $.ajax({
            type: "POST",
            url: '/task4.php',
            data: {},
            success: function (result) {
                // window.open("http://charlieunicornaimarketplace.eu/", "_blank");
                Telegram.WebApp.openLink("https://youtube.com/@charlieunicoin?si=AhNl7Y2GS_kei8it")
            }
        });
    }
    function task5() {
        $.ajax({
            type: "POST",
            url: '/task5.php',
            data: {},
            success: function (result) {
                Telegram.WebApp.openLink("https://charlieunicornai-sale.eu/")
                // window.open("http://charlieunicornaimarketplace.eu/", "_blank");
            }
        });
    }
    function task6() {
        $.ajax({
            type: "POST",
            url: '/task6.php',
            data: {},
            success: function (result) {
                Telegram.WebApp.openLink("http://charlieunicornaimarketplace.eu/")
                // window.open("https://pro.opensea.io/collection/charlie-unicoin/activity?showMintModal=true/", "_blank");
            }
        });
    }
</script>