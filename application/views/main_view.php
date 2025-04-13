<div class="header-bar">
        <div class="item">
            <?php
                $user_data=Model::get_user_info();
                $nfts=Model::get_user_nfts();
                $boosters=Model::get_user_boosters();
                if($user_data->photo_url!=""){
                    $avatar=$user_data->photo_url;
                }else{
                    $avatar='/assets/img/avatar.jpg';
                }
                $balance_chrle = $user_data->balance_chrle;

                $rank = "";
                if($balance_chrle > 0 && $balance_chrle < 1000000) {
                    $rank = 1;
                } else if($balance_chrle > 1000000 && $balance_chrle < 2500000) {
                    $rank = 2;
                } else if($balance_chrle > 2500000 && $balance_chrle < 5000000) {
                    $rank = 3;
                } else if($balance_chrle > 5000000 && $balance_chrle < 10000000) {
                    $rank = 4;
                } else {
                    $rank = 5;
                }
            ?>
            <div class="rank<?=$rank?>">
            <div class="avatar"><img src="<?=$avatar;?>" alt=""></div>
            </div>
            
            <div class="bar" onclick="award_check();if(op==0){$('.daily-section').fadeIn(100);op=1;}else{$('.daily-section').fadeOut(100);op=0;}">
                <div class="bar-progress" style="z-index: 99999;">
                    <span class="">Daily check</span>

                    <div class="progress-icons">
                        <div class="dic1 progress-icon <?php if($user_data->repeat_visit>=1){ echo "active"; }?>"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 8L6 10L0 10L0 0L10 0L10 6L8 8Z" fill="#444444" />
                            </svg>
                        </div>
                        <div class="dic2 progress-icon <?php if($user_data->repeat_visit>=2){ echo "active"; }?>"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 8L6 10L0 10L0 0L10 0L10 6L8 8Z" fill="#444444" />
                            </svg>
                        </div>
                        <div class="dic3 progress-icon <?php if($user_data->repeat_visit>=3){ echo "active"; }?>"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 8L6 10L0 10L0 0L10 0L10 6L8 8Z" fill="#444444" />
                            </svg>
                        </div>
                        <div class="dic4 progress-icon <?php if($user_data->repeat_visit>=4){ echo "active"; }?>"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 8L6 10L0 10L0 0L10 0L10 6L8 8Z" fill="#444444" />
                            </svg>
                        </div>
                        <div class="dic5 progress-icon <?php if($user_data->repeat_visit>=5){ echo "active"; }?>"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 8L6 10L0 10L0 0L10 0L10 6L8 8Z" fill="#444444" />
                            </svg>
                        </div>
                        <div class="dic6 progress-icon <?php if($user_data->repeat_visit>=6){ echo "active"; }?>"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 8L6 10L0 10L0 0L10 0L10 6L8 8Z" fill="#444444" />
                            </svg>
                        </div>
                        <div class="dic7 progress-icon <?php if($user_data->repeat_visit>=7){ echo "active"; }?>"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 8L6 10L0 10L0 0L10 0L10 6L8 8Z" fill="#444444" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <span class="farming-rate">Farming rate: <xxxx class="rate_farm">0.000</xxxx> $CHRLEP / h</span>
        </div>
        <div class="item" style="    z-index: 99998;right: 5%;position: absolute;">
            <span class="farming-rate" style="color: #fff;float: right;text-align: right;font-size: 1em;font-weight: bold;margin-top: -17px;"><a href="https://charlieunicornai-sale.eu/" target="_blank" class="gradient-whiteoutline connect-wallet"><span>Presale</span></a></span>
        </div>
    </div>
            <img src="/assets/img/main-image.svg" alt="" style="display:none;">
            <img src="/assets/img/main-image2.svg" alt="" style="display:none;">
          

    <div class="main-image-container">
        <div class="main-image">
            <?php 
                if($user_data->mainsvg==""){
                    $svg='/assets/img/main-image.svg';
                }else{
                    $svg=$user_data->mainsvg;
                }
                $everytimegame=0;
                if($everytimegame==1){
                    $svg='/assets/img/main-image.svg';
                    $user_data->mainsvg="";
                }
            ?>
            <img src="<?=$svg;?>" class="main-image-src" alt="">
        </div>
        <svg class="text-main-page" width="300" height="300" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <path id="path1" d="M150,150 m-80,0 a80,80 0 1,1 160,0 a80,80 0 1,1 -160,0" />
                <path id="path2" d="M150,150 m-80,0 a80,80 0 1,0 160,0 a80,80 0 1,0 -160,0" />
            </defs>

            <text font-size="12" fill="white" font-family="Arial">
                <textPath href="#path1" class="text1" style="display: none;" startOffset="10%" >Game over</textPath>
            </text>
            <text font-size="12" fill="white" font-family="Arial">
                <textPath href="#path1" class="text2" style="display: none;" startOffset="40%">lol xD</textPath>
            </text>
            <text font-size="12" fill="white" font-family="Arial">
                <textPath href="#path2" class="text3" style="display: none;" startOffset="30%">Try again</textPath>
            </text>
            <text font-size="12" fill="white" font-family="Arial">
                <textPath href="#path2" class="text4" style="display: none;" startOffset="0">Good :)</textPath>
            </text>
        </svg>
    </div>


  <!-- Подключаем SDK для работы с кошельками TON -->
  
  <!-- <script src="https://cdn.tonconnect.io/tonconnect-sdk.js"></script> -->
  <script src="https://unpkg.com/@tonconnect/sdk@latest/dist/tonconnect-sdk.min.js"></script>

  <script>
    let isConnected = false;
    window.onload = async () => {

      try {
        // Инициализация TonConnect SDK
        const connector = new TonConnectSDK.TonConnect({
          manifestUrl: 'https://ton-transaction-svelte.vercel.app/tonconnect-manifest.json'
        });
        // Элементы интерфейса
        const connectButton_all = document.getElementById('connect-wallet-buttonz');
        const connectButton1 = document.getElementById('connect-wallet-button1');
        const connectButton2 = document.getElementById('connect-wallet-button2');
        const disconnectButton = document.getElementById('disconnect-wallet-button');
        const sendTransactionButton = document.getElementById('send-transaction-button');
        const sTransactionButton1 = document.getElementById('send-transaction1');
        const sTransactionButton5 = document.getElementById('send-transaction5');
        const sTransactionButton10 = document.getElementById('send-transaction10');
        const sTransactionButton25 = document.getElementById('send-transaction25');
        const sTransactionButton100 = document.getElementById('send-transaction100');
        //const sTransactionButton01 = document.getElementById('send-transaction01');
        window.connector = connector;  // for experimenting in browser console
        
        const walletsList = await connector.getWallets();
        
        const unsubscribe = connector.onStatusChange(
          walletInfo => {
            console.log('Connection status:', walletInfo);
          }
        );
        connector.restoreConnection();

        // Функция для обновления видимости кнопок
        const updateButtonVisibility = () => {
            if (connector.connected) {
            $('.myModalWallet').fadeOut(100);
            connectButton_all.style.display = 'none';    
            disconnectButton.style.display = 'inline-block';
            sendTransactionButton.style.display = 'inline-block';
          } else {
            connectButton_all.style.display = 'inline-block';
            disconnectButton.style.display = 'none';
            sendTransactionButton.style.display = 'none';
          }
        };

        // Восстановление состояния подключения при загрузке страницы
        var savedConnection = "";
        await $.ajax({
                  type: "POST",
                  url: '/get_wallet.php',
                  success: function (result) {
                    if(result=='1'){
                       savedConnection=1;
                    }else{
                       savedConnection=0;                        
                    }
                  }
              });
        console.log("savedConnection"+savedConnection);
        //const savedConnection = localStorage.getItem('ton_wallet_connected');
        if (savedConnection) {
          try {
            await connector.restoreConnection(); // Восстанавливаем подключение
            console.log('Connection restored:', connector.account);
          } catch (error) {
            console.warn('Failed to restore connection:', error);
               $.ajax({
                  type: "POST",
                  url: '/remove_wallet.php',
                  success: function (result) {
                       savedConnection="";
                  }
              });
          }
        }

        // Обновляем кнопки после загрузки страницы
        updateButtonVisibility();

        // Обработчик для подключения кошелька
        connectButton1.addEventListener('click', async () => {

          try {
            const walletConnectionSource = {
                aboutUrl: "https://wallet.tg/",
                universalLink: 'https://t.me/wallet?attach=wallet', // Telegram Wallet  
                bridgeUrl: "https://walletbot.me/tonconnect-bridge/bridge",
                appName: "telegram-wallet",
            };       
            const universalLink = await connector.connect(walletConnectionSource);
            // console.log("wallet connected");
            // const walletsList = await connector.getWallets();
            // console.log(walletsList[0])
            // console.log('Generated connection link:', universalLink);
            // $.ajax({
            //       type: "POST",
            //       url: '/set_name_wallet.php',
            //       data: {'name':'telegram'},
            //       success: function (result) {
            //            savedConnection="";
            //       }
            //   });
            // // Переход по universalLink для подключения кошелька
            // //Telegram.WebApp.openLink(universalLink);
            window.open(universalLink, '_blank');
          } catch (error) {
            console.error('Connection failed:', error);
            alert('Failed to connect wallet. Please try again.');
          }
        });
        // Обработчик для подключения кошелька
        connectButton2.addEventListener('click', async () => {
          try {
                const walletConnectionSource = {
                  universalLink: 'https://app.tonkeeper.com/ton-connect', // Tonkeeper
                  bridgeUrl: "https://bridge.tonapi.io/bridge",
                };                
            const universalLink = await connector.connect(walletConnectionSource);
            console.log("tonkeeper", connector);
            try {
            console.log("Address", connector.wallet.account.address);
                
            } catch (error) {
                
            }

            // $.ajax({
            //       type: "POST",
            //       url: '/set_name_wallet.php',
            //       data: {'name':'tonkeeper'},
            //       success: function (result) {
            //            savedConnection="";
            //       }
            //   });
            window.open(universalLink, '_blank');
            // Telegram.WebApp.openLink(universalLink);
          } catch (error) {
            console.error('Connection failed:', error);
            alert('Failed to connect wallet. Please try again.');
          }
        });

        // Обработчик для отключения кошелька
        disconnectButton.addEventListener('click', async () => {
          try {
            await connector.disconnect(); // Отключаем кошелек
                $.ajax({
                  type: "POST",
                  url: '/remove_wallet.php',
                  success: function (result) {
                       savedConnection="";
                  }
              });
            console.log('Wallet disconnected');
            updateButtonVisibility();
          } catch (error) {
            console.error('Disconnection failed:', error);
            alert('Failed to disconnect wallet.');
          }
        });











        // Обработчик изменений статуса подключения
        connector.onStatusChange(walletInfo => {
          console.log('Wallet status changed:', walletInfo);
          if (walletInfo) {
               $.ajax({
                  type: "POST",
                  url: '/set_wallet.php',
                  success: function (result) {
                    //location.reload();
                  }
              });
          } else {
               $.ajax({
                  type: "POST",
                  url: '/remove_wallet.php',
                  success: function (result) {
                  }
              });
          }
          updateButtonVisibility();
        });

         sendTransactionButton.addEventListener('click', async () => {
             $.ajax({
                  type: "POST",
                  url: '/get_name_wallet.php',
                  success: function (result) {
                    if(result=='telegram'){
                        $('.myModalDepositTg').fadeIn(100);                        
                    }
                    if(result=='tonkeeper'){
                        $('.myModalDepositTk').fadeIn(100);                        
                    }
                  }
              });
         });



$('.send-transaction').on('click', async function () {
    var amountx=$(this).attr('amount');
    var wallet=$(this).attr('wallet');
    console.log("amountx: ", amountx, "wallet: ", wallet);
    const transaction1 = {
            validUntil: Math.floor(Date.now() / 1000) + 300,
            messages: [
              {
                address: 'UQDrY6os74OCIuyGYX8HFw5VWxT2ovWURWiZ6V1_4QBH79hu', 
                amount: (parseInt(amountx) * 1e9).toString()
              }
            ]
          };

          const tonSpaceLink = `https://t.me/wallet/start?startapp=tonconnect`;
          if(wallet=='telegram'){
            window.open(tonSpaceLink, '_blank');
          }      
          if(wallet=='tonkeeper'){
            const tonKeeperLink = `https://app.tonkeeper.com/transfer/`;
            Telegram.WebApp.openLink(tonKeeperLink);
          }      
                try {
                    if (!connector.connected) {
                      alert('Please connect your wallet first.');
                      return;
                    }
                    const result = await connector.sendTransaction(transaction1); // Отправка транзакции
                } catch (error) {
                    console.log('Failed to send transaction. Please try again.');
                }

});
       } catch (error) {
        console.error('Error during TonConnect initialization:', error);
        
      }
    };
  </script>
    <!-- <div class="item" style="z-index: 99998;left: 3.5%; top: 34%;position: absolute;">
        <img width="30" height="30" src="/assets/img/pickaxe.svg" id="mining-pick" alt="Mining Pick" />
    </div> -->

    <div class="blocks">
        <div class="balance">
            <div class="balance-item">
                <div class="balance-summ">
                    <span class="balance_chrle"><?=round($user_data->balance_chrle);?></span>
                    <p>$CHRLEP</p>
                </div>
                  <!-- Кнопка для подключения кошелька -->
  <!-- Статус подключения -->
  
                <p class="gradient-whiteoutline connect-wallet" style="z-index:99999" id="connect-wallet-buttonz" onclick="$('.myModalWallet').fadeIn(100);" wallet="asdasd"><span>Connect wallet</span></p>
                <p class="gradient-whiteoutline connect-wallet" id="disconnect-wallet-button" style="display:none;z-index:99999"><span>Disconnect wallet</span></p>
            </div>
            <div class="balance-item">
                <div class="balance-summ">
                    <span><?=floatVal($user_data->balance_ccoin);?></span>
                    <p>CCOIN</p>
                </div>
                <p class="gradient-whiteoutline" id="send-transaction-button" style="display:none;z-index:99999"><span>DEPOSIT</span></p>
            </div>
            <div class="balance-btns">
                <a href="#" class="gradient-whiteoutline buynft-btn active-tab"   id="buy-nft-btn"><span>pNFTs</span></a>
                <a href="#" class="gradient-whiteoutline buynft-btn-gray" id="boosters-btn"><span>Boosters</span></a>
            </div>
        </div>

        <div id="buy-nft-content" class="tab-content-main active-content">
            <div class="your-nft">
                <div class="nft-title">
                    <h2>Your pNFT’s </h2>
                    <a href="http://charlieunicornaimarketplace.eu/" target="_blank" style="width:auto;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;position: relative;    font-size: 1.1em;font-weight: bold;clip-path: polygon(12px 0, 100% 0, 100% calc(100% - 12px), calc(100% - 12px) 100%, 0 100%, 0 12px);border: 2px solid;padding: 0px 20px;">Mint</a>
                    <a href="/marketplace/"><img src="/assets/img/plus.svg" alt=""></a>
                </div>
                <div class="nft-content" style="max-height: 300px;overflow-y: auto;">
                    <?php
                        foreach ($nfts as $key => $value) {
                    ?>
                        <div class="nft-item myBtn<?=$value->nft_id;?>" >
                            <img src="<?=Model::get_img_ntf_by_id($value->nft_id);?>" alt="">
                        </div>
                    <?php                            
                        }
                    ?>          
                </div>
            </div>
        </div>
        <div id="boosters-content" class="tab-content-main">
            <div class="your-nft">
                <div class="nft-title">
                    <h2>Your Boosters</h2>
                    <a href="/marketplace/"><img src="/assets/img/plus.svg" alt=""></a>
                </div>
                <div class="nft-content">
                    <?php
                        foreach ($boosters as $key => $value) {
                            if(!$value->booster_id){continue;}
                    ?>
                        <div class="nft-item boost<?=$value->booster_id;?>">
                            <img src="<?=Model::get_img_booster_by_id($value->booster_id);?>" alt="">
                        </div>
                    <?php                            
                        }
                    ?>          
                </div>
            </div>
        </div>
        <script type="text/javascript">
            window.addEventListener('ton-connect-transaction-signed', (event) => {
             var amo=event.detail.messages[0].amount/1000000000;
             $.ajax({
                  type: "POST",
                  url: '/transaction.php',
                  data: {"amount": amo},
                  success: function (result) {
                        alert("Transaction Confirmed!");
                        location.href='/';
                  }
              });
            });
        </script>
        <div class="news-main">
            <div class="news-title">
                <h2>News</h2>
                <a href="https://x.com/chrleunicornai?s=21" target="_blank">All news</a>
            </div>
            <div class="news-items">

                    <div class="news-item" style="">
                        <div class="news-picture">
                            <a href="https://x.com/chrleunicornai?s=21" target="_blank" style="text-decoration: none;"><img src="/assets/news1.jpg" alt=""></a>
                        </div>
                        <div class="news-description">
                            <a href="https://x.com/chrleunicornai?s=21" target="_blank" style="text-decoration: none;"><p>Charlie Unicorn AI news</p></a>
                        </div>
                    </div>


                    <div class="news-item" style="">
                        <div class="news-picture">
                            <a href="https://x.com/chrleunicornai?s=21" target="_blank" style="text-decoration: none;"><img src="/assets/news2.jpg" alt=""></a>
                        </div>
                        <div class="news-description">
                            <a href="https://x.com/chrleunicornai?s=21" target="_blank" style="text-decoration: none;"><p>Charlie Unicorn AI news</p></a>
                        </div>
                    </div>
                
            </div>
        </div>
        <div class="choosennft-main" style="display:none;">
            <div class="choosennft-title">
                <h2>Chosen pNFT</h2>
                <a href="#">All attributes</a>
            </div>
            <div class="choosennft-items">
                <div class="choosennft-photo"><img src="/assets/img/nft.jpg" alt=""></div>
                <div class="choosennft-txt">
                    <h3>Attributes</h3>
                    <ul>
                        <li><span>Skeleton:</span> Sad Days Better luck next time</li>
                        <li><span>Mouth Traits:</span> Sad Days Better luck next time</li>
                        <li><span>Lasor eye Beams:</span> Grean Beam 1</li>
                        <li><span>Chains With Medallions:</span> Sad Days Better luck next time</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="minigames-main">
            <div class="minigames-title">
                <h2>Mini-games</h2>
            </div>
            <div class="minigames-items">
                <div class="minigames-item active">
                    <div class="mark">
                        <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 2.5L4 0.5H10V10.5H0V4.5L2 2.5Z" fill="#444444" />
                        </svg>
                    </div>
                    <span>Charlie lottery</span>
                    <a href="#">Soon...</a>
                </div>
                <div class="minigames-item">
                    <div class="mark">
                        <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 2.5L4 0.5H10V10.5H0V4.5L2 2.5Z" fill="#444444" />
                        </svg>
                    </div>
                    <span>Charlie jump</span>
                    <a href="#">Soon...</a>
                </div>
                <div class="minigames-item">
                    <div class="mark">
                        <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 2.5L4 0.5H10V10.5H0V4.5L2 2.5Z" fill="#444444" />
                        </svg>
                    </div>
                    <span>Charlie fly
                    </span>
                    <a href="#">Soon...</a>
                </div>
            </div>
        </div>
    </div>
<?php
        if($user_data->mainsvg==""){
?>
    <script type="text/javascript">
        var start_click=0;
        var randomNumber = Math.floor(Math.random() * 22) + 1;
        $('.text-main-page').click(function(){
            Telegram.WebApp.HapticFeedback.impactOccurred('heavy');
            if(start_click==666){return 0;}
            start_click++;
            var degs=3*start_click;
            if(start_click>=1){
                $('.main-image-src').attr("style","transform: rotate("+degs+"deg);")
                $('.main-image-src').attr("src","/assets/img/main-image.svg")
                $('.text1').attr('style','display:none;');
                $('.text2').attr('style','display:none;');
                $('.text3').attr('style','display:none;');
                $('.text4').attr('style','display:none;');
                $('.text3').attr('style','');
                $('.text3').text('Good :)');
            }
            if(start_click>=2){
                $('.main-image-src').attr("style","transform: rotate(0deg);")
                $('.main-image-src').attr("src","/assets/img/main-image.svg")
                $('.text1').attr('style','display:none;');
                $('.text2').attr('style','display:none;');
                $('.text3').attr('style','display:none;');
                $('.text4').attr('style','display:none;');
            }
            if(start_click>=3){
                $('.main-image-src').attr("style","transform: rotate("+degs+"deg);")
                $('.main-image-src').attr("src","/assets/img/main-image.svg")
                $('.text1').attr('style','display:none;');
                $('.text2').attr('style','display:none;');
                $('.text3').attr('style','display:none;');
                $('.text4').attr('style','display:none;');
                $('.text2').attr('style','');
                $('.text2').text('Try again');
            }
            if(start_click>=4){
                $('.main-image-src').attr("style","transform: rotate(0deg);")
                $('.main-image-src').attr("src","/assets/img/main-image.svg")
                $('.text1').attr('style','display:none;');
                $('.text2').attr('style','display:none;');
                $('.text3').attr('style','display:none;');
                $('.text4').attr('style','display:none;');
            }
            if(start_click>=5){
                $('.main-image-src').attr("style","transform: rotate("+degs+"deg);")
                $('.main-image-src').attr("src","/assets/img/main-image.svg")
                $('.text1').attr('style','display:none;');
                $('.text2').attr('style','display:none;');
                $('.text3').attr('style','display:none;');
                $('.text4').attr('style','display:none;');
                $('.text2').attr('style','');
                $('.text2').text('Game Over');
            }
            if(start_click>=6){
                $('.main-image-src').attr("style","transform: rotate(0deg);")
                $('.main-image-src').attr("src","/assets/img/main-image.svg")
                $('.text1').attr('style','display:none;');
                $('.text2').attr('style','display:none;');
                $('.text3').attr('style','display:none;');
                $('.text4').attr('style','display:none;');
            }
            if(start_click>=7){
                $('.main-image-src').attr("style","transform: rotate("+degs+"deg);")
                $('.main-image-src').attr("src","/assets/img/main-image2.svg")
                $('.text1').attr('style','display:none;');
                $('.text2').attr('style','display:none;');
                $('.text3').attr('style','display:none;');
                $('.text4').attr('style','display:none;');
                $('.text3').attr('style','');
                $('.text3').text('lol xD');
            }
            if(start_click>=8){
                $('.main-image-src').attr("style","transform: rotate(0deg);")
                $('.main-image-src').attr("src","/assets/img/main-image.svg")
                $('.text1').attr('style','display:none;');
                $('.text2').attr('style','display:none;');
                $('.text3').attr('style','display:none;');
                $('.text4').attr('style','display:none;');
            }
            if(start_click>=9){

                $('.main-image-src').attr("style","transform: rotate("+degs+"deg);")
                $('.main-image-src').attr("src","/assets/img/main-image2.svg")
                $('.text1').attr('style','display:none;');
                $('.text2').attr('style','display:none;');
                $('.text3').attr('style','display:none;');
                $('.text4').attr('style','display:none;');
                $('.text1').attr('style','');
                $('.text1').text('it tickles xD');
            }
            if(start_click>=10){
                $('.main-image-src').attr("style","transform: rotate(0deg);")
                $('.main-image-src').attr("src","/assets/img/main-image.svg")
                $('.text1').attr('style','display:none;');
                $('.text2').attr('style','display:none;');
                $('.text3').attr('style','display:none;');
                $('.text4').attr('style','display:none;');
            }
            if(start_click>=11){
                $('.main-image-src').attr("src","/assets/ending"+randomNumber+".png")
                $('.main-image-src').attr("style","transform: rotate(0deg);")
                $('.text1').attr('style','');
                $('.text1').text('GAME SOON');
                start_click=666;
                $('.text1').fadeOut(2000);
                  $.ajax({
                      type: "POST",
                      url: 'upd_mainsvg.php',
                      data: {"mainsvg": "/assets/ending"+randomNumber+".png"},
                      success: function (result) {
                        
                      }
                 });
            }
        });
    </script>
<?php }else{ ?>

    <script type="text/javascript">
        var start_click=0;
        var randomNumber = Math.floor(Math.random() * 22) + 1;
        var degs=0;
        var step_text=1;
        $('.text-main-page').click(function(){
            Telegram.WebApp.HapticFeedback.impactOccurred('heavy');
            start_click++;
             $.ajax({
                      type: "POST",
                      url: 'upd_mainsvg_1coin.php',
                      success: function (result) {
                        $('.text1').attr('style','display:none;');
                        $('.text2').attr('style','display:none;');
                        $('.text3').attr('style','display:none;');
                        $('.text4').attr('style','display:none;');
                
                        $('.text'+step_text).attr('style','font-size: 1.4em;');
                        $('.text'+step_text).text('+1');
                        $('.text'+step_text).fadeOut(2000);

                            if(degs==0){
                                $('.main-image-src').attr("style","transform: rotate(1deg);")
                                degs++;
                            }else{
                                $('.main-image-src').attr("style","transform: rotate(-1deg);")
                                degs=0;
                            }
                            if(start_click==1000){
                                $('.main-image-src').attr("src","/assets/ending"+randomNumber+".png")
                                $('.main-image-src').attr("style","transform: rotate(0deg);")
                                $('.text1').attr('style','');
                                $('.text1').text('GAME SOON');
                                start_click=0;
                                $('.text1').fadeOut(2000);
                                  $.ajax({
                                      type: "POST",
                                      url: 'upd_mainsvg1.php',
                                      data: {"mainsvg": "/assets/ending"+randomNumber+".png"},
                                      success: function (result2) {
                                        randomNumber = Math.floor(Math.random() * 22) + 1;
                                      }
                                 });
                            }
                            $('.balance_chrle').text(result)
                        step_text=step_text+1
                        if(step_text>4){step_text=1;}
                      }
                 });

           
        });
    </script>
<?php } ?>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const buyNftBtn = document.getElementById("buy-nft-btn");
            const boostersBtn = document.getElementById("boosters-btn");
            const buyNftContent = document.getElementById("buy-nft-content");
            const boostersContent = document.getElementById("boosters-content");
            function activateTab(button, content) {
                // Убираем активные классы у всех кнопок и контента
                document.querySelectorAll(".balance-btns a").forEach(btn => btn.classList.remove("active-tab"));
                document.querySelectorAll(".tab-content-main").forEach(tab => tab.classList.remove("active-content"));

                // Добавляем активные классы для выбранных элементов
                button.classList.add("active-tab");
                content.classList.add("active-content");
            }

            buyNftBtn.addEventListener("click", (e) => {
                e.preventDefault();
                activateTab(buyNftBtn, buyNftContent);
            });

            boostersBtn.addEventListener("click", (e) => {
                e.preventDefault();
                activateTab(boostersBtn, boostersContent);
            });
        });
            
function chech_rate(){
             $.ajax({
                  type: "POST",
                  url: '/check_rate_farm.php',
                  data: {},
                  success: function (result) {
                    console.log('cj')
                     $('.rate_farm').text(parseFloat(result));
                  }
             });

        }


function click_btn(wallet){
          if(wallet==1){
            $('#connect-wallet-button_val').attr("wallet","1");
            $('#connect-wallet-button').click();
          }
          if(wallet==2){
            $('#connect-wallet-button_val').attr("wallet","2");
            $('#connect-wallet-button').click();
          }

        }


 $(document).ready(function(){
    chech_rate();
        setTimeout(() => {
        
        const INTERVAL = setInterval( chech_rate, 5000);

        },3000)
    });

window.addEventListener('ton-connect-transaction-signing-failed', (event) => {
    alert('Failed to send transaction. Please try again.');
});
    </script>




    <div class="modal myModalWallet">
        <div class="modal-container">
            <div class="modal-content">
                <div class="close-container">
                    <span class="close" style="z-index:99999999999999">
                        <img src="/assets/img/close.svg" alt="">
                    </span>
                </div>
                    <div class="modal-line" style="    margin-top: 45px;display: flex;justify-content: center;align-items: center;text-align: center;">
                        <h1 style="color: #ce89ca;font-size: 30px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;">Choose Wallet</h1>
                    </div>

                    <div class="modal-txt" id="connect-wallet-button1" style="float: left;width: 46%;margin: 2%;">
                        <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                        <img src="/assets/ton_wallet.png" style="width: 64px;margin: 15px;">
                        <b style="font-size: 16px;font-weight: bold;">Telegram <br>Wallet</b>
                    </div>
                    </div>

                    <div class="modal-txt"  id="connect-wallet-button2"  style="float: left;width: 46%;margin: 2%;">
                        <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                        <img src="/assets/tonkeeper.png" style="width: 64px;margin: 15px;">
                        <b style="font-size: 16px;font-weight: bold;">TonKeeper<br> Wallet</b>
                    </div>
                    </div>

                

                </div>
        </div>
    </div>





    <div class="modal myModalDepositTg">
        <div class="modal-container">
            <div class="modal-content">
                <div class="close-container">
                    <span class="close" style="z-index:99999999999999">
                        <img src="/assets/img/close.svg" alt="">
                    </span>
                </div>
                <div class="modal-line" style="    margin-top: 45px;display: flex;justify-content: center;align-items: center;text-align: center;">
                    <h1 style="color: #ce89ca;font-size: 30px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;">Buy CCOIN</h1>
                </div>

                <div class="modal-txt send-transaction" amount="1" wallet="telegram" style="float: left;width: 46%;margin: 2%;">
                    <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 100 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 1 TON</b>
                </div>
                </div>

                
                <div class="modal-txt send-transaction" amount="5" wallet="telegram"  style="float: left;width: 46%;margin: 2%;">
                    <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 550 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 5 TON</b>
                </div>
                </div>
                
                <div class="modal-txt send-transaction" amount="10" wallet="telegram"  style="float: left;width: 46%;margin: 2%;">
                    <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 1200 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 10 TON</b>
                </div>
                </div>
                
                <div class="modal-txt send-transaction" amount="25" wallet="telegram"  style="float: left;width: 46%;margin: 2%;">
                    <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 3200 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 25 TON</b>
                </div>
                </div>
                
                <div class="modal-txt send-transaction" amount="100" wallet="telegram"  style="width: 96%;margin: 2%;">
                    <div class="minigames-item active" style="width: 46%;margin: 0 auto;display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 13000 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 100 TON</b>
                </div>
                </div>


                </div>
        </div>
    </div>



    <div class="modal myModalDepositTk">
        <div class="modal-container">
            <div class="modal-content">
                <div class="close-container">
                    <span class="close" style="z-index:99999999999999">
                        <img src="/assets/img/close.svg" alt="">
                    </span>
                </div>
                <div class="modal-line" style="    margin-top: 45px;display: flex;justify-content: center;align-items: center;text-align: center;">
                    <h1 style="color: #ce89ca;font-size: 30px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;">Buy CCOIN</h1>
                </div>

                <div class="modal-txt send-transaction" amount="1" wallet="tonkeeper" style="float: left;width: 46%;margin: 2%;">
                    <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 100 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 1 TON</b>
                </div>
                </div>

                
                <div class="modal-txt send-transaction" amount="5" wallet="tonkeeper"  style="float: left;width: 46%;margin: 2%;">
                    <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 550 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 5 TON</b>
                </div>
                </div>
                
                <div class="modal-txt send-transaction" amount="10" wallet="tonkeeper"  style="float: left;width: 46%;margin: 2%;">
                    <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 1200 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 10 TON</b>
                </div>
                </div>
                
                <div class="modal-txt send-transaction" amount="25" wallet="tonkeeper"  style="float: left;width: 46%;margin: 2%;">
                    <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 3200 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 25 TON</b>
                </div>
                </div>
                
                <div class="modal-txt send-transaction" amount="100" wallet="tonkeeper"  style="width: 96%;margin: 2%;">
                    <div class="minigames-item active" style="width: 46%;margin: 0 auto;display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 13000 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 100 TON</b>
                </div>
                </div>


                </div>
        </div>
    </div>





    <div class="modal myModalDeposit">
        <div class="modal-container">
            <div class="modal-content">
                <div class="close-container">
                    <span class="close" style="z-index:99999999999999">
                        <img src="/assets/img/close.svg" alt="">
                    </span>
                </div>
                <div class="modal-line" style="    margin-top: 45px;display: flex;justify-content: center;align-items: center;text-align: center;">
                    <h1 style="color: #ce89ca;font-size: 30px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;">Buy CCOIN</h1>
                </div>

                <div class="modal-txt" id="send-transaction1" style="float: left;width: 46%;margin: 2%;">
                    <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 100 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 1 TON</b>
                </div>
                </div>

                
                <div class="modal-txt" id="send-transaction5" style="float: left;width: 46%;margin: 2%;">
                    <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 550 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 5 TON</b>
                </div>
                </div>
                
                <div class="modal-txt" id="send-transaction10" style="float: left;width: 46%;margin: 2%;">
                    <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 1200 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 10 TON</b>
                </div>
                </div>
                
                <div class="modal-txt" id="send-transaction25" style="float: left;width: 46%;margin: 2%;">
                    <div class="minigames-item active" style="display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 3200 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 25 TON</b>
                </div>
                </div>
                
                <div class="modal-txt" id="send-transaction100" style="width: 96%;margin: 2%;">
                    <div class="minigames-item active" style="width: 46%;margin: 0 auto;display: flex;justify-content: center;align-items: center;text-align: center;">
                    <xxx style="color: #ce89ca;font-size: 18px;font-style: normal;font-family: 'Montserrat', sans-serif;font-weight: 600;line-height: normal;text-transform: none;text-decoration: none;background: linear-gradient(90deg, #CE89CA 0%, #5885BF 33%, #7258DF 67%, #75EEA3 100%);-webkit-background-clip: text;text-align: center;-webkit-text-fill-color: transparent;margin-bottom: 5px;">Buy 13000 CCOIN</xxx>
                    <b style="font-size: 16px;font-weight: bold;">For 100 TON</b>
                </div>
                </div>


                </div>
        </div>
    </div>
    <script type="text/javascript">
        
$('.close').click(function(){
    $('.myModalDeposit').fadeOut(0);
    $('.myModalDepositTg').fadeOut(0);
    $('.myModalDepositTk').fadeOut(0);
    $('.myModalWallet').fadeOut(0);
})
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


<script type="text/javascript">
    var op=0;
</script>
