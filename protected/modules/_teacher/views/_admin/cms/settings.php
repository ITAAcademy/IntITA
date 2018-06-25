<style>
.save_box{

    margin-top: 5px;
    float: left;
    margin-right: 25px;
}
.rectangle{
    margin-top:2px;
    padding-right:2px;
    padding-left:2px;
    padding-top: 2px;
    padding-bottom: 2px;
}
.in_rectangle{
    padding-right:5px;
    padding-left:5px;
    width: 90px;
}
.square{
    padding-right: 0px;
    padding-left: 0px;
}
.in_square{
    width:35px;
    height:35px;
}
.grid_main{
     display: grid;
     grid-template-columns: 1fr 1fr;
     margin-left: 5px;
     margin-right: 5px;
    margin-bottom: 14px;
 }
.blok_separation{
    margin-bottom: 40px;
}
.grid_group{
    display: grid;
    grid-template-columns: 5fr 1fr 3fr;
    margin-left: 10px;
    margin-right: 10px;
}
.grid_group2{
    margin-left: -30px;
}
.grid_group3{
    margin-bottom: 30px;
}
.in_group2{
    display: grid;
    grid-template-columns: 1fr 3fr;
    margin-left: 10px;
    margin-right: 10px;
}
.in_group3{
    display: grid;
    grid-template-columns: 1fr;
    margin-left: 10px;
    margin-right: 10px;
}
.in_group3-1{
    margin-top: 30px;
    display: grid;
    grid-template-columns:  1fr 6fr;
    margin-left: 10px;
    margin-right: 10px;
}
.grid_button{
    display: grid;
    grid-template-columns:  1fr 6fr;
    margin-left: 10px;
    margin-right: 10px;
}
p {
    margin: 0 0 0px;
}
.first_blok{
    margin-bottom: 0px;
}
.in_rectangle_tel{
    height: 28px;
    width: 295px;
}
.intent_tel {
    margin-bottom: 30px;
}
.image_update{
    width: 121px;
    height: 22px;
    padding: 0px 0px;
 }
#logo_img{
    max-width: 200px;
    max-height: 200px;
}
.logo-discription{
    font-size: 12px;
    margin-top: 15px;
    width: 250px;
}
.title_color_style{
    font-size: 34px; margin-top: -8px;
}
@media(max-width:920px) {
    .grid_main{
        grid-template-columns: 1fr ;
    }
    .grid_group2 {
        margin-left: 0px;
    }
}
@media(max-width:1100px) {
    .in_rectangle_tel {
        width: 220px;
    }
}

@media(max-width:400px) {
    .in_group2{
        grid-template-columns: 1fr;
    }
    .title_color_style{
        font-size: 26px; margin-top: -8px;
    }
    .grid_button{
        grid-template-columns:  1fr;

    }
}
.link_settings{
    margin-top: 12px;
}
.icon{
    text-shadow: 0.1em 0.1em 0.2em black;
    color: aliceblue;
}

</style>
<div class="settings_conteiner"  ng-controller="settingsCtrl">

    <div class="settings_box">
        <div class="grid_main first_blok" >
            <div class="grid_group" >
                <div class="intent" >
                    <p class="in_intent title_color_style" ng-style="{color:settings.title_color}" >Заголовок</p>
                    <p class="in_intent"  ng-style="{color:settings.title_color}" >Title color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.title_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle"  ng-model="settings.title_color" color-picker color-picker-model="settings.title_color" type="text">
                </div>
            </div>
            <div class="grid_group" >
                <div class="intent" >
                    <p class="in_intent"  style=" font-size: 24px;" ng-style="{color:settings.subtitle_color}">Підзаголовок</p>
                    <p class="in_intent" ng-style="{color:settings.subtitle_color}">Subtitle color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.subtitle_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.subtitle_color" color-picker color-picker-model="settings.subtitle_color" type="text">
                </div>
            </div>
        </div>
        <div class="grid_main">
            <div class="grid_group" >
                <div class=" intent">
                    <p class="in_intent" ng-style="{color:settings.general_link_color}" >Гіперпосилання</p>
                    <p class="in_intent" ng-style="{color:settings.general_link_color}" >General link color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.general_link_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.general_link_color" color-picker color-picker-model="settings.general_link_color" type="text" >
                </div>
            </div>
            <div class="grid_group" >
                <div class="intent" style="font-size: 16px;">
                    <p class="in_intent" ng-style="{color:settings.text_color}" >Колір тексту</p>
                    <p class="in_intent" ng-style="{color:settings.text_color}" >Text color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.text_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.text_color" color-picker color-picker-model="settings.text_color" type="text" >
                </div>
            </div>
        </div>
        <div class="grid_main blok_separation">
            <div class="grid_group" >
                <div class="intent">
                    <p class="in_intent icon" ng-style="{color:settings.icon_shadow_color, 'text-shadow': 'black'}" >Тінь іконок</p>
                    <p class="in_intent icon" ng-style="{color:settings.icon_shadow_color}" >Icon shadow color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.icon_shadow_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.icon_shadow_color" color-picker color-picker-model="settings.icon_shadow_color" type="text">
                </div>
            </div>
            <div class="grid_group" >
                <div class="intent">
                    <p class="in_intent" ng-style="{color:settings.general_hover_color}">Ховер по замовчуванню</p>
                    <p class="in_intent" ng-style="{color:settings.general_hover_color}">General hover color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.general_hover_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.general_hover_color" color-picker color-picker-model="settings.general_hover_color" type="text" >
                </div>

            </div>
        </div>
        <div class="grid_main">
            <div class="grid_group" >
                <div class="intent">
                    <p class="in_intent" ng-style="{'background-color':settings.footer_background_color}" >Фон футера</p>
                    <p class="in_intent" ng-style="{'background-color':settings.footer_background_color}" >Footer background color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.footer_background_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle"  ng-model="settings.footer_background_color" color-picker color-picker-model="settings.ooter_background_color" type="text" >
                </div>
            </div>
            <div class="grid_group" >
                <div class="intent">
                    <p class="in_intent" ng-style="{color:settings.footer_link_color}">Гіперпосилання у футері</p>
                    <p class="in_intent" ng-style="{color:settings.footer_link_color}">Footer link color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.footer_link_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.footer_link_color  " color-picker color-picker-model="settings.footer_link_color" type="text" >
                </div>
            </div>

        </div>
        <div class="grid_main">
            <div class="grid_group" >
                <div class="intent">
                    <p class="in_intent" ng-style="{color:settings.footer_hover_color  }" >Ховер футера</p>
                    <p class="in_intent" ng-style="{color:settings.footer_hover_color  }" >Footer hover color</p>

                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.footer_hover_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.footer_hover_color  " color-picker color-picker-model="settings.footer_hover_color  " type="text">
                </div>
            </div>
            <div class="grid_group" >
                <div class="intent " >
                    <p class="in_intent" ng-style="{'border-color':settings.footer_border_color, 'border-style': 'solid', 'border-width': 'thin'}">Рамка в футері</p>
                    <p class="in_intent" ng-style="{'border-color':settings.footer_border_color, 'border-style': 'solid', 'border-width': 'thin'}">Footer border color</p>

                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.footer_border_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.header_border_color" color-picker color-picker-model="settings.footer_border_color" type="text">
                </div>
            </div>

        </div>
        <div class="grid_main blok_separation">
            <div class="grid_group" >
                <div class="intent" >
                    <p class="in_intent" ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': 'thin'}" >Рамка фото на новинах</p>
                    <p class="in_intent" ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': 'thin'}" >News image border color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.news_image_border_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.news_image_border_color" color-picker color-picker-model="settings.news_image_border_color" type="text">
                </div>
            </div>
            <div class="grid_group" >
                <div class="intent">
                    <p class="in_intent" style="box-shadow: 0 0 5px {{settings.news_text_border_color}}">Тінь рамочки новин</p>
                    <p class="in_intent" style="box-shadow: 0 0 5px {{settings.news_text_border_color}}">News text border shadow color</p>

                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.news_text_border_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle"  ng-model="settings.news_text_border_color" color-picker color-picker-model="settings.news_text_border_color" type="text" >
                </div>
            </div>

        </div>
        <div class="grid_main">
            <div class="grid_group" >
                <div class="intent">
                    <p class="in_intent" ng-style="{'background-color':settings.header_background_color}" >Фон хідера</p>
                    <p class="in_intent" ng-style="{'background-color':settings.header_background_color}" >Header background color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.header_background_color ">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle"  ng-model="settings.header_background_color" color-picker color-picker-model="settings.header_background_color" type="text" >
                </div>
            </div>
            <div class="grid_group" >
                <div class="intent">
                    <p class="in_intent" ng-style="{color:settings.header_link_color}">Гіперпосилання в хідері</p>
                    <p class="in_intent" ng-style="{color:settings.header_link_color}">Header link color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.header_link_color  ">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.header_link_color  " color-picker color-picker-model="settings.header_link_color" type="text" >
                </div>
            </div>
        </div>
        <div class="grid_main">
            <div class="grid_group" >
                <div class="intent">
                    <p class="in_intent" ng-style="{color:settings.header_hover_color}" >Ховер хідера</p>
                    <p class="in_intent" ng-style="{color:settings.header_hover_color}" >Header hover color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.header_hover_color  ">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.header_hover_color" color-picker color-picker-model="settings.header_hover_color" type="text">
                </div>
            </div>
            <div class="grid_group" >
                <div class="intent" >
                    <p class="in_intent" ng-style="{'border-color':settings.header_border_color, 'border-style': 'solid', 'border-width': 'thin'}">Рамка в хідері</p>
                    <p class="in_intent" ng-style="{'border-color':settings.header_border_color, 'border-style': 'solid', 'border-width': 'thin'}">Header border color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.header_border_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.header_border_color" color-picker color-picker-model="settings.header_border_color" type="text">
                </div>
            </div>
        </div>
        <div class="grid_main blok_separation">
            <div class="grid_group" >
                <div class="intent">
                    <p class="in_intent" ng-style="{'background-color':settings.about_us_background_color}" >Про нас колір фону</p>
                    <p class="in_intent" ng-style="{'background-color':settings.about_us_background_color}" >About us background color</p>
                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.about_us_background_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.about_us_background_color" color-picker color-picker-model="settings.about_us_background_color" type="text">
                </div>
            </div>
            <div class="grid_group" >
                <div class="intent">
                    <p class="in_intent" ng-style="{'background-color':settings.news_background_color}">Фон новин</p>
                    <p class="in_intent" ng-style="{'background-color':settings.news_background_color}">News background color</p>

                </div>
                <div  class="square" >
                    <input  class="in_square" type="color" ng-model="settings.news_background_color">
                </div>
                <div class="rectangle" >
                    <input class="in_rectangle" ng-model="settings.news_background_color" color-picker color-picker-model="settings.news_background_color" type="text" >
                </div>
            </div>
        </div>




        <div class="grid_main">
            <div class="grid_group3" >
                <div class="in_group3" >
                    <div class="intent" >
                        <p class="in_intent" >Logo </p>
                    </div>
                </div>
                <div class="in_group3" >
                    <a  href="/">
                        <img ng-if="settings.logo" class="preview" id="logo_img"  ng-src='{{settings.id && domainPathLogo+settings.logo || settings.logo}}'>
                    </a>
                </div>
                <div class="in_group3-1" >
                    <div class="intent">
                        <a href="javascript:void(0)">
                            <i class="fa fa-trash" title="Видалити" aria-hidden="true"  ng-click="removeLogo(settings.id, settings.logo)"></i>
                        </a>
                    </div>

                    <div class="logo" >
                        <input id="logoUpdate" enctype="multipart/form-data" type="file" class="form-control image_update" ng-model="settings.logo" value="settings.logo" placeholder="Лого компанії" name="photo">
                    </div>
                </div>
                <div class="in_group3" >
                    <div class="intent" >
                        <p class="logo-discription">Пропорції лого 9*16, розмір файла до 1 МБ, формат файлу JPG, GIF, PNG, SVG</p>
                    </div>
                </div>
            </div>
            <div class="grid_group2" >
                <div class="in_group2 intent_tel">
                    <div class="intent">
                        <p class="in_intent" >Телефон 1</p>
                    </div>
                    <div class="rectangle">
                        <input class="in_rectangle_tel" type="text" ng-model="settings.mobile_phone">
                    </div>
                </div>
                <div class="in_group2 intent_tel">
                    <div class="intent">
                        <p class="in_intent " >Телефон 2</p>
                    </div>
                    <div class="rectangle tel_num">
                        <input class="in_rectangle_tel " type="text" ng-model="settings.mobile_phone_2">
                    </div>
                </div>
                <div class="in_group2 intent_tel">
                    <div class="intent ">
                        <p class="in_intent " >E-mail</p>
                    </div>
                    <div class="rectangle ">
                        <input class="in_rectangle_tel" type="text" ng-model="settings.email">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid_button">
        <div>
            <button class="save_box btn btn-primary" ng-click="updateSettings(settings, settings.logo )">Зберегти зміни</button>
        </div>
        <div>
            <div class="save_box link_settings" ng-show="buttonShow"  ng-click="showDefaultSettings()"><a>Показати налаштування по замовчуванню</a></div>
            <div class="save_box link_settings" ng-hide="buttonShow"  ng-click="mySettings()"><a>Повернутись до моїх налаштувань</a></div>
        </div>
    </div>




    </br></br></br>

////////////////////////////////////////////////////////////////////////////////////////////
</br></br></br>


    <ul>
        <li class="slide_settings">
            <div class="first_box">
                <div class="row " >
                    <div class="col-md-6 col-sm-12"  >
                        <div class="row group" >
                            <div  class="col-md-2 col-xs-2 square" >
                                <input  class="in_square" type="color" ng-model="settings.news_date_color">
                            </div>
                            <div class="col-md-4 col-xs-4 rectangle" >
                                <input class="in_rectangle"  ng-model="settings.news_date_color" color-picker color-picker-model="settings.news_date_color" type="text">
                            </div>
                            <div class="col-md-6 col-xs-6 intent" style=" font-size: 16px ">
                                <p class="in_intent"  ng-style="{color:settings.news_date_color}" >News date color</p></div>
                        </div>
                    </div>
                </div>
            </div>

        </li>


    </ul>
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
</div>

