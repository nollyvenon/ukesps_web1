<?php

$date_today = date('Y-m-d');
$featured_news = $db_handle->fetchAssoc($db_handle->runQuery("SELECT * FROM article WHERE status = '1' ORDER BY created DESC LIMIT 3"));
$featured_signal = $db_handle->fetchAssoc($db_handle->runQuery("SELECT * FROM signal_daily INNER JOIN signal_symbol ON signal_symbol.signal_symbol_id = signal_daily.symbol_id WHERE signal_date LIKE '$date_today'"));
$signal_last_updated = $db_handle->fetchAssoc($db_handle->runQuery("SELECT created FROM signal_daily ORDER BY created DESC LIMIT 1"));
?>
<div class="row ">
    <div class="col-sm-6 col-md-12">
        <div class="list-group" style="margin-bottom: 5px !important;">
            <a class="list-group-item" href="live_account.php" title="Open a live 7bForex trading account"><i class="fa fa-check-square fa-fw"></i>&nbsp;<strong>Open Live Account</strong></a>
            <a class="list-group-item" href="deposit_funds.php" title="Deposit money into your 7bForex account"><i class="fa fa-check-square fa-fw icon-tune"></i>&nbsp;<strong>Fund Account - &#8358;<?php if(defined('IPLRFUNDRATE')) { echo IPLRFUNDRATE; } ?> </strong></a>
            <a class="list-group-item" href="withdraw_funds.php" title="Withdraw from your 7bForex account"><i class="fa fa-check-square fa-fw icon-tune"></i>&nbsp;<strong>Withdraw - &#8358;<?php if(defined('WITHDRATE')) { echo WITHDRATE; } ?> </strong></a>
            <a class="list-group-item" href="deposit_notify.php" title="Payment Notification"><i class="fa fa-check-square fa-fw"></i>&nbsp;<strong>Payment Notification</strong></a>
            <a class="list-group-item" href="verify_account.php" title="Verification"><i class="fa fa-check-square fa-fw"></i>&nbsp;<strong>Verification</strong></a>
        </div>
    </div>
</div>






