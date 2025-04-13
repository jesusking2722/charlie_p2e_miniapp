<div class="failfull" style="display:none;z-index: 99999999999999999999;">
    <div class="failfull-content">
        <span>Failed!</span>
    </div>
</div>
    <div class="successful" style="display:none;z-index: 99999999999999999999;">
    <div class="successful-content">
        <span>Successful!</span>
    </div>
</div>    
<div class="missions-section">
        <div class="mission-title">
            <h1>Marketplace</h1>
        </div>
        <div class="tabs">
            <button class="tab-button active" data-tab="chrle"><span>pNFTS</span></button>
            <button class="tab-button" data-tab="partners"><span>Boosters</span></button>
            <button class="tab-button" data-tab="envoys marquee-btn" disabled>
                <span>Dev cards</span>
                <div class="marquee">
                    <div class="marquee-content">
                        <span>SOON... SOON... SOON... SOON... SOON... </span>
                        <span>SOON... SOON... SOON... SOON... SOON... </span>
                    </div>
                </div>
            </button>

        </div>
        <div class="inventory-items marketplace-items mission-items chrle-tab active">
            <?php
                $nfts=Model::get_all_ntf();
                   foreach ($nfts as $key => $value) {
                    if(Model::check_nft_user_id($value->id)){continue;}
            ?>
                <div class="inventory-nft myBtn<?=$value->id;?>">
                    <div class="inventory-img">
                        <img src="<?=$value->img;?>" alt="">
                    </div>
                    <span class="invent-title"><?=$value->name;?></span>
                    <span class="invent-price"><?=$value->price_chrlep;?> $CHRLEP / <?=$value->price;?> CCOIN</span>
                    <div class="profile-item">
                        <div class="profile">
                            <div class="profile-name"> x<?=$value->farming;?> $CHRLEP/hour</div>
                        </div>
                    </div>
                </div>

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
                    <div class="product-price"><?=$value->price_chrlep;?> $CHRLEP / <?=$value->price;?> CCOIN</div>
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
                <a href="#" style="width:90%;margin-top: 10px" class="gradient-whiteoutline buy_nft" nft_id="<?=$value->id;?>"><span>BUY for <?=$value->price;?> CCOIN</span></a>
                <a href="#" style="width:90%;margin-top: 10px" class="gradient-whiteoutline buy_nft_chrlep" nft_id="<?=$value->id;?>"><span>BUY for <?=$value->price_chrlep;?> $CHRLEP</span></a>
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

        </div>

        <div class="inventory-items marketplace-items mission-items partners-tab">
            <?php
                $boosters=Model::get_all_boosters();
                   foreach ($boosters as $key => $value) {
                    if(Model::check_booster_user_id($value->id)){continue;}
            ?>
             <div class="inventory-nft boost<?=$value->id;?>">
                <div class="inventory-img">
                    <img src="<?=$value->img;?>" alt="">
                </div>
                <span class="invent-title"><?=$name;?></span>
                <span class="invent-price"><?=$value->price;?> CCOIN</span>
             </div>   

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
                <a href="#" style="width:90%;margin-top: 10px" class="gradient-whiteoutline buy_boost" boost_id="<?=$value->id;?>"><span>BUY <?=$value->price;?> CCOIN</span></a>
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
        
    </div>
    <div class="bottom-bar">
        <nav>
            <ul>
                <li>
                    <a href="#" class="btn-nav">
                        <div class="icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M26.72 9.09333L19.04 3.72C16.9467 2.25333 13.7333 2.33333 11.72 3.89333L5.04 9.10666C3.70667 10.1467 2.65333 12.28 2.65333 13.96V23.16C2.65333 26.56 5.41333 29.3333 8.81333 29.3333H23.1867C26.5867 29.3333 29.3467 26.5733 29.3467 23.1733V14.1333C29.3467 12.3333 28.1867 10.12 26.72 9.09333Z"
                                    fill="#6A6A6A" />
                                <path
                                    d="M16 25C15.4533 25 15 24.5467 15 24V20C15 19.4533 15.4533 19 16 19C16.5467 19 17 19.4533 17 20V24C17 24.5467 16.5467 25 16 25Z"
                                    fill="#6A6A6A" />
                            </svg>

                        </div>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="btn-nav active">
                        <div class="icon"><svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M28.4933 15.1867V23.1734C28.4933 26.8534 25.5067 29.84 21.8267 29.84H10.1733C6.49333 29.84 3.50667 26.8534 3.50667 23.1734V15.28C4.52 16.3734 5.96 17 7.52 17C9.2 17 10.8133 16.16 11.8267 14.8134C12.7333 16.16 14.28 17 16 17C17.7067 17 19.2267 16.2 20.1467 14.8667C21.1733 16.1867 22.76 17 24.4133 17C26.0267 17 27.4933 16.3467 28.4933 15.1867Z"
                                    fill="#6A6A6A" />
                                <path
                                    d="M19.9867 1.66663H11.9867L11 11.48C10.92 12.3866 11.0533 13.24 11.3867 14.0133C12.16 15.8266 13.9733 17 16 17C18.0533 17 19.8267 15.8533 20.6267 14.0266C20.8667 13.4533 21.0133 12.7866 21.0267 12.1066V11.8533L19.9867 1.66663Z"
                                    fill="#6A6A6A" />
                                <path opacity="0.6"
                                    d="M29.8133 11.0266L29.4267 7.33329C28.8667 3.30663 27.04 1.66663 23.1333 1.66663H18.0133L19 11.6666C19.0133 11.8 19.0267 11.9466 19.0267 12.2C19.1067 12.8933 19.32 13.5333 19.64 14.1066C20.6 15.8666 22.4667 17 24.4133 17C26.1867 17 27.7867 16.2133 28.7867 14.8266C29.5867 13.76 29.9467 12.4133 29.8133 11.0266Z"
                                    fill="#6A6A6A" />
                                <path opacity="0.6"
                                    d="M8.78667 1.66663C4.86667 1.66663 3.05333 3.30663 2.48 7.37329L2.12 11.04C1.98667 12.4666 2.37333 13.8533 3.21333 14.9333C4.22667 16.2533 5.78667 17 7.52 17C9.46667 17 11.3333 15.8666 12.28 14.1333C12.6267 13.5333 12.8533 12.84 12.92 12.12L13.96 1.67996H8.78667V1.66663Z"
                                    fill="#6A6A6A" />
                                <path
                                    d="M15.1333 22.2134C13.44 22.3867 12.16 23.8267 12.16 25.5334V29.84H19.8267V26C19.84 23.2134 18.2 21.8934 15.1333 22.2134Z"
                                    fill="#6A6A6A" />
                            </svg>
                        </div>
                        <span>Marketplace</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="btn-nav">
                        <div class="icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M13.7067 6.66671L23.24 6.66671C27.04 6.70671 28 7.74675 28 11.7067L28 24.2933C28 28.32 27 29.3334 23.0267 29.3334L13.7067 29.3334C10.1067 29.3334 8.94667 28.4934 8.76 25.3334C8.74667 25.0134 8.73334 24.6667 8.73334 24.2933L8.73334 11.7067C8.73334 7.68008 9.73334 6.66671 13.7067 6.66671Z"
                                    fill="#6A6A6A" />
                                <path
                                    d="M8.97333 2.66671L18.2933 2.66671C21.8933 2.66671 23.0533 3.50671 23.24 6.66671L13.7067 6.66671C9.73333 6.66671 8.73333 7.68008 8.73333 11.7067L8.73333 24.2933C8.73333 24.6667 8.74667 25.0134 8.76 25.3334C4.96 25.2934 4 24.2533 4 20.2933L4 7.70675C4 3.68008 5 2.66671 8.97333 2.66671Z"
                                    fill="#6A6A6A" />
                            </svg>

                        </div>
                        <span>Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="btn-nav">
                        <div class="icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M21.5867 2.66663H10.4133C5.55999 2.66663 2.66666 5.55996 2.66666 10.4133V21.5866C2.66666 26.44 5.55999 29.3333 10.4133 29.3333H21.5867C26.44 29.3333 29.3333 26.44 29.3333 21.5866V10.4133C29.3333 5.55996 26.44 2.66663 21.5867 2.66663Z"
                                    fill="#6A6A6A" />
                                <path
                                    d="M24.4133 11.8267C24.4133 12.3733 23.9733 12.8267 23.4133 12.8267H16.4133C15.8667 12.8267 15.4133 12.3733 15.4133 11.8267C15.4133 11.28 15.8667 10.8267 16.4133 10.8267H23.4133C23.9733 10.8267 24.4133 11.28 24.4133 11.8267Z"
                                    fill="#6A6A6A" />
                                <path
                                    d="M13.2933 10.5333L10.2933 13.5333C10.0933 13.7333 9.83999 13.8266 9.58665 13.8266C9.33332 13.8266 9.06665 13.7333 8.87999 13.5333L7.87999 12.5333C7.47999 12.1466 7.47999 11.5066 7.87999 11.12C8.26665 10.7333 8.89332 10.7333 9.29332 11.12L9.58665 11.4133L11.88 9.11996C12.2667 8.73329 12.8933 8.73329 13.2933 9.11996C13.68 9.50662 13.68 10.1466 13.2933 10.5333Z"
                                    fill="#6A6A6A" />
                                <path
                                    d="M24.4133 21.1599C24.4133 21.7066 23.9733 22.1599 23.4133 22.1599H16.4133C15.8667 22.1599 15.4133 21.7066 15.4133 21.1599C15.4133 20.6132 15.8667 20.1599 16.4133 20.1599H23.4133C23.9733 20.1599 24.4133 20.6132 24.4133 21.1599Z"
                                    fill="#6A6A6A" />
                                <path
                                    d="M13.2933 19.8667L10.2933 22.8667C10.0933 23.0667 9.83999 23.16 9.58665 23.16C9.33332 23.16 9.06665 23.0667 8.87999 22.8667L7.87999 21.8667C7.47999 21.48 7.47999 20.84 7.87999 20.4533C8.26665 20.0667 8.89332 20.0667 9.29332 20.4533L9.58665 20.7467L11.88 18.4533C12.2667 18.0667 12.8933 18.0667 13.2933 18.4533C13.68 18.84 13.68 19.48 13.2933 19.8667Z"
                                    fill="#6A6A6A" />
                            </svg>

                        </div>
                        <span>Missions</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="btn-nav">
                        <div class="icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M12 2.66663C8.50666 2.66663 5.66666 5.50663 5.66666 8.99996C5.66666 12.4266 8.34666 15.2 11.84 15.32C11.9467 15.3066 12.0533 15.3066 12.1333 15.32C12.16 15.32 12.1733 15.32 12.2 15.32C12.2133 15.32 12.2133 15.32 12.2267 15.32C15.64 15.2 18.32 12.4266 18.3333 8.99996C18.3333 5.50663 15.4933 2.66663 12 2.66663Z"
                                    fill="#6A6A6A" />
                                <path
                                    d="M18.7733 18.8667C15.0533 16.3867 8.98668 16.3867 5.24001 18.8667C3.54668 20 2.61334 21.5334 2.61334 23.1734C2.61334 24.8134 3.54668 26.3334 5.22668 27.4534C7.09334 28.7067 9.54668 29.3334 12 29.3334C14.4533 29.3334 16.9067 28.7067 18.7733 27.4534C20.4533 26.32 21.3867 24.8 21.3867 23.1467C21.3733 21.5067 20.4533 19.9867 18.7733 18.8667Z"
                                    fill="#6A6A6A" />
                                <path opacity="0.4"
                                    d="M26.6533 9.78664C26.8667 12.3733 25.0267 14.64 22.48 14.9466C22.4667 14.9466 22.4667 14.9466 22.4533 14.9466H22.4133C22.3333 14.9466 22.2533 14.9466 22.1867 14.9733C20.8933 15.04 19.7067 14.6266 18.8133 13.8666C20.1867 12.64 20.9733 10.8 20.8133 8.79997C20.72 7.71997 20.3467 6.7333 19.7867 5.8933C20.2933 5.63997 20.88 5.47997 21.48 5.42664C24.0933 5.19997 26.4267 7.14664 26.6533 9.78664Z"
                                    fill="#6A6A6A" />
                                <path
                                    d="M29.32 22.12C29.2133 23.4133 28.3867 24.5333 27 25.2933C25.6667 26.0267 23.9867 26.3733 22.32 26.3333C23.28 25.4667 23.84 24.3867 23.9467 23.24C24.08 21.5867 23.2933 20 21.72 18.7333C20.8267 18.0267 19.7867 17.4667 18.6533 17.0533C21.6 16.2 25.3067 16.7733 27.5867 18.6133C28.8133 19.6 29.44 20.84 29.32 22.12Z"
                                    fill="#6A6A6A" />
                            </svg>

                        </div>
                        <span>Friends</span>
                    </a>
                </li>
            </ul>
        </nav>
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

        
        // Get the button
        const scrollTopBtn = document.getElementById("scrollTopBtn");

        // Show/hide button when scrolling
        window.onscroll = () => {
        if (document.body.scrollTop > 200) {
            scrollTopBtn.classList.add("show");
        } else {
            scrollTopBtn.classList.remove("show");
        }
        };

        // Scroll to top on click
        scrollTopBtn.onclick = () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        };

    </script>
    <script>
           $('.buy_boost').click(function(){
            
            var now_id=$(this).attr("boost_id");
                $.ajax({
                      type: "POST",
                      url: '/buy_boost.php',
                      data: {"id": now_id},
                      success: function (result) {
                        if(result==1){
                            $('.successful').fadeIn(100);
                            $('.successful').fadeOut(5000);
                            setTimeout(function(){location.href='/inventory';},2000);                            
                        }else{                            
                            $('.failfull').fadeIn(100);
                            $('.failfull').fadeOut(5000);
                            setTimeout(function(){location.href='/inventory';},2000);                             
                        }
                      }
                 });
        })
          
        $('.buy_nft').click(function(){
            var now_id=$(this).attr("nft_id");
                $.ajax({
                      type: "POST",
                      url: '/buy_nft.php',
                      data: {"id": now_id},
                      success: function (result) {
                        if(result==1){
                            $('.successful').fadeIn(100);
                            $('.successful').fadeOut(5000);
                            setTimeout(function(){location.href='/inventory';},2000);                            
                        }else{                            
                            $('.failfull').fadeIn(100);
                            $('.failfull').fadeOut(5000);
                            setTimeout(function(){location.href='/inventory';},2000);                             
                        }                        
                      }
                 });
        })

        $('.buy_nft_chrlep').click(function(){
            var now_id=$(this).attr("nft_id");
                $.ajax({
                      type: "POST",
                      url: '/buy_nft_chrlep.php',
                      data: {"id": now_id},
                      success: function (result) {
                        if(result==1){
                            $('.successful').fadeIn(100);
                            $('.successful').fadeOut(5000);
                            setTimeout(function(){location.href='/inventory';},2000);                            
                        }else{                            
                            $('.failfull').fadeIn(100);
                            $('.failfull').fadeOut(5000);
                            setTimeout(function(){location.href='/inventory';},2000);                             
                        }                         
                      }
                 });
        })
    </script>