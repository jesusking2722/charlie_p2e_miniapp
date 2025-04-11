<?php
    $user_data=Model::get_user_info();
?>
<div class="friends-section">
        <div style="display:flex;justify-content:center;align-items:center">
            <div class="friends-title">
                <h1>WORLD RANKING</h1>
            </div>
        </div>
        <div class="ranks">
            <div class="ranks-title">
                <h2>Ranks</h2>
            </div>
            <div class="ranks-items">
                <div class="ranks-items-items">
                <?php
                    $user_data=Model::get_user_by_ranking();
			        $mysqli = new init_db;
                    foreach ($user_data as $key => $value) {
                        $rate_users=0;
                        $n1 = $mysqli->select("users_nfts" , "user_id='".$value->id."'"," ORDER by id ASC") or die('Error DB');
                        while ($r1 = $n1->fetch_object()) {
                            $select2 = $mysqli->select("nft" , "id='".$r1->nft_id."'"," ORDER by id DESC") or die('Error DB');
                            $nft = $select2->fetch_object();
                            $rate_users=$rate_users+$nft->farming;
                        }
                        $balance_chrle = $value->balance_chrle * 0.3 + $rate_users * 0.7;
                        $rankname = "";
                        $rankpercent = 0;
                        if($balance_chrle > 0 && $balance_chrle < 1000000) {
                            $rankname = "Bronze";
                            $rankpercent = ($balance_chrle / 1000000) * 100;
                        } else if($balance_chrle > 1000000 && $balance_chrle < 2500000) {
                            $rankname = "Silver";
                            $rankpercent = ($balance_chrle / 2500000) * 100;
                        } else if($balance_chrle > 2500000 && $balance_chrle < 5000000) {
                            $rankname = "Gold";
                            $rankpercent = ($balance_chrle / 5000000) * 100;
                        } else if($balance_chrle > 5000000 && $balance_chrle < 10000000) {
                            $rankname = "Platinum";
                            $rankpercent = ($balance_chrle / 10000000) * 100;
                        } else {
                            $rankname = "Diamond";
                            $rankpercent = 100;
                        }
                ?>
                    <div class="ranks-item" data-number="<?=$key+1;?>">
                        <div style="width:100%">
                            <div style="display:flex; justify-content:center;align-items:center">
                                <div class="ranks-avatar"><img src="<?=$value->photo_url;?>" alt=""></div>
                                <div class="ranks-name"><?=$value->name;?></div>
                                <div class="ranks-balance"><?=intval($balance_chrle);?> Score</div>
                            </div>
                            <div class="user-rank">
                                <div class="rank-name">
                                    <?=$rankname?>
                                </div>
                                <div class="progress-container">
                                    <div class="progress" style="width:<?=intval($rankpercent)?>%" id="progress<?=$value->id;?>" value="<?=$value->balance_chrle;?>"></div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
   