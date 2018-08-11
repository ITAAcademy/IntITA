<link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'forPartners/camera.css'); ?>">
<style>
    #back_to_camera {
        clear: both;
        display: block;
        height: 80px;
        line-height: 40px;
        padding: 20px;
    }
    .fluid_container {
        margin: 0 auto;
        max-width: 100%;
        /*overflow: hidden;	*/
    }
</style>

<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'forPartners/jquery.mobile.customized.min.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'forPartners/jquery.easing.1.3.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'forPartners/camera.js'); ?>"></script>

<script>
    jQuery(function(){
        jQuery('#camera_wrap_2').camera({
            height: '540px',
            loader: 'bar',
            pagination: false,
            thumbnails: true
        });
    });
</script>
<div class="fluid_container">
    <div id="hoverText"></div>
    <div class="camera_wrap camera_magenta_skin" id="camera_wrap_2">
        <div data-thumb="../images/slides/thumbs/bridge.jpg" data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption111">
                <p class="title-main">Start your intellectual business!</p>
                <p class="fran">Franchise</p>
                <p class="openAcadem">Open the IT Academy</p>
                <p class="school">Hackers' school</p>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption10">
                <p class="title">A strong business is education.<br>Education is a strong business!</p>
                <div class="wrap-first-slide-text">
                    <p class="first-slide-text">There`s sure to be the institution your city lacks.</p>
                    <p class="first-slide-text">The real one that trains IT professionals from scratch.</p>
                    <div class="camera_next next-in-slide slide-next-desc">
                        <div class="descr">3/19<br>
                            <p>Business idea</p>
                        </div>
                        <span id="second-slide-next" class="item"></span></div>

                </div>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption2">

                <p class="title">Business idea</p>
                <p class="ul-list">We offer you the opportunity to establish a regional IT Academy “INTITA”  in your city. The  private courses are intended to prepare competitive programmers, web designers, QA specialists, whose qualifications meet modern  requirements of IT market and ensure their employment.
                </p>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">4/19<br>
                        <p>Who we are</p>
                    </div>
                    <span id="third-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">2/19<br>
                        <p>A strong business</p>
                    </div>
                    <span id="second-slide-prev" class="item"></span>
                </div>



            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption16">
                <p class="title">Who we are</p>
                <ul class="ul-list">
                    <li>an experienced team of professionals who has already trained hundreds of programmers since 2010;</li>
                    <li>entrepreneurs, who believe that the investment in education and staff is the most effective and stable one;</li>
                    <li>enthusiasts, devoted to improving  economical and social situation in a country by promoting IT sector.</li>
                </ul>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">5/19<br>
                        <p>What we offer</p>
                    </div>
                    <span id="fourth-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">3/19<br>
                        <p>Business idea</p>
                    </div>
                    <span id="third-slide-prev" class="item"></span>
                </div>

            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption8">
                <p class="title">What we offer</p>
                <ul class="ul-list">
                    <li>high-yield legal educational business;</li>
                    <li>approved educational model which provided 99% of alumni with employment in IT-companies (Epam, RIA.com, Infopuls, Gemicle, Win-Interactive, ONSeo, Playtika, SoftGen, Luxsoft, IT Room, Sky IT Group, Astaund Commerce, MemCrab, SteelKiwi etc.).
                    </li>
                </ul>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">6/19<br>
                        <p>Why it works</p>
                    </div>
                    <span id="fifth-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">4/19<br>
                        <p>Who we are</p>
                    </div>
                    <span id="fifth-slide-prev" class="item"></span>
                </div>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption11">
                <p class="title">Why it works</p>
                <ul class="ul-list">
                    <li>the model passed the probation and is being successfully used in Vinnytsia now;</li>
                    <li>IT specialists, who conduct lessons, have decent salary;</li>
                    <li>dynamically expanding brand which is sure to be a strong leader on the market;</li>
                    <li>personal online platform with CRM system;</li>
                    <li>professional business team assisting the project.</li>
                </ul>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">7/19<br>
                        <p>Our achivements</p>
                    </div>
                    <span id="sixth-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">5/19<br>
                        <p>What we offer</p>
                    </div>
                    <span id="sixth-slide-prev" class="item"></span>
                </div>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption3">
                <p class="title">Our achivements</p>
                <ul class="ul-list">
                    <li>7 years of successful experience;</li>
                    <li>short-term  training program to deliver high skill specialists for the industry;</li>
                    <li>own method for an objective assessment of soft and hard skills;</li>
                    <li>modern training programs which are constantly being changed to comply with the demands of IT companies;</li>
                    <li>investment in high-quality preparation for prospective teachers;</li>
                    <li>professional  supervisors, teachers and trainers.</li>
                </ul>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">8/19<br>
                        <p>Our achivements</p>
                    </div>
                    <span id="seventh-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">6/19<br>
                        <p>Why it works</p>
                    </div>
                    <span id="seventh-slide-prev" class="item"></span>
                </div>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption17">
                <p class="title">Our achivements</p>
                <ul class="ul-list">
                    <li>flexible enrolment system (2 times a year) and schedule (morning or evening studies);</li>
                    <li>individual approach - not more than 15 students in a group;</li>
                    <li>intense IT-English course (own program and materials);</li>
                    <li>student internships in IT-companies;</li>
                    <li>efficient marketing and career guidance (at universities, institutions, colleges, schools, etc).</li>
                </ul>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">9/19<br>
                        <p>Our profit is</p>
                    </div>
                    <span id="eighth-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">7/19<br>
                        <p>Our achivements</p>
                    </div>
                    <span id="eighth-slide-prev" class="item"></span>
                </div>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption5">
                <p class="title">Our profit is</p>
                <ul class="ul-list">
                    <li>we expand into the market, building a network of our courses;</li>
                    <li>popularizing IT sphere, arising interest and involving more youth into IT education;</li>
                    <li>making  money; selling educational services comprises the main source of our income.</li>
                </ul>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">10/19<br>
                        <p>You profit from</p>
                    </div>
                    <span id="ninth-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">8/19<br>
                        <p>Our achivements</p>
                    </div>
                    <span id="ninth-slide-prev" class="item"></span>
                </div>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption7">
                <p class="title">You profit from</p>
                <ul class="ul-list">
                    <li>transparent and highly intellectual profitable  business;</li>
                    <li>well-designed operating business model; stable to market volatility;</li>
                    <li>no real competitors in the region;</li>
                    <li>lack of specialists in IT-Sphere;</li>
                    <li>small investments and consequently cost-effective  way  to search for and  train specialists (for those who plan to  start own IT company).</li>
                </ul>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">11/19<br>
                        <p>General business-model</p>
                    </div>
                    <span id="tenth-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">9/19<br>
                        <p>Our profit is</p>
                    </div>
                    <span id="tenth-slide-prev" class="item"></span>
                </div>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption1">
                <p class="title">General business-model</p>
                <ul class="ul-list">
                    <p>Partner:</p>
                    <li>selecting teachers and administrative staff;</li>
                    <li>admission and registration of entrants, concluding contracts, consultations via email, phone and social networks;</li>
                    <li>regional marketing;</li>
                    <li>material and technical base.</li>
                    <p>INTITA:</p>
                    <li>run and control educational process;</li>
                    <li>teachers selection and training;</li>
                    <li>marketing and advertising campaign.</li>
                </ul>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">12/19<br>
                        <p>Legal Model</p>
                    </div>
                    <span id="eleventh-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">10/19<br>
                        <p>You profit from</p>
                    </div>
                    <span id="eleventh-slide-prev" class="item"></span>
                </div>

            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption9">
                <p class="title">Legal Model</p>
                <p class="ul-list">IT Academy representative becomes a co-founder of the new company (50%/50%).</p>
                <p class="ul-list">*options can be discussed</p>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">13/19<br>
                        <p>Financial model</p>
                    </div>
                    <span id="twelfth-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">11/19<br>
                        <p>General business-model</p>
                    </div>
                    <span id="twelfth-slide-prev" class="item"></span>
                </div>
            </div>
        </div>

        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption0">
                <p class="title">Financial model</p>
                <ul class="ul-list">
                    <li>different schemas for students  to pay for the courses;</li>
                    <li>student tuition fees cover royalties, teachers` salary, marketing and advertising, administrative expenses and bring income.</li>
                </ul>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">14/19<br>
                        <p>Target audience</p>
                    </div>
                    <span id="thirteenth-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">12/19<br>
                        <p>Legal Model</p>
                    </div>
                    <span id="thirteenth-slide-prev" class="item"></span>
                </div>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption12">
                <p class="title">Target audience</p>
                <ul class="ul-list">
                    <li>students, mainly of technical, economical, mathematical specialities of different educational levels;</li>
                    <li>switchers (people willing to change a profession);</li>
                    <li>IT juniors and freelancers;</li>
                    <li>school graduates and pupils.</li>
                </ul>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">15/19<br>
                        <p>Marketing model</p>
                    </div>
                    <span id="fourteenth-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">13/19<br>
                        <p>Financial model</p>
                    </div>
                    <span id="fourteenth-slide-prev" class="item"></span>
                </div>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption14">
                <p class="title">Marketing model</p>
                <p class="market">The main promotion strategy:</p>
                <ol class="ul-list ol">
                    <li>presentations for the target audience;</li>
                    <li>advertising the opportunity to get a job at an IT company right after graduation;</li>
                    <li>contacting prospective students via social network posts, personal calls and e-mails.</li>
                </ol>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">16/19<br>
                        <p>Room and equipment requirements</p>
                    </div>
                    <span id="fifteenth-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">14/19<br>
                        <p>Target audience</p>
                    </div>
                    <span id="fifteenth-slide-prev" class="item"></span>
                </div>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption15">
                <p class="title">Room and equipment requirements</p>
                <p class="ul-list">Office space - about 100 sq.m.;</p>
                <p class="ul-list">Classrooms are equipped with:</p>
                <ul class="ul-list">
                    <li>15 laptops;</li>
                    <li>1 lecture room for 30 people (2 groups);</li>
                    <li>2 laboratory rooms for 15 people;</li>
                    <li>3 boards, 3 screens, 3 video projectors, furniture (chairs and desks for 60 people).</li>
                </ul>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">17/19<br>
                        <p>Main financial indicators</p>
                    </div>
                    <span id="sixteenth-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">15/19<br>
                        <p>Marketing model</p>
                    </div>
                    <span id="sixteenth-slide-prev" class="item"></span>
                </div>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption13">
                <p class="title">Main financial indicators</p>
                <ul class="ul-list">
                    <li>Investment amount – <b>approx 30 000$;</b> (depends on the region and existent resources)</li>
                    <li>Lump sum – <b>1 000$;</b></li>
                    <li>Break-even  period is <b>7-9 months;</b></li>
                    <li>The payback period of the project is <b>1.5-2 years;</b></li>
                    <li>Royalties – <b>10% of all revenues.</b></li>
                </ul>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">18/19<br>
                        <p>Follow-up plan</p>
                    </div>
                    <span id="seventeenth-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">16/19<br>
                        <p>Room and equipment requirements</p>
                    </div>
                    <span id="seventeenth-slide-prev" class="item"></span>
                </div>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption4">
                <p class="title">Follow-up plan</p>
                <ul class="ul-list">
                    <li>Decide on cooperation;</li>
                    <li>Discuss and agree on the final model of cooperation;</li>
                    <li>Determine responsible people from both sides;</li>
                    <li>Form and train the first groups;</li>
                    <li>Provide graduation and employment for students;</li>
                    <li>Improve the cooperation model;</li>
                    <li>Plan new groups enrollment and expansion.</li>
                </ul>
                <div class="camera_next next-in-slide slide-next-desc">
                    <div class="descr">19/19<br>
                        <p>PROGRAM THE FUTURE!</p>
                    </div>
                    <span id="eighteenth-slide-next" class="item"></span>
                </div>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">17/19<br>
                        <p>Main financial indicators</p>
                    </div>
                    <span id="eighteenth-slide-prev" class="item"></span>
                </div>
            </div>
        </div>
        <div data-src="<?php echo StaticFilesHelper::createPath('image', 'forPartners', 'icon/back.jpg'); ?>">
            <div class="camera_caption fadeFromBottom" id="camera_caption6">
                <p class="title">PROGRAM THE FUTURE!</p>
                <p class="ul-list">Contacts: +38-067-431-74-24</p>
                <p class="ul-list">e-mail: info@intita.com</p>
                <p class="ul-list">https://intita.com/</p>
                <div class="camera_prev prev-in-slide slide-prev-desc">
                    <div class="descrPrev">18/19<br>
                        <p>Follow-up plan</p>
                    </div>
                    <span id="nineteenth-slide-prev" class="item"></span>
                </div>
            </div>
        </div>
    </div><!-- #camera_wrap_2 -->
</div><!-- .fluid_container -->


<div class="nav" style="clear:both; display:block; height:35px"></div>


<div id="slider">
    <div id="custom-handle" class="ui-slider-handle"><!-- <span class="value-wrapper"><span class="value-output"></span> км/ч</span> -->
    </div>
</div>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">




<!-- <p> -->
<!-- <label for="amount">Minimum number of bedrooms:</label> -->
<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
</p>
<div id="slider-range-max"></div>





<script type="text/javascript">
    function strartSlider(){
        var tabs = $(".rslides_tabs");
        var sliderWidth = $("#camera_wrap_2").width();
        tabs.width(sliderWidth-110);
        $(".title-main").css("marginLeft",parseInt(getComputedStyle(tabs[0]).marginLeft) + 65+"px");
        $("#slider-range-max").css("top",-$(".nav").height()-33);
        $(".ul-list").css("padding-top", "200 !important");
    }
    $(document).ready(function(){
        var buttonForFran = document.getElementsByClassName("rslides1_s11");
        $(".fran").css("top", parseInt(getComputedStyle(buttonForFran[0]).top) + 27 + "px");
        $(".openAcadem").css("top",parseInt(getComputedStyle(buttonForFran[0]).top) + 50 + "px")
        $(".school").css("top",parseInt(getComputedStyle(buttonForFran[0]).top) + 73 + "px");
        if ($(document).width() < 655) {
            sliderWidth = $("#camera_wrap_2").width();
            $(".camera_commands").css("left", $(window).width()/2 - 12);
            $(".camera_prev").css("left",sliderWidth/2-100);
            $(".camera_next").css("right",sliderWidth/2-100);
        }
        else{
            sliderWidth = $("#camera_wrap_2").width();
            $(".camera_commands").css("left", $(window).width()/2 - 12);
            $(".camera_prev").css("left",sliderWidth/2-300);
            $(".camera_next").css("right",sliderWidth/2-300);
        }
        strartSlider();
        $(window).resize(function(){
            if ($(document).width() < 655) {
                var sliderWidth = $("#camera_wrap_2").width();
                $(".camera_commands").css("left", $(window).width()/2 - 12);
                $(".camera_prev").css("left",sliderWidth/2-100);
                $(".camera_next").css("right",sliderWidth/2-100);
            }
            else{
                var sliderWidth = $("#camera_wrap_2").width();
                $(".camera_commands").css("left", sliderWidth/2);
                $(".camera_prev").css("left",sliderWidth/2-300);
                $(".camera_next").css("right",sliderWidth/2-300);
            }
            strartSlider();
        })
    })
</script>
<div class="teacherForm" id="maxTeacherForm">
    <a id="joinTeamMaxButton" data-toggle="modal" data-target="#joinTeamMax" class="buttonBeginInTeachers" href="#form">DETAILED INFORMATION  /&gt;</a>
    <!-- Modal -->
    <div class="modal fade" id="joinTeamMax" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Detailed information</h4>
                </div>
                <div class="ifYouTeachers" id="xex">
                    <table class="detailInfoForPartners">
                        <tbody><tr>
                            <td valign="center">
                                <div id="formTeacher3">
                                    <form method="post" name="letter" ng-controller="sendPartnerLetter" novalidate="novalidate" id="teacherletter-form" class="ng-pristine ng-scope ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength ng-valid-email">
                                        <div class="formInModalTeachersMobile">
                                            <div class="row">
                                                <label for="TeacherLetter_firstname">Name</label><span>*</span>
                                                <input ng-model="letter.firstname" ng-pattern="/^[a-zа-яіїёєЄA-ZА-ЯІЇЁ\s'’]+$/u" required="required" name="firstName" id="TeacherLetter_firstname" type="text" maxlength="35" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength">
                                                <div class="clientValidationError" ng-show="letter.firstName.$dirty && letter.firstName.$invalid">
                                                    <span ng-show="letter.firstName.$error.required"><?php echo Yii::t('error','0268') ?></span>
                                                    <span ng-show="letter.firstName.$error.pattern" class="ng-hide"><?php echo Yii::t('error','0429') ?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for=""TeacherLetter_lastname">Surname</label>
                                                <input ng-model="letter.lastname" ng-pattern="/^[a-zа-яіїёєЄA-ZА-ЯІЇЁ\s'’]+$/u" name="lastName" id="TeacherLetter_lastname" type="text" maxlength="35" class="ng-pristine ng-untouched ng-valid-pattern ng-valid-maxlength">
                                                <div class="clientValidationError" ng-show="letter.lastName.$dirty && letter.lastName.$invalid">
                                                    <span ng-show="letter.lastName.$error.pattern" class="ng-hide"><?php echo Yii::t('error','0429') ?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="TeacherLetter_phone">Phone</label><span>*</span>
                                                <input name="phone_partner" maxlength="13" class="letterPhone ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength" ng-model="letter.phone" ng-pattern="/^[0-9\+\-\(\)\s]+$/u" required="required" type="text" id="TeacherLetter_phone">
                                                <div class="clientValidationError" ng-show="letter.phone_partner.$dirty">
                                                    <span ng-show="letter.phone_partner.$error.required"><?php echo Yii::t('error','0268') ?></span>
                                                    <span ng-show="letter.phone_partner.$error.pattern" class="ng-hide"><?php echo Yii::t('error','0429') ?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="TeacherLetter_email">Email</label><span>*</span>
                                                <input class="letterEmail ng-pristine ng-untouched ng-empty ng-valid-email ng-invalid ng-invalid-required ng-valid-maxlength" ng-model="letter.email" required="required" name="email_partner" id="TeacherLetter_email" type="email" maxlength="50">
                                                <div class="clientValidationError" ng-show="letter.email_partner.$dirty && letter.email_partner.$invalid">
                                                    <span ng-show="letter.email_partner.$error.required"><?php echo Yii::t('error','0268') ?></span>
                                                    <span ng-show="letter.email_partner.$error.email"><?php echo Yii::t('error','0271') ?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="courseslabel" for="TeacherLetter_courses">Your questions</label>
                                                <textarea ng-model="letter.question" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"></textarea>
                                            </div>
                                            <ul class="actions">
                                                <input id="send_btn" type="button" name="sendletter" ng-click="sendLetterFromPartner(letter)" value="Send" ng-disabled="letter.$invalid" disabled="disabled">
                                            </ul>
                                        </div>
                                    </form></div></td>
                        </tr>
                        </tbody></table>
                    <div id="letterFlash">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
