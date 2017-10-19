/**
 * Created by Sarfraz on 5/20/2015.
 */

jQuery.support.cors = true;

var editor = ace.edit("code");
editor.setShowPrintMargin(false);
editor.setTheme("ace/theme/twilight");
editor.session.setMode({path: "ace/mode/php", inline: true});
editor.getSession().setTabSize(3);
editor.getSession().setUseSoftTabs(true);
editor.getSession().setUseWrapMode(true);

editor.setOptions({
    enableBasicAutocompletion: true,
    enableLiveAutocompletion: true
});

// enable tooltips
$('[data-toggle=tooltip]').tooltip();

// replace alert with bootstrap dialog
/*
 $("#modal-general").modal({
 show: false,
 backdrop: 'static'
 });
 */

function alert(message) {
    var $dialog = $('#modal-general');
    $dialog.modal('hide');
    $dialog.find('.modal-body').html(message);
    $dialog.modal('show');
}

$.ctrl = function (key, callback, args) {
    $(document, '#code').keydown(function (e) {
        if (!args) args = [];
        if (e.keyCode == key.charCodeAt(0) && e.ctrlKey) {
            callback.apply(this, args);
            return false;
        }
    });
};

function runCode() {
    var code = encodeURIComponent(editor.getSession().getValue());
    var $btn = $('#btnRun');
    var $loader = $('.code-wait');
    var $codeResult = $('#codeResult');

    if (!code) return false;

    $btn.attr('disabled', true);
    $codeResult.slideUp('fast');
    $loader.slideDown('fast');
    $codeResult.find(".panel-footer").slideUp('fast');

    $.post('http/eval.php', {"code": code}, function (result) {

        $loader.slideUp('fast');
        $btn.attr('disabled', false);

        $codeResult.slideDown('fast');

        var resultObject = null;
        var isJson = true;

        try {
            resultObject = $.parseJSON(result);
        }
        catch (err) {
            isJson = false;
        }

        $codeResult.find(".panel-body").html('');

        // did fatal error occur?
        if (!isJson) {
            $codeResult.find(".panel-body").html(result);
            $codeResult.removeClass('panel-green').addClass('panel-red');
            $codeResult.find("#timetaken").html('N/A');
        }
        else {
            $codeResult.find("#timetaken").html(resultObject.time);

            if (!resultObject.line) {
                $codeResult.removeClass('panel-red').addClass('panel-green');
                $codeResult.find(".panel-body").html(resultObject.result);
            }
            else {
                $codeResult.removeClass('panel-green').addClass('panel-red');
                $codeResult.find(".panel-body").html(resultObject.result);

                // hightlight error line
                editor.getSession().setAnnotations([{
                    row: resultObject.line - 1,
                    column: 1,
                    text: resultObject.result,
                    type: "error" // also warning and information
                }]);
            }
        }

        $('html, body').animate({
            scrollTop: $codeResult.offset().top
        });

    });
}

function checkCode() {
    var code = encodeURIComponent(editor.getSession().getValue());
    var $btn = $('#btnCheck');
    var $loader = $('.code-wait');
    var $codeResult = $('#codeResult');

    if (!code) return false;

    $btn.attr('disabled', true);
    $codeResult.slideUp('fast');
    $loader.slideDown('fast');

    $.post('http/check.php', {"code": code}, function (result) {

        $loader.slideUp('fast');
        $btn.attr('disabled', false);

        $codeResult.slideDown('fast');
        $codeResult.find("#timetaken").html('N/A');

        $codeResult.find(".panel-body").html('');

        if (!$.trim(result) || result === '<pre></pre>') {
            $codeResult.find(".panel-body").html('All Good ;-)');
            $codeResult.removeClass('panel-red').addClass('panel-green');
            $codeResult.find(".panel-footer").slideUp('fast');
        }
        else {
            $codeResult.find(".panel-body").html(result);
            $codeResult.removeClass('panel-green').addClass('panel-red');
            $codeResult.find(".panel-footer").slideDown('fast');
        }

        $('html, body').animate({
            scrollTop: $codeResult.offset().top
        });

    });
}

function fixCode() {
    var code = encodeURIComponent(editor.getSession().getValue());
    var $btn = $('#btnCSFix');
    var $loader = $('.code-wait');
    var $codeResult = $('#codeResult');

    if (!code) return false;

    $btn.attr('disabled', true);
    $codeResult.slideUp('fast');
    $loader.slideDown('fast');

    $('html, body').animate({
        scrollTop: $('#code').offset().top
    });

    $.post('http/fix.php', {"code": code}, function (result) {

        $loader.slideUp('fast');
        $btn.attr('disabled', false);

        $codeResult.find(".panel-body").html('');
        $codeResult.slideUp('fast');

        if (result) {
            editor.getSession().setValue('');
            editor.getSession().setValue(result);
        }
    });
}

function saveSnippet() {
    var $dialog = $('#modal-save');
    var code = encodeURIComponent(editor.getSession().getValue());
    var snippetName = $('#snippetName').val();

    if (!snippetName || !code) return false;

    $dialog.modal('hide');

    $.post('http/save.php', {"name": snippetName, "code": code}, function (result) {
        alert(result);
    });
}

function showSaveSnippetDialog() {
    var code = editor.getSession().getValue();
    var $dialog = $('#modal-save');

    if (!code) {
        alert('Nothing to save!');
        return false;
    }

    $dialog.modal('show');
    $dialog.find('#snippetName').val('');
    $dialog.find('#snippetName')[0].focus();
}

// run code
$('#btnRun').click(runCode);
$('#code').keydown(function (e) {
    if (e && e["ctrlKey"] && e["shiftKey"]) {
        runCode();
    }
});

// check code
$('#btnCheck').click(checkCode);
$.ctrl('Q', checkCode);

// fix code 
$('#btnCSFix').click(fixCode);

// save snippet
$.ctrl('S', showSaveSnippetDialog);
$('#btnSave').click(showSaveSnippetDialog);
$('#btnSaveModal').click(saveSnippet);

$('#snippetName').on("keypress", function (e) {
    if (e.which == 13) {
        saveSnippet();
    }
});

// adjust height of editor
function adaptEditor() {
    document.getElementById('code').style.height = ($(window).innerHeight() - 60) + 'px';
    editor.resize();
}

window.onresize = function () {
    adaptEditor();
};

adaptEditor();

// run code from menu
$('.code_entry a').click(function () {
    var code = $(this).closest('li').find('span.ph_code').text();
    var autorun = $(this).closest('li').find('span.ph_code').attr('rel') === "true";

    editor.getSession().setValue('');
    editor.getSession().setValue(code);

    if (autorun) {
        runCode();
    }
});

// delete snippets
$('ul.code_entry i.fa-remove').click(function(){
	var name = $(this).data('name');
	var $li = $(this).closest('li');
	
	if (confirm('Are you sure you want to delete this snippet ?')) {
		$.post('http/delete.php', {"name": name}, function (result) {
			if (result) {
				$li.remove();
			}
		});	
	}
	
	return false;
});
