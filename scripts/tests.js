function cancelTest() {
    clearFields();
    location.reload();
}
/*Добавляємо варіант відповіді в список і варіант для вибору цієї відповіді*/
$(document).ready(function () {
    $('html').on('click','.addTest',function () {
        var optionsNum = document.getElementById("optionsNum").value;
        var newOption = 1 + parseInt(optionsNum);
        $('<li><input class="testVariant" type="text" name="option' + newOption + '" id="option' + newOption +'" size="80" required></li>').fadeIn('slow').appendTo('.inputs');

        $('<div><input type="checkbox" name="answer'+ newOption +'" value="'+ newOption +'"><span>'+newOption+' відповідь</span></div>').fadeIn('slow').appendTo('.answersCheckbox');

        document.getElementById("optionsNum").value = newOption;
    });
    /*... і видаляємо*/
    $('html').on('click','.removeTest', function () {
        var optionsNum = document.getElementById("optionsNum").value;
        var newOption =parseInt(optionsNum);
        var a = $("#optionsList > li");
        var b = $("#answersList > div");
        a.filter(":last").remove();
        b.filter(":last").remove();
        document.getElementById("optionsNum").value = newOption-1;
    });
});

function clearFields(){
    document.getElementById("optionsNum").value = 1;
    document.getElementById("option1").value = '';
}

function sendTestAnswer(checkAnswers, user, test, testType, editMode){
    if(checkAnswers.length==0){
        alert('Спочатку виберіть варіант відповіді');
        return false;
    }
    answers = getUserAnswers(testType);
        $.ajax({
            type: "POST",
            url: "/IntITA/tests/checkTestAnswer",
            data: {
                'user': user,
                'test': test,
                'answers': answers,
                'testType': testType,
                'editMode': editMode
            },
            cache: false,
            success: function () {
                if (editMode == 0) {
                    isTrueTestAnswer(user, test);
                }
            }
        });
}

function getUserAnswers(testType){
    if (testType == 1){
        answer = $('input[name="radioanswer"]:checked').attr("id");
        return answer;
    } else {
        answers = getMultiplyAnswers();
        return answers;
    }
}

function getMultiplyAnswers(){
        var answers = $('input[name="checkboxanswer"]:checked');
        var answersValue = [];
        for(var i = 0, l = answers.length; i < l;  i++)
        {
            answersValue.push(answers[i].id);
        }
    return answersValue;
}

function isTrueTestAnswer(user, test){
    var command = {
        "user": user,
        "test" : test
    };
    var jqxhr = $.post( "/IntITA/tests/getTestResult", JSON.stringify(command), function(){

    })
        .done(function(data) {
            if (data['status'] == '1') {
                $("#mydialog2").dialog("open");
                $("#mydialog2").parent().css('border', '4px solid #339900');
                $("#mydialog2").parent().children(".ui-dialog-titlebar").children("button").css('display', 'none');
                return false;
            } else {
                $("#mydialog3").dialog("open");
                $("#mydialog3").parent().css('border', '4px solid #cc0000');
                $("#mydialog3").parent().children(".ui-dialog-titlebar").children("button").css('display', 'none');
                return false;
            }
        })
        .fail(function() {
            alert("Вибачте, на сайті виникла помилка і ми не можемо перевірити Вашу відповідь.\n" +
            "Спробуйте перезавантажити сторінку або напишіть нам на адресу Wizlightdragon@gmail.com.");
        })
        .always(function() {
        }, "json");
}
function checkAnswers(answers){
    var answerTrim = document.getElementsByClassName('testVariant');
    for (var i = 0; i < answerTrim.length; i++) {
        answerTrim[i].value = $.trim(answerTrim[i].value);
    }
    if(answers.length==0){
        alert('Виберіть хоч один правильний варіант перед створенням тесту');
        document.getElementById("addtests").disabled = true;
    }
}
function buttonEnabled(){
        document.getElementById("addtests").disabled = false;
}


