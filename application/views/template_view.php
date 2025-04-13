<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Charlie Game</title>
    <link rel="stylesheet" href="/assets/css/style.css?v=7">
</head>
<script src="https://telegram.org/js/telegram-web-app.js"></script>
<script type="text/javascript">
    var redic=0;
    if(window.Telegram.WebApp.platform=="ios"){
          redic=0;
    }
    if(window.Telegram.WebApp.platform=="android"){
          redic=0;
    }
    if(redic==1){
       location.href="/404";
    }
    var user_id=window.Telegram.WebApp.initDataUnsafe.user.id;
    var user_username=window.Telegram.WebApp.initDataUnsafe.user.username;
    var user_name=window.Telegram.WebApp.initDataUnsafe.user.first_name;
    var user_surname=window.Telegram.WebApp.initDataUnsafe.user.last_name;
    var photo_url=window.Telegram.WebApp.initDataUnsafe.user.photo_url;

    // var user_id=7712637143;
    // var user_username="";
    // var user_name="Mura";
    // var user_surname="Kimiko";
    // var photo_url="https://t.me/i/userpic/320/wUoE7gnt1J6RAJmyxzuHAxZ_m44m9ef2TlbrCEiXNgQRcq47Xr_8dQPoYcQleZk0.svg";
    window.Telegram.WebApp.expand();
    window.Telegram.WebApp.isClosingConfirmationEnabled = true;
    window.Telegram.WebApp.ready();
    window.Telegram.WebApp.colorScheme="dark";
    window.Telegram.WebApp.headerColor="#000000";
    window.Telegram.WebApp.backgroundColor="#000000";
    $.ajax({
        type: "POST",
        url: '/get_login.php',
        data: {"user_id": user_id, "name": user_name, "surname": user_surname, "nickname": user_username, "photo_url": photo_url, "user_username":""},
        success: function (result) {
            if(result=="1"){
                if(window.Telegram.WebApp.initDataUnsafe.user.language_code=='ru'){
                    // location.href="/lang/set/?lang=rus";
                }else{
                    // location.href="/lang/set/?lang=eng";        
                }
            }else{
                //award_check();
            }
        }
    });
    
</script>
<?php
  $user_data=Model::get_user_info();
if($user_data->online+3<time()){
    ?>
<style type="text/css">
    /* HTML: <div class="loader"></div> */
.loader {
    margin: 40% auto;
  width: 75px;
  aspect-ratio: 1;
  border-radius: 50%;
  border: 8px solid #fff;
  animation:
    l20-1 0.8s infinite linear alternate,
    l20-2 1.6s infinite linear;
}
@keyframes l20-1{
   0%    {clip-path: polygon(50% 50%,0       0,  50%   0%,  50%    0%, 50%    0%, 50%    0%, 50%    0% )}
   12.5% {clip-path: polygon(50% 50%,0       0,  50%   0%,  100%   0%, 100%   0%, 100%   0%, 100%   0% )}
   25%   {clip-path: polygon(50% 50%,0       0,  50%   0%,  100%   0%, 100% 100%, 100% 100%, 100% 100% )}
   50%   {clip-path: polygon(50% 50%,0       0,  50%   0%,  100%   0%, 100% 100%, 50%  100%, 0%   100% )}
   62.5% {clip-path: polygon(50% 50%,100%    0, 100%   0%,  100%   0%, 100% 100%, 50%  100%, 0%   100% )}
   75%   {clip-path: polygon(50% 50%,100% 100%, 100% 100%,  100% 100%, 100% 100%, 50%  100%, 0%   100% )}
   100%  {clip-path: polygon(50% 50%,50%  100%,  50% 100%,   50% 100%,  50% 100%, 50%  100%, 0%   100% )}
}
@keyframes l20-2{ 
  0%    {transform:scaleY(1)  rotate(0deg)}
  49.99%{transform:scaleY(1)  rotate(135deg)}
  50%   {transform:scaleY(-1) rotate(0deg)}
  100%  {transform:scaleY(-1) rotate(-135deg)}
}
        .ppreloader{
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: #000 url('/loading.jpg?v=10') center center;
            background-size: cover;
            z-index: 9999999999999;
        }
        .ppreloader2{
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: url('/loading.gif?v=10') center center;
/*            background: #000000c2;*/
            background-size: cover;
            z-index: 9999999999999;
        }
    </style>
    <div class="ppreloader">
        <div class="ppreloader2"></div>
    </div>
    
    <script type="text/javascript">
        
        $(window).on('load', function() {
            setTimeout(() => {
                $('.ppreloader').fadeOut(1000);
                location.href = '/';
            }, 3000);
        });
    </script>
<?php
}
?>


<body>

    <?php include 'application/views/'.$content_view; ?>    
    
    <?php include 'menu_bottom.php'; ?>
</body>

    <div class="daily-section" style="height: 90%!important;overflow-y: scroll!important;display:none;position: fixed;border: 0;bottom: 0;z-index: 99999;background: #000;">
        <div class="daily-title" style="float: right;margin-right: 5%;margin-top: -4%;" >
            <h1 onclick="$('.daily-section').fadeOut(100);">x</h1>
        </div>
        <div class="daily-title">
            <h1>Daily check</h1>
        </div>
        <div class="daily-days">
            <div class="daily-day award_day1 <?php if($user_data->repeat_visit==1){echo 'active';}?>" style="padding: 7px 16px;">
                <span>DAY 1</span>
                <p>+100 $CHRLEP</p>
                <button style="z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" class="gradient" onclick="location.href='/claim_daily_reward_ccoin.php';">15 CCOIN DOUBLE</button>
                <button style="z-index:999999999999;z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" onclick="location.href='/claim_daily_reward.php';"><?php if($user_data->repeat_visit>=1){echo'CLAIMED';}else{echo'CLAIM';}?></button>
            </div>
            <div class="daily-day award_day2 <?php if($user_data->repeat_visit==2){echo 'active';}?>" style="padding: 7px 16px;">
                <span>DAY 2</span>
                <p>+200 $CHRLEP</p>
                <button style="z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" onclick="location.href='/claim_daily_reward_ccoin.php';">15 CCOIN DOUBLE</button>
                <button style="z-index:999999999999;z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" onclick="location.href='/claim_daily_reward.php';"><?php if($user_data->repeat_visit>=2){echo'CLAIMED';}else{echo'CLAIM';}?></button>
            </div>
            <div class="daily-day award_day3 <?php if($user_data->repeat_visit==3){echo 'active';}?>" style="padding: 7px 16px;">
                <span>DAY 3</span>
                <p>+400 $CHRLEP</p>
                <button style="z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" onclick="location.href='/claim_daily_reward_ccoin.php';">15 CCOIN DOUBLE</button>
                <button style="z-index:999999999999;z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" onclick="location.href='/claim_daily_reward.php';"><?php if($user_data->repeat_visit>=3){echo'CLAIMED';}else{echo'CLAIM';}?></button>
            </div>
            <div class="daily-day award_day4 <?php if($user_data->repeat_visit==4){echo 'active';}?>" style="padding: 7px 16px;">
                <span>DAY 4</span>
                <p>+550 $CHRLEP</p>
                <button style="z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" onclick="location.href='/claim_daily_reward_ccoin.php';">15 CCOIN DOUBLE</button>
                <button style="z-index:999999999999;z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" onclick="location.href='/claim_daily_reward.php';"><?php if($user_data->repeat_visit>=4){echo'CLAIMED';}else{echo'CLAIM';}?></button>
            </div>
            <div class="daily-day award_day5 <?php if($user_data->repeat_visit==5){echo 'active';}?>" style="padding: 7px 16px;">
                <span>DAY 5</span>
                <p>+800 $CHRLEP</p>
                <button style="z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" onclick="location.href='/claim_daily_reward_ccoin.php';">15 CCOIN DOUBLE</button>
                <button style="z-index:999999999999;z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" onclick="location.href='/claim_daily_reward.php';"><?php if($user_data->repeat_visit>=5){echo'CLAIMED';}else{echo'CLAIM';}?></button>
            </div>
            <div class="daily-day award_day6 <?php if($user_data->repeat_visit==6){echo 'active';}?>" style="padding: 7px 16px;">
                <span>DAY 6</span>
                <p>+1250 $CHRLEP</p>
                <button style="z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" onclick="location.href='/claim_daily_reward_ccoin.php';">15 CCOIN DOUBLE</button>
                <button style="z-index:999999999999;z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" onclick="location.href='/claim_daily_reward.php';"><?php if($user_data->repeat_visit>=6){echo'CLAIMED';}else{echo'CLAIM';}?></button>
            </div>
            <div class="daily-day  <?php if($user_data->repeat_visit==7){echo 'active';}?> award_day7"style="padding: 7px 16px;">
                <span>DAY 7</span>
                <p>+1700 $CHRLEP</p>
                <button style="z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" onclick="location.href='/claim_daily_reward_ccoin.php';">15 CCOIN DOUBLE</button>
                <button style="z-index:999999999999;z-index:999999999999;margin-top: 2px;width: 150px;padding: 12px 11px;" onclick="location.href='/claim_daily_reward.php';"><?php if($user_data->repeat_visit>=7){echo'CLAIMED';}else{echo'CLAIM';}?></button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function award_check(){
             $.ajax({
                  type: "POST",
                  url: '/daily_reward.php',
                  data: {},
                  success: function (result) {
                    if(result=="999"){
                            $('.daily-day').removeClass('active');
                            $('.daily-section').fadeIn(100);

                    }else{
                        if(result==0){
                            console.log(0);
                        }else{
                            $('.daily-section').fadeIn(100);
                            if(result>1){
                                if(result>=8){
                                    $('.daily-day').removeClass('active');
                                    $('.award_day7').addClass('active');
                                    $('.dic7').addClass('active');
                                }else{

                                    $('.daily-day').removeClass('active');
                                // for (var i = 1; i < result; i++) {
                                //     $('.award_day'+i).addClass('done');
                                //     $('.dic'+i).addClass('active');
                                // }
                                    $('.award_day'+result).addClass('active');
                                    $('.dic'+result).addClass('active');
                                }
                            }else{
                                $('.dic1').addClass('active');
                                $('.award_day1').addClass('active');
                            }
                            balance_check();
                        }
                    }
                  }
              });
        }
        
        //const intervalID2 = setInterval(balance_check, 2000);
        function balance_check(){
             $.ajax({
                  type: "POST",
                  url: '/check_balance.php',
                  data: {},
                  success: function (result) {
                    console.log('cj')
                     $('.balance_chrle').text(parseFloat(result).toFixed(0));
                  }
             });

        }
        
        $(document).ready(function(){
            setTimeout(() => {
                const intervalID = setInterval( balance_check, 5000);
            },3000)
        });
    </script>


    <?php
    if(isset($_SESSION['user'])){
        $upd_online=Model::update_online();
        if(($upd_online>=900)&&(round(Model::get_profit_online($upd_online))>0 )){
    ?>
       <div class="earned-container">
        <div class="earned-modal">
            <form action="javascript:void(0)">
                <div class="earned-header">
                    <div class="close-container">
                        <div class="close closec" ><img src="./assets/img/close.svg" alt=""></div>
                    </div>
                </div>
                <div class="earned-content">
                    <h3 class="earned-title">You've earned <span>$CHRLEP!</span></h3>
                    <p class="earned-description">Your business makes a profit when you are offline.</p>
                    <div class="earned-sum-item">
                        <div class="earned-sum-pic"><img src="./assets/img/earned-pic.png" alt=""></div>
                        <div class="earned-summ-container">
                            <div class="earned-sum" id="profit"><?=round(Model::get_profit_online($upd_online));?></div>
                            <div class="earned-sum-currency">$CHRLEP</div>
                        </div>
                    </div>
                    <button class="gradient-whiteoutline buynft-btn closec" id="get_profit"><span>Claim</span></button>
                    <p class="earned-description-bottom">Don't forget to pick up your daily reward</p>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
            
        $('.closec').click(function(){
            $('.earned-container').fadeOut(0);
        });

        $('#get_profit').click(function(){
            $.ajax({
                  type: "POST",
                  url: '/get_profit.php',
                  data: {profit: $("#profit").html()},
                  success: function (result) {
                  }
             });
        });
    </script>
    <?php 
        }
        }
    ?>
</html>
<script type="text/javascript">
        function online_check(){
             $.ajax({
                  type: "POST",
                  url: '/online_check.php',
                  data: {},
                  success: function (result) {
                  }
             });

        }
        function mission_check1() {
            $.ajax({
                type: "POST",
                url: '/mission_check.php',
                data: {},
                success: function (result) {
                    if(result == "OK") {
                        $.ajax({
                            type: "POST",
                            url: '/transaction_check.php',
                            data: {},
                            success: function (result) {
                            }
                        });
                    }
                }
            });
        }
        function mission_check2() {
            $.ajax({
                type: "POST",
                url: '/mission_check2.php',
                data: {},
                success: function (result) {
                    if(result == "OK") {
                        $.ajax({
                            type: "POST",
                            url: '/transaction_check2.php',
                            data: {},
                            success: function (result) {
                            }
                        });
                    }
                }
            });
        }
    $(document).ready(function(){
      const intervalID = setInterval( online_check,1000);
    //   const intervalID1 = setInterval( mission_check1,1000);
    //   const intervalID1 = setInterval( mission_check2,1000);
    });
</script>