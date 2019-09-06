<script type="text/javascript" src="{{asset('js/components/piano.js')}}"></script>
<script type="text/javascript">
$(document).on('click', '#reload', function() {
    window.location = window.location.href.split("?")[0];
});
</script>
<script type="text/javascript">
//////////////////////
// GLOBAL VARIABLES //
//////////////////////
var scaleLoops = [];

//////////////////////
// NOTE INPUT CLICK //
//////////////////////
$('.note h1').on('click', function() {
	let $note = $(this).parent();
    resetNotes();
    selectNote($note);
    showOptions();
});

///////////////////////////////////
// NOTE PLUS/MINUS BUTTONS CLICK //
///////////////////////////////////
$('.note button').on('click', function() {
	let symbol = $(this).attr('data-symbol');
	let accidental = '';
	let accidentals = [];
    let $note = $(this).parent().parent();
	let $label = $(this).parent().siblings('h1').find('span');
	let steps = parseInt($label.attr('data-steps'));
	
	if (symbol == '#' && steps < 1) {
		steps += 1;
	} else if (symbol == 'b' && steps > -1) {
		steps -= 1;
	}

	$label.attr('data-steps', steps);

	if (steps == 0)
		$label.text('');

	accidental = steps > 0 ? '#' : 'b';

	for (i=0; i<Math.abs(steps); i++) {
		accidentals.push(accidental);
	}

	$label.text(accidentals.join(''));
    
    let ext = accidentals.join('');

    $note.attr('data-name', $note.attr('data-name')[0] + ext);
});

//////////////////////
// KEY TYPE OPTIONS //
//////////////////////
$(document).on('click', '#key-type-options button', function() {
    let $button = $(this);
    resetOptions($button);
    selectOption($button);
});

////////////////////////
// SUBMIT NOTES CLICK //
////////////////////////
$('button#submit-key').on('click', function() {
    if (missingNote()) {
            alert('Please select the key');
    } else if (missingType()) {
		alert('Please select the type');
        $('#key-type-options').removeClass('bounce').addClass('bounce');
    } else {
        let url = $(this).attr('data-url');
		$(this).prop('disabled', true);
		$(this).text('Hang on a sec...');

		animate();
        setTimeout(function() {
            submit(url);
        }, 800);
	}
});

////////////////
// PLAY NOTES //
////////////////
$(document).on('click', 'button.play-note', function() {
	stopLoop();
	hideDots();
	resetFingerings();
	playNote($(this));
});

$(document).on('click', 'button.play-notes', function() {
    let notes = JSON.parse($(this).attr('data-notes'));
    let fingering = JSON.parse($(this).attr('data-fingering'));
    let label = $(this).attr('data-label');
    let fingeringTarget = $(this).attr('data-fingering-target');
    let notesTarget = $(this).attr('data-notes-target');
    let target = $(this).attr('data-target');
    let noteIndex = firstIndex = 0;

    stopLoop();
    hideDots();

    notes.forEach(function(element, index) {
        let note = element;
        let finger = fingering[index];

        note = noteToHumans(note).toLowerCase();

        let $key = findKey(note, noteIndex, target);

        if ($key == null)
            $key = findKey(note, firstIndex, target);

        noteIndex = $key.hasClass('keyboard-black-key') ? $key.parent().next().index() : $key.index();
        
        if (firstIndex == 0)
            firstIndex = noteIndex;
        
        resetFingerings();

        scaleLoops.push(setTimeout(function() {
       		// console.log('Playing ' + note + ' at index ' + noteIndex);
            press($key, 150, false);
            showFingering(finger, label, fingeringTarget);
            highlight($key);
            highlightNote(index, notesTarget);
        }, 400 * index));
    });
});

///////////////
// FUNCTIONS //
///////////////
function highlightNote(index, container = 'body') {
	$(container + ' button.play-note').removeClass('btn-teal').addClass('btn-teal-outline');
	$(container + ' button.play-note:eq('+index+')').toggleClass('btn-teal-outline btn-teal');
}

function stopLoop() {
	$('button.play-note').removeClass('btn-teal').addClass('btn-teal-outline');
    for (var i=0; i<scaleLoops.length; i++) {
    	clearTimeout(scaleLoops[i]);
    }
}

function resetFingerings() {
	$('.fingering-container').hide();
	$('.fingering-container small.label').text('');
	$('.fingering-container > div.content').html('');
}

function showFingering(finger, label, container = '#scale-fingering') {
	$(container).find('small.label').text(label);
	$(container).find('> div.content').append('<h2 class="mx-2 my-0"><strong>'+finger+'</strong></h2>');
	$(container).show();
}

function showError(response) {
    $('#modal-error .modal-body div#error-report').text(response);
    $('#modal-error').modal('show');

	$('#modal-error').on('hide.bs.modal', function() {
	    reload();
	});
}

function playNote($note) {
    play($note.attr('data-name'), $note.attr('data-octave'), 500);
}

function reload() {
    $('button#submit-key').text($('button#submit-key').attr('data-text')).prop('disabled', false);
    $('.input-overlay').hide();
}

function animate() {
    $('.input-overlay').show();
}

function submit(url) {
	let key = getInput();
	console.log('Sending: ' + key);

	$.get(url, {key: key}, function(response) {
		$('#key-container').html(response);
        $('html,body').scrollTop(0);
	}).fail(function(response) {
        showError(response.responseJSON.message);
	});
}

function getInput() {
	let name = noteToMachine($('.note-active').attr('data-name'));
	let type = $('#key-type-options .btn-teal').attr('data-name');

	return name + type;
}

function noteToHumans(note) {
    return ucfirst(note.replace('+', '#').replace('x', '##').replace('+', '#').replace('-', 'b').replace('-', 'b').replace('2', ''));
}

function noteToMachine(note) {
    let letter = ucfirst(note[0]);

    return letter + note.substring(1).replace('#', '+').replace('#', '+').replace('b', '-').replace('b', '-');    
}

function resetNotes() {
    let $notes = $('.note');
    
	$notes.removeClass('note-active').addClass('note-inactive opacity-4');
	$notes.find('button').prop('disabled', true);
}

function selectNote($note) {
	$note.toggleClass('note-inactive note-active opacity-4');
	$note.find('button').toggleAttr('disabled');
}

function resetOptions() {
    $('#key-type-options button').removeClass('btn-teal').addClass('btn-outline-secondary');
}

function selectOption($button) {
    $button.removeClass('btn-outline-secondary').addClass('btn-teal');
}

function showOptions() {
	$('#key-type-options').show();
}

function missingNote() {
	return ! $('.note-active').length;
}

function missingType() {
	return ! $('#key-type-options .btn-teal').length;
}

const ucfirst = (s) => {
  if (typeof s !== 'string') return ''
  return s.charAt(0).toUpperCase() + s.slice(1)
}
</script>