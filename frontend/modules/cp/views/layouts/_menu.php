<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['site/index'])?>">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Bosh sahifa</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-apps">Bo'limlar</li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/cp/sale/create'])?>">
                        <i data-feather="dollar-sign"></i>
                        <span data-key="t-chat">Sotuv</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="arrow-down">
                        <i data-feather="pie-chart"></i>
                        <span data-key="t-ecommerce">Sotuv</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['/cp/sale'])?>"><i data-feather="user"></i> Sotuvlar</a></li>
                        <?php foreach (\common\models\Payed::find()->all() as $item):?>
                            <li><a href="<?= Yii::$app->urlManager->createUrl(['/cp/sale','payed'=>$item->id])?>"><i data-feather="dollar-sign"></i> <?= $item->name?></a></li>
                        <?php endforeach;?>

                    </ul>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/cp/income-orders'])?>">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-chat">Buyurtma</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/cp/income'])?>">
                        <i data-feather="check-circle"></i>
                        <span data-key="t-chat">Kirim</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="arrow-down">
                        <i data-feather="pie-chart"></i>
                        <span data-key="t-ecommerce">Xisobot</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="#">Kunlik</a></li>
                        <li><a href="#">Mijoz bo'yicha</a></li>
                        <li><a href="#">Yetkazuvchi bo'yicha</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="arrow-down">
                        <i data-feather="pie-chart"></i>
                        <span data-key="t-ecommerce">Mijozlar</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['/cp/clients'])?>"><i data-feather="user"></i> Mijozlar</a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['/cp/client-subjects'])?>"><i data-feather="user"></i> Tadbirkorlik subyektlari</a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['/cp/client-groups'])?>"><i data-feather="user"></i> Tadbirkorlik turlari</a></li>
                    </ul>
                </li>


                <li>
                    <a href="#" class="arrow-down">
                        <i data-feather="grid"></i>
                        <span data-key="t-ecommerce">Ma'lumotlar</span>
                    </a>
                    <ul class="sub-menu">

                        <li><a href="<?= Yii::$app->urlManager->createUrl(['/cp/products'])?>"><i data-feather="box"></i> Maxsulotlar</a>
                        </li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['/cp/categories'])?>"><i data-feather="box"></i> Maxsulotlar Turlari</a></li>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl(['/cp/users'])?>">
                                <i data-feather="users"></i>
                                <span data-key="t-chat">Faydalunchilar</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl(['/cp/warehouse/index'])?>">
                                <i class="fa fa-warehouse"></i>
                                <span data-key="t-chat">Omborxonalar</span>
                            </a>
                        </li>
                        <?php if(false){?>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl(['/cp/branches/index'])?>">
                                <i data-feather="users"></i>
                                <span data-key="t-chat">Filaillar</span>
                            </a>
                        </li>
                        <?php }?>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl(['/cp/supplier'])?>">
                                <i data-feather="bar-chart"></i>
                                <span data-key="t-chat">Yetkazib beruvchilar</span>
                            </a>
                        </li>
                        <li><a href="#"><i data-feather="bar-chart-2"></i> Yetkazuvchi hisob kitob</a></li>
                        <li><a href="#"><i data-feather="bar-chart-2"></i> Mijoz hisob kitob</a></li>
                        <li><a href="#"><i data-feather="database"></i> Backup</a></li>
                    </ul>
                </li>


            </ul>


        </div>
        <!-- Sidebar -->
    </div>
</div>
