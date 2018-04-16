
<style>

hr {
    border: none; /* Убираем границу */
    background-color: #f0eeee; /* Цвет линии */
        color: #f0eeee; /* Цвет линии для IE6-7 */
        height: 2px; /* Толщина линии */
    }
    .group{
    padding-top: 5px;
        padding-bottom: 5px;
        margin-left: 10px;
        margin-right: 10px;
        height: 50px;
    }

    .square{
    padding-right: 0px;
        padding-left: 0px;

    }
    .in_square{
    width:35px;
        height:35px;
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
    .in_rectangle_soc{
    padding-right:5px;
        padding-left:5px;
        width: 300px;
    }
    .intent{
    margin-top:6px;
        padding-right: 0px;
        padding-left: 0px;
    }
    .in_intent{
    margin-left: 10px;
        margin-right: 10px;
    }
    .save_butt{
    margin-top: 25px;
        float: right;
        margin-right: 25px;
        font-size: 18px;
    }
    .logo{
    padding-left: 0px;
        padding-right: 0px;
    }
    .logo_show {
    position: relative;
}
    .group_logo_show{
    position: absolute;
    padding-left: 5px;
    }
    .image_update{
    max-width: 131px;
        padding-left: 5px;
    }
    .preview{
    max-width: 300px;
        max-height: 100px;
    }
    .button_box{
    margin-top: -83px;
    }

    #carousel {
        position: relative;
        width:90%;
        height: 350px;
        margin:0 auto;
    }
    .slide {
    margin-right: 2px;
    }
    #slides {
        padding: 16px;
        border-style: double;
        border-width: 5px;
        border-radius: 5px;
        border-color: #8cfa8c;
        background: aliceblue;
        margin-left: auto;
        margin-right: auto;
        overflow: hidden;
        position: relative;
        width: 100%;
        height: 185px;
    }

    #slides ul {
        list-style: none;
        width:100%;
        height:250px;
        margin: 0;
        padding: 0;
        position: relative;
    }

    #slides li {
        width:100%;
        height:250px;
        float:left;
        text-align: center;
        position: relative;
        font-family:lato, sans-serif;
    }
    /* Styling for prev and next buttons */
    .btn-bar{
    max-width: 346px;
        margin: 0 auto;
        display: block;
        position: relative;
        top: 40px;
        width: 100%;
    }

    #buttons {
        padding:0 0 5px 0;
        float:right;
        margin-top: -45px;
        margin-bottom: 20px;
    }

    #buttons a {
        text-align:center;
        display:block;
        font-size:50px;
        float:left;
        outline:0;
        margin:0 60px;
        color:#3eb65a;
        text-decoration:none;
        display:block;
        padding:9px;
        width:35px;
    }

    a#prev:hover, a#next:hover {
        color:#FFF;
        text-shadow:.5px 0px #b14943;
    }
    .first_box, .second_box, .third_box{
    display: table;
    width: 100%;
}

</style>


<div id="carousel">

    <div class="row button_box" >
        <div class="col-md-12 col-xs-12">
            <button class="save_butt btn btn-success" ng-click="updateSettings(settings, settings.image)"><strong>Save all</strong></button>
        </div>
    </div>

    <div class="btn-bar">
        <div id="buttons"><a id="prev" href="#"><</a><a id="next" href="#">></a> </div>
    </div>
    <div id="slides">
        <ul>
            <li class="slide">
                <div class="first_box">
                    <div class="row ">
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.header_background_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle"  ng-model="settings.header_background_color" color-picker color-picker-model="settings.header_background_color" type="text" >
                                </div>

                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" ng-style="{'background-color':settings.header_background_color}" >Header background color</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.header_link_color  ">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.header_link_color  " color-picker color-picker-model="settings.header_link_color" type="text" >
                                </div>


                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" ng-style="{color:settings.header_link_color}">Header link color  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="second_box">
                    <div class="row ">
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.header_hover_color  ">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.header_hover_color" color-picker color-picker-model="settings.header_hover_color" type="text">
                                </div>
                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" ng-style="{color:settings.header_hover_color}" >Header hover color</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.header_border_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.header_border_color" color-picker color-picker-model="settings.header_border_color" type="text">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" >
                                    <p class="in_intent" ng-style="{'border-color':settings.header_border_color, 'border-style': 'solid', 'border-width': 'thin'}">Header border color</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="third_box">
                    <div class="row ">
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.about_us_background_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.about_us_background_color" color-picker color-picker-model="settings.about_us_background_color" type="text">
                                </div>
                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" ng-style="{'background-color':settings.about_us_background_color}" >About us background color</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.news_background_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.news_background_color" color-picker color-picker-model="settings.news_background_color" type="text" >
                                </div>
                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" ng-style="{'background-color':settings.news_background_color}">News background color</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="slide">
                <div class="first_box">
                    <div class="row ">
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.footer_background_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle"  ng-model="settings.footer_background_color" color-picker color-picker-model="settings.ooter_background_color" type="text" >
                                </div>
                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" ng-style="{'background-color':settings.footer_background_color}" >Footer background color</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.footer_link_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.footer_link_color  " color-picker color-picker-model="settings.footer_link_color" type="text" >
                                </div>
                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" ng-style="{color:settings.footer_link_color}">Footer link color  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="second_box">
                    <div class="row ">
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.footer_hover_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.footer_hover_color  " color-picker color-picker-model="settings.footer_hover_color  " type="text">
                                </div>
                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" ng-style="{color:settings.footer_hover_color  }" >Footer hover color  </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.footer_border_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.header_border_color" color-picker color-picker-model="settings.footer_border_color" type="text">
                                </div>
                                <div class="col-md-6 col-xs-6 intent " >
                                    <p class="in_intent" ng-style="{'border-color':settings.footer_border_color, 'border-style': 'solid', 'border-width': 'thin'}">Footer border color</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="third_box">
                    <div class="row ">
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.news_image_border_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.news_image_border_color" color-picker color-picker-model="settings.news_image_border_color" type="text">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" style=" " >
                                    <p class="in_intent" ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': 'thin'}" >News image border color</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.news_text_border_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle"  ng-model="settings.news_text_border_color" color-picker color-picker-model="settings.news_text_border_color" type="text" >
                                </div>
                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" style="box-shadow: 0 0 5px {{settings.news_text_border_color}}">News text border shadow color</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="slide">
                <div class="first_box">
                    <div class="row " >
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.title_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle"  ng-model="settings.title_color" color-picker color-picker-model="settings.title_color" type="text">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" style=" font-size: 34px; margin-top: -2px;">
                                    <p class="in_intent"  ng-style="{color:settings.title_color}" >Title color</p></div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.subtitle_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.subtitle_color" color-picker color-picker-model="settings.subtitle_color" type="text">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" style=" font-size: 24px;" >
                                    <p class="in_intent" ng-style="{color:settings.subtitle_color}">Subtitle color</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="second_box">
                    <!--<p class="quote-author">John Doe // Local Business Owner</p>-->
<div class="row ">
                        <div class="col-md-6 col-sm-12">
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.general_link_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.general_link_color" color-picker color-picker-model="settings.general_link_color" type="text" >
                                </div>
                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" ng-style="{color:settings.general_link_color}" >General link color</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.text_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.text_color" color-picker color-picker-model="settings.text_color" type="text" >
                                </div>
                                <div class="col-md-6 col-xs-6 intent" style="font-size: 16px;">
                                    <p class="in_intent" ng-style="{color:settings.text_color}" >Text color</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="third_box">
                    <div class="row ">
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.icon_shadow_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.icon_shadow_color" color-picker color-picker-model="settings.icon_shadow_color" type="text">
                                </div>

                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" ng-style="{color:settings.icon_shadow_color}" >Icon shadow color</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >
                                <div  class="col-md-2 col-xs-2 square" >
                                    <input  class="in_square" type="color" ng-model="settings.general_hover_color">
                                </div>
                                <div class="col-md-4 col-xs-4 rectangle" >
                                    <input class="in_rectangle" ng-model="settings.general_hover_color" color-picker color-picker-model="settings.general_hover_color" type="text" >
                                </div>
                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" ng-style="{color:settings.general_hover_color}">General hover color</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="slide">
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

                        <div class="col-md-6 col-sm-12">

                        </div>
                    </div>
                </div>
                <div class="second_box">
                    <div class="row ">
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >

                                <div class="col-md-6 col-xs-6 rectangle" >
                                    <input class="in_rectangle_soc" type="text" ng-model="settings.title">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" >
                                    <p class="in_intent" >Title</p></div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >

                                <div class="col-md-6 col-xs-6 rectangle" >
                                    <input class="in_rectangle_soc" type="text" ng-model="settings.subtitle">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" >
                                    <p class="in_intent" >Subtitle</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="third_box">
                    <div class="row ">
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >

                                <div class="col-md-6 col-xs-6 rectangle" >
                                    <input class="in_rectangle_soc" type="text" ng-model="settings.title_2">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" >
                                    <p class="in_intent" >Title 2</p></div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >

                                <div class="col-md-6 col-xs-6 rectangle" >
                                    <input class="in_rectangle_soc" type="text" ng-model="settings.subtitle_2">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" >
                                    <p class="in_intent" >Subtitle 2</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="slide">
                <div class="first_box">
                    <div class="row" >
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >

                                <div class="col-md-6 col-xs-6 rectangle" >
                                    <input class="in_rectangle_soc" type="text" ng-model="settings.twitter_link">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" >
                                    <p class="in_intent" >Twitter link</p></div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="row group" >

                                <div class="col-md-6 col-xs-6 rectangle" >
                                    <input class="in_rectangle_soc" type="text" ng-model="settings.youtube_link">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" >
                                    <p class="in_intent" >Youtube link</p></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="second_box">
                    <!--<p class="quote-author">John Doe // Local Business Owner</p>-->
<div class="row ">
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >

                                <div class="col-md-6 col-xs-6 rectangle" >
                                    <input class="in_rectangle_soc" type="text" ng-model="settings.google_link">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" >
                                    <p class="in_intent" >Google link</p></div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >

                                <div class="col-md-6 col-xs-6 rectangle" >
                                    <input class="in_rectangle_soc" type="text" ng-model="settings.facebook_link">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" >
                                    <p class="in_intent" >Facebook link</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="third_box">
                    <div class="row ">
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >

                                <div class="col-md-6 col-xs-6 rectangle" >
                                    <input class="in_rectangle_soc" type="text" ng-model="settings.linkedin_link">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" >
                                    <p class="in_intent" >Linkedin link</p></div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >

                                <div class="col-md-6 col-xs-6 rectangle" >
                                    <input class="in_rectangle_soc" type="text" ng-model="settings.instagram_link">
                                </div>
                                <div class="col-md-6 col-xs-6 intent" >
                                    <p class="in_intent" >Instagram link</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="slide">

                <div class="first_box">
                    <div class="row ">
                        <div class="col-md-6 col-sm-12"  >
                            <div class="row group" >
                                <div class="col-md-5 col-xs-5 logo" >
                                    <input id="logoUpdate" enctype="multipart/form-data" type="file" class="form-control image_update" placeholder="Лого компанії" name="photo">
                                </div>

                                <div class="col-md-5 col-xs-5 intent">
                                    <p class="in_intent" >Footer logo </p>
                                </div>
                                <div class="col-md-2 col-xs-2 intent">
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-trash" title="Видалити" aria-hidden="true"  ng-click="removeLogo(settings.logo)"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="row group">

                                <div class="col-md-6 col-xs-6 rectangle">
                                    <input class="in_rectangle_soc" type="text" ng-model="settings.mobile_phone">
                                </div>
                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" >Telephone1</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="second_box">
                    <div class="row ">
                        <div class="col-md-6 col-sm-12 logo_show"  >
                            <div class="row group_logo_show " >
                                <div class="col-md-11 col-xs-11 " >
                                    <a  href="/">
                                        <img class="preview" src="/{{settings.logo}}">
                                    </a>
                                </div>
                                <div class="col-md-1 col-xs-1 " >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="row group">

                                <div class="col-md-6 col-xs-6 rectangle">
                                    <input class="in_rectangle_soc" type="text" ng-model="settings.mobile_phone_2">
                                </div>
                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" >Telephone2</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="third_box">
                    <div class="row ">
                        <div class="col-md-6 col-sm-12"  >

                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="row group">

                                <div class="col-md-6 col-xs-6 rectangle">
                                    <input class="in_rectangle_soc" type="text" ng-model="settings.email">
                                </div>
                                <div class="col-md-6 col-xs-6 intent">
                                    <p class="in_intent" >E-mail</p></div>
                            </div>
                        </div>
                    </div>
                </div>

            </li>
        </ul>
    </div>
</div>
<hr>







<script>
$jq(document).ready(function () {
    var slides = $jq('.slide');
    var container = $jq('#slides ul');
    var elm = container.find(':first-child').prop("tagName");
    var item_width = container.width();
    var previous = 'prev'; //id of previous button
    var next = 'next'; //id of next button
    slides.width(item_width); //set the slides to the correct pixel width
    container.parent().width(item_width);
    container.width(slides.length * item_width); //set the slides container to the correct total width
    container.find(elm + ':first').before(container.find(elm + ':last'));
    resetSlides();
    //if user clicked on prev button
    $jq('#buttons a').click(function (e) {
        //slide the item
        if (container.is(':animated')) {
            return false;
        }
        if (e.target.id == previous) {
            container.stop().animate({
                    'left': 0
                }, 10, function () {
                container.find(elm + ':first').before(container.find(elm + ':last'));
                resetSlides();
            });
            }
        if (e.target.id == next) {
            container.stop().animate({
                    'left': item_width * -2
                }, 10, function () {
                container.find(elm + ':last').after(container.find(elm + ':first'));
                resetSlides();
            });
            }
        //cancel the link behavior
        return false;

    });
    function resetSlides() {
        //and adjust the container so current is in the frame
        container.css({
                'left': -1 * item_width
            });
        }
});
</script>