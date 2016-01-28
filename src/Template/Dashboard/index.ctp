<?php
echo $this->Html->css(array(
    'DoubleV.../js/css3clock/css/style',
));
?>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-nav alt">

                <section class="panel">
                    <div class="user-heading alt clock-row terques-bg">
                        <h1><?php echo date('d/m/Y') ?></h1>
                        <p class="text-left">DoubleV plugin</p>
                        <p class="text-left">v1.0 beta</p>
                    </div>
                    <ul id="clock">
                        <li id="sec"></li>
                        <li id="hour"></li>
                        <li id="min"></li>
                    </ul>

                </section>

            </div>
        </div>
        <div class="col-md-8">
            <!--notification start-->
            <section class="panel">
                <header class="panel-heading">
                    Notification <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-cog"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
                        <div class="notification-info">
                            <ul class="clearfix notification-meta">
                                <li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> send you a mail </li>
                                <li class="pull-right notification-time">1 min ago</li>
                            </ul>
                            <p>
                                Urgent meeting for next proposal
                            </p>
                        </div>
                    </div>
                    <div class="alert alert-danger">
                        <span class="alert-icon"><i class="fa fa-facebook"></i></span>
                        <div class="notification-info">
                            <ul class="clearfix notification-meta">
                                <li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> mentioned you in a post </li>
                                <li class="pull-right notification-time">7 Hours Ago</li>
                            </ul>
                            <p>
                                Very cool photo jack
                            </p>
                        </div>
                    </div>
                    <div class="alert alert-success ">
                        <span class="alert-icon"><i class="fa fa-comments-o"></i></span>
                        <div class="notification-info">
                            <ul class="clearfix notification-meta">
                                <li class="pull-left notification-sender">You have 5 message unread</li>
                                <li class="pull-right notification-time">1 min ago</li>
                            </ul>
                            <p>
                                <a href="#">Anjelina Mewlo, Jack Flip</a> and <a href="#">3 others</a>
                            </p>
                        </div>
                    </div>
                    <div class="alert alert-warning ">
                        <span class="alert-icon"><i class="fa fa-bell-o"></i></span>
                        <div class="notification-info">
                            <ul class="clearfix notification-meta">
                                <li class="pull-left notification-sender">Domain Renew Deadline 7 days ahead</li>
                                <li class="pull-right notification-time">5 Days Ago</li>
                            </ul>
                            <p>
                                Next 5 July Thursday is the last day
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!--notification end-->
        </div>
    </div>

<?php
echo $this->Html->script(array(
    'DoubleV.css3clock/js/css3clock'
), ['block' => 'scriptBottom']);
?>
