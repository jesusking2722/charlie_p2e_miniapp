<?php

                $nfts=Model::get_user_nfts();
                $boosters=Model::get_user_boosters();
?>
<div class="missions-section">
        <div class="mission-title">
            <h1>Inventory</h1>
        </div>
        <div class="tabs">
            <button class="tab-button active" data-tab="chrle"><span>pNFTS</span></button>
            <button class="tab-button" data-tab="partners"><span>Boosters</span></button>
            <button class="tab-button" data-tab="envoys marquee-btn" disabled> <span>Dev cards</span>
                <div class="marquee">
                    <div class="marquee-content">
                        <span>SOON... SOON... SOON... SOON... SOON... </span>
                        <span>SOON... SOON... SOON... SOON... SOON... </span>
                    </div>
                </div>
            </button>
        </div>
        <div class="inventory-items mission-items chrle-tab active">
                     <?php
                        foreach ($nfts as $key => $value) {
                    ?>
                        <div class="inventory-nft myBtn<?=$value->nft_id;?>">
                            <div class="inventory-img">
                                <img src="<?=Model::get_img_ntf_by_id($value->nft_id);?>" alt="">
                            </div>
                            <span class="invent-title"><?=Model::get_ntf_by_id($value->nft_id)->name;?></span>
                            
                        </div>
                    <?php                            
                        }
                    ?>          

            

        </div>
        <div class="inventory-items mission-items partners-tab">
               <?php
                        foreach ($boosters as $key => $value) {
                    ?>
                        <div class="inventory-nft">
                            <div class="inventory-img boost<?=$value->booster_id;?>">
                                <img src="<?=Model::get_img_booster_by_id($value->booster_id);?>" alt="">
                            </div>
                            <span class="invent-title"><?=Model::get_booster_by_id($value->booster_id)->name;?></span>
                            
                        </div>
                    <?php                            
                        }
                    ?>         
        </div>
        <div class="inventory-items mission-items envoys-tab">
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

    <?php
                $nfts_all=Model::get_all_ntf();
                   foreach ($nfts_all as $key => $value) {
            ?>
    <div class="modal myModal<?=$value->id;?>">
        <div class="modal-container">
            <div class="modal-content">
                <div class="close-container">
                    <span class="close close<?=$value->id;?>">
                        <img src="/assets/img/close.svg" alt="">
                    </span>
                </div>
                <div class="product-picture-container">
                    <div class="product-picture">
                        <img src="<?=$value->img;?>" alt="">
                    </div>
                </div>
                <div class="modal-line">
                    <div class="product-name"><?=$value->name;?></div>
                    <div class="product-price"><?=$value->price;?> CCOIN</div>
                </div>
                <div class="modal-line">
                    <span>Owner:</span>
                    <div class="modal-profile">
                        <div class="modal-profile-avatar">
                            <img src="/assets/img/avatar.jpg" alt="">
                        </div>
                        <div class="modal-profile-name">Charlie</div>
                    </div>
                </div>
                <a href="#" style="width:90%;margin-top: 10px;display:none;" class="gradient-whiteoutline buy_nft" nft_id="<?=$value->id;?>"><span>BUY THIS pNFT</span></a>
                <div class="modal-txt">
                    <span>Details</span>
                    <ul>
                        <li><span>Level:</span> <?=$value->level;?></li>
                        <li><span>Farming:</span> x<?=$value->farming;?> $CHRLEP/hour</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
      <script>        $('.close<?=$value->id;?>').click(function(){
            $('.modal').fadeOut(0);
        });
        $('.myBtn<?=$value->id;?>').click(function(){
            $('.myModal<?=$value->id;?>').fadeIn(100);
        });
      </script>
            <?php } ?>



             <?php
                $all_boosters=Model::get_all_boosters();
                   foreach ($all_boosters as $key => $value) {
            ?>
           

<div class="modal mboost<?=$value->id;?>">
        <div class="modal-container">
            <div class="modal-content">
                <div class="close-container">
                    <span class="close closeb<?=$value->id;?>">
                        <img src="/assets/img/close.svg" alt="">
                    </span>
                </div>
                <div class="product-picture-container">
                    <div class="product-picture">
                        <img src="<?=$value->img;?>" alt="">
                    </div>
                </div>
                <div class="modal-line">
                    <div class="product-name"><?=$value->name;?></div>
                    
                </div>
                <div class="modal-line">
                    <span>Owner:</span>
                    <div class="modal-profile">
                        <div class="modal-profile-avatar">
                            <img src="/assets/img/avatar.jpg" alt="">
                        </div>
                        <div class="modal-profile-name">Charlie</div>
                    </div>
                </div>
                <a href="#" style="width:90%;margin-top: 10px;display: none;" class="gradient-whiteoutline buy_boost" boost_id="<?=$value->id;?>"><span>BUY THIS BOOST</span></a>
                <div class="modal-txt">
                    <span>Details</span>
                    <ul>
                        <li><span>Duration:</span> <?=$value->duration;?></li>
                        <li><span>Farming:</span> x<?=$value->farming;?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
      <script>        
        $('.closeb<?=$value->id;?>').click(function(){
            $('.modal').fadeOut(0);
        });
        $('.boost<?=$value->id;?>').click(function(){
            $('.mboost<?=$value->id;?>').fadeIn(100);
        });
      </script>
            <?php
                }
            ?>
        </div>