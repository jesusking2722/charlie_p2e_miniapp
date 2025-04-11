<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('location: /admin/login.php');
    exit;
}else{
    include '../includes/init_db.php';
    $mysqli = new init_db;
}
?>
<!Doctype html>
<html lang="en">

<head>
    <title>Список - Charlie Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/admin/assets/css/bootstrap.min.css"></head>
<style>
    /* HTML: <div class="loader"></div> */
/* HTML: <div class="loader"></div> */
.loader {
  width: fit-content;
  font-weight: bold;
  font-family: sans-serif;
  font-size:50px;
  padding-bottom: 8px;
  background: linear-gradient(currentColor 0 0) 0 100%/0% 3px no-repeat;
  animation: l2 2s linear infinite;
    margin: 22% auto;
    color: #fff;
}
.loader:before {
  content:"Loading..."
}
@keyframes l2 {to{background-size: 100% 3px}}


    body {
        font-size: .875rem;
    }

    .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
    }

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 40px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto;

    }

    @supports ((position: -webkit-sticky) or (position: sticky)) {
        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
        }
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #999;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
        color: inherit;
    }

    .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
    }

    [role="main"] {
        padding-top: 48px;
   
    }


    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }
</style>

<body>
<div class="preloader" style="width: 100%;height: 100%;position: fixed;left: 0;top: 0;background:#000000ad;z-index: 99999;">
    <div class="loader"></div>
</div>
    <div class="container-fluid">
        <div class="row">
        <a href="/admin/"><- Back</a>

          
        <!-- </div> -->
<?php
            $table=0;
 switch ($_GET['action']) {
        case 'all_users':
            $data=array();
            $select2 = $mysqli->select("users" , "id>0"," ORDER by id DESC") or die('Error DB');
            while($users = $select2->fetch_object()){
                $data[]=$users;
            }
            $title='All users';
            $table=1;
        break;
        case 'connected_wallet':
            $data=array();
            $select2 = $mysqli->select("users" , "wallet='1'"," ORDER by id DESC") or die('Error DB');
            while($users = $select2->fetch_object()){
                $data[]=$users;
            }
            $title='All Connected Wallet';
            $table=1;
        break;
        case 'zero_balance':
            $data=array();
            $select2 = $mysqli->select("users" , "balance_chrle='0'"," ORDER by id DESC") or die('Error DB');
            while($users = $select2->fetch_object()){
                $data[]=$users;
            }
            $title='All Zero Balance';
            $table=1;
        break;
        case 'all_pnft':
            $data=array();
                $count_nft=0;
                $select3 = $mysqli->select("nft" , "id>0"," ORDER by id DESC") or die('Error DB');
                while($nfts = $select3->fetch_object()){
                    $count_nft++;
                }
                $select2 = $mysqli->select("users" , "id>0"," ORDER by id DESC") or die('Error DB');
                while($users = $select2->fetch_object()){
                    $count_user_nft=0;
                    $select = $mysqli->select("users_nfts" , "user_id='".$users->id."'"," ORDER by id DESC") or die('Error DB');
                    while($users_nfts = $select->fetch_object()){
                        $count_user_nft++;
                    }
    
                    if($count_nft==$count_user_nft){
                        $data[]=$users;
                    }
                }
                    
            $title='Purchased All pNFT';
            $table=1;
        break;
        case 'mainsvg':
            $data=array();
            $select2 = $mysqli->select("users" , "mainsvg<>''"," ORDER by id DESC") or die('Error DB');
            while($users = $select2->fetch_object()){
                $data[]=$users;
            }
            $title='Users Finish MiniGame';
            $table=1;
        break;
        case 'purchased_pnft':
            $data=array();
            $select2 = $mysqli->select("users_nfts" , "id>0"," ORDER by id DESC") or die('Error DB');
            while($users = $select2->fetch_object()){
                $data[]=$users;
            }
            $title='All Purchased pNFT';
            $table=2;
        break;
        case 'purchased_boost':
            $data=array();
            $select2 = $mysqli->select("users_boosters" , "id>0"," ORDER by id DESC") or die('Error DB');
            while($users = $select2->fetch_object()){
                $data[]=$users;
            }
            $title='All Purchased Boosters';
            $table=2;
        break;
        
        default:
            // code...
            break;
    }
?>


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css"></head>


            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="width: 100%;padding-left: 0;padding-right: 0;flex: 100%!important;max-width: 100%;">
            <h5><?=$title;?></h5>
            <div class="table-responsive">
                    <table class="table table-striped table-sm" style="table-layout: fixed;" id="example">
                        <thead>
                        <?php
                        switch ($table) {
                            case '1':
                            ?>
                            <tr>
                                <th>id</th>
                                <th>login</th>
                                <th>Name</th>
                                <th>NickName</th>
                                <th>Balance CCOIN</th>
                                <th>Balance $CHRLEP</th>
                                <th>Balance Points</th>
                                <th>Date Registry</th>
                                <th>Last Visit</th>
                                <th>Last Daily Claim</th>
                                <th>Finish MiniGame</th>
                                <th>Connect Wallet</th>
                            </tr>
                         </thead> 
                        <tbody>
                            <?php
                                foreach ($data as $key => $value) {
                                    echo '<tr>';
                                        echo '<td>'.$value->id.'</td>';
                                        echo '<td>'.$value->login.'</td>';
                                        echo '<td style="width:86px;">'.$value->name.' '.$value->surname.'</td>';
                                        echo '<td style="width:86px;">'.$value->nickname.'</td>';
                                        echo '<td>'.round($value->balance_ccoin,0).'</td>';
                                        echo '<td>'.round($value->balance_chrle,0).'</td>';
                                        echo '<td>'.$value->points.'</td>';
                                        echo '<td>'.date("d/m/Y",$value->date).'</td>';
                                        echo '<td>'.date("d/m/Y",$value->last_online).'</td>';
                                        echo '<td>'.$value->last_visit.'</td>';
                                        if($value->mainsvg==""){
                                            echo '<td>No</td>';
                                        }else{
                                            echo '<td>Yes</td>';                                            
                                        }
                                        if($value->wallet=="0"){
                                            echo '<td>No</td>';
                                        }else{
                                            echo '<td>'.$value->name_wallet.'</td>';                                            
                                        }
                                    echo '</tr>';
                                }
                            ?>
                            <?php    
                            break;
                            case '2':
                            ?>
                            <tr>
                                <th>id</th>
                                <th>user_id</th>
                                <th>user_name</th>
                                <th>card_id</th>
                                <th>card_name</th>
                            </tr>
                            <?php
                                foreach ($data as $key => $value) {
                                    echo '<tr>';
                                        echo '<td>'.$value->id.'</td>';
                                        echo '<td>'.$value->user_id.'</td>';
                                            $select3 = $mysqli->select("users" , "id='".$value->user_id."'"," ORDER by id DESC") or die('Error DB');
                                            $us = $select3->fetch_object();
                                        echo '<td>'.$us->name.' '.$us->surname.'</td>';
                                        if($_GET['action']=='purchased_pnft'){
                                            echo '<td>'.$value->nft_id.'</td>';
                                            $select = $mysqli->select("nft" , "id='".$value->nft_id."'"," ORDER by id DESC") or die('Error DB');
                                            $card = $select->fetch_object();
                                            $name=$card->name;
                                            echo '<td>'.$name.'</td>';
                                        }
                                        if($_GET['action']=='purchased_boost'){
                                            echo '<td>'.$value->booster_id.'</td>';
                                            $select = $mysqli->select("boosters" , "id='".$value->booster_id."'"," ORDER by id DESC") or die('Error DB');
                                            $card = $select->fetch_object();
                                            $name=$card->name;
                                            echo '<td>'.$name.'</td>';
                                        }

                                    echo '</tr>';
                                }
                            ?>
                            <?php    
                            break;
                            
                            default:
                                // code...
                                break;
                        }

                        ?>
                            
                    </tbody>
                    </table>
                </div>
                
            </main>
        </div>
    </div>


    <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="/admin/assets/js/jquery.min.js"></script>
   <script src="/admin/assets/js/bootstrap.bundle.min.js"></script>
   <!-- For icons -->
   <script src="/admin/assets/icons/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    <!-- / -->
<script type="text/javascript">
    $(document).ready(function(){
        new DataTable('#example', {
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
            "pageLength" : 25,
             "order": [[0, 'desc']]
        });
        $('.preloader').fadeOut(300);
    })
</script>
</body>

</html>