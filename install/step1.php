<?IncludeModuleLangFile(__FILE__);?>

<?
$arSiteTabControl = new CAdminViewTabControl("siteTabControl", array(
    array(
        'TITLE' => "Компоненты",
        'TAB'   => "Компоненты",
        "DIV"   => "ez_components"
    ),
    array(
        'TITLE' => "Формы",
        'TAB'   => "Формы",
        "DIV"   => "ez_forms"
    ),
    array(
        'TITLE' => "Отладка",
        'TAB'   => "Отладка",
        "DIV"   => "ez_debug"
    ),
    array(
        'TITLE' => "Twig",
        'TAB'   => "Twig",
        "DIV"   => "ez_twig"
    ),
));
?>

<form action="<?=
/** @var $APPLICATION CMain */
$APPLICATION->GetCurPage() ?>" name="ez_common_install">
    <?= bitrix_sessid_post() ?>

    <?
    CModule::IncludeModule('iblock');
    CJSCore::Init(array('jquery'));
    $arTypesEx = CIBlockParameters::GetIBlockTypes();
    ?>

    <input type="hidden" name="id" value="ez.common">
    <input type="hidden" name="install" value="Y">
    <input type="hidden" name="step" value="2">

    <?$arSiteTabControl->Begin();?>

    <? $arSiteTabControl->BeginNextTab(); ?>
    <h3>Слайдер</h3>
    <table class="list-table">
        <tr>
            <td width="50%" align="right"><label for="install_slider_iblock">Создать инфоблок для слайдера</label></td>
            <td><input type="checkbox" name="install_slider_iblock" id="install_slider_iblock" value="Y"></td>
        </tr>
        <tr>
            <td width="50%" align="right"><label for="install_slider_iblock_type">Тип информационного блока</label></td>
            <td>
                <select name="install_slider_iblock_type" id="install_slider_iblock_type" disabled>
                    <?foreach($arTypesEx as $id=>$name):?>
                        <option value="<?=$id?>"><?=$name?></option>
                    <?endforeach;?>
                </select>
            </td>
        </tr>
    </table>
    <h3>Объекты на карте</h3>
    <table class="list-table">
        <tr>
            <td width="50%" align="right"><label for="install_shopmap_iblock">Создать инфоблок для карты объектов</label></td>
            <td><input type="checkbox" name="install_shopmap_iblock" id="install_shopmap_iblock" value="Y"></td>
        </tr>
        <tr>
            <td width="50%" align="right"><label for="install_shopmap_iblock_type">Тип информационного блока</label></td>
            <td>
                <select name="install_shopmap_iblock_type" id="install_shopmap_iblock_type" disabled>
                    <?foreach($arTypesEx as $id=>$name):?>
                        <option value="<?=$id?>"><?=$name?></option>
                    <?endforeach;?>
                </select>
            </td>
        </tr>
    </table>
    <h3>Баннеры с привязкой к страницам</h3>
    <table class="list-table">
        <tr>
            <td width="50%" align="right"><label for="install_banners_iblock">Создать инфоблок для баннеров</label></td>
            <td><input type="checkbox" name="install_banners_iblock" id="install_banners_iblock" value="Y"></td>
        </tr>
        <tr>
            <td width="50%" align="right"><label for="install_banners_iblock_type">Тип информационного блока</label></td>
            <td>
                <select name="install_banners_iblock_type" id="install_banners_iblock_type" disabled>
                    <?foreach($arTypesEx as $id=>$name):?>
                        <option value="<?=$id?>"><?=$name?></option>
                    <?endforeach;?>
                </select>
            </td>
        </tr>
    </table>
    <h3>Список документов</h3>
    <table class="list-table">
        <tr>
            <td width="50%" align="right"><label for="install_documents_iblock">Создать инфоблок для списка документов</label></td>
            <td><input type="checkbox" name="install_documents_iblock" id="install_documents_iblock" value="Y"></td>
        </tr>
        <tr>
            <td width="50%" align="right"><label for="install_documents_iblock_type">Тип информационного блока</label></td>
            <td>
                <select name="install_documents_iblock_type" id="install_documents_iblock_type" disabled>
                    <?foreach($arTypesEx as $id=>$name):?>
                        <option value="<?=$id?>"><?=$name?></option>
                    <?endforeach;?>
                </select>
            </td>
        </tr>
    </table>
    <h3>Гостевая книга</h3>
    <table class="list-table">
        <tr>
            <td width="50%" align="right"><label for="install_guestbook_iblock">Создать инфоблок для гостевой книги</label></td>
            <td><input type="checkbox" name="install_guestbook_iblock" id="install_guestbook_iblock" value="Y"></td>
        </tr>
        <tr>
            <td width="50%" align="right"><label for="install_guestbook_iblock_type">Тип информационного блока</label></td>
            <td>
                <select name="install_guestbook_iblock_type" id="install_guestbook_iblock_type" disabled>
                    <?foreach($arTypesEx as $id=>$name):?>
                        <option value="<?=$id?>"><?=$name?></option>
                    <?endforeach;?>
                </select>
            </td>
        </tr>
    </table>

    <? $arSiteTabControl->BeginNextTab(); ?>
    <h2>Форма обратной связи с полем "Телефон"</h2>
    <table class="list-table">
        <tr>
            <td width="50%" align="right"><label for="install_feedback_template">Создать почтовое событие для формы</label></td>
            <td><input type="checkbox" name="install_feedback_template" id="install_feedback_template" value="Y"></td>
        </tr>
    </table>
    <h2>Форма "Заказать звонок"</h2>
    <table class="list-table">
        <tr>
            <td width="50%" align="right"><label for="install_callback_template">Создать почтовое событие для формы</label></td>
            <td><input type="checkbox" name="install_callback_template" id="install_callback_template" value="Y"></td>
        </tr>
    </table>

    <? $arSiteTabControl->BeginNextTab(); ?>
    <h3>Фунция dump-r всегда подключена!</h3>
    <table class="list-table">
        <tr>
            <td width="50%" align="right"><label for="enable_phpconsole">Включить <a href="https://github.com/phpconsole/phpconsole" target="_blank">php-console</a></label></td>
            <td><input type="checkbox" name="enable_phpconsole" id="enable_phpconsole" value="Y"></td>
        </tr>
        <tr>
            <td width="50%" align="right"><label for="pass_phpconsole">Пароль php-console</a></label></td>
            <td><input type="password" name="pass_phpconsole" id="pass_phpconsole"></td>
        </tr>
        <tr>
            <td width="50%" align="right"><label for="enable_mailcatch">Перехватывать почту</a></label></td>
            <td><input type="checkbox" name="enable_mailcatch" id="enable_mailcatch" value="Y"></td>
        </tr>
    </table>


    <? $arSiteTabControl->BeginNextTab(); ?>
    <table class="list-table">
        <tr>
            <td width="50%" align="right"><label for="enable_twig">Включить <a href="http://twig.sensiolabs.org/" target="_blank">Twig</a></label></td>
            <td><input type="checkbox" name="enable_twig" id="enable_twig" value="Y"></td>
        </tr>
        <tr>
            <td width="50%" align="right"><label for="enable_twig_debug">Включить отладку (dump)</label></td>
            <td><input type="checkbox" name="enable_twig_debug" id="enable_twig_debug" value="Y"></td>
        </tr>
    </table>


    <? $arSiteTabControl->EndTab(); ?>


    <br>
    <input type="submit" name="inst" value="<?echo GetMessage("MOD_INSTALL")?>">
    <? $arSiteTabControl->End()?>

</form>

<script type="text/javascript">
    $(function(){

        $("#install_slider_iblock").on('change',function(){
            if($(this).is(':checked')){
                $("#install_slider_iblock_type").removeAttr('disabled');
            } else {
                $("#install_slider_iblock_type").attr('disabled','disabled');
            }
        });

        $("#install_shopmap_iblock").on('change',function(){
            if($(this).is(':checked')){
                $("#install_shopmap_iblock_type").removeAttr('disabled');
            } else {
                $("#install_shopmap_iblock_type").attr('disabled','disabled');
            }
        });

        $("#install_banners_iblock").on('change',function(){
            if($(this).is(':checked')){
                $("#install_banners_iblock_type").removeAttr('disabled');
            } else {
                $("#install_banners_iblock_type").attr('disabled','disabled');
            }
        });

        $("#install_documents_iblock").on('change',function(){
            if($(this).is(':checked')){
                $("#install_documents_iblock_type").removeAttr('disabled');
            } else {
                $("#install_documents_iblock_type").attr('disabled','disabled');
            }
        });

        $("#install_guestbook_iblock").on('change',function(){
            if($(this).is(':checked')){
                $("#install_guestbook_iblock_type").removeAttr('disabled');
            } else {
                $("#install_guestbook_iblock_type").attr('disabled','disabled');
            }
        });
    });
</script>