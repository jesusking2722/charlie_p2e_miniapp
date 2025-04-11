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
    <title>Главная - Charlie Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/admin/assets/css/bootstrap.min.css">
</head>
<style>
   body{font-size:.875rem}.feather{width:16px;height:16px;vertical-align:text-bottom}.sidebar{position:fixed;top:0;bottom:0;left:0;z-index:100;padding:30px 0 0;box-shadow:inset -1px 0 0 rgba(0,0,0,.1)}.sidebar-sticky{position:relative;top:0;height:100%;padding-top:.5rem;overflow-x:hidden;overflow-y:auto}@supports ((position:-webkit-sticky) or (position:sticky)){.sidebar-sticky{position:-webkit-sticky;position:sticky}}.sidebar .nav-link{font-weight:500;color:#333}.sidebar .nav-link .feather{margin-right:4px;color:#999}.sidebar .nav-link.active .feather,.sidebar .nav-link:hover .feather{color:inherit}.sidebar-heading{font-size:.75rem;text-transform:uppercase}[role=main]{padding-top:30px}.navbar-brand{padding-top:.75rem;padding-bottom:.75rem;font-size:1rem;background-color:rgba(0,0,0,.25);box-shadow:inset -1px 0 0 rgba(0,0,0,.25)}
/* HTML: <div class="loader"></div> */
.loader {
  width: fit-content;
  font-weight: bold;
  font-family: sans-serif;
  font-size: 50px;
  padding-bottom: 8px;
  background: linear-gradient(currentColor 0 0) 0 100%/0% 3px no-repeat;
  animation: l2 2s linear infinite;
color: #fff;
    margin: 22% auto;
}
.loader:before {
  content:"Loading..."
}
@keyframes l2 {to{background-size: 100% 3px}}


</style>

<body>
<div class="preloader" style="width: 100%;height: 100%;position: fixed;left: 0;top: 0;background:#000000ad;z-index: 99999;">
    <div class="loader"></div>
</div>
    <div class="container-fluid">
        <div class="row">
            
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                <div class="row">
                    <div class="card text-white bg-dark m-3 col-md-4">
                        <div class="card-header">
                            <h5><b>Total User</b></h5>
                        </div>
                        <?php
                        $count=0;
                        $select2 = $mysqli->select("users" , "id>0"," ORDER by id DESC") or die('Error DB');
                        while($users = $select2->fetch_object()){
                            $count++;
                        }
                        ?>
                        <div class="card-body">
                            <a href="/admin/list.php?action=all_users"><h1><?=$count;?><button type="button" class="btn btn-primary mt-2 float-right">View Users</button></h1></a>
                        </div>
                    </div>
                    <div class="card text-white bg-dark m-3 col-md-4">
                        <div class="card-header">
                            <h5><b>Total Connected Wallet</b></h5>
                        </div>
                        <?php
                        $count=0;
                        $select2 = $mysqli->select("users" , "wallet='1'"," ORDER by id DESC") or die('Error DB');
                        while($users = $select2->fetch_object()){
                            $count++;
                        }
                        ?>
                        <div class="card-body">
                            <a href="/admin/list.php?action=connected_wallet"><h1><?=$count;?><button type="button" class="btn btn-primary mt-2 float-right">View Wallet</button></h1></a>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="card text-white bg-dark m-3 col-md-4">
                        <div class="card-header">
                            <h5><b>Purchased pNFT</b></h5>
                        </div>
                        <?php
                        $count=0;
                        $select2 = $mysqli->select("users_nfts" , "id>0"," ORDER by id DESC") or die('Error DB');
                        while($users = $select2->fetch_object()){
                            $count++;
                        }
                        ?>
                        <div class="card-body">
                            <a href="/admin/list.php?action=purchased_pnft"><h1><?=$count;?><button type="button" class="btn btn-primary mt-2 float-right">View pNFT</button></h1></a>
                        </div>
                    </div>
                    <div class="card text-white bg-dark m-3 col-md-4">
                        <div class="card-header">
                            <h5><b>Purchased Boosters</b></h5>
                        </div>
                        <?php
                        $count=0;
                        $select2 = $mysqli->select("users_boosters" , "id>0"," ORDER by id DESC") or die('Error DB');
                        while($users = $select2->fetch_object()){
                            $count++;
                        }
                        ?>
                        <div class="card-body">
                            <a href="/admin/list.php?action=purchased_boost"><h1><?=$count;?><button type="button" class="btn btn-primary mt-2 float-right">View Boosters</button></h1></a>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="card text-white bg-dark m-3 col-md-4">
                        <div class="card-header">
                            <h5><b>Zero balance User</b></h5>
                        </div>  
                        <?php
                        $count=0;
                        $select2 = $mysqli->select("users" , "balance_chrle='0'"," ORDER by id DESC") or die('Error DB');
                        while($users = $select2->fetch_object()){
                            $count++;
                        }
                        ?>
                        <div class="card-body">
                            <a href="/admin/list.php?action=zero_balance"><h1><?=$count;?><button type="button" class="btn btn-primary mt-2 float-right">View Balance</button></h1></a>
                        </div>
                    </div>
                    <div class="card text-white bg-dark m-3 col-md-4">
                        <div class="card-header">
                            <h5><b>Total Finish MiniGame</b></h5>
                        </div>
                        <?php
                        $count=0;
                        $select2 = $mysqli->select("users" , "mainsvg<>''"," ORDER by id DESC") or die('Error DB');
                        while($users = $select2->fetch_object()){
                            $count++;
                        }
                        ?>
                        <div class="card-body">
                            <a href="/admin/list.php?action=mainsvg"><h1><?=$count;?><button type="button" class="btn btn-primary mt-2 float-right">View MiniGame</button></h1></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card text-white bg-dark m-3 col-md-4">
                        <div class="card-header">
                            <h5><b>Purchased All pNFT</b></h5>
                        </div>
                        <?php
                        $count=0;
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
                                    $count++;
                                }
                            }
                        ?>
                        <div class="card-body">
                            <a href="/admin/list.php?action=all_pnft"><h1><?=$count;?><button type="button" class="btn btn-primary mt-2 float-right">View All pNFT</button></h1></a>
                        </div>
                    </div>
                 <!--    <div class="card text-white bg-dark m-3 col-md-4">
                        <div class="card-header">
                            <h5><b>Total Finish MiniGame</b></h5>
                        </div>
                        <div class="card-body">
                            <h1>123<button type="button" class="btn btn-primary mt-2 float-right">View MiniGame</button>
                                <h1>
                        </div>
                    </div> -->
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
        $('.preloader').fadeOut(300);
    })
</script>
</body>

</html>