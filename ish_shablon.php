<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
CJSCore::Init(array("fx"));
$curPage = $APPLICATION->GetCurPage(true);
$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "blue", SITE_ID);
?>
<!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <link rel="shortcut icon" type="image/x-icon" href="<?=SITE_DIR?>favicon.ico" />
    <?$APPLICATION->ShowHead();?>
    <?
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/colors.css", true);
    $APPLICATION->SetAdditionalCSS("/bitrix/css/main/bootstrap.css");
    $APPLICATION->SetAdditionalCSS("/bitrix/css/main/font-awesome.css");
    ?>
    <title><?$APPLICATION->ShowTitle()?></title>
</head>
<body class="bx-background-image bx-theme-<?=$theme?>" <?=$APPLICATION->ShowProperty("backgroundImage")?>>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<?$APPLICATION->IncludeComponent("bitrix:eshop.banner", "", array());?>
<div class="bx-wrapper" id="bx_eshop_wrap">
    <header class="bx-header">
        <div class="bx-header-section container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="bx-logo">
                        <a class="bx-logo-block hidden-xs" href="<?=SITE_DIR?>">
                            <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_logo.php"), false);?>
                        </a>
                        <a class="bx-logo-block hidden-lg hidden-md hidden-sm text-center" href="<?=SITE_DIR?>">
                            <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_logo_mobile.php"), false);?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="bx-inc-orginfo">
                        <div>
                            <span class="bx-inc-orginfo-phone"><i class="fa fa-phone"></i> <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/telephone.php"), false);?></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                    <div class="bx-worktime">
                        <div class="bx-worktime-prop">
                            <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/schedule.php"), false);?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 hidden-xs">
                    <?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "", array(
    "PATH_TO_BASKET" => SITE_DIR."personal/cart/",
        "PATH_TO_PERSONAL" => SITE_DIR."personal/",
        "SHOW_PERSONAL_LINK" => "N",
        "SHOW_NUM_PRODUCTS" => "Y",
        "SHOW_TOTAL_PRICE" => "Y",
        "SHOW_PRODUCTS" => "N",
        "POSITION_FIXED" => "N",
        "SHOW_AUTHOR" => "Y",
        "PATH_TO_REGISTER" => SITE_DIR."login/",
        "PATH_TO_PROFILE" => SITE_DIR."personal/"
    ),
    false,
    array(
    "ACTIVE_COMPONENT" => "N"
    )
);?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 hidden-xs">
                    <?$APPLICATION->IncludeComponent(
    "bitrix:menu",
    "catalog_horizontal",
    array(
        "ROOT_MENU_TYPE" => "left",
        "MENU_CACHE_TYPE" => "A",
        "MENU_CACHE_TIME" => "36000000",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "MENU_THEME" => "site",
        "CACHE_SELECTED_ITEMS" => "N",
        "MENU_CACHE_GET_VARS" => array(
        ),
        "MAX_LEVEL" => "3",
        "CHILD_MENU_TYPE" => "left",
        "USE_EXT" => "Y",
        "DELAY" => "N",
        "ALLOW_MULTI_SELECT" => "N",
        "COMPONENT_TEMPLATE" => "catalog_horizontal"
    ),
    false
);?>
                </div>
            </div>
            <?if ($curPage != SITE_DIR."index.php"):?>
            <div class="row">
                <div class="col-lg-12">
                    <?$APPLICATION->IncludeComponent("bitrix:search.title", "visual", array(
                            "NUM_CATEGORIES" => "1",
                            "TOP_COUNT" => "5",
                            "CHECK_DATES" => "N",
                            "SHOW_OTHERS" => "N",
                            "PAGE" => SITE_DIR."catalog/",
                            "CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS") ,
                            "CATEGORY_0" => array(
                                0 => "iblock_catalog",
                            ),
                            "CATEGORY_0_iblock_catalog" => array(
                                0 => "all",
                            ),
                            "CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
                            "SHOW_INPUT" => "Y",
                            "INPUT_ID" => "title-search-input",
                            "CONTAINER_ID" => "search",
                            "PRICE_CODE" => array(
                                0 => "BASE",
                            ),
                            "SHOW_PREVIEW" => "Y",
                            "PREVIEW_WIDTH" => "75",
                            "PREVIEW_HEIGHT" => "75",
                            "CONVERT_CURRENCY" => "Y"
                        ),
                        false
                    );?>
                </div>
            </div>
            <?endif?>

            <?if ($curPage != SITE_DIR."index.php"):?>
            <div class="row">
                <div class="col-lg-12" id="navigation">
                    <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "", array(
                            "START_FROM" => "0",
                            "PATH" => "",
                            "SITE_ID" => "-"
                        ),
                        false,
                        Array('HIDE_ICONS' => 'Y')
                    );?>
                </div>
            </div>
            <h1 class="bx-title dbg_title" id="pagetitle"><?=$APPLICATION->ShowTitle(false);?></h1>
            <?endif?>
        </div>
    </header>

    <div class="workarea">
        <div class="container bx-content-seection">
            <div class="row">
            <?$needSidebar = preg_match("~^".SITE_DIR."(catalog|personal\/cart|personal\/order\/make)/~", $curPage);?>
                <div class="bx-content <?=($needSidebar ? "col-xs-12" : "col-md-9 col-sm-8")?>">#WORK_AREA#<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
                    </div>
                    <?if (!$needSidebar):?>
                    <div class="sidebar col-md-3 col-sm-4">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "sect",
                                "AREA_FILE_SUFFIX" => "sidebar",
                                "AREA_FILE_RECURSIVE" => "Y",
                                "EDIT_MODE" => "html",
                            ),
                            false,
                            Array('HIDE_ICONS' => 'Y')
                        );?>
                    </div><!--// sidebar -->
                    <?endif?>
                </div><!--//row-->
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "sect",
                        "AREA_FILE_SUFFIX" => "bottom",
                        "AREA_FILE_RECURSIVE" => "N",
                        "EDIT_MODE" => "html",
                    ),
                    false,
                    Array('HIDE_ICONS' => 'Y')
                );?>
            </div><!--//container bx-content-seection-->
        </div><!--//workarea-->

        <footer class="bx-footer">
            <div class="bx-footer-line">
                <div class="bx-footer-section container">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_DIR."include/socnet_footer.php",
                            "AREA_FILE_RECURSIVE" => "N",
                            "EDIT_MODE" => "html",
                        ),
                        false,
                        Array('HIDE_ICONS' => 'Y')
                    );?>
                </div>
            </div>
            <div class="bx-footer-section container bx-center-section">
                <div class="col-sm-5 col-md-3 col-md-push-6">
                    <h4 class="bx-block-title"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/about_title.php"), false);?></h4>
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "bottom_menu", array(
                            "ROOT_MENU_TYPE" => "bottom",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_TYPE" => "A",
                            "CACHE_SELECTED_ITEMS" => "N",
                            "MENU_CACHE_TIME" => "36000000",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                        ),
                        false
                    );?>
                </div>
                <div class="col-sm-5 col-md-3">
                    <h4 class="bx-block-title"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/catalog_title.php"), false);?></h4>
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "bottom_menu", array(
                            "ROOT_MENU_TYPE" => "left",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_TIME" => "36000000",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "CACHE_SELECTED_ITEMS" => "N",
                            "MAX_LEVEL" => "1",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                        ),
                        false
                    );?>
                </div>
                <div class="col-sm-5 col-md-3 col-md-push-3">
                    <div style="padding: 20px;background:#eaeaeb">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_DIR."include/sender.php",
                                "AREA_FILE_RECURSIVE" => "N",
                                "EDIT_MODE" => "html",
                            ),
                            false,
                            Array('HIDE_ICONS' => 'Y')
                        );?>
                    </div>
                    <div id="bx-composite-banner" style="padding-top: 20px"></div>
                </div>
                <div class="col-sm-5 col-md-3 col-md-pull-9">
                    <div class="bx-inclogofooter">
                        <div class="bx-inclogofooter-block">
                            <a class="bx-inclogofooter-logo" href="<?=SITE_DIR?>">
                                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_logo_mobile.php"), false);?>
                            </a>
                        </div>
                        <div class="bx-inclogofooter-block">
                            <div class="bx-inclogofooter-tel"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/telephone.php"), false);?></div>
                            <div class="bx-inclogofooter-worktime"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/schedule.php"), false);?></div>
                        </div>
                        <div>
                            <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/personal.php"), false);?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bx-footer-bottomline">
                <div class="bx-footer-section container">
                    <div class="col-sm-6"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/copyright.php"), false);?></div>
                    <div class="col-sm-6 bx-up"><a href="javascript:void(0)" data-role="eshopUpButton"><i class="fa fa-caret-up"></i> <?=GetMessage("FOOTER_UP_BUTTON")?></a></div>
                </div>
            </div>


        </footer>
        <div class="col-xs-12 hidden-lg hidden-md hidden-sm">
            <?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "", array(
                    "PATH_TO_BASKET" => SITE_DIR."personal/cart/",
                    "PATH_TO_PERSONAL" => SITE_DIR."personal/",
                    "SHOW_PERSONAL_LINK" => "N",
                    "SHOW_NUM_PRODUCTS" => "Y",
                    "SHOW_TOTAL_PRICE" => "Y",
                    "SHOW_PRODUCTS" => "N",
                    "POSITION_FIXED" =>"Y",
                    "POSITION_HORIZONTAL" => "center",
                    "POSITION_VERTICAL" => "bottom",
                    "SHOW_AUTHOR" => "Y",
                    "PATH_TO_REGISTER" => SITE_DIR."login/",
                    "PATH_TO_PROFILE" => SITE_DIR."personal/"
                ),
                false,
                array()
            );?>
        </div>
    </div> <!-- //bx-wrapper -->


<script>
    BX.ready(function(){
        var upButton = document.querySelector('[data-role="eshopUpButton"]');
        BX.bind(upButton, "click", function(){
            var windowScroll = BX.GetWindowScrollPos();
            (new BX.easing({
                duration : 500,
                start : { scroll : windowScroll.scrollTop },
                finish : { scroll : 0 },
                transition : BX.easing.makeEaseOut(BX.easing.transitions.quart),
                step : function(state){
                    window.scrollTo(0, state.scroll);
                },
                complete: function() {
                }
            })).animate();
        })
    });
</script>
</body>
</html>