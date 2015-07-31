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



var $collectionHolder;

// setup an "add a tag" link
var $addTagLink = $('<a class="btn" href="#">Dodaj dystans</a>');
var $newLinkLi = $('<span id="add_distance_btn"></span>').append($addTagLink);


jQuery(document).ready(function() {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('div#wykopbundle_training_distance');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addTagLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addTagForm($collectionHolder, $newLinkLi);
    });
});

function addTagForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);
    
    //Add placeholder and title for input
    newForm = $(newForm);
    newForm.find('label').remove();
    newForm.find('input').attr('title', 'Podaj dystans lub link do treningu Endomondo/Strava/RunKeeper');
    newForm.find('input').attr('oninvalid', 'InvalidMsg(this);');
    newForm.find('input').attr('placeholder', 'Podaj dystans lub link do treningu Endomondo/Strava/RunKeeper');
    newForm.find('input').after();

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<div></div>').append(newForm);
    $newLinkLi.before($newFormLi);
}
