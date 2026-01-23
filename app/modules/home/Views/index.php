<?php
ob_start();
?>

<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">overview</h2>
            <button class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>add item</button>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h2>10368</h2>
                        <span>members online</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChart1"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    <div class="text">
                        <h2>388,688</h2>
                        <span>items solid</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c3">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-calendar-note"></i>
                    </div>
                    <div class="text">
                        <h2>1,086</h2>
                        <span>this week</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChart3"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c4">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                    </div>
                    <div class="text">
                        <h2>$1,060,386</h2>
                        <span>total earnings</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChart4"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="au-card recent-report">
            <div class="au-card-inner">
                <h3 class="title-2">recent reports</h3>
                <div class="chart-info">
                    <div class="chart-info__left">
                        <div class="chart-note">
                            <span class="dot dot--blue"></span>
                            <span>products</span>
                        </div>
                        <div class="chart-note mr-0">
                            <span class="dot dot--green"></span>
                            <span>services</span>
                        </div>
                    </div>
                    <div class="chart-info__right">
                        <div class="chart-statis">
                            <span class="index incre">
                                <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                            <span class="label">products</span>
                        </div>
                        <div class="chart-statis mr-0">
                            <span class="index decre">
                                <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                            <span class="label">services</span>
                        </div>
                    </div>
                </div>
                <div class="recent-report__chart">
                    <canvas id="recent-rep-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="au-card chart-percent-card">
            <div class="au-card-inner">
                <h3 class="title-2 tm-b-5">Revenue Distribution</h3>
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="percent-chart">
                            <canvas id="percent-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-9">
        <h2 class="title-1 m-b-25">Earnings By Items</h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>date</th>
                        <th>order ID</th>
                        <th>name</th>
                        <th class="text-end">price</th>
                        <th class="text-end">quantity</th>
                        <th class="text-end">total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2025-01-15 14:32</td>
                        <td>100398</td>
                        <td>iPhone 17 128GB Titanium</td>
                        <td class="text-end">$1299.00</td>
                        <td class="text-end">1</td>
                        <td class="text-end">$999.00</td>
                    </tr>
                    <tr>
                        <td>2025-01-14 10:18</td>
                        <td>100397</td>
                        <td>Samsung Galaxy S25 Ultra</td>
                        <td class="text-end">$1199.00</td>
                        <td class="text-end">1</td>
                        <td class="text-end">$756.00</td>
                    </tr>
                    <tr>
                        <td>2025-01-13 16:45</td>
                        <td>100396</td>
                        <td>PS5 Pro DualSense Controller</td>
                        <td class="text-end">$79.00</td>
                        <td class="text-end">2</td>
                        <td class="text-end">$44.00</td>
                    </tr>
                    <tr>
                        <td>2025-01-12 09:23</td>
                        <td>100395</td>
                        <td>iPhone 17 Pro Max 1TB Space Black</td>
                        <td class="text-end">$1699.00</td>
                        <td class="text-end">1</td>
                        <td class="text-end">$1199.00</td>
                    </tr>
                    <tr>
                        <td>2025-01-11 13:17</td>
                        <td>100393</td>
                        <td>USB-C to USB-C Thunderbolt 5 Cable</td>
                        <td class="text-end">$29.00</td>
                        <td class="text-end">3</td>
                        <td class="text-end">$30.00</td>
                    </tr>
                    <tr>
                        <td>2025-01-10 11:55</td>
                        <td>100392</td>
                        <td>Apple Watch Series 11 Ultra</td>
                        <td class="text-end">$899.00</td>
                        <td class="text-end">6</td>
                        <td class="text-end">$1494.00</td>
                    </tr>
                    <tr>
                        <td>2025-01-09 15:42</td>
                        <td>100391</td>
                        <td>Sony A7R VI Mirrorless Camera</td>
                        <td class="text-end">$3899.00</td>
                        <td class="text-end">1</td>
                        <td class="text-end">$699.00</td>
                    </tr>
                    <tr>
                        <td>2025-01-08 08:29</td>
                        <td>100393</td>
                        <td>USB-C to Lightning Cable 2m</td>
                        <td class="text-end">$19.00</td>
                        <td class="text-end">3</td>
                        <td class="text-end">$30.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-3">
        <h2 class="title-1 m-b-25">Top countries</h2>
        <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
            <div class="au-card-inner">
                <div class="table-responsive">
                    <table class="table table-top-countries">
                        <tbody>
                            <tr>
                                <td>United States</td>
                                <td class="text-end">$119,366.96</td>
                            </tr>
                            <tr>
                                <td>Australia</td>
                                <td class="text-end">$70,261.65</td>
                            </tr>
                            <tr>
                                <td>United Kingdom</td>
                                <td class="text-end">$46,399.22</td>
                            </tr>
                            <tr>
                                <td>Turkey</td>
                                <td class="text-end">$35,364.90</td>
                            </tr>
                            <tr>
                                <td>Germany</td>
                                <td class="text-end">$20,366.96</td>
                            </tr>
                            <tr>
                                <td>France</td>
                                <td class="text-end">$10,366.96</td>
                            </tr>
                            <tr>
                                <td>Australia</td>
                                <td class="text-end">$5,366.96</td>
                            </tr>
                            <tr>
                                <td>Italy</td>
                                <td class="text-end">$1639.32</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
            <div class="au-card-title" style="background-image:url('/SGA-SEBANA/public/assets/img/bg-title-01.jpg');">
                <div class="bg-overlay bg-overlay--blue"></div>
                <h3>
                    <i class="zmdi zmdi-account-calendar"></i>23 January, 2025</h3>
                <button class="au-btn-plus">
                    <i class="zmdi zmdi-plus"></i>
                </button>
            </div>
            <div class="au-task js-list-load">
                <div class="au-task__title">
                    <p>Tasks for John Doe</p>
                </div>
                <div class="au-task-list js-scrollbar3">
                    <div class="au-task__item au-task__item--danger">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Meeting about plan for Admin Template 2025</a>
                            </h5>
                            <span class="time">10:00 AM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--warning">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Create new task for Dashboard</a>
                            </h5>
                            <span class="time">11:00 AM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--primary">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Meeting about plan for Admin Template 2025</a>
                            </h5>
                            <span class="time">02:00 PM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--success">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Create new task for Dashboard</a>
                            </h5>
                            <span class="time">03:30 PM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--danger js-load-item">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Meeting about plan for Admin Template 2025</a>
                            </h5>
                            <span class="time">10:00 AM</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--warning js-load-item">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="#">Create new task for Dashboard</a>
                            </h5>
                            <span class="time">11:00 AM</span>
                        </div>
                    </div>
                </div>
                <div class="au-task__footer">
                    <button class="au-btn au-btn-load js-load-btn">load more</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
            <div class="au-card-title" style="background-image:url('/SGA-SEBANA/public/assets/img/bg-title-02.jpg');">
                <div class="bg-overlay bg-overlay--blue"></div>
                <h3>
                    <i class="zmdi zmdi-comment-text"></i>New Messages</h3>
                <button class="au-btn-plus">
                    <i class="zmdi zmdi-plus"></i>
                </button>
            </div>
            <div class="au-inbox-wrap js-inbox-wrap">
                <div class="au-message js-list-load">
                    <div class="au-message__noti">
                        <p>You Have
                            <span>2</span>

                            new messages
                        </p>
                    </div>
                    <div class="au-message-list">
                        <div class="au-message__item unread">
                            <div class="au-message__item-inner">
                                <div class="au-message__item-text">
                                    <div class="avatar-wrap">
                                        <div class="avatar">
                                            <img src="/SGA-SEBANA/public/assets/img/icon/avatar-02.jpg" alt="John Smith">
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h5 class="name">John Smith</h5>
                                        <p>Have sent a photo</p>
                                    </div>
                                </div>
                                <div class="au-message__item-time">
                                    <span>12 Min ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="au-message__item unread">
                            <div class="au-message__item-inner">
                                <div class="au-message__item-text">
                                    <div class="avatar-wrap online">
                                        <div class="avatar">
                                            <img src="/SGA-SEBANA/public/assets/img/icon/avatar-03.jpg" alt="Nicholas Martinez">
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h5 class="name">Nicholas Martinez</h5>
                                        <p>You are now connected on message</p>
                                    </div>
                                </div>
                                <div class="au-message__item-time">
                                    <span>11:00 PM</span>
                                </div>
                            </div>
                        </div>
                        <div class="au-message__item">
                            <div class="au-message__item-inner">
                                <div class="au-message__item-text">
                                    <div class="avatar-wrap online">
                                        <div class="avatar">
                                            <img src="/SGA-SEBANA/public/assets/img/icon/avatar-04.jpg" alt="Michelle Sims">
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h5 class="name">Michelle Sims</h5>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </div>
                                </div>
                                <div class="au-message__item-time">
                                    <span>Yesterday</span>
                                </div>
                            </div>
                        </div>
                        <div class="au-message__item">
                            <div class="au-message__item-inner">
                                <div class="au-message__item-text">
                                    <div class="avatar-wrap">
                                        <div class="avatar">
                                            <img src="/SGA-SEBANA/public/assets/img/icon/avatar-05.jpg" alt="Michelle Sims">
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h5 class="name">Michelle Sims</h5>
                                        <p>Purus feugiat finibus</p>
                                    </div>
                                </div>
                                <div class="au-message__item-time">
                                    <span>Sunday</span>
                                </div>
                            </div>
                        </div>
                        <div class="au-message__item js-load-item">
                            <div class="au-message__item-inner">
                                <div class="au-message__item-text">
                                    <div class="avatar-wrap online">
                                        <div class="avatar">
                                            <img src="/SGA-SEBANA/public/assets/img/icon/avatar-04.jpg" alt="Michelle Sims">
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h5 class="name">Michelle Sims</h5>
                                        <p>Lorem ipsum dolor sit amet</p>
                                    </div>
                                </div>
                                <div class="au-message__item-time">
                                    <span>Yesterday</span>
                                </div>
                            </div>
                        </div>
                        <div class="au-message__item js-load-item">
                            <div class="au-message__item-inner">
                                <div class="au-message__item-text">
                                    <div class="avatar-wrap">
                                        <div class="avatar">
                                            <img src="/SGA-SEBANA/public/assets/img/icon/avatar-05.jpg" alt="Michelle Sims">
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h5 class="name">Michelle Sims</h5>
                                        <p>Purus feugiat finibus</p>
                                    </div>
                                </div>
                                <div class="au-message__item-time">
                                    <span>Sunday</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="au-message__footer">
                        <button class="au-btn au-btn-load js-load-btn">load more</button>
                    </div>
                </div>
                <div class="au-chat">
                    <div class="au-chat__title">
                        <div class="au-chat-info">
                            <div class="avatar-wrap online">
                                <div class="avatar avatar--small">
                                    <img src="/SGA-SEBANA/public/assets/img/icon/avatar-02.jpg" alt="John Smith">
                                </div>
                            </div>
                            <span class="nick">
                                <a href="#">John Smith</a>
                            </span>
                        </div>
                    </div>
                    <div class="au-chat__content">
                        <div class="recei-mess-wrap">
                            <span class="mess-time">12 Min ago</span>
                            <div class="recei-mess__inner">
                                <div class="avatar avatar--tiny">
                                    <img src="/SGA-SEBANA/public/assets/img/icon/avatar-02.jpg" alt="John Smith">
                                </div>
                                <div class="recei-mess-list">
                                    <div class="recei-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                    <div class="recei-mess">Donec tempor, sapien ac viverra</div>
                                </div>
                            </div>
                        </div>
                        <div class="send-mess-wrap">
                            <span class="mess-time">30 Sec ago</span>
                            <div class="send-mess__inner">
                                <div class="send-mess-list">
                                    <div class="send-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="au-chat-textfield">
                        <form class="au-form-icon">
                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Type a message">
                            <button class="au-input-icon">
                                <i class="zmdi zmdi-camera"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>Copyright © 2025 Colorlib. All rights reserved. Template by <a href="https://colorlib.com" rel="nofollow" target="_blank">Colorlib</a>.</p>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require BASE_PATH . '/public/templates/base.html.php';
?>
