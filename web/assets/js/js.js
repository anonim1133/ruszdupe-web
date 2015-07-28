function InvalidMsg(textbox) {
    
    if (textbox.value == '') {
        textbox.setCustomValidity('To pole jest wymagane');
    }
    else if(textbox.validity.typeMismatch){
        textbox.setCustomValidity('Nieprawidłowy format danych');
    }
    else {
        textbox.setCustomValidity('');
    }
    return true;
}

function embed(){
	$("a#dodajObrazUrl").after('<input name="embedUrl" type="text" class="pole" placeholder="Podaj url">');
	$("a#dodajObrazUrl").remove();
}

function dodajDystans(){
    $('<input name="dystans[]" type="text" class="pole" placeholder="Wpisz dystans">').insertBefore('#pierwszy');
}
function dodajWpis(){
	$('input#dodaj').attr('disabled', 'true');
	$('form').submit();
	$('form').toggle();
	$('.container').append('<img id="loading" src="assets/loading-wheel.gif">');
}

